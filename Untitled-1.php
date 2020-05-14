<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $et_id = $_GET['id'];

            try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            //  echo "Connecté à $dbname sur $host avec succès.";

              $query = "SELECT et_nom, et_prenom, et_naissance, et_tele, et_email, et_annee from etudiant where et_id := et_id";
                $stmt = $conn-> prepare($query);
                $result = $stmt->execute();

                $sqlselect = "SELECT count(*) from offre";

                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
                //to get the same person

            } 
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" type="text/js" href="stylesheet.js">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Profile</title>

	<!--Lato external font from google-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <title> PROFILE </title>
</head>

<body>
<div class="header">  <!-- doit etre changee car l'etudiant doit acceder au offres de la nav bar -->

        <nav class="navbar navbar-expand-lg navbar-dark">

        <a class="navbar-brand" href="">IwimStages</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="  ">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="  ">Contact Us</a>
                </li>
            </ul>

        </div>

        </nav>

</div>

        

</body>
</html>


<div id="mainwrap">

            <header>
            <ul id="menu">
                <li><a class="profile" href="#profile" title="Profile">Profile</a><span>My Informations </span></li>

                <li><a class="profile" href="#profile" title="Profile">My CV </a><span> </span></li>

                <li><a class="contact" href="#contact" title="Contact">Contact Me</a><span> Get in touch</span></li>
            </ul>
            </header>
            
            <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                
            ?> 

            <div style="clear:both"></div>
            <div id="content">
            <div id="profile" class="section">
                <div class="column col3">
                <table id="bioinfo">
                    <form action="" method="post">
                        <tbody>
                        <tr>
                            <td class="odd">Name</td>
                            <td class="even"> <?php  echo $row['et_prenom']?> </td>
                        </tr>
                        <tr>
                            <td class="odd">Last name</td>
                            <td class="even"> <?php  echo $row['et_nom']?> </td>
                        </tr>
                        <tr>
                            <td class="odd">Date of birth</td>
                            <td class="even"> <?php  echo $row['et_naissance']?> </td>
                        </tr>
                        <tr>
                            <td class="odd">My current Year</td>
                            <td class="even"> <?php  echo $row['et_annee']?> </td>
                        </tr>
                        <tr>
                            <td class="odd">My email </td>
                            <td class="even"> <?php  echo $row['et_email']?> </td>
                        </tr>
                        <tr>
                            <td class="odd">My Phone number</td>
                            <td class="even"> <?php  echo $row['et_tele']?> </td>
                        </tr>
                        </tbody>
                    </form>
                </table>

                </div>
                <div class="column col5 pl-50">
                <!-- <img src="http://img2.wikia.nocookie.net/__cb20100920201409/spongebob/images/a/a0/Sandy_Cheeks.svg" alt="Jane Medford" /> -->
                <p>  </p>
                <p> </p>
                </div>
            </div>

    <?php
        }
    ?>
        

            <div id="contact" class="section">

                        <div class="column col5 pl-50">
                            <h3>Send a message</h3>
                            <form id="contactform">
                                <p class="column col4"><label for="name">Name:</label><input type="text" name="name" id="name" /></p>
                                <p class="column col4"><label for="email">E-mail:</label><input type="text" name="email" id="email" /></p>
                                <p class="column col8"><label for="message">Message:</label><textarea rows="5" name="message" id="message"></textarea></p>
                                <p class="column col8"><input class="button" type="button" value="Submit" /></p>
                            </form>
                        </div>
            </div>
            </div>

            <div id="footer">
                 &copy; Plateform ENSIAS 
            </div>
            
        </div>