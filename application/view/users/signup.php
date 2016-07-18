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
                    
                    <div class="logo" align ="center">
                        <a href="<?php echo URL; ?>home/index">
                            <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
                                 style="height:100px"/>
                        </a>
                    </div>
                    
                    <!-- form -->
                    <form action="<?php echo URL; ?>users/adduser" method="POST" enctype="multipart/form-data">
                        <div class="shape-group text-center">
                            <h2>Sign Up</h2>
                        </div>
                        
                        <!-- input fields -->
                        <div class="shape-group">
                            <label class="control-label">SFSU ID</label>
                            <input name="student_id" type="text" class="form-control" required>
                        </div>
                        <div class="shape-group">
                            <label class="control-label">Username</label>
                            <input name="username" type="text" autocomplete="off" class="form-control" required>
                        </div>
                        <div class="shape-group">
                            <label class="control-label">SFSU Email</label>
                            <input name="email" type="email" autocomplete="off" class="form-control" required>
                        </div>
                        <div class="shape-group">
                            <label class="control-label">Password</label>
                            <input name="password" type="password" autocomplete="off"
                                   class="form-control" placeholder="at least 6 characters" required>
                        </div>
                        <div class="shape-group">
                            <label class="control-label">Profile Picture</label>
                            <input name="image" type="file">
                        </div><br>
                        
                        <!-- sign up -->
                        <div class="shape-group">
                            <button name="submit_add_user" type="submit" class="btn btn-info btn-block">
                                Create your account</button>
                        </div><br>
                        <p class="shape-group text-center">By creating an account, you agree to our
                            <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.
                        </p>
                        <hr>
                        <p class="text-center">Already have an account?
                            <a href="<?php echo URL; ?>users/signin">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

