<div class="container pt-5" ng-hide="selected_student">
  <div class="page-header">
    <div class="col-md-6">
      <h1 class="page-title"> Students </h1>
    </div>
    <div class="col-md-6">
      <button class="btn btn-lg btn-primary pull-right"  data-toggle="modal" data-target="#newStudentModal"><span class="fe fe-plus mr-2"></span>NEW STUDENT</button>
    </div>
  </div>
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Students </h3>
        </div>
        <div class="table-responsive">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>Show
                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ng-model="limit" ng-change="limit_changed()">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
                entries</label>
            </div>
            <div id="DataTables_Table_0_filter" class="dataTables_filter">
              <label>Search:
                <input type="search" ng-model="search">
              </label>
            </div>
            <table class="table card-table table-striped table-vcenter text-nowrap datatable dataTable no-footer">
              <thead>
                <tr>
                  <th width="20px">#</th>
                  <th width="20px" ng-click="changeSorting('id')">ID <span class="fe fe-chevron-down" ng-show="sort.column == 'id' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'id' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('fullname')">Customer <span class="fe fe-chevron-down" ng-show="sort.column == 'fullname' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'fullname' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('nationality')">Nationality <span class="fe fe-chevron-down" ng-show="sort.column == 'nationality' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'nationality' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('residence_country')">Residence county <span class="fe fe-chevron-down" ng-show="sort.column == 'residence_country' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'residence_country' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('phone')">Phone number <span class="fe fe-chevron-down" ng-show="sort.column == 'phone' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'phone' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('income')">Income <span class="fe fe-chevron-down" ng-show="sort.column == 'income' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'income' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('gender')">Gender <span class="fe fe-chevron-down" ng-show="sort.column == 'gender' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'gender' && !sort.descending"></span></th>
                  <th ng-click="changeSorting('dob')">Date of birth <span class="fe fe-chevron-down" ng-show="sort.column == 'dob' && sort.descending"></span> <span class="fe fe-chevron-up" ng-show="sort.column == 'dob' && !sort.descending"></span></th>
                  <th >Data</th>
                  <th>Computer</th>
                  <th>English</th>
                  <th>Ismaili</th>
                  <th>jk</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="(key,student) in students | orderBy : sort.column : sort.descending | filter:filterFn  | limitTo : lm : offset">
                  <td>{{key+1+offset}}</td>
                  <td>{{student.id}}</td>
                  <td>{{student.fullname}}</td>
                  <td>{{student.nationality}}</td>
                  <td>{{student.residence_country}}</td>
                  <td>{{student.residence_city}}</td>
                  <td>{{student.income}}</td>
                  <td>{{student.gender}}</td>
                  <td>{{student.dob}}</td>
                  <td><!--<span class="fe {{student.used == 1 ? 'fe-check' : 'fe-x'}}"></span>--> 
                    <span class="status-icon {{student.data == 1 ? 'bg-success' : 'bg-warning' }}"></span>{{student.data == 1 ? 'Yes' : 'No'}} </td>
                  <td><!--<span class="fe {{student.used == 1 ? 'fe-check' : 'fe-x'}}"></span>--> 
                    <span class="status-icon {{student.computer == 1 ? 'bg-success' : 'bg-warning' }}"></span>{{student.computer == 1 ? 'Yes' : 'No'}} </td>
                  <td><!--<span class="fe {{student.used == 1 ? 'fe-check' : 'fe-x'}}"></span>--> 
                    <span class="status-icon {{student.english == 1 ? 'bg-success' : 'bg-warning' }}"></span>{{student.english == 1 ? 'Yes' : 'No'}} </td>
                  <td><!--<span class="fe {{student.used == 1 ? 'fe-check' : 'fe-x'}}"></span>--> 
                    <span class="status-icon {{student.ismaili == 1 ? 'bg-success' : 'bg-warning' }}"></span>{{student.ismaili == 1 ? 'Yes' : 'No'}} </td>
                  <td>{{student.jk}}</td>
                  <td><button class="btn btn-primary" ng-click="select_student(student)">view <span class="fe-arrow-right fe ml-1"></span></button></td>
                </tr>
              </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"> Showing {{offset+1}} to {{offset_pg == (pgs.length-1) ? all : offset+lm}} of {{all}} entries</div>
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"> <a class="paginate_button previous" ng-hide="offset_pg == 0 "  ng-click="offset_changed(offset_pg - 1)">Previous</a><span> <a class="paginate_button"  ng-click="offset_changed(0)" ng-show="paggination_offset() > 0">1</a> <span ng-show="paggination_offset() > 0">...</span> <a class="paginate_button {{pg == offset_pg ? 'current':''}}" ng-repeat="pg in pgs | limitTo : 5 : paggination_offset()" ng-click="offset_changed(pg)" ng-show="pgs.length > 1">{{pg + 1}}</a> <span ng-show="offset_pg + 3 < pgs.length">...</span> <a class="paginate_button"  ng-click="offset_changed(pgs.length-1)" ng-show="offset_pg + 3 < pgs.length">{{pgs.length}}</a> <a class="paginate_button next " ng-hide="offset_pg == (pgs.length-1)" ng-click="offset_changed(offset_pg + 1)">Next</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container pt-5" ng-show="selected_student">
  <div class="page-header">
    <div class="pull-left">
      <button class="btn btn-lg btn-primary pull-right"  ng-click="select_student(false)"><span class="fe fe-arrow-left mr-2"></span>BACK</button>
    </div>
    <div class="pull-left">
      <h1 class="page-title pl-4"> {{selected_student.fullname}} </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Educations</h3>
        </div>
        <ul class="list-group card-list-group">
          <li class="list-group-item py-5" ng-repeat="education in selected_student.educations"> 
          <h4>{{education.institution}}</h4>
          <h6>{{education.level}}</h6>
          <span>{{education.category}}</span><br>
          <span>{{education.from}} - {{education.to}} </span><br>
          <span>{{education.course? education.course : education.level}}</span><br>
          <span>{{education.country}}, {{education.city}}</span><br>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12">
      <button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#newEducationModal"><span class="fe fe-plus mr-2"></span>NEW EDUCATION</button>
    </div>
  </div>
