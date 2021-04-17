<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
    <form>
        <input type="text" pattern="^+[4]{1}\[8]{1}$" placeholder="+48 123 123 123" required>kod</input>
        <button type="submit">ok</button>

    </form>
</head>

<body>
<script>
    $numer = $_POST['numer'];
    if(strlen($numer)!=9 && !is_int($numer))
    {
        $udana_rejestracja = false;
        $_SESSION['e-numer'] = "Wpisz poprawny numer telefonu!";
    }

</script>


</body>
