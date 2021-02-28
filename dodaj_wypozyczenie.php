<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Wypozyczalnia - wypożycz</title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<h1>Nie wypożyczone : </h1>

<style>
</style>

<body style="background-color: lightgray">
<form class="form" method="post">

    <?php
    $conn = new mysqli('localhost', 'root', '', 'rent_cars');
    $wynik = $conn->query("SELECT * FROM cars");

    if ($wynik->num_rows > 0) {

        echo "<form method=post>";
        echo "<table class='table_cars'>";
            echo "<tr>";
                echo "<td class='td_table_cars'>";
                echo "<th class='th_table_cars'> nr. rej </th>";
                echo "<th class='th_table_cars'> marka </th>";
                echo "<th class='th_table_cars'> model</th>";
            echo "</tr>";


        while ($wiersz = $wynik->fetch_assoc()) {
            echo "<tr>";

                    echo "<td class='td_table_cars'><input type=radio name=check_list[] value= $wiersz[id_cars]>";
                    echo "<td class='td_table_cars'>".$wiersz["registration_number"]."</td>";
                    echo "<td class='td_table_cars'>".$wiersz["brand"] . "</td>";
                    echo "<td class='td_table_cars'>".$wiersz["model"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</br></br><input type=submit name=submit value=Wypożycz>";
        echo "</form>";
    }


    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $check) {
            echo "id auta: " . $check; //echoes the value set in the HTML form for each checked checkbox.
            //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
            //in your case, it would echo whatever $row['Report ID'] is equivalent to.
        }
    }
    ?>
</form>
</body>

