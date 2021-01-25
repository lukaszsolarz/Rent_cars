<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<body>
<div class="container">
    <div class="logo">
        <h1>Wypożyczalnia Aut1</h1>
    </div>

    <div class="nav">
        <br>
        <form action = dodaj_wypozyczenie.php method="post">
            <button class="button_main_page"> Wypożycz </button>
        </form>
        <br>
        <form action =pokaz_auta.php method="post">
            <button class="button_main_page"> Pokaż wszystkie auta w bazie</button>
        </form>
        <br>

        <form action ="clients.php.php" method="post">
            <button class="button_main_page"> Pokaż klientów</button>
        </form>
        <br>
        
        <form action=pokaz_wypozyczone.php method="post">
            <button class="button_main_page"> Pokaż aktualnie wypożyczone</button>
        </form>
        <br>
        <form  action = dodaj_auto.php method="post">
            <button class="button_main_page"> Dodaj nowe auto do bazy</button>
        </form>
        <br>
        <form action="help.php" method="post" >
            <button class="button_main_page">Pomoc</button>

        </form>
    </div>

</div>

<div class="content" style="text-align: center">
    <h4>Sytem testowy umożliwiający zarządzania wypożyczonymi autami.</h4>
</div>

<div class="ad">reklama
</div>

<div class="footer">
    <h4>Copyright 2020 - Wszelkie prawa zastrzeżone. Designed by Lukasz Solarz</h4>
</div>

</div>

<?php

require_once "connect.php";
$polaczenie =@new mysqli($host, $username, $password,$dbName); //nazwiazanie polaczenia z baza danych

if( $polaczenie->connect_errno!=0)
{
    echo "blad polaczenia z bazą danych nr: ". $polaczenie->connect_errno;
}
else
{
}
$polaczenie ->close();

?>
</body>