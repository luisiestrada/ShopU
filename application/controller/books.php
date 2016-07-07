<?php

/**
 * Class Books
 */
class Books extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/books/index
     */
    public function index()
    {
        // getting all books and amount of books
        $books = $this->book_model->getAllBooks();
        $amount_of_books = $this->book_model->getAmountOfBooks();

       // load views. within the views we can echo out $books and $amount_of_books easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/books/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addBook
     * This method handles what happens when you move to http://yourproject/book/addbook
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a book" form on books/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to books/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addBook()
    {
        // if we have POST data to create a new book entry
        if (isset($_POST["submit_add_book"])) {
            // do addBook() in model/book.php
            $this->book_model->addBook($_POST["title"], $_POST["author"], $_POST["publisher"],
                $_POST["genre"], $_POST["year"], $_POST["summary"]);
        }

        // where to go after book has been added
        header('location: ' . URL . 'books/index');
    }

    /**
     * ACTION: deleteBook
     * This method handles what happens when you move to http://yourproject/books/deletebook
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a book" button on books/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to books/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $book_id Id of the to-delete book
     */
    public function deleteBook($book_id)
    {
        // if we have an id of a book that should be deleted
        if (isset($book_id)) {
            // do deleteBook() in model/book.php
            $this->book_model->deleteBook($book_id);
        }

        // where to go after book has been deleted
        header('location: ' . URL . 'books/index');
    }

     /**
     * ACTION: editBook
     * This method handles what happens when you move to http://yourproject/books/editbook
     * @param int $book_id Id of the to-edit book
     */
    public function editBook($book_id)
    {
        // if we have an id of a book that should be edited
        if (isset($book_id)) {
            // do getBook() in model/book.php
            $book = $this->book_model->getBook($book_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $book easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/books/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to books index page (as we don't have a book_id)
            header('location: ' . URL . 'books/index');
        }
    }

    /**
     * ACTION: updateBook
     * This method handles what happens when you move to http://yourproject/books/updatebook
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a book" form on books/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to books/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateBook()
    {
        // if we have POST data to create a new book entry
        if (isset($_POST["submit_update_book"])) {
            // do updateBook() from model/book.php
            $this->book_model->updateBook($_POST["title"], $_POST["author"], $_POST["publisher"],
                $_POST["genre"], $_POST["year"], $_POST["summary"], $_POST['book_id']);
        }

        // where to go after book has been added
        header('location: ' . URL . 'books/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats()
    {
        $amount_of_books = $this->book_model->getAmountOfBooks();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_books;
    }

}
