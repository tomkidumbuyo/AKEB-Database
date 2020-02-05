mainControllers.controller('subdealer', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {

	mainFactory.setPage('subdealer')
	$scope.static_url = static_url;
	$scope.base_url = base_url;
	
	

    $scope.regionsPromice = mainFactory.ajax('ajax/user/get_regions',null);
    $scope.regionsPromice.then(function(v){
        $scope.regions = v;
        $scope.newSubdealer.region = v[0].id + ''
    });

    $scope.offset = 1
    $scope.limit = '10'
    $scope.lm = 10

    $scope.pgs = []

    $scope.offset_changed = function(offset){
    	if(offset < 0){
    		offset = 0
    	}
    	if(offset > ($scope.pgs.length-1)){
    		offset = $scope.pgs.length-1
    	}
    	$scope.offset_pg = offset
    	$scope.offset = (offset) * $scope.limit
    	    	
    }

    $scope.limit_changed = function(){
    	$scope.pgs = []

    	s = Math.floor($scope.all/parseInt($scope.limit))
		for (var i=0;i<=s;i++) {
		  $scope.pgs.push(i);
		}
		$scope.offset_changed(0)
		$scope.lm = parseInt($scope.limit)
    }
    $scope.all = 0;
    $scope.used = 0;
    $scope.unused = 0;
    $scope.called = 0;

    $scope.subdealersPromice = mainFactory.ajax('ajax/subdealer/getall',null);
    $scope.subdealersPromice.then(function(v){
      	$scope.subdealers = v;
      	$scope.limit_changed();
		$scope.filterLeads()
    });

    $scope.paggination_offset = function(){
    	if($scope.offset_pg > $scope.pgs.length - 5){
    		return $scope.pgs.length - 5;
    	}else if($scope.offset_pg > 2 && $scope.pgs.length > 5){
    		return $scope.offset_pg - 2;
    	}else{
            return 0
    	}
    }

    $scope.select_region = function(region){
    	$scope.selected_region = region
    	$scope.filterLeads()
    }

    $scope.filterSingleLead = function(subdealer){
	    // Do some tests

	    if($scope.selected_region && $scope.selected_region.id != subdealer.region.id){
	    	return false;
	    }

	    if($scope.page == 'sales'){
	    	return true
		}else if($scope.page == 'used'){
			if(subdealer.used == 1){
				return true
			}else{
				return false
			}
		}else{
			if(subdealer.used == 1){
				return false
			}else{
				return true
			}
		}
	};

	$scope.addSubdealer = function(){

		console.log($scope.newSubdealer)

		$.ajax({
            url     : base_url+'ajax/subdealer/add',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newSubdealer),
            success : function( data ) {
				console.log(data)
				$('#newVehicleModal').modal('hide')
				$scope.subdealers.push(data)
            },
            error   : function( xhr, err ) {
				console.log(err)
				console.log(xhr)
            }
        });   
	}

	$scope.filteredLeads = []
	$scope.filterLeads = function(){

		$scope.all    = 0
		$scope.used   = 0
		$scope.unused = 0
		$scope.called = 0

		angular.forEach($scope.subdealers, function(subdealer, key) {
			subdealer.id = parseInt(subdealer.id)
			if($scope.filterSingleLead(subdealer)){
	      		$scope.all += 1
			  	if(parseInt(subdealer.used) == 1){
			  		$scope.used += 1
			  	}else{
			  		$scope.unused += 1
			  	}
			  	if(subdealer.called){
			  		$scope.called += 1
			  	}
		  	}
		});
		$scope.limit_changed()
	}

	
	$scope.select_page = function(page){
    	$scope.page = page
    	$scope.filterLeads()
    }
    $scope.select_page('sales')


	$scope.sort = {
		column:'id',
		descending:true
	}

	$scope.changeSorting = function(column) {

		console.log(column)

        if ($scope.sort.column == column) {
            $scope.sort.descending = !$scope.sort.descending;
        } else {
            $scope.sort.column = column;
            $scope.sort.descending = false;
        }
        $scope.filterLeads();
    };

    $scope.filterFn = function(subdealer){
	    // Do some tests
	    if($scope.search && subdealer.fullnamestr.toLowerCase().indexOf($scope.searchstr.toLowerCase()) < 0 && subdealer.numberstr.toLowerCase().indexOf($scope.searchstr.toLowerCase()) < 0){
	    	return false;
	    }


	    if($scope.selected_region && $scope.selected_region.id != subdealer.region.id){
	    	return false;
	    }

	    if($scope.page == 'sales'){
	    	return true
		}else if($scope.page == 'used'){
			if(subdealer.used == 1){
				return true
			}else{
				return false
			}
		}else{
			if(subdealer.used == 1){
				return false
			}else{
				return true
			}
		}
	};

	

	$scope.filterLeads();

	

	$scope.export_csv = function(){

		const rows = [];

		$scope.subdealers.forEach(function (subdealer) {
			if($scope.filterFn(subdealer)){
				use_time = subdealer.used == 1 ? 'Not used' : subdealer.use_time
				used = subdealer.used == 1 ? true : false
				rows.push([subdealer.fullname,subdealer.region.name,subdealer.location.name,subdealer.number,subdealer.offer_time,use_time,subdealer.number,subdealer.product.name,used])
			}
		})

		console.log(rows)

		let csvContent = "data:text/csv;charset=utf-8," 
		    + rows.map(e => e.join(",")).join("\n");


		var encodedUri = encodeURI(csvContent);
		var link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "Leads.csv");
		document.body.appendChild(link); // Required for FF

		link.click(); // This will download the data file named "my_data.csv".

    }

    $scope.subdealer_called = function(subdealer){
    	$.ajax({
            url     : base_url+'ajax/subdealer/subdealer_called',
            type    : 'POST',
            dataType: 'json',
            data    : $.param(subdealer),
            success : function( data ) {
				subdealer = data
            },
            error   : function( xhr, err ) {
                alert('Error');
				console.log(err)
				console.log(xhr)
            }
        }); 
    }



	

	



}]);

