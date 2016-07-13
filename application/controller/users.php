<?php

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
        $users = $this->user_model->getAllUsers();
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Go to view/users/signin.php
     */
    public function signup()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/signup.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Add user to database
     */
    public function addUser()
    {
        if (isset($_POST['submit_add_user'])) {
            
            $file = $_FILES["image"]["tmp_name"]; // reference to file
            
            // if false, not an image or no image selected
            if ($file != null && getimagesize($file)) {
                
                // resize image (destroys original)
                Users::resizeImage($file);
                $image = file_get_contents($file);
                
                // add user to database with image
                $this->user_model->addUserWithImage($_POST["student_id"], $_POST["username"],
                    $_POST["email"], $_POST["password"], $image);
        
            } else {
                // add user to database without image (default image used instead)
                $this->user_model->addUser($_POST["student_id"], $_POST["username"],
                    $_POST["email"], $_POST["password"]);
            }
            
            // where to go after user is added
            header('location: ' . URL . 'users/index');
            
        } else {
            // redirect to index if user visits /user/adduser without submitting form
            header('location: ' . URL . 'users/index');
        }
    }
    
    /**
     * This function proportionally resizes images down to thumbnails ~100x100px.
     * Didn't want to dive too deep into image processing, so I followed this reference:
     * http://stackoverflow.com/questions/18805497/php-resize-image-on-upload#answer-27213444
     */
    private function resizeImage($file)
    {
        $maxDim = 100;
        list($width, $height) = getimagesize( $file );
        if ( $width > $maxDim || $height > $maxDim ) {
            
            $target_filename = $file;
            $fn = $file;
            
            // find new proportional height & width
            $size = getimagesize( $fn );
            $ratio = $size[0] / $size[1]; // width/height
            if( $ratio > 1) { // width > height
                $width = $maxDim;
                $height = $maxDim / $ratio;
            } else { // width < height
                $width = $maxDim * $ratio;
                $height = $maxDim;
            }
            
            // resize image with new height & width
            $src = imagecreatefromstring( file_get_contents( $fn ) );
            $dst = imagecreatetruecolor( $width, $height );
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
            imagedestroy( $src );
            imagepng( $dst, $target_filename );
            imagedestroy( $dst );
        }
    }

}
