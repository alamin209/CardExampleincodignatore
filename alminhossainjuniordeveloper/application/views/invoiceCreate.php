<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
        <div class="span8">
<!--    		<form action="billing" method="post" class="form-horizontal" id="billingform" accept-charset="utf-8">-->




<!--    			<div class="control-group">-->
<!--    				<label for="country" class="control-label">-->
<!--						Select Product-->
<!--    				</label>-->
<!--    				<div class="controls">-->
<!--    					<select name="iteamsname" id="country">-->
<!--							<option value="">Select Items...</option>-->
<!--							--><?php //foreach ($itemsname as $itemsname) { ?>
<!--								<option value="--><?php //echo $itemsname->id?><!--">--><?php //echo $itemsname->name?><!--</option>-->
<!---->
<!---->
<!--						</select>-->
<!--    				</div>-->
    			</div>
				<ul class="products">
					<div class="control-group">-->
						<!--    				<label for="country" class="control-label">-->
						<!--						Select Product-->
						<!--    				</label>-->
						<!--    				<div class="controls">-->
						<!--    					<select name="iteamsname" id="country">-->
						<!--							<option value="">Select Items...</option>-->
						<!--							--><?php //foreach ($itemsname as $itemsname) { ?>
						<!--								<option value="--><?php //echo $itemsname->id?><!--">--><?php //echo $itemsname->name?><!--</option>-->
						<!---->
						<!---->
						<!--						</select>-->
						<!--    				</div>-->
					<?php foreach($products as $p): ?>
						<li>
							<h3><?php echo $p['name']; ?></h3>
							<small><?php echo $p['price']; ?></small>
							<?php echo form_open('InvoiceCreat/add_cart_item'); ?>
							<fieldset>
								<label>Quantity</label>
								<?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
								<?php echo form_hidden('product_id', $p['id']); ?>
								<?php echo form_submit('add', 'Add'); ?>
							</fieldset>
							<?php echo form_close(); ?>
						</li>
					<?php endforeach;?>
				</ul>



    	</div> <!-- .span8 -->
	</div>
</div>

<div id="wrap">

	<?php $this->view($content); ?>

	<div class="cart_list">
		<h3>Your shopping cart</h3>
		<div id="cart_content">
			<?php echo $this->view('cart/cart.php'); ?>
		</div>
	</div>
</div>



</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		/*place jQuery actions here*/
		var link = "<?php echo base_url() ?>InvoiceCreat/add_cart_item"; // Url to your application (including index.php/)

		$("ul.products form").submit(function() {
			// Get the product ID and the quantity
			var id = $(this).find('input[name=product_id]').val();
			var qty = $(this).find('input[name=quantity]').val();

			$.post(link + "InvoiceCreat/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
					function(data){
						$.post(link + "InvoiceCreat/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
								function(data){

									if(data == 'true'){

									}else{
										alert("Product does not exist");
									}
								});
					});

			return false; // Stop the browser of loading the page defined in the form "action" parameter.
		});

	});