</div>


<div class="modal fade" id="newEducationModal">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">New Education</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
</div>
<div class="modal-body">
<div class="form-group">
  <label class="form-label">School name</label>
  <input type="text" class="form-control" placeholder="Name" ng-model="newEducation.institution">
</div>
<div class="form-group">
<div class="row">
<div class="col-md-{{ newEducation.school_category != 'college' ? '6' : '12' }}">
  <label class="form-label">level</label>
  <select type="text" class="form-control" placeholder="First Name" ng-model="newEducation.level">
  	<option value="nursery">Nursery</option>
    <option value="primary">Primary</option>
    <option value="secondary">Secondary</option>
    <option value="collage">College</option>
  </select>
</div>
<div class="col-md-6" ng-show="newEducation.school_category != 'college'">
<label class="form-label">School Category</label>
<select type="text" class="form-control" placeholder="First Name" ng-model="newEducation.school_category">
	<option value="necta">necta</option>
    <option value="cambridge">cambridge</option>
</select>
  </div>
  </div>
  </div>
  <div class="form-group" ng-show="newEducation.school_category == 'college'">
  <label class="form-label">
  Course
  </label>
  <input type="text" class="form-control" placeholder="eg. Electrical and electronics engineering" ng-model="newEducation.course">
  </div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-6">
  <label class="form-label">
  From
  </label>
  <datepicker  button-prev="<i class='fe fe-arrow-left'></i>" button-next="<i class='fe fe-arrow-right'></i>" date-format="yyyy"  date-max-limit="{{ newEducation.to }}" date-set="{{max_date_string}}" >
  <input type="text" class="form-control" placeholder="Starting Year" ng-model="newEducation.from">
  </datepicker>
  </div>
  <div class="col-md-6">
  <label class="form-label">
  To
  </label>
  <datepicker  button-prev="<i class='fe fe-arrow-left'></i>" button-next="<i class='fe fe-arrow-right'></i>" date-format="yyyy" date-min-limit="{{ newEducation.from }}"   date-set="{{max_date_string}}" >
  <input type="text" class="form-control" placeholder="Ending Year" ng-model="newEducation.to">
  </datepicker>
  </div>
  </div>
  </div>
  <div class="form-group" >
  <label class="form-label">
  Country
  </label>
  <select class="form-control" ng-model="newEducation.country">
  	<option ng-repeat="country in countries"></option>
  </select>
  </div>
  <div class="form-group">
  <label class="form-label">
  City
  </label>
  <input type="text" class="form-control" placeholder="eg. Dar-es-salaam" ng-model="newEducation.city">
  </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
  Close
  </button>
  <button type="button" class="btn btn-primary" ng-click="addEducation()">
  Save changes
  </button>
  </div>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  
  
  
  <div class="modal fade" id="newStudentModal">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">
  New Student
  </h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true"></span>
  </button>
  </div>
  <div class="modal-body">
  <div class="form-group">
  <label class="form-label">
  Full name
  </label>
  <div class="row">
  <div class="col-md-4 mr-0">
  <input type="text" class="form-control" placeholder="First Name" ng-model="newStudent.first_name">
  </div>
  <div class="col-md-4 mr-0">
  <input type="text" class="form-control" placeholder="Middle Name" ng-model="newStudent.middle_name">
  </div>
  <div class="col-md-4 mr-0">
  <input type="text" class="form-control" placeholder="Last Name" ng-model="newStudent.last_name">
  </div>
  </div>
  </div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-4">
  <label class="form-label">
  Nationality
  </label>
  <select type="text" class="form-control" ng-model="newStudent.nationality">
  <option value="{{country.country_code}}" ng-repeat="country in countries">{{country.country_name}}</option>
