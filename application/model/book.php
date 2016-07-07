<?php

class Book extends Model
{
    /**
     * Get all books from database
     */
    public function getAllBooks()
    {
        $sql = "SELECT id, title, author, publisher, genre, year, summary FROM book";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Add a book to database
     */
    public function addBook($title, $author, $publisher, $genre, $year, $summary)
    {
        $sql = "INSERT INTO book (title, author, publisher, genre, year, summary) "
            . "VALUES (:title, :author, :publisher, :genre, :year, :summary)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':author' => $author, ':publisher' => $publisher,
            ':genre' => $genre, ':year' => $year, ':summary' => $summary);
        $query->execute($parameters);
    }

    /**
     * Delete a book in the database
     */
    public function deleteBook($book_id)
    {
        $sql = "DELETE FROM book WHERE id = :book_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':book_id' => $book_id);
        $query->execute($parameters);
    }

    /**
     * Get a book from database
     */
    public function getBook($book_id)
    {
        $sql = "SELECT id, title, author, publisher, genre, year, summary "
            . "FROM book WHERE id = :book_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':book_id' => $book_id);
        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a book in database
     * @param int $book_id Id
     */
    public function updateBook($title, $author, $publisher, $genre, $year, $summary, $book_id)
    {
        $sql = "UPDATE book SET title = :title, author = :author, publisher = :publisher,
            genre = :genre, year = :year, summary = :summary WHERE id = :book_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':author' => $author, ':publisher' => $publisher,
            ':genre' => $genre, ':year' => $year, ':summary' => $summary, ':book_id' => $book_id);
        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/books.php for more)
     */
    public function getAmountOfBooks()
    {
        $sql = "SELECT COUNT(id) AS amount_of_books FROM book";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_books;
    }
}
