<div class="reports-header">
  <div class="container">
    <div class="col-md-3 clearfix">
      <datepicker  button-prev="<i class='fe fe-arrow-left'></i>" button-next="<i class='fe fe-arrow-right'></i>" date-format="yyyy-MM-dd" date-max-limit="{{max_date_string}}" date-set="{{max_date_string}}" >
        <input ng-model="from" class="form-control" type="text" ng-change="refreshData()" />
      </datepicker>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
  </div>
</div>
<div class="reports-body pt-5" n>
<div class="container">
<div class="row">
<div class="col-lg-4" > <a data-toggle="modal" data-target="#newTripModal" class="btn btn-block btn-primary mb-6" ng-show="from_date_str == max_date_str"> <i class="fe fe-plus mr-2"></i>New Trip </a>
  <div class="card" ng-show="dailyReport.trips.length">
    <table class="table card-table table-striped table-vcenter">
      <thead>
        <tr>
          <th colspan="4">TRIPS</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="trip in dailyReport.trips" ng-click="select_trip(trip)" class="{{selected_trip.id == trip.id ? 'active' : ''}}">
          <td><span class="text-muted">{{trip.trip_id}}</span></td>
          <td>{{trip.driver.user.fullname}}</td>
          <td>{{trip.vehicle.number | uppercase}} ({{trip.vehicle.type}})</td>
          <td><span class="badge badge-{{trip.status_class}}">{{trip.status}}</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-lg-8"  ng-show="dailyReport.trips.length">
<div class="row" style="">
<div class="col-md-8">
  <div class="page-header mt-0 mb-4 float-left">
    <h1 class="page-title"> <span class="text-muted">{{selected_trip.trip_id}}</span> {{selected_trip.driver.user.fullname}} | {{selected_trip.vehicle.number | uppercase}} <span class="badge badge-{{selected_trip.status_class}}">{{selected_trip.status}}</span></h1>
  </div>
</div>
<div class="col-md-4">
<ul class="nav justify-content-end mt-2">
<li class="nav-item"> <a class="nav-link {{page == 'info' ? 'active' : ''}}" ng-click="select_page('info')">info</a> </li>
<li class="nav-item"> <a class="nav-link {{page == 'items' ? 'active' : ''}}" ng-click="select_page('items')">Items</a> </li>
<li class="nav-item"> <a class="nav-link {{page == 'sales' ? 'active' : ''}}" ng-click="select_page('sales')">Sales</a> </li>
</div>
</div>
<div class="mt-1" ng-show="page == 'info'">
  <div class="card">
    <table class="table card-table table-striped table-vcenter">
      <thead>
        <tr>
          <th>Number</th>
          <th>Status</th>
          <th>Trip</th>
          <th colspan="2">Drivers</th>
          <th>Sales</th>
          <th>Paid</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="text-muted">T 013 FDH</span></td>
          <td><span class="status-icon bg-secondary"></span> off route</td>
          <td><span class="text-muted">-</span></td>
          <td class="w-1">-</td>
          <td>-</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="mt-1" ng-show="page == 'items'">
  <div class="card">
    <table class="table card-table table-striped table-vcenter">
      <thead>
        <tr>
          <th>Tank kg</th>
          <th>Complete Price each</th>
          <th>Refil Price each</th>
          <th>Amount</th>
          <th>Total cost</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="tank in selected_trip.tanks">
          <td>{{tank.tank.kg}} <span class="text-muted">kg</span></td>
          <td>{{tank.tank.selling_price}}</td>
          <td>{{tank.tank.selling_refil_price}}</td>
          <td>{{tank.amount}}</td>
          <td>{{tank.amount * tank.tank.selling_refil_price}}</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="mt-1" ng-show="page == 'sales'">
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
        <tr ng-repeat="sale in selected_trip.sales">
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
</div>
</div>
</div>
<div class="modal fade" id="newTripModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create new trip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="p-3">
          <div class="row">
            <div class="col-md-6">
              <label class="form-label">Driver</label>
              <select class="form-control" placeholder="please describe the stock movement."  ng-model="newTrip.driver">
                <option ng-repeat="driver in drivers" value="{{driver.id}}">{{driver.user.fullname}}</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">vehicle</label>
              <select class="form-control" placeholder="please describe the stock movement."  ng-model="newTrip.vehicle">
                <option ng-repeat="vehicle in vehicles" value="{{vehicle.id}}">{{vehicle.number|uppercase}} ({{vehicle.type}})</option>
              </select>
            </div>
          </div>
        </div>
        <table class="table mb-0" style="border-top:1px solid #ccc">
          <thead>
            <tr>
              <th></th>
              <th>TANK TYPE</th>
              <th>PRICE EACH</th>
              <th width="100px">AMOUNT</th>
              <th>TOTAL PRICE</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="(key,item) in newTrip.items">
              <td>{{key+1}}</td>
              <td><select ng-model="item.tank_id" class="form-control" ng-change="changeItemTank(item)">
                  <option value="{{tank.id}}" ng-repeat="tank in tanks">{{tank.kg+'kg @ '+tank.price+' tshs'}}</option>
                </select></td>
              <td><input type="text" class="form-control text-right" ng-model="item.tank.price" disabled></td>
              <td><input type="number" class="form-control text-right" min="1" ng-model="item.amount" ng-change="refreshTotal()"></td>
              <td><input type="number" class="form-control text-right" ng-model="item.price" disabled></td>
              <td><button class="btn btn-default" ng-click="delete_item(item)" ng-show="newTrip.items.length > 1"><span class="fe fe-x"></span></button></td>
            </tr>
            <tr>
              <td></td>
              <td><a href="" class="btn btn-primary btn-block" ng-click="addTripItem()"> <span class="fe fe-plus mr-1"></span> ADD ITEM </a></td>
              <td></td>
              <td>TOTAL</td>
              <td><input type="number" class="form-control text-right" ng-model="total" disabled></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <div class="p-3" style="border-top: 1px solid #ddd">
          <div class="form-group mb-0">
            <label class="form-label">Describe the trip (optional)</label>
            <textarea class="form-control" placeholder="please describe the stock movement."  ng-model="newTrip.description" ></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="saveTrip()">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->