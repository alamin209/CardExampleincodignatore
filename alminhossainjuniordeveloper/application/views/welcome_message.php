<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
        <div class="span8">
    		<form action="<?php echo base_url()?>InsertItem/insertIitems" method="post" class="form-horizontal" id="billingform" accept-charset="utf-8">
    			<div class="control-group">
    				<label for="product" class="control-label">
    					Product Name
    				</label>
    				<div class="controls">
    					<input name="productname" type="text" value="" id="product">
    					<span class="help-inline">
    				</div>
    			</div>

    			<div class="control-group">
    				<label for="address" class="control-label">
    					Product Price
    				</label>
    				<div class="controls"><input name="productprice" placeholder="W 1eet" type="number" value="" id="address">
    				</div>
    			</div>

    			<div class="control-group">
    				<label for="zip" class="control-label">
    					produc Description
    				</label>
    				<div class="controls"><textarea rows="4" name="product_des" cols="50"></textarea>
    				</div>
    			</div>

    			<div class="control-group">


    			<div class="form-actions">
    				<button type="submit" class="btn btn-large btn-primary">Save</button>
    			</div>
    		</form>
    	</div> <!-- .span8 -->
	</div>
</div>
