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
    
</head>
<body>
    <!-- logo -->
    <div class="logo">
        <img src="<?php echo URL; ?>img/shopu-logo.png" alt="ShopU logo"
             style="height:100px;"/>
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">home</a>
        <a href="<?php echo URL; ?>home/exampleone">subpage</a>
        <a href="<?php echo URL; ?>home/exampletwo">subpage 2</a>
    </div>
                    
    <div class="container">
        <form action="<?php echo URL; ?>search/form" method="POST">
            Search:<br>
            <input type="text" name="searchbar">
            <br><br>
            <input type="submit" name="submit_search" value="Submit">
        </form>
    </div>
    