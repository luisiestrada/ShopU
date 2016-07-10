<?php

class RegisteredUser extends Model
{
    public $username;
    public $emailAddress;
    public $studentId;
    public $profilePic;
    public $password;

    /**
     * Update email address
     @param type $email - the new email address
     */
    public function updateEmail($email)
    {
        $emailAddress = $email;
    }
    
    /**
     * Update password
     @param type $pwd - the new password
     */
    public function updateEmail($pwd)
    {
        $password = $pwd;
    }
}