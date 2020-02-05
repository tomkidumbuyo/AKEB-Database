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
                  <!--<th width="20px"></th>-->
                  <th>Customer</th>
                  <th>Location</th>
                  <th>Product</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="(key,lead) in leads">
                <!--<td>{{key+1}}</td>-->
                  <td>{{lead.fullname}}</td>
                  <td>{{lead.location.name}}</td>
                  <td>{{lead.product.name}}</td>
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
    <div class="row">
    <div class="col-md-6 col-sm-6 col-6"><button class="btn btn-primary new-sell btn-block" data-toggle="modal" data-target="#checkLeadModal" ><span class="icon-plus"></span>SUBMIT LEAD</button></div>
    <div class="col-md-6 col-sm-6 col-6"><button class="btn btn-primary new-sell btn-block" data-toggle="modal" data-target="#promoCodeModal" ><span class="icon-plus"></span>PROMO CODE</button></div></div>
      
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="newLeadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
     
      <div class="modal-body">
      
     <h3>{{message}}</h3>
        
        
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="checkLeadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
     
      <div class="modal-body">
<div class="input-group input-group-lg">
      <input type="text" class="form-control" placeholder="Enter lead code" ng-model="id">
      
    </div><!-- /input-group -->
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="check_lead()">Submit Lead</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="newpromoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
     
      <div class="modal-body">
      
     <h3>{{message}}</h3>
        
        
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="promoCodeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
     
      <div class="modal-body">
<div class="input-group input-group-lg">
      <input type="text" class="form-control" placeholder="Enter promo code" ng-model="code">
      
    </div><!-- /input-group -->
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="promo_code()">Submit code</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</div>