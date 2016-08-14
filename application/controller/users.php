<?php

session_start();

/**
 * Class Users
 */
class Users extends Controller
{
    public $categories; // List of all categories for categories
                        // section in navbar (loaded from db)

    /**
     * Show all users
     */
    public function index()
    {
        $categories = $this->item_model->getAllCategories();
        $search = null;
        $users = $this->user_model->getAllUsers();
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
        if (!isset($_SESSION['user_id'])) {
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
        if (!isset($_SESSION['user_id'])) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/signup.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'home/index');
        }
    }
    
    /** 
     * Displays Terms and Conditions page
     */
    public function displayTerms()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/termsandconditions.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Sign out user
     * Reference: http://php.net/manual/en/function.session-destroy.php#example-5349
     */
    public function signOut()
    {
        // unset session variables
        $_SESSION = array();
        
        // delete session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        
        // redirect to homepage when sign out complete
        header('location: ' . URL . 'home/index');
    }
    
    /**
     * Add user to database (called when user submits sign up form)
     */
    public function addUser()
    {
        if (isset($_POST['submit_add_user'])) {
            
            if ($this->user_model->userExists($_POST['username']) == true) {
                $error = "Username taken!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/errors/errorbox.php';
                require APP . 'view/users/signup.php';
                require APP . 'view/_templates/footer.php';
                return;
            }
            
            $file = $_FILES["image"]["tmp_name"]; // reference to file uploaded
            $image = null; // image null by default
            
            // if false, not an image or no image selected
            if ($file != null && getimagesize($file)) {
                parent::resizeImage($file);
                $image = file_get_contents($file);
            }
            
            // encrypt password entered by user with bcrypt algorithm
            $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
            $this->user_model->addUser($_POST["student_id"], $_POST["username"],
                        $_POST["email"], $pass_hash, $image);
            
            Users::signInUser(); // sign in after user is added to db
            
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
            
            $correctCredentials = $this->user_model->correctCredentials($username, $password);
            
            if ($correctCredentials === false) { // reload signin page with error message
                $error = "Incorrect username/password!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/errors/errorbox.php';
                require APP . 'view/users/signin.php';
                require APP . 'view/_templates/footer.php';
            } else { // start session
                $user = $this->user_model->getUserFromUsername($username);
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                
                // return to page you were before
                echo "<script>window.history.go(-2);</script>";
            }
            
        } else {
            // redirect to homepage if user visits this method manually in URL
            header('location: ' . URL . 'home/index');
        }
    }
}
