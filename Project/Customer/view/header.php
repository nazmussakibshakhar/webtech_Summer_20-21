<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
</head>
<body>

	<style>
*{
	margin: 0;
	padding: 0;
	/*font-family: sans-serif;*/
	font-family: Verdana;
}
body{
	background-color: #fff;
	min-height: calc(100vh);
}
a, h1, li, button{
	text-decoration: none;
	color: #0B2836;
}
header{
	display: flex;
	justify-content: space-between;
	align-items: center;
	position: sticky;
	top: 0;
	background-color: rgba(111, 143, 149, .3);#CAC9B6;
	/*border-bottom-right-radius: 8px;
	border-bottom-left-radius: 8px;*/
	
}


.title{
	font-weight: 800;
	font-size: 20px;
	padding: 0 10px;
	letter-spacing: .2rem;
	cursor: pointer;
	color: red;

   }

.nav-link li{
	list-style: none;
	display: inline-block;
}

.nav-link li a{
	padding: 15px 25px;
	transition: all .3s ease 0s; 
 	border-radius: 8px;
  }

.setting img{
	width: 30px;
	height:30px;
	margin-right: 20px;
	padding: 15px;
 	transition: .4s;
 	cursor: pointer;
 	border-radius: 50%;

   }

 .setting:hover .dropdown-content{
 		display: block;
  }
 .dropdown-content{
 	position: absolute;
  	right: 0px;
 	text-align: left;
 	min-width: 150px;
 	display: none;
  }
  .dropdown-content a{
 	display: block;
 	padding: 10px;
	margin-top: 5px;
	background-color: rgba(111, 143, 149, .8);
  	border-radius: 5px;


  } 
  .dropdown-content a:hover{
 	color: white;
	background-color: #FA7B25;
  }





	 
</style>
  

    <header>
		<div class="logo" >
	 		
 	 		<a class="title" href="../Controller/welcome.php">xCompany</a>
		</div>
 		<nav>
 			<ul class="nav-link">
 				<li><a class="<?php if($page == 'welcome'){echo 'active';} ?>" href="../Controller/welcome.php">Home</a></li> 
				<li><a class="<?php if($page == 'viewproduct'){echo 'active';} ?>" href="../Controller/viewproduct.php">View Products</a></li>  
				<li><a class="<?php if($page == 'addproduct'){echo 'active';} ?>" href="../Controller/addproduct.php">Add Product</a></li> 
				<li><a class="<?php if($page == 'cart'){echo 'active';} ?>" href="../Controller/cart.php">Cart</a></li>    
				 
			 
		 		
 		</nav>
  			<div class="setting">
 				<img src="../View/img/a.jpg" alt="Setting" title="Settings">
  				<div class="dropdown-content">
		 			 
						
					<a class="<?php if($page == 'updateprofile'){echo 'active';} ?>" href="../Controller/updateprofile.php">Update Profile </a>	
					<a class="<?php if($page == 'changepassword'){echo 'active';} ?>" href="../Controller/changePassword.php">Change password </a>
					<a href="../Controller/logout.php">Logout </a>
 				</div>
 			</div>
	</header>

<body>
	
</body>
 </html>