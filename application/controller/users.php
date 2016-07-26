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
     * If user not signed in, go to view/users/signin.php
     * Else, redirect to homepage (completely disallow re-signing in)
     */
    public function signIn()
    {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/signin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'home/index');
        }
    }
    
    /**
     * If user not signed in, go to view/users/signup.php
     * Else, redirect to homepage (completely disallow re-signing up)
     */
    public function signUp()
    {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/signup.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'home/index');
        }
    }
    
    /**
     * Sign out user
     * Reference: http://php.net/manual/en/function.session-destroy.php#example-5349
     */
    public function signOut()
    {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('location: ' . URL . 'home/index');
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
            
            // sign in user after user is added to db
            Users::signInUser();
            
            // where to go after user is added & signed in
            header('location: ' . URL . 'home/index');
            
        } else {
            // redirect to index if user visits /user/adduser without submitting form
            header('location: ' . URL . 'users/index');
        }
    }
    
    /**
     * Sign in user
     */
    public function signInUser()
    {
        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $correctCredentials = $this->db_model->isCorrectCredentials($username, $password);
            
            if ($correctCredentials === false) { // reload signin page with error message
                require APP . 'view/_templates/header.php';
                echo "Incorrect username/password!";
                require APP . 'view/users/signin.php';
                require APP . 'view/_templates/footer.php';
            } else { // start session
                $user = $this->db_model->getUserFromUsername($username);
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                header('location: ' . URL . 'home/index'); // go to homepage
            }
            
        } else {
            // redirect to homepage if user visits this method manually in URL
            header('location: ' . URL . 'home/index');
        }
    }

}
