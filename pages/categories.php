<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" type="text/css" href="../style/categoriesstyle.css">

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
                    <option value="money">novcu</option>
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
</body>