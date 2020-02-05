<div class="phone-div" >
  <div class="driver-body">
    <div class="container">
      <div class="col-lg-12 p-0 main-column">
        <div class="card main-card">
          <div class="card-header">
            <h3 class="card-title">My Leads</h3>
          </div>
          <div id="chart-development-activity"  class="c3" style="overflow-x: auto">
            <table class="table card-table table-striped table-vcenter">
              <thead>
                <tr>
                  <th width="20px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Product</th>
                  <th>Region</th>
                  <th>District</th>
                  <th>Ward</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="(key,subdealer) in subdealers">
                <td>{{key+1}}</td>
                  <td>{{subdealer.name}}</td>
                  <td>{{subdealer.email}}</td>
                  <td>{{subdealer.phone}}</td>
                  <td>{{subdealer.region.name}}</td>
                  <td>{{subdealer.district}}</td>
                  <td>{{subdealer.ward}}</td>
                </tr>
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="new-sell">
    <div class="container">
      <button class="btn btn-primary new-sell btn-block" data-toggle="modal" data-target="#newVehicleModal" ><span class="icon-plus"></span>NEW SUBDEALER</button>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="newLeadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
      <h4 class="modal-title">New Lead</h4>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <div class="modal-body">
      
      <div class="row">
        	<div class="col-md-6">
            <div class="form-group">
          <label class="form-label">first name</label>
          <input type="text" class="form-control" placeholder="john" ng-model="newLead.first_name" min="{{newLead.price}}">
        </div>
            </div>
        	<div class="col-md-6">
            <div class="form-group">
          <label class="form-label">last Name</label>
          <input type="text" class="form-control" placeholder="doe" ng-model="newLead.last_name" >
        </div>
            </div>
        </div>
        
        <div class="form-group">
          <label class="form-label">Product chosen</label>
          <select name="" id="" class="form-control" ng-model="newLead.product">
          	<option value="{{product.id}}" ng-repeat="product in products">{{product.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="form-label">Phone number</label>
          <input type="text" name="field-name" class="form-control"  placeholder="255 ### ###" ng-model="newLead.number" >
        </div>
        
        <div class="form-group">
          <label class="form-label">Region</label>
          <select ng-model="newLead.region" class="form-control" ng-change="region_changed()">
          	<option value="{{region.id}}" ng-repeat="region in regions">{{region.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="form-label">Location</label>
          <select ng-model="newLead.location" class="form-control">
          	<option value="{{location.id}}" ng-repeat="location in locations">{{location.name}}</option>
          </select>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="addLead()">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
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

