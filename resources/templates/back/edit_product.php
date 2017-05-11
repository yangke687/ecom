<?php 
  update_product(); 
  
  // fetch product query
  if( isset($_GET['id']) ){
    $query = query("SELECT * FROM  products WHERE product_id = ".escape_string($_GET['id']));
    confirm($query);

    while ($row=fetch_array($query)) {
      $prod = $row;
    }
  }
?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $prod['product_title']; ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php 
        echo $prod['product_description'];
      ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $prod['product_price']; ?>">
      </div>
    </div>

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
        <select name="product_category_id" id="" class="form-control">
          <option value="">Select Category</option>
           <?php show_categories($prod['product_category_id']); ?>
        </select>
    </div>

    <div class="form-group">
      <label for="product-quantity">Product Quantity</label>
      <input type="number" name="product_quantity" class="form-control" value="<?php echo $prod['product_quantity']; ?>">
    </div>

    <!-- Product Tags -->

    <div class="form-group">
          <label for="product-title">Product Short Description</label>
          <hr>
        <input type="text" name="product_short_desc" class="form-control" value="<?php echo $prod['short_desc']; ?>">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <img class="img-thumbnail" src="../../resources/<?php echo display_image($prod['product_image']); ?>" alt="">
        <input type="file" name="file">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>

</div>