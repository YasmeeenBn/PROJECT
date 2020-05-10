<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    if(isset($_POST['submit'])){


         try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
             // echo "Connecté à $dbname sur $host avec succès.";
            } 

            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            $folder ="Downloads/"; 
            $path = $folder . $image ;
            $target_file=$folder.basename($_FILES["of_logo"]["name"]);
            $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
            $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['of_logo']['name']; 

            $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 
            {  
                    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
            }

            else{ 
                  move_uploaded_file( $_FILES['of_logo'] ['tmp_name'], $path); 
                  $sth=$con->prepare("INSERT INTO offre(of_logo) values (:of_logo) "); 
                  $sth->bindParam(':of_logo',$image); 
                  $sth->execute(); 
            } 
      } 



/*
            // insert query
            $sql = "INSERT INTO offre(of_logo) values (:of_logo) ";
            // prepare query for execution
            $stmt = $conn->prepare($sql);
            // posted values
            $of_logo = $_POST['of_logo']; 
            
            // bind the parameters
            $stmt->bindParam(':of_logo', $of_logo);

            if(isset($_POST['submit']))
                  {

                    $imageName = $_FILES["image"];
                    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
                    $imageType = $_FILES["image"]["type"];

                    if(substr($imageType,0,5)=="image")
                    {
                      $conn->prepare("INSERT INTO offre (of_logo) VALUES (" . $conn->quote($of_logo) . ")");                     
                      $dbQuery->execute();
                    }
                    else
                    {
                    echo "only images are allowed";
                    } 
                  }

           
            // Execute the query
            if($stmt->execute()){
                echo json_encode(array('result'=>'success'));
            }else{
                echo json_encode(array('result'=>'fail'));
            }
            var_dump($stmt);
            print_r($stmt->errorInfo());
    }  */
         
    ?> 