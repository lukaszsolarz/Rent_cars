<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
</head>
<style>
    .error {color: #FF0000;}
</style>
<body style="background-color: lightgray">
<h2>Stan wszystkich wypożyczonych aut</h2>

<form name="myForm" onsubmit="validateForm()">
Name:<input name="fname" <input/>
    <br/>
    <br/>
    <input type="submit" value="ok" />

</form>
</body>
</html>


</body>
</html>