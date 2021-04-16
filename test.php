<!DOCTYPE HTML>
<htmlnlang = "pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> WYPOZYCZALNIA AUT </title>
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

<div id="ex2" class="ex">
  <h5>Ex2 - Validation</h5>
  <input type="text" id="ex2_text" placeholder="phone number" />
  <div id="ex2_content"></div>
</div>

</body>
