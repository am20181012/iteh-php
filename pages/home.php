<?php
require "../dbbr/dbBroker.php";
require "../model/Transaction.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$data = Transaction::getAll($conn, $_SESSION['user_id']);
if (!$data) {
    echo "Nastala je greska pri preuzimanju podataka!";
    die();
} {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="../style/homestyle.css">
    </head>

    <body>
        <?php
        require '../navigation/navbar.php';
        ?>

        <div class="main-container">
            <div class="search">
                <input id="searchbar" class="searchbar" type="text" name="searchbar" placeholder="Pretraga..." />
            </div>
            <div class="container">
                <?php
                while ($row = $data->fetch_array()) :
                ?>
                    <div id="card<?php echo $row['t_id'] ?>" class="card">
                        <div class="preview">
                            <h6><?php echo $row['category_name'] ?></h6>
                            <h2><?php if ($row['c_id'] == 1)  echo "+" . $row['money'] . " RSD";
                                else echo "-" . $row['money'] . " RSD"; ?></h2>
                            <a href=""><?php echo date('d/m/Y', strtotime($row['date'])) ?></a>
                        </div>
                        <div class="info">
                            <h6><?php echo $row['category_name'] ?></h6>
                            <h2><?php echo $row['transaction_name'] ?></h2>
                            <p class="p-trunc"><?php echo $row['description'] ?></p>
                            <button id="btn-edit" class="btn">Izmeni</button>
                            <button id="btn-delete" class="btn" onclick="deleteTransaction(<?php echo $row['t_id'] ?>)">Izbrisi</button>

                        </div>
                    </div>
            <?php
                endwhile;
            }
            ?>

            </div>
        </div>

        <!--Skripte za slanje ajax zahteva za izmenu i brisanje transakcije-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/main.js"></script>

    </body>

    </html>