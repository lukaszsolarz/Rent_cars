<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
</head>

<body>
    <h1>SYSTEM WYPOŻYCZANIA AUT</h1>
    <br />
        <form action = dodaj_wypozyczenie.php method="post">
            <button> Wypożycz</button>
        </form>
    <br />
        <form action =pokaz_auta.php method="post">
            <button> Pokaż wszystkie auta w bazie</button>
        </form>
    <br />
        <form action=pokaz_wypozyczone.php method="post">
            <button> Pokaż aktualnie wypożyczone</button>
        </form>
    <br />

    <form action = dodaj_auto.php method="post">
        <button> Dodaj nowe auto do bazy</button>
    </form>

<?php

require_once "connect.php";
$polaczenie =@new mysqli($host, $username, $password,$dbName); //nazwiazanie polaczenia z baza danych

if( $polaczenie->connect_errno!=0)
{
    echo "blad polaczenia z bazą danych nr: ". $polaczenie->connect_errno;
}
else
{
    //$sql="INSERT INTO cars
    //( brand, model, `production_year`, `capacity`, body, `milage`)
    //VALUES  ('Mazda', '323', 2001, 1.4, 'sedan', 300200)";
    //$rezultat =@$polaczenie->query($sql);
}
$polaczenie ->close();



?>
</body>