<?php 
  function display_products(){
    // join categories table
    $query = query("SELECT products.*,categories.cat_title as category_title FROM products JOIN categories ON products.product_category_id=categories.cat_id");
    confirm($query);

    while($row=fetch_array($query)){
$prod = <<< DELIMETER
        <tr>
            <td>${row['product_id']}</td>
            <td>${row['product_title']}</td>
            <td>
              <img src="../../resources/uploads/${row['product_image']}" alt="" height="150">
            </td>
            <td>${row['category_title']}</td>
            <td>${row['product_price']}</td>
            <td>${row['product_quantity']}</td>
            <td>
              <a class="btn btn-success" href="index.php?edit_product&id=${row['product_id']}">
                <span class="glyphicon glyphicon-edit"></span>
                Edit
              </a>
              <a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?product_id=${row['product_id']}">
                <span class="glyphicon glyphicon-trash"></span>
                Delete
              </a>
            </td>
        </tr>
DELIMETER;
      echo $prod;
    }
  }
?>


<div class="row">

<div class="col-md-12">

<h1 class="page-header">
   All Products

</h1>
            <?php
              if( has_message() ):
            ?>
            <p class="alert alert-success"><?php display_message(); ?></p>
            <?php endif; ?>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Image</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
           <th></th>
      </tr>
    </thead>
    <tbody>
      <?php display_products(); ?>
    </tbody>
</table>

</div>
</div>
