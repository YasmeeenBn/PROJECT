<?php
$host = 'localhost';
$dbname = 'pfa';
$username = 'root';
$password = '';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }
        catch (PDOException $e) {
            die("Impossible de se connecter à la base de données $dbname :" );
        }
        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $student_email = $_POST['et_email'];
            $message = $_POST['message'];

            $email_from = 'zouhair.ghazi1999@gmail.com';

            $email_subject = "New Form Submission";

            $email_body = "$message";   
            
            $to = "yasminebenomar3@gmail.com";

            $headers = "From : $email_from\r\n";

            $headers .= "Reply-To : $student_email\r\n";

            mail($to, $email_subject, $email_body, $headers);

            // header("Location: index.html");
        }
           
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    
    <!-- stylesheet css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/master.css">
  </head>

  <body>

    <div class="top-container">
      <!--     SIDE AREA -->
      <div class="sideArea">

        <div class="avatar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCNOdyoIXDDBztO_GC8MFLmG_p6lZ2lTDh1ZnxSDawl1TZY_Zw" alt="">
            <div class="avatarName">Welcome,<br>Mr.Zellou</div>
        </div>

        <ul class="sideMenu">

            <li><a href="http://yas/Ad_Students_Active/"><span class="fa fa-money"></span>Active Students</a></li>
            <li><a href="http://yas/Ad_Students_Suspended/"><span class="fa fa-money"></span>Suspended Stud</a></li>
            <li><a href="http://yas/Ad_offers/"><span class="fa fa-money"></span>Offers Accepted</a></li>
            <li><a href="http://yas/Ad_demands/"><span class="fa fa-user-o"></span>Demands</a></li>
            <li><a href="http://yas/Admin_Contact/"><span class="fa fa-envelope-o"></span>Contact Users</a></li>
            <li><a href="log_out.php"><span class="fa fa-envelope-o"></span>Log Out</a></li>
        </ul>
        
      </div>

    </div>

    <div class="header">
      <h1>Send an email to a student using our interface</h1>
    </div>

    <div class="contact">
      <form action="">
        <div class="form-group" style="width: 35%;">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="To" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Email of your contact</small>
        </div>
        <div class="form-group" style="width: 60%;">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Subject">
          <small id="emailHelp" class="form-text text-muted">Subject of your email</small>
        </div>
        <div class="form-group" style="width: 60%;">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
      
  </body>

</html>