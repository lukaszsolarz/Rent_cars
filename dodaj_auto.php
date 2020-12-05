<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wypozyczalnia - pokaż auta</title>
</head>


<style>
    .error {color: #ff3c00;
</style>


<body style="background-color: lightgray">

<form class="form" method="post">
    <div class="form-row">
        <label for="name">Numer rejestracyjny </label>
        <input type="text"  name="reg_number" required> *
    </div>
    <br>
    <div class="form-row">
        <label for="email">Model: </label>
        <input type="text"  name="model"  required> *
    </div>
    <br>
    <div class="form-row">
        <label for="milage">Przebieg: </label>
        <input type="text"  name="milage"  required> *
    </div>
    <br>


    <div class="form-row">
        <label for="mark" >Marka: </label>
        <select name="select_marka" id="id_marka" required>
            <option value=""></option>
            <option value="toyota">Toyota</option>
            <option value="porsche">Porsche</option>
            <option value="saab">Saab</option>
            <option value="volkswagen">Volkswagen</option>
            <option value="audi">Audi</option>
        </select> *
    </div>
    <br>
    <div>
    <label for = "capacity"> Pojemność </label>
    <select name="select_capacity" id="Pojemnosc" required>
        <option value=""></option>
        <option value="0.8">0.8</option>
        <option value="0.9">0.9</option>
        <option value="1.0">1.0</option>
    </select> *
    </div>
    <br>
    <div>
    <label for = "years_production"> Rok produkcji </label>
    <select name="select_years_production" id="id_years_production" required> *
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
    <select name="select_body" id="Rodzaj nadwozia" required>
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
        <button type="submit" class="button submit-btn">
            Wyślij
        </button>
    </div>
</form>








<!--    <br/>-->
<!--//   <input style="padding: 5px" type="submit" value="Dodaj auto" id="button" />//onclick="validateForm()"/>-->
<!--    <br/>-->
<!--    <br/>-->


<script>
    const form = document.querySelector("form");
    const inputRegNumber = form.querySelector("input[name=reg_number]");
    const inputModel = form.querySelector("input[name=model]");
    const inputMileage = form.querySelector("input[name=milage]");
    const inputMark = form.querySelector("select[name=select_marka]");
    const inputCapacity = form.querySelector("select[name=select_capacity]");
    const inputYearsProduction = form.querySelector("select[name=select_years_production]");
    const inputBody = form.querySelector("select[name=select_body]");
    const formMessage = form.querySelector(".form-message");

    form.setAttribute("novalidate", true);

    form.addEventListener("submit", e => {
        e.preventDefault();

        let formErrors = [];

//-------------------------
//2 etap - sprawdzamy poszczególne pola gdy ktoś chce wysłać formularz
//-------------------------
        if (!inputRegNumber.checkValidity()) {
            formErrors.push("Numer rejestracyjny");
        }

        if (!inputModel.checkValidity()) {
            formErrors.push("Model");
        }
        if (!inputMileage.checkValidity()) {
            formErrors.push("Przebieg");
        }
        if (!inputMark.checkValidity()) {
            formErrors.push("Marka");
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
</body>
<!--//-->
<!--//$brand=isset($_POST['select_marka']);-->
<!--//$model=isset($_POST['model']);-->
<!--//$capacity=isset($_POST ['select_capacity']);-->
<!--//$years_production=isset($_POST['select_years_production']);-->
<!--//$body=isset($_POST['select_body']);-->
<!--//$registration_number=isset($_POST['registration_number']);-->
<!--//$mileage=isset($_POST['mileage']);-->
<!---->
<!---->
<!--//echo $brand."<br/>";-->
<!--//echo $model."<br/>";-->
<!--//echo $years_production."<br/>";-->
<!--//echo $capacity."<br/>";-->
<!--//echo $body."<br/>";-->
<!--//echo $registration_number."<br/>";-->
<!--//echo $mileage."<br/>";-->
<!--//-->
<!--//$sql="INSERT INTO cars  (brand,model,production_year,capacity,body,milage,registration_number)-->
<!--//VALUES ('$marka','$model','$years_production','$capacity','$body','$mileage','$registration_number')"; */-->
<!---->
<!--//$sql="INSERT INTO test (kolumna1) VALUES ($name)";-->
<!---->
<!--//$conn = new mysqli('localhost', 'root', '', 'rent_cars');-->
<!--//$wynik=$conn ->query("INSERT INTO cars  (brand,model,production_year,capacity,body,milage,registration_number)-->
<!--//VALUES ('$brand','$model','$years_production','$capacity','$body','$mileage','$registration_number')");-->
<!--//echo("Error database: " . mysqli_error($conn));-->
<!--//-->
<!--//-->
<!--//?>-->
<!---->
<!--</body>-->
<!---->
<!---->
</html>