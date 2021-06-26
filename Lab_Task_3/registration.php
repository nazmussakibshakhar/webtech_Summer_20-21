<!doctype html>
<html>
<body>
<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["uname"]))  
      {  
           $error = "<h1>Enter Name</h1>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["usname"]))  
      {  
           $error = "<label>Enter a username</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label>Enter a password</label>";  
      }
      else if(empty($_POST["cpass"]))  
      {  
           $error = "<label>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['uname'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["usname"],  
                     'gender'     =>     $_POST["gender"],  
                     'dd'     =>     $_POST["dd"] ,
					 'mm'    =>     $_POST["mm"],
					 'yyyy' =>     $_POST["yy"]
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "File Appended Success fully";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>
<form action = "" method = "post">
<fieldset>
<legend>Registration</legend>
<table>
<tr><td>Name</td><td>:<input type = "text" name="uname" class="form-control"></br></td></tr>

<tr><td>Email</td><td>:<input type = "text" name="email" class="form-control"></br></td></tr>

<tr><td>User Name</td><td>:<input type = "text" name="usname" class="form-control"></br></td><tr>

<tr><td>Password</td><td>:<input type = "text" name="pass" class="form-control"></br></td></tr>

<tr><td>Confirm Password</td><td>:<input type = "text" name="cpass" class="form-control"></br></td></tr>
</table>
<hr/>
<fieldset>
<legend>Gender</legend>
<input type = "radio" name="gender">Male&nbsp <input type = "radio" name="gender">Female&nbsp <input type = "radio" name="gender">Other
</fieldset>
<hr/>
<fieldset>
<legend>Date of Birth</legend>
<input type = "text" name = "dd" width=100>/&nbsp <input type = "text" name = "mm" width=100>/&nbsp <input tyoe = "text" name="yy" width=100> (dd/mm/yyyy)</fieldset>
<hr/>
<input type = "submit" name="submit">&nbsp &nbsp <input type = "button" value = "Reset">
</fieldset>
</form>
<?php echo $message;
	echo $error;?>
</body>
</html>