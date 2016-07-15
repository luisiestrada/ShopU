<!-- Change category on search bar if user recently searched -->
<?php
    if (isset($_GET["submit_search"])) {
        if ($category != NULL && $category != 'All') {
            echo("<script>$('#category').val('$category');</script>");
        }
    }
?>

<div class="container">
    <?php
        if (isset($_GET["submit_search"])) {
            echo("<h3>Items matching keyword '" .$input. "'...</h3>");
        } else {
            echo("<h3>Showing all items</h3>");
        }
    ?>
    <div class="box">
        <table id="itemTable" class="display responsive no-wrap" width="100%">
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image</td>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Description</td>
                    <td>Keywords</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <td>
                        <?php
                            if (isset($item->image)) {
                                echo ("<img src='data:image/jpeg;base64," . base64_encode($item->image)
                                        . "' alt='Item image' style='height:100px; width: 100px'");
                            } else {
                                echo ("<img src='" . URL . "img/demo-image.png' alt='Item Image'");
                            }
                        ?>
                    </td>
                    <td><?php if (isset($item->id)) echo htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->title)) echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>$<?php if (isset($item->price)) echo htmlspecialchars($item->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->category)) echo htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->description)) echo htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->keywords)) echo htmlspecialchars($item->keywords, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="<?php echo URL . 'items/buyitem/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>">
                            <button class="btn btn-warning btn-lg" type="submit" name="buy" style="background:#F89406;">BUY</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#itemTable').DataTable({
        "pagingType": "simple_numbers", // pagination buttons
        "aaSorting": [], // initial sort (empty: none)
        "columnDefs": [ {
            "targets": [0, -1], // these columns are unorderable
            "orderable": false
        } ],
        "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
    });
});
</script>