</select>
</div>
<div class="col-md-4">
  <label class="form-label">Residence Country</label>
  <select type="text" class="form-control" ng-model="newStudent.residence_country	">
    <option value="{{country.country_code}}" ng-repeat="country in countries">{{country.country_name}}</option>
  </select>
</div>
<div class="col-md-4">
  <label class="form-label">Residence City</label>
  <input type="text" class="form-control" placeholder="Last Name" ng-model="newStudent.residence_city">
</div>
</div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label class="form-label">Gender</label>
      <select type="text" class="form-control" ng-model="newStudent.gender">
        <option value="male" >Male</option>
        <option value="female" >Female</option>
      </select>
    </div>
    <div class="col-md-8">
      <label class="form-label">Date of birth</label>
      <datepicker  button-prev="<i class='fe fe-arrow-left'></i>" button-next="<i class='fe fe-arrow-right'></i>" date-format="yyyy-MM-dd"  date-max-limit="{{ range_type == 'range' ? to : max_date_string }}" date-set="{{max_date_string}}" >
        <input type="text" class="form-control"  ng-model="newStudent.dob">
      </datepicker>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" ng-model="newStudent.ismaili">
        <label class="form-check-label" for="exampleCheck1">Ismaili</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" ng-model="newStudent.data">
        <label class="form-check-label" for="exampleCheck1">Data</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" ng-model="newStudent.english">
        <label class="form-check-label" for="exampleCheck1">Can the student speak english</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" ng-model="newStudent.computer">
        <label class="form-check-label" for="exampleCheck1">Does the student have a computer.</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-6 mr-0">
      <label class="form-label">Jamatkhana</label>
      <select class="form-control" ng-model="newStudent.jk">
        <optgroup label="Dar-es-salaam">
        <option value="upanga">Upanga</option>
        <option value="darkhana">Darkhana</option>
        <option value="karimabad">Karimabad</option>
        <option value="chang'ombe">Chang'ombe</option>
        <option value="kariakoo">Kariakoo</option>
        </optgroup>
        <optgroup label="Regions">
        <option value="{{region.name}}">{{region.name}}</option>
        </optgroup>
      </select>
    </div>
    <div class="col-md-6 mr-0">
      <label class="form-label">Income</label>
      <input type="number" min="0" class="form-control" placeholder="in shillings" ng-model="newStudent.income">
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-6 mr-0">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" placeholder="Email Adress" ng-model="newStudent.email">
    </div>
    <div class="col-md-6 mr-0">
      <label class="form-label">Phone</label>
      <input type="tel" class="form-control" placeholder="phone number" ng-model="newStudent.phone">
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row"> 
    <!--<div class="col-md-6">
            	<label class="form-label">Student ID</label>
              	<input type="number" class="form-control" placeholder="First Name" ng-model="newStudent.id">
            </div>-->
    <div class="col-md-12">
      <label class="form-label">Family ID</label>
      <input type="number" class="form-control" placeholder="First Name" ng-model="newStudent.family_id">
    </div>
  </div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" ng-click="addStudent()">Save changes</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->