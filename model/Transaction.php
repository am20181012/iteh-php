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
}