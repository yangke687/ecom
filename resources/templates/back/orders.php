    <div class="col-md-12">
        <div class="row">
            <h1 class="page-header">
               All Orders
            </h1>

            <?php
              if( has_message() ):
            ?>
            <p class="alert alert-success"><?php display_message(); ?></p>
            <?php endif; ?>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>

                  <tr>
                       <th>id</th>
                       <th>amount</th>
                       <th>transaction</th>
                       <th>currency</th>
                       <th>status</th>
                       <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php display_orders(); ?>
                </tbody>
            </table>
        </div>    
    </div>

<?php 
  function display_orders(){
    $query = query("SELECT * FROM orders");
    confirm($query);

    while($row=fetch_array($query)){
$order = <<<DELIMETER
<tr>
  <td>${row['order_id']}</td>
  <td>${row['order_amount']}</td>
  <td>${row['order_transaction']}</td>
  <td>${row['order_currency']}</td>
  <td>${row['order_status']}</td>
  <td>
    <a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?order_id=${row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a>
  </td>
</tr>
DELIMETER;
      echo $order;
    }
  }
?>
