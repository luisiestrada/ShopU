<div class="container-fluid bg text-center">
    
    <div id="homepage-text">
        <?php
            if (isset($_SESSION['username']) === false) {
                echo("<h1>Welcome to ShopU!</h1>");
                echo "Session Id: " . session_id() . "<br>";
            } else {
                echo("<h1>Welcome, " . $_SESSION['username'] . "!</h1>");
                echo "Session Id: " . session_id() . "<br>";
            }
        ?>
        
        <h2>
            ShopU is an electronic commerce website that provides
            consumer-to-consumer sales services exclusively to students
            attending San Francisco State University.
        </h2>
    </div>
    
</div>
