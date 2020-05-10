<?php

$host = 'localhost';
$dbname = 'pfa';
$username = 'root';
$password = '';


		try {
		  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		 // echo "Connecté à $dbname sur $host avec succès.";
		} 

		catch (PDOException $e) {
		  die("Impossible de se connecter à la base de données $dbname :" );
		}

		if(isset($_REQUEST['btn_insert']))
		{
			try
			{
		             $name	= $_REQUEST['txt_name'];	//textbox name "txt_name"
                  
					 $image_file	= $_FILES["txt_file"]["name"];
					 $type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
					 $size		= $_FILES["txt_file"]["size"];
					 $temp		= $_FILES["txt_file"]["tmp_name"];
					 
					 $path="upload/".$image_file; //set upload folder path
					
					 if(empty($image_file)){
					   $errorMsg="Please Select Image";
					 }
					 else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
					 {	
					   if(!file_exists($path)) //check file not exist in your upload folder path
					   {
						 if($size < 5000000) //check file size 5MB
						 {
						   move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
						 }
						 else
						 {
						   $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
						 }
					   }
						else
					   {	
						 $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
					   } 
					 }
					 else
					 {
					   $errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
					 }
					 
					 if(!isset($errorMsg))
					 {
					   $insert_stmt=$conn->prepare('INSERT INTO offer(of_logo) VALUES(:of_logo)'); //sql insert query	
					   $image_file = $_POST['of_logo'];				
					   $insert_stmt->bindParam(':of_logo',$image_file);	  //bind all parameter 
					 
					   if($insert_stmt->execute())
					   {
						 $insertMsg="File Upload Successfully........"; //execute query success message
						 header("refresh:3;Company_offer\info-img\index.php"); //refresh 3 second and redirect to index.php page
					   }
					}
		}
		
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}

			var_dump($insert_stmt);
            print_r($insert_stmt->errorInfo());
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Font Styles-->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Kalam:wght@300&family=Lato&display=swap" rel="stylesheet"> <!--Courgette-->
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>  <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&family=Lobster+Two&display=swap" rel="stylesheet"> <!--Losbter Two & Baloo 2-->

    <!--CSS stylesheets-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/6a5ed842d1.js" crossorigin="anonymous"></script>

    <!--Favicon-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <title> Offer's details</title>
		
</head>

	<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark">

				<a class="navbar-brand" href="">IwimStages</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="">Home</a>
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
						<a class="nav-link" href="">Contact Us</a>
					</li>
				</ul>

				</div>
</nav>

<div class="bg" >

<div class="container" >

  <form id="contact" method="POST" enctype="multipart/form-data">

	<div class="title">
	  <h3> Last STEP - Your Company's LOGO </h3>
	</div>

	
		  <div class="title">     
			<h2>  yas </h2>   <!-- just to have space -->
			<h5> Upload Your LOGO </h5>
			<h2>  yas </h2>    <!-- just to have space -->
		  </div>


		<fieldset>
		<form>
  <label for="field-image">Upload image</label>
  <div class="file-upload">
    <input id="field-image" name="fields[image][value]" type="file" required="required">
    <button>Select File</button>
    <span class="file-info"></span>
  </div>
</form>
		</fieldset>

			<p class="other">Plateform ENSIAS <a href="homepage\index.html" target="_blank" title="IWIMSTAGES">IWIMSTAGES</a></p>
						
</form>

</div>
</div>
</body>
	
<!--	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">

			<form method="post" class="form-horizontal" enctype="multipart/form-data">
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>  -->
										
	</body>
</html>