<?php
include("../dbbr/dbBroker.php");
include("../model/Transaction.php");


session_start();

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $result = Transaction::search($input, $_SESSION['user_id'], $conn);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


?>
            <div id="main-card<?php echo $row['t_id'] ?>" class="main-card">
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
            </div>

<?php
        }
    } else {
        echo "<h3>Nema rezultata za navedeni kriterijum</h3>";
    }
}
?>