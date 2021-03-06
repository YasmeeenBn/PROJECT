<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    session_start();
    $e_id = $_SESSION['e_id'];    
    // $of_id = $_GET['of_id'];

          try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          }
          catch (PDOException $e) {
            die("Impossible de se connecter à la base de données $dbname :" );
          }

              $query = "SELECT et_id, of_id, objet, lettre from lettres_motivation where e_id =:e_id and et_acc = 0";

              $stmt = $conn-> prepare($query);
              // $stmt->bindParam(':of_id', $of_id);
              $stmt->bindParam(':e_id', $e_id);
              $stmt->execute();

              // $contacts = $conn -> query($query);
              $sqlselect = "SELECT count(*) from lettres_motivation where e_id = :e_id";
              
              $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Company</title>
    
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
            <div class="avatarName">Welcome<br> </div>
        </div>

        <ul class="sideMenu">
            <li><a href="http://yas/company_demands/"><span class="fa fa-money"></span>Candidatures</a></li>
            <li><a href="http://yas/company_off_enligne/"><span class="fa fa-money"></span>Offers Posted</a></li>
            <li><a href="http://yas/company_off_id/"><span class="fa fa-money"></span> Accepted Students</a></li>
            <li><a href=""><span class="fa fa-money"></span></a></li>
        </ul>
      
      </div>

    </div>

    <div class="table-responsive-md">
        <table class="table table-hover bot-container">
            <thead>
                <tr class="table-primary">
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Student's ID</th>
                    <th scope="col">Offer's ID</th>
                    <!-- <th scope="col"> Object </th> -->
                    <th scope="col">Message</th>
                    <th scope="col">Decision</th>

                    <!-- <th scope="col">  </th> -->
                </tr>
            </thead>

            <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
            ?> 
            
            <tbody>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td data-label="Student's ID"> <a href="http://yas/student_profile/index.php?id=<?php  echo $row['et_id'] ?>"><?php  echo $row['et_id'] ?> </a></td>
                    <td data-label="Offer's ID"> <?php  echo $row['of_id'] ?> </td>
                    <!-- <td data-label="Object"> <?php  echo $row['objet'] ?> </td> -->
                    <td data-label="Message"> <?php  echo $row['lettre'] ?> </td>

                <td>
                      <a href="editstatus.php?update=<?php echo $row['lettre']; ?>" name ="accept" type="submit" class="btn btn-primary btn-sm"> Accept </a> 
                      <a href="editstatus2.php?update=<?php echo $row['lettre']; ?>" name ="decline" type="submit" class="btn btn-primary btn-sm"> Decline </a> 
                </td> 
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm">Suspend</button></td>   -->
                </tr>
            </tbody>

            <?php
                }
              
         }
    ?>
        </table>
    </div>
      
  </body>
</html>