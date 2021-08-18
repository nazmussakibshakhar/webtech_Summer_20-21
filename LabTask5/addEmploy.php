<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form action="controller/createEmploy.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="id">ID:</label><br>

<input type="text" name="id"><br>
  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address"><br>
  <label for="nid">NID:</label><br>
  <input type="text" id="nid" name="nid"><br>
  <label for="position">Position:</label><br>
  <select name="position" id="position">
      <option value="salesman">salesman</option>
      <option value="delivaryman">delivaryman</option>
      <option value="manager">manager</option>
  </select><br>

  <label for="salary">salary:</label><br>

<input type="text" name="salary"><br><br>
  <input type="submit" name="addemploy" >
 
</form> 

</body>
</html>

