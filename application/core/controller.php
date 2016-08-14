<?php

/**
 * class Controller is inherited by all of the program's controllers
 */
class Controller
{
    /**
     * Models
     */
    public $item_model = null;
    public $user_model = null;
    
    /**
     * Whenever controller is created, load the models.
     */
    function __construct()
    {
        $this->loadModels();
    }

    /**
     * Loads the models.
     * @return object model
     */
    public function loadModels()
    {
        require APP . 'model/item.php';
        require APP . 'model/registered_user.php';
        
        // create new models
        $this->item_model = new Item();
        $this->user_model = new RegisteredUser();
    }
    
    /**
     * This method proportionally resizes images down to thumbnails ~400x400px.
     * Didn't want to dive too deep into image processing, so I followed this reference:
     * http://stackoverflow.com/questions/18805497/php-resize-image-on-upload#answer-27213444
     */
    protected function resizeImage($file)
    {
        $maxDim = 400;
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
