<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
	<link rel="stylesheet" href="../View/css/welcome.css">
</head>
<body>
 
	<?php
	/// redirect login for no session
	session_start();
	if(!isset($_SESSION['s_id']))
		header("location:../");

	// header file.
	 $page = 'welcome';
	 include('../View/html/header.php');
 	 include('../Model/dbwelcome.php');
 


			// fetch profile data
            $profile_id = $_SESSION['s_id'];
  
            $profile_data = getProfileData($profile_id);
            for ( $i = 0; $i < count($profile_data); $i++)
            { 
                    if($profile_data[$i]["Username"] == $profile_id)
                    {
                        $Firstname = $profile_data[$i]['Firstname'];
                        $Lastname = $profile_data[$i]['Lastname'];
                        $Gender = $profile_data[$i]['Gender'];
                        $Email = $profile_data[$i]['Email'];
                        $Username = $profile_data[$i]['Username']; 
                    }
            }

            
 	?>
	 

	<div class="body">
	 <div class="container">
	 	<div class="card">
	 		<div class="box">
	 			<div class="content">
	 				<a href="#">Welcome  <?php echo $Username ?></a>
	 				<a href="#">Type : Customer</a>
	 				<a href="#">Email : <?php echo $Email ?></a>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 </div>
	
 
 


 	<?php
 	// footer file.
	include('../View/html/footer.html');
	?>
	

	
</body>
</html>