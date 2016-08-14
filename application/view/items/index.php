<!--Go Back link and echo text field-->
<!--back to search link-->
<div id = "backlink" class="container-fluid">
    <div class="col-md-2 text-center">
        <a href="javascript://" onclick="goBack();">Go Back</a>
    </div> 

    <!--back to search link end-->
    <?php
    // Change category on the search bar if user made a search
    if (isset($_GET["submit_search"])) {
        if ($category != NULL && $category != 'All') {
            echo("<script>$('#category').val('$category');</script>");
            echo("<script>$('select.resizeselect').resizeselect()</script>");
        }
    }
    ?>

    <div class="col-md-10">
        <?php
        // Show what user searched for if they made a search
        if ($search != '') {
            echo("<h4>Items matching keyword '$search'...</h4>");
        } else if ($category != null && $category != 'All') {
            echo("<h4>List of all items in '$category'</h4>");
        } else {
            echo("<h4>List of all items</h4>");
        }
        ?>
        <?php echo("<h4>Showing " . ($range + 1) . " to <span id='results'>$range</span> of $num_items entries</h4>") ?>
    </div>
    
</div>

<!--filter and search result field-->
<div class="container">
    <!-- item table -->
    <div class="box table-responsive">
        <table id="itemTable" class="display responsive no-wrap " width="100%">

            <!-- table head (column names) -->
            <!-- IMPORTANT: # of thead columns must match that of tbody -->
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td></td>
                </tr>
            </thead>

            <!-- table body (loop through items & print their information) -->
            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr class='table-row' data-href="<?php echo URL .'items/getitem/'. htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>">
                        <td>
                            <?php
                            // display user-uploaded image if it exists
                            if (isset($item->image)) {
                                echo ("<img src='data:image/jpeg;base64," . base64_encode($item->image)
                                . "' alt='Item image' style='height:100px; width: 100px'");
                            } else {
                                echo ("<img src='" . URL . "img/demo-image.png' alt='Item Image'");
                            }
                            ?>
                        </td>
                        <td><?php if (isset($item->title)) echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($item->price)) echo '$' . htmlspecialchars($item->price, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php
                            if (isset($item->category)) {
                                foreach ($categories as $theCat) {
                                    if ($item->category == $theCat->id) {
                                        echo htmlspecialchars($theCat->category, ENT_QUOTES, 'UTF-8');
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php if (isset($_SESSION["user_id"])) { ?>
                                <a href="<?php echo URL . 'items/orderconfirm/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>"
                                   class="btn btn-warning btn-lg buy-button" id="buy">BUY</a>

                                <!-- users need to sign in before buy an item-->
                            <?php } else { ?>
                                <a href="" data-toggle="tooltip" data-placement="auto" title="You must sign in to buy items!"
                                   class="btn btn-warning btn-lg buy-button" id="buy">BUY</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // get visible number of items to add to number of items showing
    var value = parseInt(document.getElementById("results").innerHTML, 10);
    var rowCount = $('#itemTable >tbody >tr:visible').length;
    document.getElementById("results").innerHTML = value + rowCount;
</script>

<!-- navigation -->
<div class="navigation text-center">
<?php
    if($items && count($items) > 0) {
        echo ("<ul class='pagination'>");
        $URI = ($search === null) ? URL . "items/buttonCategories?buttons=$category"
                                  : URL . "items/search?category=$category&searchbar=$search&submit_search=";
        for ($i = 1; $i <= $num_pages; $i++) {
            echo("<li id=$i><a href='$URI&page=$i'>$i</a></li>");
        }
        echo ("</ul>");
    } else {
        echo "<p>No results found.</p>";
    }
?>
</div>
<br><br>

<script>
    $(document).ready(function($) {
        // apply DataTables (just for its awesome style)
        $('#itemTable').DataTable({
            "aaSorting": [], // no initial sort
            "filter": false, // no searching
            "paging": false, // no pages
            "info": false, // no text
            "columnDefs": [{
                    "targets": [0, -1], // select first and last columns
                    "orderable": false // make these columns unorderable
                }]
        });
        
        // make table rows clickable
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
        
        // make selected page button active
        $("#<?php echo $current_page ?>").addClass("active");
     });
</script>
