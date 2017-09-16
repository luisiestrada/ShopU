<div class="container2">

    <!-- logo -->
    <div class = "container-fluid">
        <div class="logo pull-left col-md-2">
            <a href="<?php echo URL; ?>home/index">
                <img src="<?php echo URL; ?>img/shopu-mod.png" alt="ShopU logo"/>
            </a>
        </div>
        <!-- navigation bar -->
        <nav class="navbar navbar-default col-md-10">

            <!-- navbar header -->
            <div class="navbar-header col-md-8 search-navbar">

                <!-- hamburger icon -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- search bar -->
                <!-- leads to the form() method in the Search controller -->
                <form class="search-navbar" action="<?php echo URL; ?>items/search" method="GET" id='searchbar'>
                    <div class="input-group input-group-lg">

                        <!-- category list -->
                        <span class="input-group-btn">
                            <select name="category" id="category" class="btn btn-warning btn-lg resizeselect">
                                <option value="All">All</option>
                                <?php foreach ($categories as $cat) { ?>
                                    <option value="<?php echo $cat->category; ?>"><?php echo $cat->category; ?>&emsp;&nbsp;</option>
                                <?php } ?>
                            </select>
                        </span>

                        <!-- search bar text input -->
                        <?php
                        if($search != null) { ?>
                            <input type="text" name="searchbar" class="form-control"
                               autocomplete="off" value="<?php echo $search ?>"/>
                        <?php } else { ?>
                            <input type="text" name="searchbar" class="form-control"
                               placeholder="Search..." autocomplete="off" value="<?php echo $search ?>"/>
                        <?php } ?>

                        <!-- submit button (magnifier icon) -->
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-lg" type="submit" name="submit_search">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>

                    </div>
                </form>
            </div>

            <!-- navbar body -->
            <div class="collapse navbar-collapse" id="myNavbar">

                <!-- navbar links to the right -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="divider-vertical"></li>
                    <li>
                        <?php if (isset($_SESSION["user_id"])) { ?>
                            <a href="<?php echo URL; ?>items/sellItem">
                                <span class="glyphicon glyphicon-lamp"></span> Sell Item</a>
                        <?php } else { ?>
                            <a href="#" data-toggle="tooltip" data-placement="auto" title="You must sign in to sell items!">
                                <span class="glyphicon glyphicon-lamp"></span> Sell Item</a>
                        <?php } ?>
                    </li>

                    <li class="divider-vertical"></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-cog"></span> Account<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if (!isset($_SESSION["user_id"])) { ?>
                                <li><a href="<?php echo URL; ?>users/signup">
                                    <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                                </li>
                                <li><a href="<?php echo URL; ?>users/signin">
                                    <span class="glyphicon glyphicon-log-in"></span> Sign In</a>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo URL; ?>users/signout">
                                    <span class="glyphicon glyphicon-log-out"></span> Sign Out</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <h4 align = "left">ShopU provides consumer-to-consumer sales services exclusively to SFSU students.</h4>
    </div>
</div>

<!--This function resizes the search bar <select> tag based on the <option> width selected. Reference:
http://stackoverflow.com/questions/20091481/auto-resizing-the-select-element-according-to-selected-options-width#answer-28310736-->
<script>
    (function ($, window) {
        var arrowWidth = 30;

        $.fn.resizeselect = function (settings) {
            return this.each(function () {

                $(this).change(function () {
                    var $this = $(this);

                    // create test element
                    var text = $this.find("option:selected").text();
                    var $test = $("<span>").html(text);

                    // add to body, get width, and get out
                    $test.appendTo('body');
                    var width = $test.width();
                    $test.remove();

                    // set select width
                    $this.width(width + arrowWidth);

                    // run on start
                }).change();
            });
        };
        // run by default
        $("select.resizeselect").resizeselect();

    })(jQuery, window);

    // apply tooltip to sell item button (and buy buttons if on the screen)
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
