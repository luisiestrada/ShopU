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
    <link rel="shortcut icon" href="<?php echo URL; ?>img/shopu-mod.jpg" />
    <body>
        <div class='container'>
            <!-- logo -->
            <div class="logo" align="center">
                <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
                     class='img-responsive'/>
            </div>

            <!-- navigation bar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid" align='center'>

                    <!-- navbar header -->
                    <div class="navbar-header">

                        <!-- hamburger icon -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Website Name -->
                        <a class="navbar-brand" href="<?php echo URL; ?>">ShopU</a>

                    </div>

                    <!-- navbar body -->
                    <div class="collapse navbar-collapse" id="myNavbar">

                        <!-- navbar links to the left -->
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo URL; ?>home/signin"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo URL; ?>home/index">All Items</a></li>
                                    <li><a href="<?php echo URL; ?>home/sellitem">Sell Item</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo URL; ?>home/alluser">All Users</a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- navbar links to the right -->
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-inbox"></span> Inbox</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="glyphicon glyphicon-cog"></span> Settings<span class="caret"></span></a>
                                <ul class="dropdown-menu" align ="center">
                                    <li><a href="<?php echo URL; ?>home/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                    <li><a href="<?php echo URL; ?>home/signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- search bar -->
            <!-- leads to the form() method in the Search controller -->
            <form action="<?php echo URL; ?>search/form" method="GET" id='searchbar'>
                <div class="input-group input-group-lg">

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
    </body>
</html>