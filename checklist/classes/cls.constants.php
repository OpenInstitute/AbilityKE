<?php
@session_start();
@session_cache_limiter('private');
$cache_limiter = @session_cache_limiter();

@session_cache_expire(15);
$cache_expire = @session_cache_expire();



date_default_timezone_set('Africa/Nairobi');
ini_set("display_errors", "off");

//include('inc_pageload_hd.php');
require_once('cls.formats.php');
require_once('cls.config.php');	
require_once('cls.sessions.php');	
require_once('cls.defines.php');
// require_once('cls.data.site.php'); //cls.data.casoft.php
require_once('cls.data.oc.php'); 
require_once('cls.select.php');
require_once('cls.displays.php');
require_once('cls.post.php');

//echobr($this_page);
/*if($_SERVER['HTTP_HOST'] == "sand-box.online" and $this_page <> "ajaxdata_county.php" and $this_page <> "ajaxdata_cob.php") { 
	if(!isset($_SESSION['sess_sbox'])){ 
		echo '<script language="javascript">location.href="http://sand-box.online/?tk='.time().'"; </script>'; exit;
	}
}*/

$msge_array  = array(
		//199  => "Your session has expired! Login to proceed.",
		3 => "Your password was reset. Check your email for the new password.",
		1  => "Thank you. Feedback Posted Successfully",
		//2  => "<h1>Mailing List Subscription</h1><h3>Details Posted Successfully</h3><p>Thank you for taking the time to provide us with your details.</p><p>You are now subscribed and will be hearing from us soon.</p>",
		2 => "Your subscription for updates has been saved.",
		7  => "Update successfull.",
		8  => "Your Online Application was received. We will contact you through details provided.",
		
		/* account alerts */
		//101 => "Welcome. ",
		106 => "Account Verified. Login using your credentials below. ",		
		100 => "Error. Please enter a valid email.",				
		114 => "Error. Please confirm your login details.",
		115 => "Error. Password NOT changed. Enter valid Current Password.",
		116 => "Error. Passwords Dont Match.",		
		117 => "Error. Account Registration NOT Successfull. Try again or contact the Administrator.",
		
		20 => "Error. Account with specified Email exists!",
		21 => "Error. Account does NOT exist or is not verified.",
		
		22 => "Account Sign Up: Check email for confirmation details.",
		23 => "Log in below to proceed.",
		24 => "Message sent.",
		25 => "Your submission upload was successfull.",
		
		
		// APPLICATION FORMS	
		32 => "Partner Registration: Check your email for confirmation link.",
		33 => "Listing Request: <br>Check your email for confirmation link.",
		34 => "Advert Post: <br>Check your email for confirmation link.",
		35 => "Message Pending.",
		36 => "Message Pending.",
		
		// USER POSTS	
		201 => "Your comments have been submitted.<br>Posted comments will be published once approved.",
		202 => "Check your email for account verification link.",
		203 => "Account Verified.<br>Awaiting approval from the administrator.",
		205 => "Account Verified.",
		
		// ASSEMBLY FUNCTIONS
		221 => "Disabled Process.<br>You have pending Un-surrendered Imprest(s).",
		223 => "Invalid Request.<br>Applicable to Members of County Assembly Only.",
		
		251 => "Meeting for this date already exists for this Committee!",
		
		// ADMIN NOTIFICATIONS	
		241 => "Request Processed.",
		
		401 => "The requested URL was not found on this server.",
		
		);
		



$uploadMime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv';



	/*$m2_data=new displays;
	$m2_data->addir = $dir; */


$ddSelect = new drop_downs;
// displayArray($ddSelect);
?>
