<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>
<h1>Dodaj nowego klienta</h1>

<body style="background-color: lightgray">

<form name="form" method="post">
    <label for="name">Imie: </label>
    <input type="text"  name="name" required> *
    <br><br>
    <label for="name">Nazwisko: </label>
    <input type="text"  name="surname" required> *
    <br><br>
    <label for="name">Nr. dowodu: </label>
    <input type="text"  name="identityNumber" required> *
    <br><br>
    <div class="form-message"></div>
    <button type="submit" name="button" class="submit-btn" >Dodaj</button>
    </div>

</form>
<br>
<form action="pokaz_klientow.php" method="post">
    <button>Pokaż klientów</button>
</form>

<script>
    const form = document.querySelector("form[name=form]");
    const inputName = form.querySelector("input[name=name]");
    const inputSurname = form.querySelector("input[name=surname]");
    const identityNumber = form.querySelector("input[name=identityNumber]");

    const formMessage = form.querySelector(".form-message");

    form.setAttribute("novalidate", true);

    form.addEventListener("submit", e => {
        e.preventDefault();

        let formErrors = [];

//2 etap - sprawdzamy poszczególne pola gdy ktoś chce wysłać formularz

        if (!inputName.checkValidity()) {
            formErrors.push("Imię");
        }    if (!inputSurname.checkValidity()) {
            formErrors.push("Nazwisko");
        }    if (!identityNumber.checkValidity()) {
            formErrors.push("Nr. dowodu");
        }

        if (!formErrors.length) { //jeżeli nie ma błędów wysyłamy formularz
            e.target.submit();
        } else {
//jeżeli jednak są jakieś błędy...
            formMessage.innerHTML = `
<h3 class="form-error-title">Uzupełnij wymagane pola: </h3>
<ul class="form-error-list" style="color: orangered">
    ${formErrors.map(el => `<li>${el}</li>`).join("")}
</ul>
`;
        }
    });

</script>

<?

if (isset($_POST['name'])) {
    $name = $_POST['name'];

    if (isset($_POST['surname'])) {
        $surname = $_POST['surname'];

    }
    if (isset($_POST['identityNumber'])) {
        $identityNumber = $_POST['identityNumber'];


        $conn = new mysqli('localhost', 'root', '', 'rent_cars');

        $wynik = $conn->query("INSERT INTO clients  (name,surname,personal_identity_number)
    VALUES ('$name','$surname','$identityNumber')");


        if (mysqli_error($conn) == "") {
            echo('<div id="info">
                    <p>
                    <span style="color: rgba(61,54,54,0.91); font-size:medium;">Nowy klient </span><span style="color: #018615; font-size: x-large;text-transform: capitalize ">' .$name." ".$surname. '</span><span style="color: rgba(61,54,54,0.91);font-size: medium"> prawidłowo dodany</span>
                    </p>');

        }
        if (mysqli_error($conn) !== "") {
            if (strpos(mysqli_error($conn), 'Duplicate entry') !== false) {
                echo('<h3 style ="color:#cd5c5c; ">Wpis nie został dodany, podany numer  dowodu istnieje już w bazie</h3>');
            } else {
                echo('<h3 style="color:#cd5c5c ;">Coś poszło nie tak... : </h3>' . mysqli_error($conn));
            }
        }
    }

}
?>

</body>

</html>
