<?php

session_start();

/**
 * Class Users
 */
class Users extends Controller
{
    /**
     * Show all users
     */
    public function index()
    {
        $users = $this->db_model->getAllUsers();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Go to view/users/signin.php
     */
    public function signIn()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/signin.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Go to view/users/signup.php
     */
    public function signUp()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/signup.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Add user to database (called when user submits sign up form)
     */
    public function addUser()
    {
        if (isset($_POST['submit_add_user'])) {
            
            $file = $_FILES["image"]["tmp_name"]; // reference to file uploaded
            
            // if false, not an image or no image selected
            if ($file != null && getimagesize($file)) {

                // resize image (destroys original)
                parent::resizeImage($file);
                $image = file_get_contents($file);

                // add user to database with image
                $this->db_model->addUserWithImage($_POST["student_id"], $_POST["username"],
                        $_POST["email"], $_POST["password"], $image);
                
            } else {
                // add user to database without image (default image used instead)
                $this->db_model->addUser($_POST["student_id"], $_POST["username"],
                        $_POST["email"], $_POST["password"]);
            }
            
            // where to go after user is added
            header('location: ' . URL . 'home/index');
            
        } else {
            // redirect to index if user visits /user/adduser without submitting form
            header('location: ' . URL . 'users/index');
        }
    }

}
