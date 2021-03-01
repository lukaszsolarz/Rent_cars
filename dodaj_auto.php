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
            <option value="fiat">Fiat</option>
            <option value="kia">Kia</option>
            <option value="mazda">Mazda</option>
            <option value="mini">Mini</option>
            <option value="mercede">Mercedes</option>
            <option value="opel">Opel</option>
            <option value="porsche">Porsche</option>
            <option value="peugot">Peugot</option>
            <option value="saab">Saab</option>
            <option value="toyota">Toyota</option>
            <option value="volkswagen">Volkswagen</option>
            <option value="Volvo">volvo</option>
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
        <option value="1.1">1.1</option>
        <option value="1.2">1.2</option>
        <option value="1.3">1.3</option>
        <option value="1.4">1.4</option>
        <option value="1.5">1.5</option>
        <option value="1.6">1.6</option>
        <option value="1.7">1.7</option>
        <option value="1.8">1.8</option>
        <option value="1.9">1.9</option>
        <option value="2.0">2.0</option>
        <option value="2.1">2.1</option>
        <option value="2.2">2.2</option>
        <option value="2.3">2.3</option>
        <option value="2.4">2.4</option>
        <option value="2.5">2.5</option>
    </select> *
    </div>
    <br>
    <div>
    <label for = "years_production"> Rok produkcji </label>
    <select name="years_production" id="id_years_production" required> *
        <option value=""></option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>


    </select> *
    </div>
    <br>
    <div>
    <label for = "label_body"> Rodzaj nadwozia</label>
    <select name="body" id="Rodzaj nadwozia" required>
        <option value = ""></option>
        <option value = "coupe">Coupe</option>
        <option value = "kombi">Kombi</option>
        <option value = "hatchback">Hatchback</option>
        <option value = "sedan">Sedan</option>
        <option value = "suv">SUV</option>
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
<form action="pokaz_auta.php" method="post" >
    <button name="show_cars" style="color:darkcyan; padding: 7px;">Pokaż wszystkie auta w bazie</button>
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

    $conn = new mysqli('localhost', 'root', '', 'rent_cars');

    $wynik=$conn ->query ("INSERT INTO cars  (brand,model,production_year,capacity,body,milage,registration_number)
    VALUES ('$mark','$model','$years_production','$capacity','$body','$mileage','$registration_number')");

    if (mysqli_error($conn)==""){

        echo('<h3 style ="color:steelblue ;">Nowe auto'." ".$_POST['mark']." ".$_POST['model']." ".'zostało dodane do bazy. </h3>');
    }
    else {
          echo('<h3 style="color:indianred ;">Coś poszło nie tak... : </h3>'. mysqli_error($conn));
    }
}

?>

</body>

</html>