<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/category.css">

</head>

<body>
    <?php
    require '../navigation/navbar.php';
    ?>

    <div class="main-container">
        <div class="sort-container">
            <div class="card-div">
                <label>Kategorija</label>
                <select id="category" name="category">
                    <option value="1">prihodi</option>
                    <option value="2">hrana</option>
                    <option value="3">racuni</option>
                    <option value="4">zabava</option>
                    <option value="5">kuca</option>
                    <option value="6">ostalo</option>
                    <option value="7">sve</option>
                </select>
            </div>
            <div class="card-div">
                <label>Sortiraj po</label>
                <select id="sort" name="sort">
                    <option value="date">datumu</option>
                    <option value="money">novcu (abs)</option>
                </select>
            </div>
            <div class="card-div">
                <label>Poredjaj</label>
                <select id="order" name="order">
                    <option value="ASC">asc</option>
                    <option value="DESC">desc</option>
                </select>
            </div>
            <div class="card-div">
                <button id="btn-show">Prikazi</button>
            </div>

        </div>
        <div id="sortresult" class="sort-result"></div>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btn-show").click(function() {
            event.preventDefault();
            var category = $("#category").val();
            var sortBy = $("#sort").val();
            var order = $("#order").val();
            console.log("Kategorija: " + category + " Sortiranje: " + sortBy + " Redosled: " + order);

            $.ajax({
                url: "../handler/sort.php",
                method: "POST",
                data: {
                    category: category,
                    sortBy: sortBy,
                    order: order
                },
                success: function(data) {
                    $("#sortresult").html(data);
                }
            });
        });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>