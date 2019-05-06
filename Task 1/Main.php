<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>View Products</title>
    </head>
    <meta http-equiv="Content-Type" content="text/html charset=iso-8859-1" />
    <style>
        table { border-collapse: collapse; }
        .num { text-align: right }
        #cart { float: right; text-align: center; }
        td, th, div { border: 2px solid black; padding: 5px }
        .button {
            display: block; padding: 2px 5px; background-color: #0000FF;
            color: white; text-decoration: none;
            border-style: solid; border-width: 4px;
            border-bottom-color: #000099; border-right-color: #000099;
            border-top-color: #0066FF; border-left_color: #0066FF;
        }
    </style>
    <body>
        <div id="cart">Items in your cart :<?= $total_num ?>
        <br />Total value of cart: <?= $total_value ?>
        <br /><a href="cart.php">View your cart</a>
        </div>
        <p>Please choose what products you want below:</p>
    </body>
    <?php
        //Opens database connection and starts session
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'task1') or die('DB Failure: '.mysql_error());        
        $sid = session_id();

        if (isset($_GET['add']))
        {
            @$_SESSION['cart'][$_GET['add']]++;
        }
    ?>
</html>