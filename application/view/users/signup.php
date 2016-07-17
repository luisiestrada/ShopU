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
                                    <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
                                         style="height:100px"/>
                                </a>
                            </div>
                            <div class="shape-group">
                                <h2>Create account</h2>
                            </div>
                            <div class="shape-group">
                                <label class="control-label">SFSU ID</label>
                                <input name="student_id" type="text" maxlength="50" class="form-control">
                            </div>
                            <div class="shape-group">
                                <label class="control-label">Username</label>
                                <input name="username" type="text" autocomplete="off" class="form-control">
                            </div>
                            <div class="shape-group">
                                <label class="control-label">SFSU Email</label>
                                <input name="email" type="text" autocomplete="off" class="form-control">
                            </div>
                            <div class="shape-group">
                                <label class="control-label">Password</label>
                                <input name="password" type="password" autocomplete="off" class="form-control" placeholder="at least 6 characters" length="40">
                            </div>
                            <div class="shape-group">
                                <label class="control-label">Confirm Password</label>
                                <input name="passwordagain" type="password" autocomplete="off" class="form-control" placeholder="at least 6 characters">
                            </div>
                            <div class="shape-group">
                                <label class="control-label">Profile picture</label>
                                <input name="image" type="file">
                            </div>
                            <h2></h2>
                            <div class="shape-group">
                                <button name="submit_add_user" type="submit" class="btn btn-info btn-block" value="Sign up">Create your account</button>
                            </div>
                            <p class="shape-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                            <hr>
                            <p></p>Already have an account? <a href="<?php echo URL; ?> users/signin">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

