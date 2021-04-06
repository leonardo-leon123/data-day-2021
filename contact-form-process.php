<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contacto@dataday.mx";
    $email_subject = "Mensaje enviado desde la Página de Dataday.mx";

    function problem($error)
    {
        echo "Hubo un error al momento de mandar tu mensaje<br>";
        echo "El error al momento de mandar tu mensaje son los siguientes:<br><br>";
        echo $error . "<br><br>";
        echo "Porfavor arregla los errores y vuelve a intentarlo. <br>  <br>";
        echo '<a class="a-link" href="https://dataday.mx/">Regresar a la Página principal</a>';
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('Hubo un error al momento de mandar tu mensaje.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Escribiste un Email NO VÁLIDO.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";



    if (strlen($message) < 2) {
        $error_message .= 'Escribiste un Mensaje NO VÁLIDO O EN BLANCO.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Los Detalles del mensaje:.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Gracias Por Tu Mensaje || Data Day 2021</title>
</head>
<body>
    <section class="Inicio" >
        <nav id="nav" >
            <div>
                <a href="index.html">
                    <img class="logo" src="img/logo.png" alt="logo">
                </a>
            </div>
            <div>
                <a href="index.html" class="logo-title">
                    Data Day 2021
                </a>
            </div>
            <ul class="nav-links">
                <li><a onclick="navSlide()" href="https://dataday.mx/#nosotros">Nosotros</a></li>
                <!-- <li><a onclick="navSlide()" href="#agenda">Agenda</a></li> -->
                <!-- <li><a onclick="navSlide()" href="#ponentes">Ponentes</a></li> -->
                <li><a onclick="navSlide()" href="https://dataday.mx/#patrocinadores">Patrocinadores</a></li> 
                <li><a onclick="navSlide()" href="https://dataday.mx/#contacto">Contacto</a></li>
                <li><a onclick="navSlide()" href="https://dataday.mx/#ayuda">Ayuda</a></li>
                <!-- <li><a onclick="navSlide()" href="#" class="unete-button">Únete</a></li> -->
            </ul>
            <div class="burger" onclick="navSlide()" >
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <div class="gracias-por-tu-mensaje" >
        <center> 
            <h1>¡Gracias por tu Mensaje! </h1>
            <br>
            <h2>Pronto nos pondremos en contacto contigo</h2>
            <div style="height: 50px;" ></div>
            <a class="a-link" href="https://dataday.mx/">Regresar a la Página principal</a>
            <div style="height: 50px;" ></div>
            <h1> ¿Tienes más dudas? Puedes seguirnos en nuestro Instagram </h1>
            <div class="redes-item" >
                <center>
                    <a href="https://www.instagram.com/dataday2021/"><img src="./img/instagram.svg" width="40px" alt=""></a>
                </center>
            </div>  
        </center>  
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/burger.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/timer.js"></script>
    
</body>
</html>
    

<?php
}
?>