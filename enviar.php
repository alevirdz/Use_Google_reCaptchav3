<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<?php 

$nombre = $_POST['name'];
$email = $_POST['email'];
$token = $_POST['token'];



$pivate_key="6LdX3-EZAAAAAEKnt6PKZtCv-wP0IfUkKNitzyxx";

// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $pivate_key, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
$arraycapcha=var_dump($arrResponse);


// verify the response
if($arrResponse["success"] == '1' ) {
    echo '<div class="alert alert-warning" role="alert">'.'Nombre registrado: '.$nombre.'</div><br>';
    echo '<div class="alert alert-warning" role="alert">'.'Correo recibido: '.$email.'</div><br>';
    echo '<div class="alert alert-success" role="alert">'.'TOKEN: '.$token.'</div>';
} else {
    // spam submission
    // show error message
    echo "Error";
}