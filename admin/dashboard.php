
<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Dashboard - Secured Page</title>
	<link rel="stylesheet" href="css/style.css" />
	</head>
<body>
	<?php
		require('db.php');
	    // If form submitted, insert values into the database.
	    if (isset($_REQUEST['username'])){
			$username = stripslashes($_REQUEST['username']); // removes backslashes
			$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
			$email = stripslashes($_REQUEST['email']);
			$email = mysqli_real_escape_string($con,$email);
			$contact = stripslashes($_REQUEST['contact']);
			$contact = mysqli_real_escape_string($con,$contact);
			$address = stripslashes($_REQUEST['address']);
			$address = mysqli_real_escape_string($con,$address);
			$post = stripslashes($_REQUEST['post']);
			$post = mysqli_real_escape_string($con,$post);
			$city = stripslashes($_REQUEST['city']);
			$city = mysqli_real_escape_string($con,$city);
			$mobile = stripslashes($_REQUEST['mobile']);
			$mobile = mysqli_real_escape_string($con,$mobile);
			$tel = stripslashes($_REQUEST['tel']);
			$tel = mysqli_real_escape_string($con,$tel);
			$awbType = stripslashes($_REQUEST['awbType']);
			$awbType = mysqli_real_escape_string($con,$awbType);

			// $trn_date = date("Y-m-d H:i:s");

			//recipaint info

			$rusername = stripslashes($_REQUEST['rusername']); // removes backslashes
			$rusername = mysqli_real_escape_string($con,$rusername); //escapes special characters in a string
			$remail = stripslashes($_REQUEST['remail']);
			$remail = mysqli_real_escape_string($con,$remail);
			$rcontact = stripslashes($_REQUEST['rcontact']);
			$contact = mysqli_real_escape_string($con,$contact);
			$raddress = stripslashes($_REQUEST['raddress']);
			$raddress = mysqli_real_escape_string($con,$raddress);
			$rpost = stripslashes($_REQUEST['rpost']);
			$rpost = mysqli_real_escape_string($con,$rpost);
			$rcity = stripslashes($_REQUEST['rcity']);
			$rcity = mysqli_real_escape_string($con,$rcity);

			$rprovince = stripslashes($_REQUEST['rprovince']);
			$rprovince = mysqli_real_escape_string($con,$rprovince);
			$rdistrict = stripslashes($_REQUEST['rdistrict']);
			$rdistrict = mysqli_real_escape_string($con,$rdistrict);
			$rcountry = stripslashes($_REQUEST['rcountry']);
			$rcountry = mysqli_real_escape_string($con,$rcountry);
			$rcustoms_code = stripslashes($_REQUEST['rcustoms_code']);
			$rcustoms_code = mysqli_real_escape_string($con,$rcustoms_code);

			$rmobile = stripslashes($_REQUEST['rmobile']);
			$rmobile = mysqli_real_escape_string($con,$rmobile);
			$rtel = stripslashes($_REQUEST['rtel']);
			$rtel = mysqli_real_escape_string($con,$rtel);
			$textarea = stripslashes($_REQUEST['textarea']);
			$textarea = mysqli_real_escape_string($con,$textarea);

			$trn_date = date("Y-m-d H:i:s");

	        $query = "INSERT into `sender` (username, email, contact, address, post, city, mobile, tel, awbType, trn_date) VALUES ('$username', '$email', '$contact', '$address', '$post', '$city', '$mobile', '$tel', '$awbType', '$trn_date')";

	      	$query1 = "INSERT into `recipient` (rusername, remail, rcontact, raddress, rpost, rcity, rprovince, rdistrict, rcountry, rcustoms_code, rmobile, rtel, textarea, trn_date) VALUES ('$rusername', '$remail', '$rcontact', '$raddress', '$rpost', '$rcity', '$rprovince', '$rdistrict', '$rcountry', '$rcustoms_code', '$rmobile', '$rtel', '$textarea', '$trn_date')";

	        $result = mysqli_query($con,$query);
	        $result = mysqli_query($con,$query1);
	        if($result){ 
	            echo "<div class='form'>
			            <h3>You Data Saved Successfully.</h3><br/>
			             Click here to <a href='login.php'>Login</a>
		              </div>";

	        	}
	    }
	    else{
	?>
	<h1 style="text-align:center">All Informations</h1>
	<form name="registration" action="" method="post" style="padding-left: 20px">
		<div>
			<h3>Sender Information</h3>
			<input type="text" name="username" placeholder="Username" required />
			<input type="email" name="email" placeholder="Email" required />
			<input type="text" name="contact" placeholder="Contact" required />
			<input type="text" name="address" placeholder="Address" required />
			<input type="text" name="post" placeholder="Post" required />
			<input type="text" name="city" placeholder="City" required />
			<input type="text" name="mobile" placeholder="Mobile" required />
			<input type="text" name="tel" placeholder="Tel" required />

			<h3>AWB Information</h3>
	   		External AWB Type :  
            <input type="radio" name="awbType" value="ZTO" /> ZTO &nbsp;
            <input type="radio" name="awbType" value="FedEx" /> FedEx &nbsp;
            <input type="radio" name="awbType" value="DHL" /> DHL &nbsp;
            <input type="radio" name="awbType" value="UPS" /> UPS &nbsp;
            <input type="radio" name="awbType" value="SF" /> SF &nbsp;
            <input type="radio" name="awbType" value="MASTER" /> MSTR &nbsp;
		</div>
		<div>
			<hr style="margin-top: 30px">
			<h3>Recipient Information</h3>
			<input type="text" name="rusername" placeholder="Username" required />
			<input type="text" name="rcontact" placeholder="Contact" required />
			<input type="text" name="raddress" placeholder="Address" required />
			<input type="email" name="remail" placeholder="Email" required />
			<input type="text" name="rpost" placeholder="Post" required />
			<input type="text" name="rcity" placeholder="City" required />
			<input type="text" name="rprovince" placeholder="Province" required />
			<input type="text" name="rdistrict" placeholder="District" required />
			<input type="text" name="rcountry" placeholder="Country" required />
			<input type="text" name="rcustoms_code" placeholder="Customs Code" required />
			<input type="text" name="rmobile" placeholder="Mobile" required />
			<input type="text" name="rtel" placeholder="Tel" required /><br>
			<h3>Commodity Description</h3>
			<textarea style="width:480px; height: 100px" type="textarea" name="textarea" placeholder=""></textarea>
		</div><br>
		<div style="text-align: center">
			<button style="padding: 10px"><a href="logout.php">Logout</a></button>
			<input type="submit" name="submit" value="Register" />
		</div>
	</form>
	
	<?php } ?>
</body>
</html>
