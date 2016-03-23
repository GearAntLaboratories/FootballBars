<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'FootballBars'; 
		$to = 'grantgotwald@gmail.com'; 
		$subject = 'Message from FootballBars ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 8) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
	

if (isset($_POST["submit2"])) {
		$teamName = $_POST['teamName'];
		$barName = $_POST['barName'];
		$barCity = $_POST['barCity'];
		$barState = $_POST['barState'];
		$barWebsite = $_POST['barWebsite'];
		$message2 = $_POST['message2'];
		$human2 = intval($_POST['human2']);
		$from = 'FootballBars'; 
		$to = 'grantgotwald@gmail.com'; 
		$subject = 'Message from FootballBars -- New Bar ';
		
		$body2 ="team:\n $teamName\n 
			barName:\n$barName\n 		
			barCity:\n $barCity\n 
			barState:\n$barState\n 
			barWebsite:\n$barWebsite\n 
			message2:\n$message2\n"; 


		//Check if simple anti-bot test is correct
		if ($human2 !== 8) {
			$errHuman2 = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errHuman2) {
	if (mail ($to, $subject, $body2, $from)) {
		$result2='<div class="alert alert-success">Thank You! I will add it to the database!</div>';
	} else {
		$result2='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
	
	
	
	
?>