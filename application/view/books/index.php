<div class="container">
    <!-- main content output -->
    Search results: <?php echo $amount_of_books; ?>
    <div class="box">
        <h3>List of books</h3>
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
    <div class="box">
        <h3>Add a book</h3>
        <form action="<?php echo URL; ?>books/addbook" method="POST">
            <label>Title</label>
            <input type="text" name="title" value="test" required /><br />
            <label>Author</label>
            <input type="text" name="author" value="test" required /><br>
            <label>Publisher</label>
            <input type="text" name="publisher" value="test" /><br>
            <label>Genre</label>
            <input type="text" name="genre" value="test" required /><br>
            <label>Publication Year</label>
            <input type="number" name="year" value="2016" min="1900" max="2016" required /><br>
            <label>Summary</label>
            <input type="text" name="summary" value="test" required /><br>
            <label>Image</label>
            <input type="file" name="image"><br>
            
            <input type="submit" name="submit_add_book" value="Submit" />
        </form>
    </div>
</div>
