<?php

require "../dbbr/dbBroker.php";
require "../model/Transaction.php";

if (isset($_POST['edit_id'])) {
    $transaction = new Transaction($_POST['edit_id']);
    $myArray = $transaction->getById($conn);
    echo json_encode($myArray);
}
