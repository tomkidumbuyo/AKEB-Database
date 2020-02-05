<div class="container ">


<div class="row" >
  <div class="col-md-12">
    <div class="page-header">
      <h1 class="page-title"> Products </h1>
      <div class="page-options d-flex">
        <button class="btn btn-primary" data-toggle="modal" data-target="#newProductModal"><span class="fe fe-plus mr-1"></span>New Product type</button>
      </div>
    </div>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th>Name</th>

              <th class="text-right">Buying Price</th>
              <th class="text-right">Offer Price</th>

              <th class="text-center" width="30px"><i class="icon-settings"></i></th>
              <th class="text-center" width="30px"><i class="icon-settings"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="product in products">
              <td>{{product.name}}</td>
        <td><div class="text-right">{{product.price}}</div>
                <div class="small text-muted text-right">TShillings</div></td>
              
              <td><div class="text-right">{{product.offer_price}}</div>
                <div class="small text-muted text-right">TShillings</div></td>
                
                
                
                
                <td class="text-center"><div class="item-action dropdown"> <a  class="icon" ng-click="editProduct(product)"><i class="fe fe-edit-2"></i></a> </div></td>
              <td class="text-center"><div class="item-action dropdown"> <a  class="icon" ng-click="deleteProduct(product)"><i class="fe fe-x"></i></a> </div></td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
      <h4 class="modal-title">New product</h4>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Product name</label>
          <input type="text" name="field-name" class="form-control"  placeholder="name" ng-model="newProduct.name" >
        </div>
        <div class="row">
        	<div class="col-md-6">
            <div class="form-group">
          <label class="form-label">Normal Price (Tshs)</label>
          <input type="number" class="form-control" placeholder="00" ng-model="newProduct.price" min="{{newProduct.price}}">
        </div>
            </div>
        	<div class="col-md-6">
            <div class="form-group">
          <label class="form-label">Offer Price (Tshs)</label>
          <input type="number" class="form-control" placeholder="00" ng-model="newProduct.offer_price" >
        </div>
            </div>
        </div>
        
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="addProduct()">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->



