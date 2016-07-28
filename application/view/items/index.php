<?php
// Change category on the search bar if user made a search
if (isset($_GET["submit_search"])) {
    if ($category != NULL && $category != 'All') {
        echo("<script>$('#category').val('$category');</script>");
        echo("<script>$('select.resizeselect').resizeselect()</script>");
    }
}
?>

<div class="container">

    <?php
    // Show what user searched for if they made a search
    if (isset($_GET["submit_search"])) {
        if ($input != '') {
            echo("<h3>Items matching keyword '$input'...</h3>");
        } else if ($category != 'All') {
            echo("<h3>List of all items in '$category'</h3>");
        } else {
            echo("<h3>List of all items</h3>");
        }
    } else {
        echo("<h3>List of all items</h3>");
    }
    ?>

    <!--Filter bar-->
    <div class="col-md-2">
        <br><br><br> 
        <label class="bold">
            <font size="4" color="black">Filter:</font>
        </label>
        <label class="bold">
            <font size="3" color="black">Price:</font>
        </label>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                $0-$100
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                $101-$500
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                $501-$1000
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                more than $1000
            </label>
        </div>
    </div>
    <!--end filter bar-->

    <!-- item table -->
    <div class="col-md-10">
        <div class="box table-responsive">
            <table id="itemTable" class="display responsive no-wrap" width="100%">

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
                        <tr>
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
                            <td><?php if (isset($item->category)) echo htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="<?php echo URL . 'items/getitem/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>"
                                   class="btn btn-warning btn-lg buy-button" id="buy">BUY</a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>

            </table>
            <br/>
        </div>
    </div>
</div>


<!-- apply DataTables to the item table -->
<script>
    $(document).ready(function () {
        $('#itemTable').DataTable({
            "pagingType": "simple_numbers", // pagination buttons
            "aaSorting": [], // initial sort (empty: none)
            "columnDefs": [{
                    "targets": [0, -1], // these columns are unorderable
                    "orderable": false
                }],
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
        });
    });
</script>
