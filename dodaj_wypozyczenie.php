<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?><!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Wypozyczalnia - wypożycz</title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<h1>Wolne auta bazie : </h1>

<style>
</style>

<body style="background-color: lightgray">
<form class="form" method="post" action="dodaj_wypozyczenie.php">

    <?php
    $conn = new mysqli('localhost', 'root', '', 'rent_cars');
    $wynik = $conn->query("SELECT * FROM cars where rented=0");

    if ($wynik->num_rows > 0) {

        echo "<table class='table_cars'>";
            echo "<tr>";
                echo "<td class='td_table_cars' width=1%>";
                echo "<th class='th_table_cars' width=24%>nr. rej</th>";
                echo "<th class='th_table_cars' width=25%>marka</th>";
                echo "<th class='th_table_cars' width=25%>model</th>";
                echo "<th class='th_table_cars' width=25%>rok</th>";
            echo "</tr>";


        while ($wiersz = $wynik->fetch_assoc()) {
            echo "<tr>";

                    echo "<td class='td_table_cars'><input type=radio name=check_list[] value= $wiersz[id_cars]>";
                    echo "<td class='td_table_cars'>".$wiersz["registration_number"]."</td>";
                    echo "<td class='td_table_cars'>".$wiersz["brand"]."</td>";
                    echo "<td class='td_table_cars'>".$wiersz["model"]."</td>";
                    echo "<td class='td_table_cars'>".$wiersz["production_year"]."</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</br></br><input type=submit name=submit value=Wypożycz>";
    }
    else{
        echo"Sorry...Wszystkie auta są aktualnie wypożyczone";
    }

    $wynik = $conn->query("SELECT * FROM clients");

    //    echo "<form method=post>";
    if ($wynik->num_rows > 0) {

        echo "<table class='table_clients'>";
        echo "<tr>";
        echo "<td class='td_table_clients' width=1%>";
        echo "<th class='th_table_clients' width=24%>Imię</th>";
        echo "<th class='th_table_clients' width=25%>Nazwisko</th>";
        echo "<th class='th_table_clients' width=25%>Pesel</th>";
        echo "</tr>";


        while ($wiersz = $wynik->fetch_assoc()) {
            echo "<tr>";

            echo "<td class='td_table_clients'><input type=radio name=check_list[] value= $wiersz[personal_identity_number]>";
            echo "<td class='td_table_clients'>".$wiersz["name"]."</td>";
            echo "<td class='td_table_clients'>".$wiersz["surname"]."</td>";
            echo "<td class='td_table_clients'>".$wiersz["personal_identity_number"]."</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
    }
    else{
        echo"Sorry...Wszystkie auta są aktualnie wypożyczone";
    }
    ?>
<?php

    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $check_id_cars)
            $conn = new mysqli('localhost', 'root', '', 'rent_cars');

            if (isset($_POST['check_list'])) {
                $submit = $_POST['submit'];
                $query = $conn->query("UPDATE cars SET `rented`= true WHERE `id_cars` =$check_id_cars");
                header("Refresh:0");

            }

        }
?>



</form>
</body>

