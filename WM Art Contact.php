<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>WMacArt</title>
</head>
<body>
<link rel="stylesheet"
   type="text/css"
   href="css/WMArt.css" />
<div class="container"> 
	<header>
		<div class="logo">
				<p class="logo"> Will MacIntyre Art<br>& Illustration</p>
		</div>
	<!--Nav Bar--> 
		<div class="topbar">
			<nav class="menu">
				<ul>
					<li><a class="blocklink" href="index.html">Home</a></li>
					<li><a class="blocklink" href="WM Art Gallery.html">Gallery</a></li>
					<li><a class="blocklink" href="WM Art Bio.html">Artist Bio</a></li>
					<li><a class="blocklink" href="WM Art Purchase.html">Purchase</a></li>
					<li><a class="blocklink" href="WM Art Contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>	
	</header>
	<div class="page">
		<?php 
				$firstname= $lastname= $email= $comment= "";
				
				
			if (isset($_REQUEST['submitted'])) {
					// Initialize error array.
					  $errors = array();
					  // Check for a proper First name
				  if (!empty($_REQUEST['firstname'])) {
					  $firstname = $_REQUEST['firstname'];
						  if (preg_match("/^[a-zA-Z]{1,20}+$/",$firstname)){ $firstname = $_REQUEST['firstname'];}
						  else{ $errors[] = 'Your Name can only contain A-Z or a-z, 1-20 characters long.';}
				  } else {$errors[] = 'You forgot to enter your First Name.';}
				  
				  // Check for a proper Last name
				  if (!empty($_REQUEST['lastname'])) {
				  $lastname = $_REQUEST['lastname'];
				  if (preg_match("/^[a-zA-Z]{1,20}+$/",$lastname)){ $lastname = $_REQUEST['lastname'];}
				  else{ $errors[] = 'Your Name can only contain A-Z or a-z, 1-20 characters long.';}
				  } else {$errors[] = 'You forgot to enter your Last Name.';}
				  
				  //Check for a valid email number
					if (!empty($_REQUEST['email'])) {
					  $email = $_REQUEST['email'];
								$pattern = "/^[\w\+\-\.\~]+\@[\-\w\.\!]+$/";
					  if (preg_match($pattern,$email)){ $email = $_REQUEST['email'];
					}
					else{ $errors[] = 'Your email can not contain that character.';}
					} 
					else {$errors[] = 'You forgot to enter your email.';
					}
					//Check for a valid comment
					if (!empty($_REQUEST['comment'])) {
					  $comment = htmlspecialchars($_REQUEST['comment']);
					  
								$pattern = "/^[\w\+\-\.\~]+$/";
					  if (preg_match($pattern,$comment)){ $comment = $_REQUEST['comment'];
					}
					else{ $errors[] = 'Your comment can not contain that character.';}
					} 
					else {$errors[] = 'You forgot to enter your comments.';
					}
			}
			 
			  //End of validation 
			  
				if (isset($_REQUEST['submitted'])) {
					  if (empty($errors)) { 
					  $from = "From: WM Art Contact Us"; //Site name
					  // Change this to your email address you want to form sent to
					  $to = "@gmail.com"; 
					  $name=$firstname. ' ' .$lastname;
					  $subject = "WMAC ART Comment from " . $name ;
					  $message = $firstname. '<hr/>' . $lastname. '<hr/>' .$comment. "<hr/>Email: " . $email ;
					  echo $to; 
					  "<br />";
					  echo $subject; 
					  "<br />";
					  echo $message;
					  "<br />";
					  echo $from;
					  "<br />";
					 /**mail($to,$subject,$message,$from);**/
					  }
				}
		
		?>

		<?php 
						  //Print Errors
						if (isset($_REQUEST["submitted"])) {
						  // Print any error messages. 
							if (!empty($errors)) { 
								echo '<hr/><h3>The following occurred:</h3><ul>'; 
								// Print each error. 
							foreach ($errors as $msg) { echo '<li>'. $msg . '</li>';}
								  echo '</ul><h3>Your mail could not be sent due to input errors.</h3><hr/>';}
							else{echo '<hr/><h3 align="center">Your mail was sent. Thank you!</h3>
								   <hr/><p4>Below is the message that you sent.</p4><hr/>'; 
								  echo "Message from " . $firstname . " " . $lastname . " <br />Email: ".$email." <br />Content: " .$comment. "<br/>";
							}
							}
							//End of errors array
		?> 
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  First name:<br>
			  <input type="text" name="firstname" value='<?php echo $firstname;?>'/>
			  <br>
			  Last name:<br>
			  <input type="text" name="lastname" value='<?php echo $lastname;?>' />
			  <br>
			  Contact Email:<br>
			  <input type="text" name="email" value='<?php echo $email;?>'/>
			  <br>
			  Comments:<br>
			  <textarea name="comment" style="height:200px" ><?php echo htmlspecialchars($comment);?></textarea>
			  
			  <br><br>
			  <input type="submit" name="submitted" value="Submit" />
		</form>  
	</div>
</div>



</body>

</html>
