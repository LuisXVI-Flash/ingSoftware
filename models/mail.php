<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("./models/PHPMailer/Exception.php");
require_once("./models/PHPMailer/PHPMailer.php");
require_once("./models/PHPMailer/SMTP.php");
$idp=0;
$idp=$_GET['id'];
$instancia = conexion::obtenerconexion();
$resultadoa = mysqli_query($instancia, "SELECT  c.correo, p.pac, p.id FROM  producto p,clientes c,solicitud s WHERE  c.idcliente=s.idcliente and s.idproducto=$idp");
if($row = mysqli_fetch_array($resultadoa)){
   
    $correo=$row[0];
    $pac=$row[1];
    $idpac=$row[2];
}
$mail = new PHPMailer(true);
    try{
      $mail->SMTPDebug=0;
      $mail->isSMTP();
      $mail->Host='smtp.gmail.com;smtp.live.com';
      $mail->SMTPAuth=true;
      $mail->Username='teca.peru.web@gmail.com';
      $mail->Password='3691144f';
      $mail->SMTPSecure='tls';
      $mail->Port=587;
      $mail->SetFrom('teca.peru.web@gmail.com','TECA PERU');
      $mail->addAddress($correo);
      $mail->isHTML(true);
      $mail->Subject='TECA-Solicitud de activacion';
      $mail->Body ='
      
      <html>
      <body>
        <h1 align="center" style="background-color:rgba(3,190,237,255);front-size: 30px;">TECA PERU</h1>
      </body>

      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>               
                <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>  <h1>                      
                        SU EQUIPO HA SIDO ATENDIDO!
                        </td></h1>
                        
                    </tr>

                    <tr>
                        <td><h2>
                        PAC: '.$pac.'
                        </td></h2>
                        
                    </tr>

                    <tr>
                        <td><h2>
                        ID: '.$idpac.'
                        </td></h2>
                        
                    </tr>       

                </table>               
            </td>
        </tr>
    </table>

</html>

      
      ';

      $mail->send();
     // echo 'El mensaje se envio correctamente';
      
    }catch(Exception $e){
       // echo 'Hubo un error al enviar el mensaje: ',$mail->ErrorInfo;
    }
    
    
    
    ?>