<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ShopU</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    
</head>
<body>
    <!-- logo -->
    <div class="logo">
        <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
             style="height:100px"/>
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">home</a>
        <a href="<?php echo URL; ?>home/exampleone">subpage</a>
        <a href="<?php echo URL; ?>home/exampletwo">subpage 2</a>
    </div>
    
    <br><br>
    <div class="container-fluid" align="center">
        <form action="<?php echo URL; ?>search/form" method="POST">
            <div class="input-group col-md-10">
                <span class="input-group-btn">
                    <select name="category" id="category" class="btn btn-warning btn-lg">
                        <option value="All">All</option>
                        <option value="Books">Books</option>
                        <option value="Songs">Songs</option>
                    </select>
                </span>
                <input type="text" name="searchbar" class="form-control input-lg" placeholder="Search..." autocomplete="off"/>
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-lg" type="submit" name="submit_search">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    