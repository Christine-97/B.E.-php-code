<?php 

	define('DB_HOST','localhost');
	define('DB_USER','admin');
	define('DB_PASS','password');
	define('DB_NAME','intrusion_detector');
	
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(mysqli_connect_errno()){
		die('Unable to connect to database' . mysqli_connect_errno());
	}
	
	$stmt = $conn->prepare("SELECT id, title, shortdesc, image FROM records;");
	
	$stmt->execute();
	
	$stmt->bind_result($id,$title,$shortdesc,$image);
	
	$record = array();
	
	while($stmt->fetch()){
	
		$temp = array();
		$temp['id'] = $id;
		$temp['title']=$title;
		$temp['shortdesc']=$shortdesc;
		$temp['image']=$image;
	
	array_push($record,$temp);
	
	}
	
	echo json_encode($record);
