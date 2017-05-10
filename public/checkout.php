<?php require_once "../resources/config.php"; ?>
<?php require_once "./cart.php"; ?>
<?php include TEMPLATE_FRONT . DS. "header.php"; ?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>

      <?php 
        //echo $_SESSION['product_1'];
      ?>
    
    <?php if(has_message()): ?>
      <div class="col-md-12">
          <p class="alert alert-danger"><?php display_message(); ?></p>
      </div>
    <?php endif; ?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="business" value="saint_yk-facilitator-1@163.com">
    <input type="hidden" name="currency_code" value="US" >
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Image</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
           <th></th>
          </tr>
        </thead>
        <tbody>
           <?php cart(); ?>
        </tbody>
    </table>
    <?php show_paypal(); ?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php 
  echo isset($_SESSION['item_quantity'])?$_SESSION['item_quantity']:$_SESSION['item_quantity']=0;
?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#36; <?php echo isset($_SESSION['item_total'])?$_SESSION['item_total']:'0.00'; ?></span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


<?php include TEMPLATE_FRONT .DS . "footer.php"; ?>