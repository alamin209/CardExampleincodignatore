<div id="total_details">
 <?php
    $output = '';
    $output .= '
    <h3>Shopping Cart</h3><br />
    <div class="table-responsive">
        <div align="right">
            <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
        </div>
        <br />
        <table class="table table-bordered">
            <tr>
                <th >Name</th>
                <th >Quantity</th>
                <th >Price</th>
                <th >Total</th>
                <th>Action</th>
            </tr>

            ';
            $count = 0;
            foreach($this->cart->contents() as $items)
            {
            $count++;
            $output .= '
            <tr>
                <td>'.$items["name"].'</td>
                <td>'.$items["qty"].'</td>
                <td>'.$items["price"].'</td>
                <td>'.$items["subtotal"].'</td>
                <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
            </tr>
            ';
            }
            $output .= '
            <tr>
                <td colspan="4" align="right">Total</td>
                <td>'.$this->cart->total().'</td>
            </tr>
            <tr>
                <td><button type="button" name="total" class="btn btn-danger btn-xs total" id="'.$this->cart->total().'">Order</button></td>



            </tr>
        </table>

    </div>
    ';

    if($count == 0)
    {
    $output = '<h3 align="center">Cart is Empty</h3>';
    }
    return $output;
?>
</div>
