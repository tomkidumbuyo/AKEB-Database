<div class="container pt-5">
<div class="row">
<div class="col-md-3"> <a class="btn btn-block btn-primary mb-6" data-toggle="modal" data-target="#new-user"> <i class="fe fe-plus mr-2"></i>New user </a>
  <div class="card">
    <table class="table card-table table-striped table-vcenter">
      <thead>
        <tr>
          <th colspan="2">Drivers</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="user in users" ng-click="select_user(user)" class="{{selected_user.id == user.id?'active':''}}">
          <td class="w-1"><span class="avatar" style="background-image: url(./demo/faces/male/9.jpg)">{{user.initials}}</span></td>
          <td>{{user.fullname}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 mb-5">
  <h1 class="page-title"> {{selected_user.fullname}} </h1>
</div>

</div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
    <div class="card-body">
      	<div class="row">
        <div class="col-md-6">
          <div class="form-label">
            <labe class="form-label">
            First Name
            </label>
            <input ng-model='selected_user.first_name' id='first_name' class='form-control' type ='text'>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label">
            <labe class="form-label">
            Last Name
            </label>
            <input ng-model='selected_user.last_name' id = 'last_name' class= 'form-control' type = 'text'/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
       <div class="form-label">
        <labe class="form-label">Email</labe>
        <input ng-model='selected_user.email' id = 'email' class= 'form-control' type = 'text'>
      </div>
      </div>
        <div class="col-md-6">
      <div class="form-label">
        <labe class="form-label">Phone</labe>
        <input ng-model='selected_user.phone' id = 'phone' class = 'form-control' type = 'text'>
      </div>
      </div></div>
      <div class="form-label">
        <labe class="form-label">Type</labe>
        <select ng-model='selected_user.type' id = 'type' class = 'form-control' type = 'type'>
        	<option value="admin">Admin</option>
        	<option value="seller">Seller</option>
        	<option value="agent">Agent</option>
        </select>
      </div>
      
      <div class="form-group" ng-show="selected_user.type == 'agent' || selected_user.type == 'seller'">
          <label class="form-label">Region</label>
          <select ng-model="selected_user.region" class="form-control" ng-change="region_changed_2()">
          	<option value="{{region.id}}" ng-repeat="region in regions">{{region.name}}</option>
          </select>
        </div>
        
        <div class="form-group" ng-show="selected_user.type == 'seller'">
          <label class="form-label">Location</label>
          <select ng-model="selected_user.location" class="form-control">
          	<option value="{{location.id}}" ng-repeat="location in locations">{{location.name}}</option>
          </select>
        </div>
        
      <div class="form-label">
        <labe class="form-label">Password</labe>
        <input ng-model='selected_user.password' id = 'password' class = 'form-control' type = 'password'/>
      </div>
      <div class="form-label">
        <labe class="form-label">Confirm Password</labe>
        <input ng-model='selected_user.password_confirm' id = 'password_confirm' class = 'form-control' type = 'password'>
      </div>
      </div>
      <div class="card-footer text-right">
      <button type="submit" class="btn btn-danger" ng-click="deleteDriver()">Delete Drive</button>
                  <button type="submit" class="btn btn-primary" ng-click="updateDriver()">Update Driver</button>
                </div>
    </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
<div class="modal fade bs-example-modal-lg" id="new-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-label">
            <labe class="form-label">
            First Name
            </label>
            <input ng-model='newDriver.first_name' id='first_name' class='form-control' type ='text'>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label">
            <labe class="form-label">
            Last Name
            </label>
            <input ng-model='newDriver.last_name' id = 'last_name' class= 'form-control' type = 'text'/>
          </div>
        </div>
      </div>
      <input ng-model='newDriver.identity' id='identity' class='form-control' type="hidden" value="gas" >
      <div class="form-label">
        <labe class="form-label">Email</labe>
        <input ng-model='newDriver.email' id = 'email' class= 'form-control' type = 'text'>
      </div>
      <div class="form-label">
        <labe class="form-label">Type</labe>
        <select ng-model='newDriver.type' id = 'type' class = 'form-control' type = 'type'>
        	<option value="admin">Admin</option>
        	<option value="seller">Seller</option>
        	<option value="agent">Agent</option>
        </select>
      </div>
      
      <div class="form-group" ng-show="newDriver.type == 'agent' || newDriver.type == 'seller'" >
          <label class="form-label">Region</label>
          <select ng-model="newDriver.region" class="form-control" ng-change="region_changed()">
          	<option value="{{region.id}}" ng-repeat="region in regions">{{region.name}}</option>
          </select>
        </div>
        
        <div class="form-group" ng-show="newDriver.type == 'seller'" >
          <label class="form-label">Location</label>
          <select ng-model="newDriver.location" class="form-control">
          	<option value="{{location.id}}" ng-repeat="location in locations">{{location.name}}</option>
          </select>
        </div>
      <div class="form-label">
        <labe class="form-label">Phone</labe>
        <input ng-model='newDriver.phone' id = 'phone' class = 'form-control' type = 'text'>
      </div>
      <div class="form-label">
        <labe class="form-label">Password</labe>
        <input ng-model='newDriver.password' id = 'password' class = 'form-control' type = 'password'/>
      </div>
      <div class="form-label">
        <labe class="form-label">Confirm Password</labe>
        <input ng-model='newDriver.password_confirm' id = 'password_confirm' class = 'form-control' type = 'password'>
      </div>
      
    </div>
    <div class="modal-footer"> 
      <!--<?php echo form_submit('submit', lang('create_user_submit_btn'));?>-->
      <button type="button" ng-click="addDriver()" class="btn btn-primary">CREATE DRIVER</button>
    </div>
  </div>
</div>
</div>