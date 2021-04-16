<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<body style="background-color: lightgray">
<h2>Wszyscy klienci w bazie:</h2>
<br/>

<?php

$conn = new mysqli('localhost', 'root', '', 'rent_cars');
$wynik=$conn ->query("SELECT * FROM clients");

if($wynik ->num_rows >0)
{
    echo "<table class='table_cars'>";
    echo "<tr class='tr_table_cars'>";
        echo "<th class='th_table_cars'>Imię</th>";
        echo "<th class='th_table_cars'>Nazwisko</th>";
        echo "<th class='th_table_cars'>Nr. dowodu</th>";

    echo "</tr>";
    while ($wiersz = $wynik ->fetch_assoc())
    {
        echo "<tr class='tr_table_cars'>";
        echo "<td class='th_table_cars'>".$wiersz["name"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["surname"]."</td>";
        echo "<td class='td_table_cars'>".$wiersz["personal_identity_number"]."</td>";
        echo "</tr>";

    }
    echo "</table>";
}
else {

    echo "Baza jest pusta, należy najpierw dodać klienta.";
}
?>
</body>
</html>