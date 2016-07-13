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
     * @param type $email - the new email address
     */
    public function updateEmail($email)
    {
        $emailAddress = $email;
    }
    
    /**
     * Update password
     * @param type $pwd - the new password
     */
    public function updatePassword($pwd)
    {
        $password = $pwd;
    }
    
    /**
     * Add user to the database
     * @param type $student_id
     * @param type $username
     * @param type $email
     * @param type $password
     */
    public function addUser($student_id, $username, $email, $password)
    {
        $sql = "INSERT INTO user (student_id, username, email, password) "
            . "VALUES (:student_id, :username, :email, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id, ':username' => $username,
            ':email' => $email, ':password' => $password);
        $query->execute($parameters);
    }
    
    /**
     * Add user to the database with profile picture
     * @param type $student_id
     * @param type $username
     * @param type $email
     * @param type $password
     * @param type $image - profile picture
     */
    public function addUserWithImage($student_id, $username, $email, $password, $image)
    {
        $sql = "INSERT INTO user (student_id, username, email, password, image) "
            . "VALUES (:student_id, :username, :email, :password, :image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id, ':username' => $username,
            ':email' => $email, ':password' => $password, ':image' => $image);
        $query->execute($parameters);
    }
    
    /**
     * This function returns all users
     */
    public function getAllUsers()
    {
        $sql = "SELECT id, student_id, username, email, image FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
