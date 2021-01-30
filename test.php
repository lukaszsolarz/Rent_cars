<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
</head>
<script type = "text/javascript">

    function odliczanie()
    {
        var dzisiaj = new Date();

        var dzien  = dzisiaj.getDate();
        var miesiac  = dzisiaj.getMonth()+1;
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

        document.getElementById("zegar").innerHTML=godzina+":"+minuta+":"+sekunda+" ] [ "+dzien+"/"+miesiac+"/"+rok;
        setTimeout("odliczanie()",1000);
    }

</script>
<body onload="odliczanie();">

<div id="zegar"></div>

</body>