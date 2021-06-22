<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task 2</title>
    <style>
.error {color: #FF0000;}
</style>
    
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[A-Z][a-zA-Z -]+$/",$name)) {
      $nameErr = "Must start with letter and contain atleast two words";
      $name = "";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
    

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    <p><span class="error"></span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <fieldset>
    <legend>NAME</legend>
    <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
    <hr>
  </fieldset>
  <fieldset>
    <legend>EMAIL</legend>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"> <?php echo $emailErr;?></span>
    <hr>
  </fieldset>
  <fieldset>
    <legend>DATE OF BIRTH</legend>
    <input type ="date" id="date" name="date"><br>
    <hr>
  </fieldset>
  <fieldset>
    <legend>GENDER</legend>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error"><?php echo $genderErr;?></span>
    <hr>
  </fieldset>
  <fieldset>
    <legend>DEGREE</legend>
    <input type ="checkbox" id="ssc" name="ssc" value="SSC">
    <label for="ssc">SSC</label>
    <input type ="checkbox" id="hsc" name="hsc" value="HSC">
    <label for="hsc">HSC</label>
    <input type ="checkbox" id="bsc" name="bsc" value="BSC">
    <label for="ssc">BSC</label>
    <input type ="checkbox" id="msc" name="msc" value="MSC">
    <label for="ssc">SSC</label>
    <hr>
  </fieldset>

  <fieldset>
  <legend>BLOOD GROUP</legend>
  <select id="bloodgroup" name="bloodgroup">
    <option value="a+">A+</option>
    <option value="a-">A-</option>
    <option value="b+">B+</option>
    <option value="b-">B-</option>
  </select>
  <hr>
  <input type="submit" value="Submit">
  </fieldset>
</form>
</body>
</html>