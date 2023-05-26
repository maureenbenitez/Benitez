<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into contact(name, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $message);
		$execval = $stmt->execute();
		header ("Location: contact.html");
		$stmt->close();
		$conn->close();
	}
?>