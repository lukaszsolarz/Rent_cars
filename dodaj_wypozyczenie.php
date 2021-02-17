<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - wypożycz</title>
</head>
<h1>Wypożycz Auto</h1>

<style>
    .error {color: #ff3c00;
</style>

<body style="background-color: lightgray">
<form class="form" method="post">
    <label for="cars" >Auto: </label>

<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query("SELECT * FROM cars");

if($wynik ->num_rows >0)
{

    echo "<select>";
    while ($wiersz = $wynik ->fetch_assoc())
    {

        echo "<option>";
//        echo $wiersz["id_cars"]."</td>";
        echo $wiersz["brand"]." // ";
        echo $wiersz["model"]." // ";
        echo $wiersz["production_year"]." rok // ";
        echo $wiersz["capacity"]." // ";
//        echo $wiersz["body"]."</td>";
//        echo $wiersz["milage"]." km. "."</td>";
        echo $wiersz["registration_number"];
        echo "</option>";


    }
    echo "</select>";
}
else {

    echo "Baza jest pusta, należy najpierw dodać auto.";
}
?>
</form>
<button id="add_rent_button">Wypożycz</button>
</body>
</html>

