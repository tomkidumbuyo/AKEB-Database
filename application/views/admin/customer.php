<div class="container pt-5">
<div class="row">
<div class="col-md-3"> <a  class="btn btn-block btn-primary mb-6"  data-toggle="modal" data-target="#new-customer"> <i class="fe fe-plus mr-2"></i>New customer </a>
  <div class="card">
    <table class="table card-table table-striped table-vcenter">
      <thead>
        <tr>
          <th >Customers</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat=" customer in customers " class="{{selected_customer == customer ? 'active' : ''}}" ng-click="select_customer(customer)">
          <td>{{customer.fullname}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-9">
<div class="row">
<div class="col-md-3 mb-5">
  <h1 class="page-title"> {{selected_customer.fullname}} </h1>
</div>
<div class="col-md-9 pt-3">
<ul class="nav justify-content-end">
<li class="nav-item"> <a class="nav-link {{page == 'sales' ? 'active' : '' }}" ng-click="select_page('sales')" >Sales</a> </li>
<li class="nav-item"> <a class="nav-link {{page == 'credit' ? 'active' : '' }}" ng-click="select_page('credit')">Credit</a> </li>
<li class="nav-item"> <a class="nav-link {{page == 'info' ? 'active' : '' }}" ng-click="select_page('info')">Info</a> </li>
</div>
</div>
<div class="row" ng-show="page == 'sales'">
  <div class="col-md-12">
    <div class="card">
      <table class="table card-table table-striped table-vcenter">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Price</th>
            <th>Paid</th>
            <th>Owed</th>
            <th>time</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="sale in sales">
            <td>{{sale.customer ? sale.customer.fullname : "Not listed"}}</td>
            <td>{{sale.total}}</td>
            <td>{{sale.paid}}</td>
            <td>{{sale.owed}}</td>
            <td class="text-nowrap">{{sale.time.diplay_time_short}}</td>
            <td class="w-1"><a href="#" class="icon"><i class="fe fe-arrow-right"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row" ng-show="page == 'credit'">
  <div class="col-md-12">
    <div class="card">
    <div class="card-body">
    </div>
    <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
    </div>
    </div>
    </div>
    
    <div class="row" ng-show="page == 'info'">
  <div class="col-md-12">
    <div class="card">
    <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-label">
              <labe class="form-label">
              First Name
              
              <input ng-model="selected_customer.first_name" id="first_name" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text">
            </labe></div>
          </div>
          <div class="col-md-6">
            <div class="form-label">
              <labe class="form-label">
              Last Name
              
              <input ng-model="selected_customer.last_name" id="last_name" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text">
            </labe></div>
          </div>
        </div>
        <input ng-model="newCustomer.identity" id="identity" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="hidden" value="gas" autocomplete="off">
        <div class="form-label">
          <labe class="form-label">Email</labe>
          <input ng-model="selected_customer.email" id="email" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text">
        </div>
        <div class="form-label">
          <labe class="form-label">Phone</labe>
          <input ng-model="selected_customer.phone" id="phone" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text">
        </div>
      </div>
      <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
      
    </div>
    </div>
    </div>
    
</div>
</div>
</div>
<div class="modal fade bs-example-modal-lg" id="new-customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-label">
              <labe class="form-label">
              First Name
              </label>
              <input ng-model='newCustomer.first_name' id='first_name' class='form-control' type ='text'>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-label">
              <labe class="form-label">
              Last Name
              </label>
              <input ng-model='newCustomer.last_name' id = 'last_name' class= 'form-control' type = 'text'/>
            </div>
          </div>
        </div>
        <input ng-model='newCustomer.identity' id='identity' class='form-control' type="hidden" value="gas" >
        <div class="form-label">
          <labe class="form-label">Email</labe>
          <input ng-model='newCustomer.email' id = 'email' class= 'form-control' type = 'text'>
        </div>
        <div class="form-label">
          <labe class="form-label">Phone</labe>
          <input ng-model='newCustomer.phone' id = 'phone' class = 'form-control' type = 'text'>
        </div>
      </div>
      <div class="modal-footer"> 
        <!--<?php echo form_submit('submit', lang('create_user_submit_btn'));?>-->
        <button type="button" ng-click="addCustomer()" class="btn btn-primary">CREATE CUSTOMER</button>
      </div>
    </div>
  </div>
</div>
