<?php
require('php/class.php');
if(strtolower($_SERVER['REQUEST_METHOD'])==='post')
{
  if(isset($_POST['action']))
  {
    if($_POST['action']=='contact_form')
    {
      $name= $_POST['name'];
      $contact= $_POST['contact'];
      $email= $_POST['email'];
      $email=trim($email);
      $emailMessage= $_POST['message'];


        $headers = 'From: Cosmo Dumplings <info@cosmodumplings.co.za>' . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = '';
        $message .= "<!DOCTYPE html>
        <html lang='en'>
        <head>
          <title>Contact Us</title>
          <style>
            .btn{
              padding: 10px 10px;
              background-color: rgb(36, 145, 208);
              color: #fff;
              text-decoration: none;
              border-radius: 5px;
            }
            .main-table{
              background-color: #fff;
              border-radius: 5px;
            }

            .footer{
              background-color: #333;
              padding: 20px 20px;
              color: #fff;
            }
          </style>
        </head>
        <body style='font-family: Vedana,Arial; background-color:#efefef; color:rgb(120, 120, 120); font-size: 12pt;'>

        <center>
          <table border='0' cellpadding='' cellspacing='15' width='500px'><tr><td></td></tr></table>
          <table class='main-table' border='0' cellpadding='15' cellspacing='0' width='500px'>
            <tbody>
            <tr><td align='right'><img src='http://www.cosmodumplings.co.za/img/logo.png' width='120px'/></td></tr>
            <tr>
              <td>
                Hi ".$name."
                <br>
                <br>
                Thanks for contacting Cosmo Dumplings.
                <br>
                <br>
                We'll respond to your message as soon as possible.
                <br>
                <br>
                If you'd like to contact us directly please call 079 135 4311 / 060 572 9779
                <br>
                <br>
                Kind Regards
                <br>
                A2B
                <br>
                <br>
                <br>
                <a href='http://www.cosmodumplings.co.za' class='btn'>Visit our website</a>
                <br>
              </td>
            </tr>
            <tr>
              <td class='footer'>
                <b>Cosmo Dumplings PTY (LTD)</b>
                <br><br>
                info@cosmodumplings.co.za<br>
                Cosmo City, Randburg<br>
                Gauteng, South Africa 9294
              </td>
            </tr>
            </tbody>
          </table>
          <table border='0' cellpadding='' cellspacing='15' width='500px'><tr><td></td></tr></table>
        </center>
        </body>
        </html>";

        $adminmessage = '';
        $adminmessage .= "<!DOCTYPE html>
        <html lang='en'>
        <head>
          <title>Contact Us</title>
          <style>
            .btn{
              padding: 10px 10px;
              background-color: rgb(211, 220, 227);
              color: #fff;
              text-decoration: none;
              border-radius: 5px;
            }
            .btn:hover, .btn:focus{
              padding: 10px 10px;
              background-color: rgb(188, 207, 221);
              color: #eee;
              text-decoration: none;
              border-radius: 5px;
            }
            .main-table{
              background-color: #fff;
              border-radius: 5px;
            }

            .footer{
              background-color: #333;
              padding: 20px 20px;
              color: #fff;
            }
          </style>
        </head>
        <body style='font-family: Vedana,Arial; background-color:#efefef; color:rgb(120, 120, 120); font-size: 12pt;'>

        <center>
          <table border='0' cellpadding='' cellspacing='15' width='500px'><tr><td></td></tr></table>
          <table class='main-table' border='0' cellpadding='15' cellspacing='0' width='500px'>
            <tbody>
            <tr><td align='right'><img src='http://www.cosmodumplings.co.za/img/logo.png' width='120px' /></td></tr>
            <tr>
              <td>
                New mail from website!
                <br>
                <br>
                Details below:
                <br>
                Name: ".$name."<br>
                Contact: ".$contact."<br>
                Email: ".$email."<br>
                Message: ".$emailMessage."
                <br>
                <br>
                <br>
                <a href='http://www.cosmodumplings.co.za' class='btn'>Go to website</a>
                <br>
              </td>
            </tr>
            </tbody>
          </table>
          <table border='0' cellpadding='' cellspacing='15' width='500px'><tr><td></td></tr></table>
        </center>
        </body>
        </html>";

      if(mail("info@cosmodumplings.co.za","Contact Form",$adminmessage,$headers))
      {
        sleep(1);
        mail($email,"Cosmo Dumplings",$message,$headers);
        $_SESSION['messageStatus']='OK';
        $_SESSION['message']='Message sent!';
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']="Failed to send message. Please try again later.";
      }
      header('Location: index.php');
    }
    elseif($_POST['action']=='login')
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $email=trim($email);
      $password=trim($password);
      $response = $Class->clientlogin($email,$password);
      if($response['status']=='true')
      {
        $_SESSION['messageStatus']='OK';
        $_SESSION['message']="Welcome ".$_SESSION['client_session']['username'];
        header('Location: Orders.php');
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']=$response['content'];
        header('Location: index.php');
      }
    }
    elseif($_POST['action']=='register')
    {
      $valid=true;
      $message = "<h4>The following errors occurred:</h4><ul class='list-group'>";
      if(isset($_POST['email']) && $_POST['email']=='')
      {
        $message .="<li>Email</li>";
        $valid=false;
      }
      if(isset($_POST['firstname']) && $_POST['firstname']=='')
      {
        $message .="<li>First Name</li>";
        $valid=false;
      }
      if(isset($_POST['surname']) && $_POST['surname']=='')
      {
        $message .="<li>Surname</li>";
        $valid=false;
      }
      if(isset($_POST['password']) && ($_POST['password']<>$_POST['password1']))
      {
        $message .="<li>Password did not match</li>";
        $valid=false;
      }
      $message .= "</ul>";

      if($valid)
      {
        $email = $_POST['email'];
        $business = $_POST['business'];
        $bankref = $_POST['bankref'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $contact = $_POST['contact'];
        $email=trim($email);

        $response = $Class->clientregister($email,$business,$bankref,$firstname,$surname,$contact);
        if($response['status']=='true')
        {
          $_SESSION['messageStatus']='OK';
          $_SESSION['message']='Your account has been successfully created!';
        }
        else
        {
          $_SESSION['messageStatus']='Error';
          $_SESSION['message']=$response['content'];
        }
        header('Location: index.php');
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']=$message;
        header('Location: register.php');
      }

    }
    elseif($_POST['action']=='listClients')
    {
      $response = $Class->listClients();
      if($response['status']=='true')
      {
        $_SESSION['messageStatus']='OK';
        $_SESSION['message']='Client details captured and mail sent to client';
        header('Location: dashboard.php');
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']=$response['content'];
        header('Location: createAccount.php');
      }

    }
    elseif($_POST['action']=='checkOut')
    {
      $ref = $_POST['ref'];
      $amount = $_POST['amount'];
      $comment = $_POST['comment'];
      $response = $Class->validateClientRef($ref,$amount,$comment);
      if($response['status']=='true')
      {
        $_SESSION['messageStatus']='OK';
        $_SESSION['message']=$response['content'];
        header('Location: checkOut.php?id='.$response['content']['pk']);
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']=$response['content'];
        header('Location: clientZone.php');
      }

    }
    elseif($_POST['action']=='addtocart')
    {
      $flavour_id = $_POST['flavour_id'];
      $bucket_size = $_POST['bucket_size'];
      $qty = ($bucket_size * $_POST['qty']);
      $client_id = $_SESSION['client_session']['id'];
      $response = $Class->addToCart($client_id,$flavour_id,$qty);
      if($response['status']=='true')
      {
        $_SESSION['messageStatus']='OK';
        $_SESSION['message']=$response['results'];
        header('Location: Cart.php');
      }
      else
      {
        $_SESSION['messageStatus']='Error';
        $_SESSION['message']=$response['results'];
        header('Location: Orders.php');
      }
    }
    else
    {
      echo "Action name invalid";
    }
  }
  else
  {
    echo "Please supply a valid action name";
  }
}
else
{
  echo "only post requests";
}
?>