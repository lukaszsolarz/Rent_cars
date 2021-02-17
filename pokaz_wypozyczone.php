<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>
<body style="background-color: lightgray">
<h2>Stan wszystkich wypożyczonych aut</h2>


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid lightslategray;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: darkgray;
    }
</style>
<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query('SELECT * FROM cars WHERE rented = 1');

if($wynik ->num_rows >=0)
{
    echo "<table>";
    echo "<tr>";
    echo "<th> ID</th>";
    echo "<th> Marka</th>";
    echo "<th> Model</th>";
    echo "<th> Rok produkcji</th>";
    echo "<th> Pojemność</th>";
    echo "<th> Nadwozie</th>";
    echo "<th> Przbieg</th>";
    echo "<th> Nr. rejestracyjny</th>";
    echo "<th> Wypożyczone</th>";

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
        echo "<td>".$wiersz["registration_number"]."</td>";
        echo "<td>".$wiersz["rented"]."</td>";
        echo "</tr>";

    }
    echo "</table>";
}
else {

    echo "Baza jest pusta, należy najpierw dodać auto.";
}
?>

</body>
</html>