<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<body class=body onload="odliczanie()";>

<div class="container">

    <div class="logo">
        <h1>Wypożyczalnia Aut</h1>
    </div>

    <div class="clock" id="zegar" ></div>

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

<div class="content">
    <h3>Aktualnie wypożyczone: </h3>
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
<script type = "text/javascript">

    function odliczanie()
    {
        var dzisiaj = new Date();

        var dzien  = dzisiaj.getDate();
        if(dzien<10)
            dzien="0"+dzien;
        var miesiac  = dzisiaj.getMonth()+1;
        if(miesiac<10)
            miesiac="0"+miesiac;
        var rok  = dzisiaj.getFullYear();

        var godzina = dzisiaj.getHours();
        if (godzina <10)
            godzina ="0"+godzina;
        var minuta = dzisiaj.getMinutes();
        if (minuta <10)
            minuta ="0"+minuta;
        var sekunda = dzisiaj.getSeconds();
        if (sekunda <10)
            sekunda ="0"+sekunda;

        document.getElementById("zegar").innerHTML=godzina+":"+minuta+":"+sekunda+" <br>"+dzien+"."+miesiac+"."+rok;
        setTimeout("odliczanie()",1000);
    }

</script>
</body>