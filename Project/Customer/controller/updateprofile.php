 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Update Profile</title>
    <link rel="stylesheet" href="../View/css/updateprofile.css?v <?php echo time(); ?>">
    <script src="../View/js/updateprofile.js"></script>

 </head>
 <body>

 
 	<?php

     /// redirect login for no session
    session_start();
    if(!isset($_SESSION['s_id']))
        header("location:../");

    // header file.
    $page = 'updateprofile';
    include('../View/html/header.php');
    include('../Model/dbupdateprofile.php');
  
  $updateSuccess = "";
  $updateFailed = "";
  $Password_not_match = "";
  $isValid = true;

  $Firstname = "";
  $Lastname = "";
  $Gender = "";
  $DOB = "";
  $Phone = "";
  $Email = "";
  $Username = "";
  $Password = "";
  $PasswordAgain = "";

  $FirstnameErr = $LastnameErr = $GenderErr = $DOBErr = "";
  $PhoneErr = "";
  $EmailErr = $UsernameErr = $PasswordErr = $PasswordAgainErr = "";





            // fetch profile data
            session_start();
            $profile_id = $_SESSION['s_id'];
  
            $profile_data = getProfileData($profile_id);
            for ( $i = 0; $i < count($profile_data); $i++)
            { 
                    if($profile_data[$i]["Username"] == $profile_id)
                    {
                         
                        $Firstname = $profile_data[$i]['Firstname'];
                        $Lastname = $profile_data[$i]['Lastname'];
                        $Gender = $profile_data[$i]['Gender'];
                        $DOB = $profile_data[$i]['DOB'];
                        $Phone = $profile_data[$i]['Phone'];
                        $Email = $profile_data[$i]['Email'];
                        $Username = $profile_data[$i]['Username'];
                        $Password = $profile_data[$i]['Password'];
 

                        
                        $_SESSION['s_profile_id'] = $Username;// proflie id can't be change
                    }
            }



 	if ($_SERVER['REQUEST_METHOD'] === "POST")
 	{
	 
            $Firstname = $_POST['Firstname'];
            $Lastname = $_POST['Lastname'];
            $Gender = $_POST['Gender'];
            $DOB = $_POST['DOB'];
            $Phone = $_POST['Phone'];
            $Email = $_POST['Email'];
            $Username = $_POST['Username'];
             

             if(empty($Firstname))
               {
                  $FirstnameErr = "Firstname can not be empty.";
                  $isValid = false;
               }
             if(strlen($Firstname) > 15)
                {
                  $FirstnameErr = "Firstname can not be > 15 Character..";
                  $isValid = false;
               }

             if(empty($Lastname))
               {
                  $LastnameErr = "Lastname can not be empty.";
                  $isValid = false;
               }
            if(strlen($Lastname) > 15)
                {
                  $LastnameErr = "Lastname can not be > 15 Character..";
                  $isValid = false;
               }

             if(empty($Gender))
               {
                  $GenderErr = "Gender can not be empty.";
                  $isValid = false;
               }
            if(strlen($Gender) > 10)
                {
                  $GenderErr = "Gender can not be > 10 Character..";
                  $isValid = false;
               }
               

             if(empty($DOB))
               {
                  $DOBErr = "DOB can not be empty Character.";
                  $isValid = false;
               }

             

             if(empty($Phone))
               {
                  $PhoneErr = "phone can not be empty.";
                  $isValid = false;
               }
            if( strlen($Phone) > 15)
                {
                  $PhoneErr = "Phone can not be > 15 Character..";
                  $isValid = false;
               }

             if(empty($Email))
               {
                  $EmailErr = "Email can not be empty.";
                  $isValid = false;
               }
               if(strlen($Email) > 30)
                {
                  $EmailErr = "Email can not be > 30 Character..";
                  $isValid = false;
               }

             


                if(empty($Username))
               {
                  $UsernameErr = "Username can not be empty.";
                  $isValid = false;
               }
               if(strlen($Username) > 15)
                {
                  $UsernameErr = "Username can not be > 15 Character..";
                  $isValid = false;
               }
 



 
            // empty validation for required field
            $Firstname=basic_validation($Firstname); 
            $Lastname=basic_validation($Lastname); 
            $Gender=basic_validation($Gender); 
            $DOB=basic_validation($DOB); 
            
            $Phone=basic_validation($Phone); 
            $Email=basic_validation($Email); 
            
            $Username=basic_validation($Username); 
             

 
            // if pass php validation then can write file.
            if($isValid)
             {
                 $res = updateProfile($Firstname,$Lastname,$Gender,$DOB,$Phone,$Email,$Username, $_SESSION['s_profile_id']);
              
                  if($res) 
                     {
                        $updateSuccess = "Update Profile succesfull.";

                         session_start();
                         $_SESSION['s_id'] =  $Username; // update session id


                     }

                 else{ $updateFailed = "Update Profile Failed.";}
               }




 



        
    }

		// validate input
    function basic_validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    ?>



  <!-- ///////////////////////////////////////////////// -->
  <div class="body">
  <div class="container">
        <div class="header">
            <h2 class="title">Update Profile</h2>
             <!-- <a class="title" href="login.php">LIBRARY</a> -->

        </div>


        <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" class="form" id="form" method = "POST" onsubmit="return jsValid();">
            <div class="form-control">
                <lable>First Name</lable>
                <input type="text" placeholder="" id="Firstname" name="Firstname" value="<?php echo $Firstname ?>" >
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $FirstnameErr; ?> </span>
            </div>  

            <div class="form-control">
                <lable>Last Name</lable>
                <input type="text" placeholder="" id="Lastname" name="Lastname" value="<?php echo $Lastname ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $LastnameErr; ?> </span>
            </div>  

            <div class="form-control">
                <lable>Gender</lable>
                    <input type="radio"  id="Male" name="Gender" value="Male">
                    <label for="Male">Male</label>

                    <input type="radio"  id="Female" name="Gender" value="Female">
                    <label for="Female">Female</label>

                    <input type="radio"  id="Other" name="Gender" value="Other">
                    <label for="Other">Other</label>
                    <small>Error message</small>
               </span>
                    <span style="color: red"> <?php echo $GenderErr; ?> </span>
            </div>  
 

            <div class="form-control">
                <lable>DOB</lable>
                <input type="date" placeholder="" id="Dob" name="DOB" value="<?php echo $DOB ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $DOBErr; ?> </span>

            </div>  

            
            <div class="form-control">
                <lable>Phone</lable>
                <input type="number" placeholder="" id="Phone" name="Phone" value="<?php echo $Phone ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $PhoneErr; ?> </span>
            </div>  

            <div class="form-control">
                <lable>Email</lable>
                <input type="email" placeholder="" id="Email" name="Email" value="<?php echo $Email ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $EmailErr; ?> </span>
            </div>  

             

            <div class="form-control">
                <lable>Username</lable>
                <input type="text" placeholder="" id="Username" name="Username" value="<?php echo $Username ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $UsernameErr; ?> </span>
            </div>  

            

            <button type="submit">Update</button>
            <span style="color: green;"> <?php echo $updateSuccess; ?> </span>
            <span style="color: red"> <?php echo $updateFailed; ?> </span>

 
        </form>
    </div>
    </div>
 
  <!-- ///////////////////////////////////////////////// -->

  <?php
        // header file.
        include('../View/html/footer.html');
        ?>

</body>
</html>