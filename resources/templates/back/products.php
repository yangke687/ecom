<?php 
  function display_products(){
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row=fetch_array($query)){
$prod = <<< DELIMETER
        <tr>
            <td>${row['product_id']}</td>
            <td>${row['product_title']}</td>
            <td>
              <img src="${row['product_image']}" alt="">
            </td>
            <td>Category</td>
            <td>${row['product_price']}</td>
            <td>${row['product_quantity']}</td>
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
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Image</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      <?php display_products(); ?>
    </tbody>
</table>

</div>
</div>
