<div class="container-fluid bg text-center">
    
    <div id="homepage-text">
        <?php
            if (isset($_SESSION['username']) === false) {
                echo("<h1>Welcome to ShopU!</h1>");
            } else {
                echo("<h1>Welcome, " . $_SESSION['username'] . "!</h1>");
            }
        ?>
    </div>
    
</div>
