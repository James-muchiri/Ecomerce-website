@extends('layouts.includes.index')

{{-- Page title --}}
@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 style="text-align:center;">Checkout</h3>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">

 <form action="/checkout_products" method="POST" enctype="multipart/form-data">
                          @csrf <!-- {{ csrf_field() }} -->
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Full Names:</label>
                            <input type="text" class="form-control" id="recipienname" name="names" value="{{auth()->guard('userauth')->user()->first_name}} {{auth()->guard('userauth')->user()->last_name}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">PhoneNumber:</label>
                            <input type="text" class="form-control" id="recipienname" name="phone_number" required>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mode of derivery:</label>
                            <select id="select" onchange="yesnoCheck(this);" class="form-select select form-control" name="mode" aria-label="Default select example" required>
                              <option value="delivery" >Delivery</option>
                              <option value="pick" selected>Pick at store</option>



                      </select>
                          </div>
                          <div class="form-group"  id="ifYes" style="display: none;">
                            <label for="recipient-name" class="col-form-label">Location:</label>
                           <input type="text" class="form-control" id="recipient-name" name="location" >
                          </div>



                      <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Request Order</button>
                      </form>
                      </div>
                    </div>
                      <div class="col-lg-6">
                        <div class="modal-body">

                            <div class="table-responsive">
                                <table class="table table-striped" id="modal_table">
                                    <thead>
                                        <tr>
                                            <td class="t_head"></td>
                                            <td class="t_head">Product</td>
                                            <td class="t_head">Quantity</td>
                                            <td class="t_head">Price</td>
                                            <td class="t_head">Sub-Total</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <hr class=cart_divider>

                            <div id = "product_total" style="padding-bottom: 10px;" class="col-sm-6 col-md-6 col-md-offset3 col-sn-offset-3 product_total">
                               <strong id="total_price"> </strong>
                             </div>
                          </div>

                          <div class="modal-footer row">

                            <a href="/"  type="button" class="btn btn-danger">Modify Cart</a>
                          </div>

                      </div>

</div></div>
    	
<script>

function yesnoCheck(that) {
    if (that.value == "delivery") {
  alert("Please enter your location");
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
@stop