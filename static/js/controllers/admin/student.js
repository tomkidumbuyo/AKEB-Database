mainControllers.controller('student', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {

	mainFactory.setPage('students')
	$scope.static_url = static_url;
	$scope.base_url = base_url;
	
	

    $scope.regionsPromice = mainFactory.ajax('ajax/user/get_regions',null);
    $scope.regionsPromice.then(function(v){
        $scope.regions = v;
    });

    $scope.offset = 1
    $scope.limit = '10'
    $scope.lm = 10

    $scope.pgs = []

    $scope.regions = [];
    $scope.countries = []

    $scope.newStudent = {
    	jk: 'upanga',
    	gender: 'male',
    }

    $scope.max_date = new Date()
	$scope.max_date_string = $scope.max_date.toString()


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

    $.ajax({
        url     : base_url+'ajax/user/get_countries',
        type    : 'POST',
        dataType: 'json',
        data    : null,
        success : function( data ) {
			$scope.countries = data
			$scope.newStudent.nationality = data[0].country_code
			$scope.newStudent.residence_country = data[0].country_code

        },
        error   : function( xhr, err ) {
            alert('Error');
			console.log(err)
			console.log(xhr)
        }
   	}); 

   	$.ajax({
        url     : base_url+'ajax/user/get_regions',
        type    : 'POST',
        dataType: 'json',
        data    : null,
        success : function( data ) {
			$scope.regions = data
			console.log(data);
        },
        error   : function( xhr, err ) {
            alert('Error');
			console.log(err)
			console.log(xhr)
        }
   	});

   	$scope.addStudent = function() {

   		console.log($scope.newStudent);

   		
		if(!$scope.newStudent.family_id){
			alert('Family ID field is a required field');
			return
		}
		if(!$scope.newStudent.first_name){
			alert('first name field is a required field');
			return
		}
		if(!$scope.newStudent.middle_name){
			alert('middle name field is a required field');
			return
		}
		if(!$scope.newStudent.last_name){
			alert('last name field is a required field');
			return
		}
		if(!$scope.newStudent.nationality){
			alert('Nationality field is a required field');
			return
		}
		if(!$scope.newStudent.residence_country){
			alert('residence country field is a required field');
			return
		}
		if(!$scope.newStudent.residence_city){
			alert('residence city field is a required field');
			return
		}
		if(!$scope.newStudent.gender){
			alert('gender field is a required field');
			return
		}
		if(!$scope.newStudent.dob){
			alert('Date of birthfield is a required field');
			return
		}
		if(!$scope.newStudent.ismaili){
			$scope.newStudent.ismaili = false
		}
		if(!$scope.newStudent.data){
			$scope.newStudent.data = false
		}
		if(!$scope.newStudent.english){
			$scope.newStudent.english = false
		}
		if(!$scope.newStudent.computer){
			$scope.newStudent.computer = false
		}
		if(!$scope.newStudent.jk){
			alert('Jamatkhana field is a required field');
			return
		}
		if(!$scope.newStudent.email){
			alert('Email field is a required field');
			return
		}
		if(!$scope.newStudent.phone){
			alert('Phone number field is a required field');
			return
		}
		if(!$scope.newStudent.income){
			alert('Income field is a required field');
			return
		}

		$.ajax({
	        url     : base_url+'ajax/student/create_student',
	        type    : 'POST',
	        dataType: 'json',
	        data    : $.param($scope.newStudent),
	        success : function( data ) {
	        	$scope.students.push(data)
				$scope.limit_changed()
				$('#newStudentModal').modal('hide');
	        },
	        error   : function( xhr, err ) {
	            alert('Error');
				console.log(err)
				console.log(xhr)
	        }
	   	});
   	}

   	$scope.select_student = function(student){
   		console.log(student)
   		$scope.selected_student = student
   	}

   	$scope.addEducation = function() {
   		$scope.newEducation.student_id = $scope.selected_student.id
   		$.ajax({
	        url     : base_url+'ajax/student/create_education',
	        type    : 'POST',
	        dataType: 'json',
	        data    : $.param($scope.newEducation),
	        success : function( data ) {
	        	$scope.selected_student.educations.push(data)
				$('#newEducationModal').modal('hide');
	        },
	        error   : function( xhr, err ) {
	            alert('Error');
				console.log(err)
				console.log(xhr)
	        }
	   	});
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

    $scope.studentsPromice = mainFactory.ajax('ajax/student/getStudents',null);
    $scope.studentsPromice.then(function(v){
      	$scope.students = v;
      	$scope.limit_changed();
		$scope.filterStudents()
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
    	$scope.filterStudents()
    }

    $scope.filterSingleLead = function(student){
	    // Do some tests

	    if($scope.selected_region && $scope.selected_region.id != student.region.id){
	    	return false;
	    }

	    if($scope.page == 'sales'){
	    	return true
		}else if($scope.page == 'used'){
			if(student.used == 1){
				return true
			}else{
				return false
			}
		}else{
			if(student.used == 1){
				return false
			}else{
				return true
			}
		}
	};

	$scope.filteredStudents = []
	$scope.filterStudents = function(){

		$scope.all    = 0
		$scope.used   = 0
		$scope.unused = 0
		$scope.called = 0

		angular.forEach($scope.students, function(student, key) {
			student.id = parseInt(student.id)
			if($scope.filterSingleLead(student)){
	      		$scope.all += 1
			  	if(parseInt(student.used) == 1){
			  		$scope.used += 1
			  	}else{
			  		$scope.unused += 1
			  	}
			  	if(student.called){
			  		$scope.called += 1
			  	}
		  	}
		});
		$scope.limit_changed()
	}

	
	$scope.select_page = function(page){
    	$scope.page = page
    	$scope.filterStudents()
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
        $scope.filterStudents();
    };

    $scope.filterFn = function(student){
	    // Do some tests
	    if($scope.search && student.fullnamestr.toLowerCase().indexOf($scope.searchstr.toLowerCase()) < 0 && student.numberstr.toLowerCase().indexOf($scope.searchstr.toLowerCase()) < 0){
	    	return false;
	    }


	    if($scope.selected_region && $scope.selected_region.id != student.region.id){
	    	return false;
	    }

	    if($scope.page == 'sales'){
	    	return true
		}else if($scope.page == 'used'){
			if(student.used == 1){
				return true
			}else{
				return false
			}
		}else{
			if(student.used == 1){
				return false
			}else{
				return true
			}
		}
	};

	

	$scope.filterStudents();

	

	$scope.export_csv = function(){

		const rows = [];

		$scope.students.forEach(function (student) {
			if($scope.filterFn(student)){
				use_time = student.used == 1 ? 'Not used' : student.use_time
				used = student.used == 1 ? true : false
				rows.push([student.fullname,student.region.name,student.location.name,student.number,student.offer_time,use_time,student.number,student.product.name,used])
			}
		})

		console.log(rows)

		let csvContent = "data:text/csv;charset=utf-8," 
		    + rows.map(e => e.join(",")).join("\n");


		var encodedUri = encodeURI(csvContent);
		var link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "Students.csv");
		document.body.appendChild(link); // Required for FF

		link.click(); // This will download the data file named "my_data.csv".

    }

    $scope.student_called = function(student){
    	$.ajax({
            url     : base_url+'ajax/student/student_called',
            type    : 'POST',
            dataType: 'json',
            data    : $.param(student),
            success : function( data ) {
				student = data
            },
            error   : function( xhr, err ) {
                alert('Error');
				console.log(err)
				console.log(xhr)
            }
        }); 
    }



	

	



}]);

