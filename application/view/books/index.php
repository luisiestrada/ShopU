<div class="container">
    <h2>You are in the View: application/view/book/index.php (everything in this box comes from that file)</h2>
    <!-- add book form -->
    <div class="box">
        <h3>Add a book</h3>
        <form action="<?php echo URL; ?>books/addbook" method="POST">
            <label>Title</label>
            <input type="text" name="title" value="" required />
            <label>Author</label>
            <input type="text" name="author" value="" required />
            <label>Publisher</label>
            <input type="text" name="publisher" value="" required />
            <label>Genre</label>
            <input type="text" name="genre" value="" required />
            <label>Publication Year</label>
            <input type="text" name="year" value="" />
            <label>Summary</label>
            <input type="text" name="summary" value="" />
            <input type="submit" name="submit_add_book" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of books (data from second model)</h3>
        <div>
            <?php echo $amount_of_books; ?>
        </div>
        <h3>Amount of books (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of books via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of books (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
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
</div>
