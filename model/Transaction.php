<?php

class Transaction
{
    public $id;
    public $name;
    public $date;
    public $description;
    public $money;
    public $category_id;
    public $user_id;



    public function __construct($id = null, $name = null, $date = null, $description = null, $money = null, $category_id = null, $user_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->description = $description;
        $this->money = $money;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
    }

    //CREATE
    public static function insert(Transaction $tran, mysqli $conn)
    {
        $query = "INSERT INTO transaction(transaction_name, date, description, money, category_id, user_id) VALUES ('$tran->name', '$tran->date', '$tran->description', '$tran->money', '$tran->category_id', '$tran->user_id')";
        return $conn->query($query);
    }

    //READ ALL
    public static function getAll(mysqli $conn, $user_id)
    {
        $query = "SELECT t.id AS t_id, t.transaction_name, t.date, t.description, t.money, c.id AS c_id, c.category_name FROM transaction t INNER JOIN category c ON (t.category_id=c.id) WHERE user_id = '$user_id'";
        return $conn->query($query);
    }

    //DELETE by id
    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM transaction WHERE id=$this->id";
        return $conn->query($query);
    }

    //READ by id
    public function getById(mysqli $conn)
    {
        $query = "SELECT * FROM transaction WHERE id=$this->id";
        $myObj = array();
        if ($mySqlObj = $conn->query($query)) {
            while ($red = $mySqlObj->fetch_array(1)) {
                $myObj[] = $red;
            }
        }
        return $myObj;
    }

    //UPDATE
    public function update($id, mysqli $conn)
    {
        $query = "UPDATE transaction SET transaction_name='$this->name', date='$this->date', description='$this->description', money='$this->money', category_id='$this->category_id' WHERE id=$id";
        return $conn->query($query);
    }

    //funkcija za pretragu na osnovu naziva transakcije ili kategorije
    public static function search($input, $user_id, mysqli $conn)
    {
        $query = "SELECT t.id AS t_id, t.transaction_name, t.date, t.description, t.money, c.id AS c_id, c.category_name FROM transaction t INNER JOIN category c ON (t.category_id=c.id) WHERE (t.transaction_name LIKE '$input%' OR c.category_name LIKE '$input%') AND t.user_id=$user_id";
        return mysqli_query($conn, $query);
    }
}
