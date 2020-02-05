<div class="container pt-5">

<div class="page-header">
              <h1 class="page-title">
                Leads
              </h1>
            </div>
            
<div class="row">

<div class="col-md-9 pt-3 pb-3">
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{selected_region ? selected_region.name : 'All Regions'}} </button>
    <button type="button" class="btn btn-primary" ng-click="export_csv()">Export Data</button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" ng-click="select_region(null)">All</a> <a class="dropdown-item" ng-repeat="region in regions" ng-click="select_region(region)">{{region.name}}</a> </div>
  </div>
</div>
<div class="col-md-3 pt-3">
<button class="btn btn-secondary pull-right" data-toggle="modal" data-target="#newVehicleModal"><i class="icon-plus mr-10"></i>Add subdealer</button>
</div>
</div>
<div class="row" >
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Leads </h3>
      </div>
      <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show 
                    
                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ng-model="limit" ng-change="limit_changed()">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    </select> entries</label></div>
                    
                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" ng-model="search"></label></div>
                    
                    
                    
        <table class="table card-table table-striped table-vcenter text-nowrap datatable dataTable no-footer">
          <thead>
            <tr>
              <th width="20px">#</th>
              <th width="20px" ng-click="changeSorting('id')">ID <span class="fe fe-chevron-down" ng-show="sort.column == 'id' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'id' && !sort.descending"></span></th>
              <th ng-click="changeSorting('name')">Sub Dealer <span class="fe fe-chevron-down" ng-show="sort.column == 'name' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'name' && !sort.descending"></span></th>
              <th ng-click="changeSorting('region.name')">Region <span class="fe fe-chevron-down" ng-show="sort.column == 'region.name' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'region.name' && !sort.descending"></span></th>
              <th ng-click="changeSorting('district')">District <span class="fe fe-chevron-down" ng-show="sort.column == 'district' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'district' && !sort.descending"></span></th>
              <th ng-click="changeSorting('ward')">Ward <span class="fe fe-chevron-down" ng-show="sort.column == 'ward' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'ward' && !sort.descending"></span></th>
              
              <th ng-click="changeSorting('phone')">Phone number <span class="fe fe-chevron-down" ng-show="sort.column == 'phone' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'phone' && !sort.descending"></span></th>
              
              <th ng-click="changeSorting('email')">Email <span class="fe fe-chevron-down" ng-show="sort.column == 'email' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'email' && !sort.descending"></span></th>
              
             
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="(key,subdealer) in subdealers | orderBy : sort.column : sort.descending | filter:filterFn  | limitTo : lm : offset">
              <td>{{key+1+offset}}</td>
              <td>{{subdealer.id}}</td>
              <td>{{subdealer.name}}</td>
              <td>{{subdealer.region.name}}</td>
              <td>{{subdealer.district}}</td>
              <td>{{subdealer.phone}}</td>
         		<td>{{subdealer.email}}</td>
              
            </tr>
          </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
        Showing {{offset+1}} to {{offset_pg == (pgs.length-1) ? all : offset+lm}} of {{all}} entries</div>
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
        
        <a class="paginate_button previous" ng-hide="offset_pg == 0 "  ng-click="offset_changed(offset_pg - 1)">Previous</a><span>
        
        <a class="paginate_button"  ng-click="offset_changed(0)" ng-show="paggination_offset() > 0">1</a>
        
        <span ng-show="paggination_offset() > 0">...</span>
        
        <a class="paginate_button {{pg == offset_pg ? 'current':''}}" ng-repeat="pg in pgs | limitTo : 5 : paggination_offset()" ng-click="offset_changed(pg)" ng-show="pgs.length > 1">{{pg + 1}}</a>
        
        <span ng-show="offset_pg + 3 < pgs.length">...</span>
        
        <a class="paginate_button"  ng-click="offset_changed(pgs.length-1)" ng-show="offset_pg + 3 < pgs.length">{{pgs.length}}</a>
        
        <a class="paginate_button next " ng-hide="offset_pg == (pgs.length-1)" ng-click="offset_changed(offset_pg + 1)">Next</a></div></div>
                    
                  </div>
    
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="newVehicleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">New Subdealer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        
      </div>
      <div class="modal-body">
        
        <div class="form-group">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="John Doe" ng-model="newSubdealer.name">
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" placeholder="example@mail.com" ng-model="newSubdealer.email">
        </div>
        <div class="form-group">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" placeholder="+255 700 000 000" ng-model="newSubdealer.phone">
        </div>
        <div class="form-group">
          <label class="form-label">Region</label>
          <select name="" id="" class="form-control"  ng-model="newSubdealer.region">
          	<option ng-repeat="region in regions"  value="{{region.id}}">{{region.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">District</label>
          <input type="text" class="form-control" placeholder="Example Scania" ng-model="newSubdealer.district">
        </div>
        <div class="form-group">
          <label class="form-label">Ward</label>
          <input type="text" class="form-control" placeholder="Example Scania" ng-model="newSubdealer.ward">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="addSubdealer()">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->