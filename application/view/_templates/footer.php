    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>
    
    <!-- change search bar category to be that of category chosen before submitting search -->
    <?php if ($category != null) echo("<script>$('#category').val('" .$category. "');</script>"); ?>
    
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    
    <!-- Bootstrap -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
</body>
</html>
