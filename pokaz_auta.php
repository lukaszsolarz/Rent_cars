<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<body style="background-color: lightgray">
<h2>Wszystkie dostępne auta w bazie:</h2>
<br/>

<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query("SELECT * FROM cars");

if($wynik ->num_rows >0)
{
    echo "<table class='table_cars'>";
    echo "<tr class='tr_table_cars'>";
        echo "<th class='th_table_cars'> ID</th>";
        echo "<th class='th_table_cars'> Marka</th>";
        echo "<th class='th_table_cars'> Model</th>";
        echo "<th class='th_table_cars'> Rok produkcji</th>";
        echo "<th class='th_table_cars'> Pojemność</th>";
        echo "<th class='th_table_cars'> Nadwozie</th>";
        echo "<th class='th_table_cars'> Przbieg</th>";
        echo "<th class='th_table_cars'> Nr. rejestracyjny</th>";
        echo "<th class='th_table_cars'> Wypożyczone</th>";

    echo "</tr>";
    while ($wiersz = $wynik ->fetch_assoc())
    {
        echo "<tr class='tr_table_cars'>";
        echo "<td class='th_table_cars'>".$wiersz["id_cars"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["brand"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["model"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["production_year"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["capacity"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["body"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["milage"]." km. "."</td>";
        echo "<td class='td_table_cars'>".$wiersz["registration_number"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["rented"]."</td>";
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