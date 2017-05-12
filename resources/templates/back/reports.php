
<h1 class="page-header">
   All Reports

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
           <th>Product Id</th>
           <th>Order Id</th>
           <th>Price</th>
           <th>Product title</th>
           <th>Product quantity</th>
           <th></th>
      </tr>
    </thead>
    <tbody>

      
  <?php display_reports(); ?>


  </tbody>
</table>



