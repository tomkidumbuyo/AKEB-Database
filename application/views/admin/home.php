<div class="container">
	<div class="page-header">
              <h1 class="page-title">
                Home
              </h1>
            </div>
	<div class="row">
	<div class="col-lg-3 mb-4">
                <a data-toggle="modal" data-target="#newTripModal" class="btn btn-block btn-primary mb-6">
                  <i class="fe fe-plus mr-2"></i>New Trip
                </a>
                <!-- Getting started -->
                <div class="list-group list-group-transparent mb-0">
					
					<a  class="list-group-item list-group-item-action {{page == 'summary' ? 'active' : ''}}" ng-click="select_page('summary')"><span class="icon mr-3"><i class="fe fe-clipboard"></i></span>Todays Summary</a>
					
                  <a  class="list-group-item list-group-item-action {{page == 'trips' ? 'active' : ''}}" ng-click="select_page('trips')"><span class="icon mr-3"><i class="fe fe-navigation"></i></span>Todays Trips</a>
               
					
                  <a  class="list-group-item list-group-item-action {{page == 'sales' ? 'active' : ''}}" ng-click="select_page('sales')"><span class="icon mr-3"><i class="fe fe-dollar-sign"></i></span>Sales</a>
					
                  <a  class="list-group-item list-group-item-action {{page == 'status' ? 'active' : ''}}" ng-click="select_page('status')"><span class="icon mr-3"><i class="fe fe-truck"></i></span>Vehicles status</a>
					
					<a  class="list-group-item list-group-item-action {{page == 'driver' ? 'active' : ''}}" ng-click="select_page('driver')"><span class="icon mr-3"><i class="fe fe-user"></i></span>Drivers status</a>
					
                  
                </div>
         
              </div>
		<div class="col-lg-9" ng-show="page == 'summary'">
			<div class="row row-cards">
				<div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      
						{{trip_trend.percentage}}%
                      <i class="fe fe-chevron-{{trip_trend.up ? 'up' : 'down' }}"></i>
                    </div>
                    <div class="h1 m-0">{{dailyReport.trips.length}}</div>
                    <div class="text-muted mb-4">Trips</div>
                  </div>
                </div>
              </div>
				<div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      8%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">43,000</div>
                    <div class="text-muted mb-4">Sales</div>
                  </div>
                </div>
              </div>
				<div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      6%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">45,000</div>
                    <div class="text-muted mb-4">Paid</div>
                  </div>
                </div>
              </div>
				<div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      6%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">34,000</div>
                    <div class="text-muted mb-4">Added Credit</div>
                  </div>
                </div>
              </div>
			</div>
		</div>
		<div class="col-lg-9" ng-show="page == 'trips'">
                <div class="card">
                  
                  
                    <table class="table card-table table-striped table-vcenter">
                      <thead>
                        <tr>
							<th width="30px">trip id</th>
                          <th colspan="2">Drivers</th>
                         <th>Vehicle</th>
                         <th>Status</th>
                         <th>Started</th>
                         <th>Ended</th>
                         
							<th>Sales</th>
							<th>Paid</th>
                            <th></th>
							<th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="trip in dailyReport.trips">
							<td><span class="text-muted">{{trip.trip_id}}</span></td>
                          	<td class="w-1"><span class="avatar" style="background-image: url()">{{trip.driver.user.initials}}</span></td>
                          	<td>{{trip.driver.user.fullname}}</td>
                          	<td>{{trip.vehicle.number | uppercase}} ({{trip.vehicle.type}})</td>
                          	<td><span class="badge badge-{{trip.status_class}}">{{trip.status}}</span></td>
							<td>{{trip.from.display_time_short}}</td>
                            <td>{{trip.to ? trip.to.display_time_short : '-'}}</td>
							<td></td>
                            <td></td>
							<td><a  class="btn btn-secondary btn-sm" ng-show="trip.status == 'started'">Finish</a></td>
                            <td class="text-center"><div class="item-action dropdown"> <a  class="icon" ng-click="deleteTrip(trip)"><i class="fe fe-x"></i></a> </div></td>
                        </tr>
                  
                      </tbody>
                    </table>
                  </div>
           
		</div>
		<div class="col-lg-9" ng-show="page == 'sales'">
			sales
		</div>
		<div class="col-lg-9" ng-show="page == 'status'">
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
							<td><span class="status-icon bg-secondary"></span> off route</td>\
							<td><span class="text-muted">-</span></td>
                          <td class="w-1">-</td>
                          <td>-</td>
                          <td></td>
							<td></td>
							<td></td>
                        </tr>
                        <tr>
							<td><span class="text-muted">T 024 FTD</span></td>
							<td><span class="status-icon bg-success"></span> on route</td>
							<td><span class="text-muted">0453</span></td>
                          <td><span class="avatar">BM</span></td>
                          <td>Russell Gibson</td>
                          <td></td>
							<td></td>
							<td></td>
                        </tr>
                        <tr>
							<td><span class="text-muted">T 034 ERW</span></td>
							<td><span class="status-icon bg-secondary"></span> off route</td>
							<td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td></td>
							<td></td>
							<td></td>
                        </tr>
                        <tr>
							<td><span class="text-muted">T 046 RTY</span></td>
							<td><span class="status-icon bg-success"></span> on route</td>
							<td><span class="text-muted">3453</span></td>
                          <td><span class="avatar" style="background-image: url(./demo/faces/male/4.jpg)"></span></td>
                          <td>Bobby Knight</td>
                          <td></td>
							<td></td>
							<td></td>
                        </tr>
               
                      </tbody>
                    </table>
                  </div>
		</div>
		<div class="col-lg-9" ng-show="page == 'driver'">
			driver
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
       			<td><select ng-model="item.tank_id" class="form-control" ng-change="changeItemTank(item)"><option value="{{tank.id}}" ng-repeat="tank in tanks">{{tank.kg+'kg @ '+tank.price+' tshs'}}</option></select></td>
       			
                <td><input type="text" class="form-control text-right" ng-model="item.tank.price" disabled></td>
				<td><input type="number" class="form-control text-right" min="1" ng-model="item.amount" ng-change="refreshTotal()"></td>
                <td><input type="number" class="form-control text-right" ng-model="item.price" disabled></td>
                <td><button class="btn btn-default" ng-click="delete_item(item)" ng-show="newTrip.items.length > 1"><span class="fe fe-x"></span></button></td>
       		</tr>
			<tr>
				<td></td>
				<td>
					<a href="" class="btn btn-primary btn-block" ng-click="addTripItem()"> <span class="fe fe-plus mr-1"></span> ADD ITEM </a>
				</td>
				<td></td>
				<td>TOTAL</td>
				<td>
				<input type="number" class="form-control text-right" ng-model="total" disabled></td>
				<td></td>
			</tr>
       	</tbody>
       </table>
		  <div class="p-3" style="border-top: 1px solid #ddd">
			  
				  
		<div class="form-group mb-0">
          <label class="form-label">Describe the trip (optional)</label>
			<textarea class="form-control" placeholder="please describe the stock movement."  ng-model="newTrip.description" ></textarea>
        </div></div>
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