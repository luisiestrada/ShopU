<div class="container-fluid bg text-center">

    <div id="homepage-text">
        <?php
        if (!isset($_SESSION['username'])) {
            echo("<h1>Welcome to ShopU!</h1>");
        } else {
            echo("<h1>Welcome, " . $_SESSION['username'] . "!</h1>");
        } ?>
    </div>

    <!-- Button group categories for homepage -->
    <form id="category" action="<?php echo URL; ?>items/buttonCategories" method="GET">
        <?php foreach ($categories as $cat) { ?>
            <button title="<?php echo $cat->category; ?>" name="buttons" id="<?php echo $cat->category; ?>"
                    value="<?php echo $cat->category; ?>" ><?php echo ("<img src='data:image/jpeg;base64," 
                        . base64_encode($cat->image) . "' alt='Item image' class='img-responsive' style='height:200px'"); ?>
            </button>
        <?php } ?>
    </form>
</div>
