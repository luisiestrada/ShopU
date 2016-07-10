<?php

class RegisteredUser extends Model
{
    $username;
    $emailAddress;
    $studentId;
    $profilePic;
    $password;

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