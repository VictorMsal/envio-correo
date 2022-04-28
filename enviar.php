<?php
$conn = mysqli_connect("localhost",
        "root",
        "",
        "jd_tae",3310);

// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//El cambio que vamos a subir sera este

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'admin.php';
$mensaje = '<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Recuperar contraseña</title>
  <link rel="stylesheet" href="public/css/styleS.css">
  <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background: #005E90;">
  <form class="login-form">
    <div class="form-group" style="background: #FFFFFF;">
      <label>Ingrese una nueva contraseña: </label>
      <input type="password" id="contrasena" name="contrasena" class="form-control"  placeholder="Contraseña">
    </div>
    <div class="form-group">
      <label>Confirmar la nueva contraseña</label>
      <input type="password" id="ccontrasena" class="form-control" name="ccontrasena" placeholder="Confirmar contraseña">
    </div>
    <div class="form-group" style="text-align: center;">
      <button type="submit" name="submit" class="btn btn-primary" style="width: 50%; justify-content: flex-start; font-size: 18px;">Enviar</button>
    </div>
  </form>
</body>
</html>';

$email = 'vmsalinas678@gmail.com'; 
//$_POST['email'];
$sql = "SELECT * FROM clientes WHERE cl_correo = '$email'";

//$query = mysqli_query($conn,$sql);
//if(mysqli_num_rows($query) > 0){

$mail = new PHPMailer;

$mail->isSMTP();                                      
$mail->Host = 'tls://smtp.gmail.com:587';  
$mail->SMTPAuth = true;                               
$mail->Username = $adminemail;        
$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML       
$mail->Password = $adminpassword;                          
$mail->setFrom('aplicacionJDTAE@gmail.com', 'JD TAE');
$mail->addAddress($email);    

$mail->addReplyTo('aplicacionJDTAE@gmail.com', 'JD TAE');

$mail->Subject = 'Recuperar contraseña para JD Tae';
$mail->Body    = $mensaje;

if(!$mail->send()) {
    echo 'Correo electronico no enviado, verificar';
    
    echo 'Descripcion del error: ' . $mail->ErrorInfo;
} 
//}
else{
    echo "Correo electronico enviado ";
}
?>