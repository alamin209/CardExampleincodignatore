
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
            <li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url() ?>home/viewproduct" >Add Product</a></li>
            <li><a href="<?php echo base_url() ?>Report">Report by Week</a></li>
            <li><a href="<?php echo base_url()?>Report/monthly">Report by Month</a></li>

        </ul>
    </div>
</nav>

<div class="container">



