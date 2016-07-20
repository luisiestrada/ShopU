<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * Models
     */
    public $db_model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'model/database.php';
        
        // create new "model" (and pass the database connection)
        $this->db_model = new Database($this->db);
    }
    
    /**
     * This method proportionally resizes images down to thumbnails ~100x100px.
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
