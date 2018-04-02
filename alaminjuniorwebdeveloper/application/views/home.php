<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventroy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Inventroy Manegement System</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url() ?>home/viewproduct" >Add Product</a></li>
            <li><a href="<?php echo base_url() ?>Report">Report by Week</a></li>
            <li><a href="<?php echo base_url()?>Report/monthly">Report by Month</a></li>

        </ul>
    </div>
</nav>

<div class="container">
    <?php if ($this->session->flashdata('errorMessage')!=null){?>
        <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
    <?php }
    elseif($this->session->flashdata('successMessage')!=null){?>
        <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
    <?php }?>
    <div  class="col-lg-6 col-md-6" >
        <div class="table-responsive">
<?php foreach ($product as $p) { ?>

    <div class="col-md-4">
  <h4><?php echo $p->product_name ?></h4>
        <h3>$<?php echo $p->product_price?></h3>
        <h3 class="text-danger"><?php echo $p->product_description?></h3>
        <input type="number" name="quntityt"  class="quantity" id="<?php echo $p->product_id ?>" >
<button  type="button" name="add_cart" class="btn btn-success add_cart"  data-productname="<?php echo $p->product_name  ?>"
data-productpriec="<?php echo $p->product_price?>"  data-productid="<?php echo $p->product_id ?>"
>Add to cart </button>

    </div>
            <?php } ?>
        </div>
    </div>
    <div  class="col-lg-6 col-md-6" >
        <div id="cart_detaild">
        <h3 align="center"> Cart is empty</h3>
        </div>
    </div>


</div>
<div  class="col-lg-6 col-md-6" >
    <div id="total_details">

    </div>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
<script>
    $(document).ready(function () {

$('.add_cart').click(function () {
    var product_id=$(this).data('productid');
    var product_price=$(this).data('productpriec');
    var product_name=$(this).data('productname');
    // change if it take value from button or add to cart submit button
   var quantity   =$('#' + product_id ).val();
   if(quantity!='' && quantity>0)

   {

       $.ajax({
         method:"POST",
         url:"<?php  echo base_url()?>Home/addcart",
           data:{product_id:product_id, product_price:product_price,product_name:product_name,quantity:quantity},
           success:function(data) {

            alert("Product Add Succesfull");
            $('#cart_detaild').html(data);
               $('#' + product_id ).val(''); ///Cnfusing but


           }
       });

   }
   else
   {
       alert("quantity Can Not Empty");
   }
});
        

    });

    $('#cart_detaild').load("<?php echo base_url() ?>Home/viewCartDetails")
    $(document).on('click','.remove_inventory',function () {

  var id=$(this).attr('id');
        if (confirm("Want to remove it from cart"))
        {
            $.ajax
            ( {
              url:"<?php echo base_url() ?>Home/remove",
                method:"POST",
                data:{id:id},
                success:function (data) {

                  $('#cart_detaild').html(data);
                }

            });

        }
    });
    $(document).on('click','#clear_cart',function () {

        if (confirm("Want to remove  cart"))
        {
            $.ajax
            ( {
                url:"<?php echo base_url() ?>Home/clearalldata",
                success:function (data) {

                    $('#cart_detaild').html(data);
                }

            });

        }
    });

    $(document).on('click','.total',function () {


            $.ajax
            ( {
                url:"<?php echo base_url() ?>Home/total",
                success:function (data) {

                    $('#total_details').html(data);
                }

            });


    });


</script>