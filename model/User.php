<?php
class User
{
    public $id;
    public $email;
    public $username;
    public $password;



    public function __construct($id = null, $email = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    //funkcija za logovanje korisnika
    public static function logInUser($usr, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$usr->username' and password='$usr->password'";
        return $conn->query($query);
    }

    //funkcija za dodavanje korisnika u bazu
    public static function registerUser(User $user, mysqli $conn)
    {
        $query = "INSERT INTO user(email, username, password) VALUES ('$user->email', '$user->username', '$user->password')";
        $conn->query($query);
        return $conn->insert_id;
    }

    //funkcije za proveru jedinstvenosti mejla i korisnickog imena
    public static function checkEmeil($email, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public static function checkUsername($username, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }
}
