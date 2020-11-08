<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>

<body>
<h2>Wszystkie dostępne auta w bazie:</h2>
<br/>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query("SELECT * FROM cars");

if($wynik ->num_rows >0)
{
    echo "<table>";
    echo "<tr>";
        echo "<th> ID</th>";
        echo "<th> Marka</th>";
        echo "<th> Model</th>";
        echo "<th> Nadwozie</th>";
        echo "<th> Rok</th>";
        echo "<th> Pojemność</th>";
        echo "<th> Przbieg</th>";

    echo "</tr>";
    while ($wiersz = $wynik ->fetch_assoc())
    {
        echo "<tr>";


        echo "<td>".$wiersz["id_cars"]."</td>";
        echo "<td>".$wiersz["brand"]."</td>";
        echo "<td>".$wiersz["model"]."</td>";
        echo "<td>".$wiersz["production_year"]."</td>";
        echo "<td>".$wiersz["capacity"]."</td>";
        echo "<td>".$wiersz["body"]."</td>";
        echo "<td>".$wiersz["milage"]." km. "."</td>";
        echo "</tr>";

    }
    echo "</table>";
}
else {

    echo "Baza jest pusta, należy najpierw dodać auta.";
}
?>

</body>
</html>