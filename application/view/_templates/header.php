<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ShopU</title>
    <meta name="description" content="SFSU 648-848 project">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- MINI CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
    
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <!-- DataTables CSS + JS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    
</head>
<body>
    
    <!-- logo -->
    <div class="logo">
        <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
             style="height:100px"/>
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">Home</a>
        <a href="<?php echo URL; ?>items/index">All Items</a>
        <a href="<?php echo URL; ?>items/sellitem">Sell Item</a>
        <a href="<?php echo URL; ?>users/index">All Users</a>
        <a href="<?php echo URL; ?>users/signup">Sign Up</a>
    </div><br><br>
    
    <div class="container-fluid" align="center">
        
        <!-- search bar -->
        <!-- leads to the form() method in the Search controller -->
        <form action="<?php echo URL; ?>search/form" method="GET">
            <div class="input-group col-lg-10">
                
                <!-- category list -->
                <span class="input-group-btn">
                    <select name="category" id="category" class="btn btn-warning btn-lg">
                        <option value="All">All</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Books">Books</option>
                    </select>
                </span>
                
                <!-- search bar text input -->
                <input type="text" name="searchbar" class="form-control input-lg" placeholder="Search..." autocomplete="off"/>
                
                <!-- submit button (magnifier icon) -->
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-lg" type="submit" name="submit_search">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
                
            </div>
        </form>
        
    </div>
    