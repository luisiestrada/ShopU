<!-- Change category on the search bar if user made a search -->
<?php
    if (isset($_GET["submit_search"])) {
        if ($category != NULL && $category != "All") {
            echo("<script>$('#category').val('$category');</script>");
        }
    }
?>

<!-- main content -->
<div class="container">
    Your search '<?php echo($input); ?>' did not match any products.
</div>
