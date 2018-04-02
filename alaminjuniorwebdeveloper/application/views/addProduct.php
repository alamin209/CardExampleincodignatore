<?php include('head.php') ?>
<div class="container">
    <h2>Product Entry</h2>
    <form class="form-horizontal" action="<?php echo base_url()?>home/addproducts" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter Product Name" name="productname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Product Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"   placeholder="Enter  Product Product" name="productprice">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Product description</label>
            <div class="col-sm-10">
<!--                <input type= class="form-control" id="pwd" placeholder="Enter password" name="pwd">-->
                <textarea class="form-control" id="details" name="details" placeholder="Give description">  </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>