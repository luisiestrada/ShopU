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

                            <label class="control-label">Title</label>
                            <input class="form-control" type="text" name="title" required autocomplete="off" value="text"/>


                            <label class="control-label">Price</label>
                            <input class="form-control" type="number" name="price" required autocomplete="off" value="10.00" step="0.01"/>


                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="Furniture">Furniture</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Books">Books</option>
                            </select>


                            <div class="shape-group">
                                <label>Description</label>
                                <input class="form-control" type="text" name="description" required autocomplete="off" value="text"/>
                            </div>
                            <div class="shape-group">
                                <label>Keywords</label>
                                <input class="form-control" type="text" name="keywords" required autocomplete="off" value="text"/>
                            </div>
                            <div class="shape-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="image"/>
                            </div><br><br>
                            <!-- submit button -->
                            <input class="form-control btn-primary" type="submit" name="submit_add_item" value="Sell Item" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
