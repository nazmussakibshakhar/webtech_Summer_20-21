 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Add Product</title>
    <link rel="stylesheet" href="../View/css/addproduct.css?v <?php echo time(); ?>">
    <script src="../View/js/addproduct.js"></script>


 </head>
 <body>


 	<?php

    /// redirect login for no session
    session_start();
    if(!isset($_SESSION['s_id']))
        header("location:../");

   $page = 'addproduct';
   include('../View/html/header.php');
   include('../Model/dbproduct.php');
 


   $addBookSuccess = $addBookFailed = "";
   $isValid = true;
   $res = false;
   $uniqueId = "";
   $bookname = $authorname = $edition = $numberofcopy = "";
   $booknameErr = $authornameErr = $editionErr = $numberofcopyErr ="";
 

   if ($_SERVER['REQUEST_METHOD'] === "POST")
   {

      $bookname = $_POST['bookname'];
      $authorname = $_POST['authorname'];
      $edition = $_POST['edition'];
      $numberofcopy = $_POST['numberofcopy'];


      if(empty($bookname)  )
         {
            $booknameErr = "Name can not be empty.";
            $isValid = false;
         }
         if( strlen($bookname) > 100)
         {
            $booknameErr = "Name can not be > 100 Character.";
            $isValid = false;
         }
      if(empty($authorname) )
         {
            $authornameErr = "Description can not be empty.";
            $isValid = false;
         }
         if( strlen($authorname) > 50)
         {
            $authornameErr = "Description can not be > 50 Character.";
            $isValid = false;
         }
      if(empty($edition)  )
         {
            $editionErr = "Price can not be empty.";
            $isValid = false;
         }
         if( strlen($edition) > 10)
         {
            $editionErr = "Price can not be > 10 Character.";
            $isValid = false;
         }
      if(empty($numberofcopy) )
         {
            $numberofcopyErr = "Quantity can not be empty.";
            $isValid = false;
         }
         if(strlen($numberofcopy > 100) )
         {
            $numberofcopyErr = "Quantity can not be > 100.";
            $isValid = false;
         }

      $bookname = basic_validation($bookname);
      $authorname = basic_validation($authorname);
      $edition = basic_validation($edition);
      $numberofcopy = basic_validation($numberofcopy);

     // fetch data from Database to check multiple book id.
      // $book_data = getBookId($bookno);
      // for ( $i = 0; $i < count($book_data); $i++)
      // {
      //    if($book_data[$i]["bookid"] == $bookno)
      //    {
      //       $uniqueId = "This id is already exist !!";
      //       $isValid = false;

      //    }
      // }
         
      // if pass php validation then can write file.
      if($isValid)
      {
            $res = AddBook($bookname,$authorname,$edition,$numberofcopy);
             
            if($res) 
                $addBookSuccess = "Added succesfully.";

            else $addBookFailed = "Failed.";
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
            <h2>Add Product</h2>
        </div>


        <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" class="form" id="form" method = "POST" onsubmit="return jsValid();" >
            <div class="form-control">
                <lable>Product Name</lable>
                <input type="text" placeholder="" id="bookname" name="bookname" value="<?php echo $bookname ?>" >
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $booknameErr; ?> </span>
            </div>  
 
            <div class="form-control">
                <lable>Product Description</lable>
                <input type="text" placeholder="" id="authorname" name="authorname" value="<?php echo $authorname ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $authornameErr; ?> </span>
            </div>  

             <div class="form-control">
                <lable>Price</lable>
                <input type="text" placeholder="" id="edition" name="edition" value="<?php echo $edition ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $editionErr; ?> </span>
            </div> 

            <div class="form-control">
                <lable>Quantity</lable>
                <input type="text" placeholder="" id="" name="numberofcopy" value="<?php echo $numberofcopy ?>" >
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $numberofcopyErr; ?> </span>
            </div>  
 
            <!-- <div class="form-control">
                <lable>Shelf No</lable>
                <input type="text" placeholder="22" id="shelfno" name="shelfno" value="<?php echo $shelfno ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $shelfnoErr; ?> </span>
            </div>  

             <div class="form-control">
                <lable>Book Id</lable>
                <input type="text" placeholder="1001" id="bookno" name="bookno" value="<?php echo $bookno ?>">
                <img class="check" src="../View/img/checked.svg" alt="Checked">
                <img class="warn" src="../View/img/warn.svg" alt="Error">
                <small>Error message</small>
                <span style="color: red"> <?php echo $booknoErr; ?> </span>

            </div>   -->
     
    

            

            <button type="submit">Add</button>
             <span style="color: green;"> <?php echo $addBookSuccess; ?> </span>
             <span style="color: red"> <?php echo $addBookFailed; ?> </span>


 
        </form>
    </div>
    </div>
 
  <!-- ///////////////////////////////////////////////// -->
 
<?php
// footer file.
include('../View/html/footer.html');
?>

</body>
</html>