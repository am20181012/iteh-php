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
        <!--Za modal-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                            <button id="btn-edit" class="btn" onclick="editTransaction(<?php echo $row['t_id'] ?>)" data-toggle="modal" data-target="#editModal">Izmeni</button>
                            <button id="btn-delete" class="btn" onclick="deleteTransaction(<?php echo $row['t_id'] ?>)">Izbrisi</button>

                        </div>
                    </div>
            <?php
                endwhile;
            }
            ?>
            </div>
        </div>

        <!-- Modal -->
        <div>
            <div class="modal fade" id="editModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal sadrzaj-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close-icon" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container-transakcija-form">
                                <form action="#" method="post" id="editForm">
                                    <div class="cl">
                                        <input id="id" type="text" name="id" placeholder="ID" value="" readonly style="background-color: #f71256;" />
                                        <br>

                                        <input id="title" type="text" name="title" placeholder="Naslov" value="" style="background-color: #f28fad;" />
                                        <br>

                                        <input id="money" type="text" name="money" placeholder="Iznos" value="" style="background-color: #f28fad;" />
                                        <br>

                                        <input id="date" type="date" name="date" placeholder="Datum" value="" style="background-color: #f28fad;" />
                                        <br>

                                        <textarea id="description" type="text" name="description" placeholder="Opis" value="" style="background-color: #f28fad;"></textarea>
                                        <br>

                                        <select id="category" name="category" style="background-color: #f28fad;">
                                            <option value="1">prihodi</option>
                                            <option value="2">hrana</option>
                                            <option value="3">racuni</option>
                                            <option value="4">zabava</option>
                                            <option value="5">kuca</option>
                                            <option value="6">ostalo</option>
                                        </select>
                                        <br>

                                        <button id="btnEdit" class="btn" type="submit" style="color: #f71256;">Izmeni</button>

                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Kraj modala-->


        <!--Skripte za slanje ajax zahteva za izmenu i brisanje transakcije-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Skripta, tj. link ka skripti za koriscenje modala i drugo-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>

    </body>

    </html>