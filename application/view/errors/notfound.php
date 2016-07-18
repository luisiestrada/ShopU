<!-- Change category on the search bar if user made a search -->
<?php
    if (isset($_GET["submit_search"])) {
        if ($category != NULL && $category != 'All') {
            echo("<script>$('#category').val('$category');</script>");
        }
    }
?>

<!-- main content -->
<div class="container">
    <h3>Your search '<?php echo($input); ?>' did not match any products.</h3>
</div>
