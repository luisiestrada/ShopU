<div class="container">
    <h3>Items matching keyword '<?php echo($input); ?>'...</h3>
    <div class="box">
        <table class="dataTables display responsive no-wrap" width="100%">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Image</td>
                <td>Id</td>
                <td>Title</td>
                <td>Price</td>
                <td>Category</td>
                <td>Description</td>
                <td>Keywords</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <td><img src="<?php echo URL; ?>img/demo-image.png" alt="image"></td>
                    <td><?php if (isset($item->id)) echo htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->title)) echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->price)) echo htmlspecialchars($item->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->category)) echo htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->description)) echo htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->keywords)) echo htmlspecialchars($item->keywords, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'items/deletebook/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'items/editbook/' . htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>