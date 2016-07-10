<div class="container">
    <h3>Items matching keyword '<?php echo($input); ?>'...</h3>
    <?php if ($books != null) { ?>
        <div class="box">
            <h3>Books</h3>
            <table class="dataTables display responsive no-wrap" width="100%">
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image</td>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Publisher</td>
                    <td>Genre</td>
                    <td>Publication Year</td>
                    <td>Summary</td>
                    <td>DELETE</td>
                    <td>EDIT</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <td><img src="<?php echo URL; ?>img/demo-image.png" alt="image"></td>
                        <td><?php if (isset($book->id)) echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->title)) echo htmlspecialchars($book->title, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->author)) echo htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->publisher)) echo htmlspecialchars($book->publisher, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->genre)) echo htmlspecialchars($book->genre, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->year)) echo htmlspecialchars($book->year, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($book->summary)) echo htmlspecialchars($book->summary, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><a href="<?php echo URL . 'books/deletebook/' . htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                        <td><a href="<?php echo URL . 'books/editbook/' . htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <?php if ($songs != null) { ?>
        <div class="box">
            <h3>Songs matching keyword '<?php echo($input); ?>'</h3>
            <table class="dataTables display responsive no-wrap" width="100%">
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image</td>
                    <td>Id</td>
                    <td>Artist</td>
                    <td>Track</td>
                    <td>Link</td>
                    <td>DELETE</td>
                    <td>EDIT</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($songs as $song) { ?>
                    <tr>
                        <td><img src="<?php echo URL; ?>img/demo-image.png" alt="image"></td>
                        <td><?php if (isset($song->id)) echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php if (isset($song->link)) { ?>
                                <a href="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?></a>
                            <?php } ?>
                        </td>
                        <td><a href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                        <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>