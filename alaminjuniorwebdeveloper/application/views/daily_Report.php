<?php include('head.php') ?>

    < id="date">
        <!--                                    <form method="post" action="--><?php //echo base_url()?><!--Admin/Report/searchByDate" onsubmit="return checkDate()">-->

        <div class="col-md-12 col-sm-12" >
            <form action="<?php echo base_url()?>Report/search"  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-3 col-sm-3" >

                <div class="form-group" >

                <label for="date">Start Date</label>
                <input type="date" class="form-control docs-date" name="startdate" id="startdate" placeholder="Pick a date">
            </div >
                </div>

        <div class="col-md-3 col-sm-3" >
            <div class="form-group" >

                <label for="date">End Date</label>
                <input type="date" class="form-control docs-date" name="enddate" id="enddate" placeholder="Pick a date">
            </div>
        </div>
                <div class="col-md-3 col-sm-3" >
                    <div class="form-group" >

                        <label for="date">Searching for Daily </label>
                        <input type="submit" class="form-control docs-date" name="submit"  value="Search">
                    </div>
                </div>

    </form>
</div>
<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="" class="center"> SL </th>
        <th width="" class="center"> Date </th>
        <th width="" class="center"> Total Quantity </th>
        <th width="" class="center"> Amount</th>
        <th width="" class="center"> Action</th>
    </tr>
    </thead>
<?php 
$i=1;
foreach ($orders as $o)
 {  ?>
<tr>

    <td> <?php echo $i ?></td>
    <td><?php echo $o->date ?> </td>
    <td><?php echo $o->quantites ?></td>
    <td><?php echo $o->sums ?> </td>

    <td>
    <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $o->id ?>" onclick="selectid2(this)">
        Details
    </button>

    <button type="button" data-panel-id="<?php echo $o->id ?>" onclick="selectid3(this)" class="btn btn-danger btn-xs">
      Delate
    </button>
    </td>
</tr>
     
   <?php
     $i++;
 }  ?>

            </table>

            <?php include('footer.php') ?>
