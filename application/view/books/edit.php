<div class="container">
    <h2>You are in the View: application/view/book/edit.php (everything in this box comes from that file)</h2>
    <!-- add book form -->
    <div>
        <h3>Edit a book</h3>
        <form action="<?php echo URL; ?>books/updatebook" method="POST">
            <label>Title</label>
            <input autofocus type="text" name="title" value="<?php echo htmlspecialchars($book->title, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Author</label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Publisher</label>
            <input type="text" name="publisher" value="<?php echo htmlspecialchars($book->publisher, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Genre</label>
            <input type="text" name="genre" value="<?php echo htmlspecialchars($book->genre, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Publication Year</label>
            <input type="text" name="year" value="<?php echo htmlspecialchars($book->year, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Summary</label>
            <input type="text" name="summary" value="<?php echo htmlspecialchars($book->summary, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_book" value="Update" />
        </form>
    </div>
</div>
