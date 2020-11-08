<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>

<body>

<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query("SELECT * FROM cars");

if($wynik ->num_rows >0)
{
    echo "<table>";
    while ($wiersz = $wynik ->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>"."ID:  ".$wiersz["id_cars"]." || ". " Marka:  ".$wiersz["brand"]." || "."Model:  ".$wiersz["model"]." || "." Nadwozie:  ".$wiersz["body"]." || "." Rok produkcji:  ".$wiersz["production_year"]." || "."Pojemność:  ".$wiersz["capacity"]." || "." Przebieg:  ".$wiersz["milage"]." km.";
        echo "</td>";
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