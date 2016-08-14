<!--order confirmation header and go back button-->
<div class="container-fluid">
    <div class="row">
        <div id = "backlink" class="container-fluid">
            <div class="col-md-2 text-center">
                <a href="javascript://" onclick="goBack();">Go Back</a>
            </div> 
        </div>
        <div class="row text-center">
            <h2>Order Details</h2>
        </div>
    </div>

    <!--Review Order-->
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading" style="color:white">
                    Review Order
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-3">
                            <?php
                            // display user-uploaded image if it exists
                            if (isset($item->image)) {
                                echo ("<img src='data:image/jpeg;base64," . base64_encode($item->image)
                                . "' alt='Item image' class='img-responsive' style='height:100px'");
                            } else {
                                echo ("<img src='//placehold.it/400/000000.jpg?text=No+Image' "
                                . "alt='Item Image' class='img-responsive'");
                            } ?>
                        <br>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="col-xs-12">
                                <?php if (isset($item->title)) echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></div>
                            <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                        </div>
                        <div class="col-sm-3 col-xs-3 text-right">
                            <h5><?php if (isset($item->price)) echo '$' . htmlspecialchars($item->price, ENT_QUOTES, 'UTF-8'); ?></h5>
                        </div>
                    </div>

                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <!--tax rate modified here-->
                        <?php $taxRate = 0.09; ?>
                        <!--tax rate modified here end -->

                        <div class="col-xs-12">
                            <strong>Subtotal</strong>
                            <div class="pull-right">
                                <?php if (isset($item->price)) echo '$'
                                    . htmlspecialchars($item->price, ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                        <div class="col-xs-12">
                            <small>Tax (9%)</small>
                            <div class="pull-right">
                                <?php if (isset($item->price)) echo '$'
                                    . htmlspecialchars(number_format($item->price * $taxRate, 2), ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                    </div>
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Order Total</strong>
                            <div class="pull-right">
                                <?php if (isset($item->price)) echo '$'
                                    . htmlspecialchars(number_format($item->price * (1 + $taxRate), 2), ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--Review Order End-->
    
    <form action="<?php echo URL . 'items/orderSuccess/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>" method="POST" class="form">
    
    <!-- User information-->
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading" style="color:white">Shipping Address</div>
                <div class="panel-body">
                    <br>
                    <div class="form-group">
                        <div class="col-md-12"><label for="country">Country:</label></div>
                        <div class="col-md-12">
                            <input type="text" id="country" class="form-control" name="country" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required/>
                        </div>
                        <div class="span1"></div>
                        <div class="col-md-6 col-xs-12">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><label for="address">Address:</label></div>
                        <div class="col-md-12">
                            <input type="text" id="address" name="address" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><label for="city">City:</label></div>
                        <div class="col-md-12">
                            <input type="text" id="city" name="city" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><label for="state">State:</label></div>
                        <div class="col-md-12">
                            <input type="text" id="state" name="state" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><label for="zip_code">Zip / Postal Code:</label></div>
                        <div class="col-md-12">
                            <input type="text" id="zip_code" name="zip_code" class="form-control" required/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--User Information End-->

    <!--Order button-->
    <div class ="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <span class="monospaced">
                <button type="button" onclick="goBack()" class="btn btn-lg btn-warning btn-full-width pull-left">
                    Cancel
                </button>
            </span>
            <span class="monospaced">
                <button name="confirm" type="submit" id="submit" class="btn btn-lg btn-warning btn-full-width pull-right">
                    Submit
                </button>
            </span>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--Order button End-->
    
    </form>
    
</div>
