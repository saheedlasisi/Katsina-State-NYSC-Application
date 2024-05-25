<!-- Modal -->
<div id="cartModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4><i class="fas fa-shopping-cart" style="color: #fff;"></i> CART</h4>

        <button type="button" id="cartup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


          <div class="card search-filter">
                <div class="card-body">
                  <div class="clini-infos mt-0">
                    <h2 id="cart_product_name"> </h2>
                    <h2 id="cart_current_price"> </h2> <b class="text-lg strike" id="cart_old_price" style="color: lightgray;"> </b><span class="text-lg text-success"> <b id="cart_discount"></b></span>
                  </div>
                  <span class="badge badge-primary" id="cart_product_status"> In Stock</span>
                  <div class="custom-increment pt-4">
                    <input type="hidden" id="cart_product_price">
                                      <div class="input-group1">
                                        <span class="input-group-btn float-left">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="" id="cart_minus">
                                              <span><i class="fas fa-minus"></i></span>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class=" input-number" value="1">
                                        <span class="input-group-btn float-right">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" id="cart_plus"> 
                                                <span><i class="fas fa-plus"></i></span>
                                            </button>
                                        </span>
                                    </div>
                              </div>
                 
                  <div class="card flex-fill mt-4 mb-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><span>Qty</span> <span class="float-right" id="cart_qty"> </span></li>
                     <li class="list-group-item"><span>Unit Price</span> <span class="float-right" id="cart_unit_price"> </span></li>
                     <li class="list-group-item"><span>Total Price</span> <span class="float-right" id="cart_total"></span></li>
                    </ul>
                  </div>
                </div>
              </div>



 <input type="hidden" id="cart_product_price">
  <input type="hidden" id="cart_product_id">
       <div class="form-group">
        <input type="hidden" name="product_shop_id" id="product_shop_id">
        <label>Destination Address<span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="cart_product_destination" id="cart_product_destination" placeholder="E,g: Katsina, new stadium." required >
      
        </div>
        

         <div class="form-group">
        <label>Period [E.g From Today {{date('d-M-Y')}} To Whatever date you chooses] <span class="text-danger">*</span></label>
        <input type="date" class="form-control floating" name="cart_product_period" id="cart_product_period" required >
      
        </div>

   <button class="btn btn-success btn-block btn-lg" id="place_order_btn">Place Order</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="cartdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


    </div>
