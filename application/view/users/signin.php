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
    
    <div class="param">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="POST" action="#" role="form">
                        <div class="logo" align ="center">
                            <a href="<?php echo URL; ?> home/index">
                                <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"/>
                            </a>
                        </div>
                        <div class="shape-group">
                            <h2>Sign in</h2>
                        </div>
                        <div class="shape-group">
                            <strong>SFSU ID or Username</strong>
                             <input name="idusername" type="email" maxlength="50" class="form-control">
                        </div>
                        <div class="shape-group">
                            <strong>Password</strong>
                            <input name="password" type="password" maxlength="25" class="form-control">
                        </div>
                        <div class="shape-group" style="padding-top: 12px;">
                            <button name="signup" type="submit" class="btn btn-success btn-block">Sign in</button>
                        </div>
                        <div class="shape-group div">
                            <hr class="pos-left"><small>New to site?</small><hr class="pos-right">
                        </div>
                        <p class="shape-group"><a href="<?php echo URL; ?> home/register" class="btn btn-info btn-block">Create an account</a></p>
                        <p class="shape-group">By signing in you are agreeing to our 
                            <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
