<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>
<h1>Dodaj nowe auto do bazy</h1>

<style>
    .error {color: #ff3c00;
</style>


<body style="background-color: lightgray">

<form class="form" method="post">
    <div class="form-row">
        <label for="name">Numer rejestracyjny </label>
        <input type="text"  name="registration_number" required> *
    </div>
    <br>
    <div class="form-row">
        <label for="mark" >Marka: </label>
        <select name="mark" id="id_marka" required>
            <option value=""></option>
            <option value="toyota">Toyota</option>
            <option value="mini">Mini</option>
            <option value="porsche">Porsche</option>
            <option value="saab">Saab</option>
            <option value="volkswagen">Volkswagen</option>
            <option value="audi">Audi</option>
        </select> *
    </div>
    <br>
    <div class="form-row">
        <label for="model">Model: </label>
        <input type="text"  name="model"  required> *
    </div>
    <br>
    <div class="form-row">
        <label for="mileage">Przebieg: </label>
        <input type="text"  name="mileage"  required> *
    </div>
    <br>
    <div>
    <label for = "capacity"> Pojemność </label>
    <select name="capacity" id="Pojemnosc" required>
        <option value=""></option>
        <option value="0.8">0.8</option>
        <option value="0.9">0.9</option>
        <option value="1.0">1.0</option>
    </select> *
    </div>
    <br>
    <div>
    <label for = "years_production"> Rok produkcji </label>
    <select name="years_production" id="id_years_production" required> *
        <option value=""></option>
        <option value="1996">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1997">1998</option>
        <option value="1997">1999</option>
    </select> *
    </div>
    <br>
    <div>
    <label for = "label_body"> Rodzaj nadwozia</label>
    <select name="body" id="Rodzaj nadwozia" required>
        <option value = ""></option>
        <option value = "kombi">Kombi</option>
        <option value = "sedan">Sedan</option>
        <option value = "hatchback">Hatchback</option>
        <option value = "suv">SUV</option>
        <option value = "coupe">Coupe</option>
        <option value = "van">Van</option>
    </select> *
    </div>
    <br>
    <div class="form-message"></div>
    <div class="form-row">
        <br>
        <button type="submit" name="button" class="button submit-btn"  style="color: #008000; padding: 7px">
            Dodaj
        </button>
    </div>
</form>

<script>
    const form = document.querySelector("form");
    const inputRegistrationNumber = form.querySelector("input[name=registration_number]");
    const inputModel = form.querySelector("input[name=model]");
    const inputMileage = form.querySelector("input[name=mileage]");
    const inputMark = form.querySelector("select[name=mark]");
    const inputCapacity = form.querySelector("select[name=capacity]");
    const inputYearsProduction = form.querySelector("select[name=years_production]");
    const inputBody = form.querySelector("select[name=body]");
    const formMessage = form.querySelector(".form-message");

    form.setAttribute("novalidate", true);

    form.addEventListener("submit", e => {
        e.preventDefault();

        let formErrors = [];

//-------------------------
//2 etap - sprawdzamy poszczególne pola gdy ktoś chce wysłać formularz
//-------------------------
        if (!inputRegistrationNumber.checkValidity()) {
            formErrors.push("Numer rejestracyjny");
        }
        if (!inputMark.checkValidity()) {
            formErrors.push("Marka");
        }

        if (!inputModel.checkValidity()) {
            formErrors.push("Model");
        }
        if (!inputMileage.checkValidity()) {
            formErrors.push("Przebieg");
        }

        if (!inputCapacity.checkValidity()) {
            formErrors.push("Pojemność");
        }
        if (!inputYearsProduction.checkValidity()) {
            formErrors.push("Rok produkcji");
        }
        if (!inputBody.checkValidity()) {
            formErrors.push("Rodzaj nadwozia");
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
if (isset($_POST['mark'])) {
    $mark = $_POST['mark'];

}if (isset($_POST['model'])) {
    $model = $_POST['model'];

}if (isset($_POST['capacity'])) {
    $capacity = $_POST['capacity'];

}if (isset($_POST['years_production'])) {
    $years_production = $_POST['years_production'];

}if (isset($_POST['body'])) {
    $body = $_POST['body'];

}if (isset($_POST['registration_number'])) {
    $registration_number = $_POST['registration_number'];

}if (isset($_POST['mileage'])) {
    $mileage = $_POST['mileage'];

//echo $registration_number."<br/>";
//echo $model."<br/>";
//echo $mileage."<br/>";
//echo $brand."<br/>";
//echo $capacity."<br/>";
//echo $years_production."<br/>";
//echo $body."<br/>";


    $conn = new mysqli('localhost', 'root', '', 'rent_cars');

    $wynik=$conn ->query ("INSERT INTO cars  (brand,model,production_year,capacity,body,milage,registration_number)
    VALUES ('$mark','$model','$years_production','$capacity','$body','$mileage','$registration_number')");

    if (mysqli_error($conn)==""){
        echo('<h3 style ="color:steelblue ;">Nowe auto'." ".$_POST['mark']." ".$_POST['model']." ".'dodane do bazy. </h3>');
    }
    else {
          echo('<h3 style="color:indianred ;">Coś poszło nie tak... : </h3>'. mysqli_error($conn));
    }
}

?>
</body>
</html>