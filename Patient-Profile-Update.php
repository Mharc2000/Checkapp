<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkapp - Profile update</title>
	<link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include("Patient-session.php");
include("config.php");


if(isset($_POST['btn-upload']))
	{ 
    $Patient_ID= $_SESSION['Patient_ID'];

	 $file = rand(1000,100000)."-".$_FILES['file']['name'];
	 $file_loc = $_FILES['file']['tmp_name'];
	 $folder="Patient_uploads/";
	 
	 // new file size in KB
	 //$new_size = $file_size/1024;  
	 // new file size in KB
	 
	 // make file name in lower case
	 $new_file_name = strtolower($file);
	 // make file name in lower case
	 
	 $final_file=str_replace(' ','-',$new_file_name);
	 
	 if(move_uploaded_file($file_loc,$folder.$final_file))
	 {
	  $sql = "UPDATE patient_record SET Photo='$final_file' WHERE Patient_ID = '$Patient_ID'";
	  $result = $connect->query($sql);
	  
	  ?>
		<script>
            swal({
            title: "Profile Photo Updated!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='Patient-Profile.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>
	  <?php
	 }
	 else
	 {
	  
	  ?>
	  <script>
		  swal({
		  title: "Error while uploading file",
		  icon: "error"
		  }).then(function() {
		  // Redirect the user
		  window.location.href='Patient-Profile.php';
		  console.log('The Ok Button was clicked.');
					  });
	  </script>
	<?php
	 }
	}



	if (isset($_POST['submit'])) {
    
		$Patient_ID = $_SESSION['Patient_ID'];
		$FirstName = $_POST['FirstName'];
		$MiddleName = $_POST['MiddleName'];
		$LastName = $_POST['LastName'];
		$Birthdate = $_POST['Birthdate'];
		$Age = $_POST['Age'];
		$Gender = $_POST['Gender'];
		$Contact_No = $_POST['Contact_No'];
		$Civil_Status = $_POST['Civil_Status'];
		$Province= $_POST['Province'];
		$City= $_POST['City'];
	   
		 
		$sql = "UPDATE patient_record SET FirstName='$FirstName', MiddleName='$MiddleName', LastName='$LastName', Birthdate='$Birthdate', Age='$Age', Gender='$Gender'
		, Contact_No='$Contact_No' ,Civil_Status='$Civil_Status', Province='$Province', City='$City'  WHERE Patient_ID = '$Patient_ID'";
	}     
	
	if(mysqli_query($connect, $sql)){
		?>
		<script>
            swal({
            title: "Updated successfully!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='Patient-Profile.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>
	  <?php

	

}



       

?>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>   
</body>
</html>