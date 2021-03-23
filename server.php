<?php
	
	session_start();

	$name = "";
	$address = "";
	$id = 0;
	$edit_state = false;


	//connecting to dataabse
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		//inserting to database
		
		$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Address saved";
		header('locaton: index.php');

	}

				//updating saved records
				if (isset($_POST['update'])) {
					$name = mysqli_real_escape_string($_POST['name']);
					$address = mysqli_real_escape_string($_POST['address']);
					$id = mysqli_real_escape_string($_POST['id']);

					mysqli_query($db, "UPDATE *FROM info SET name='$name', address='$address' WHERE id=$id");
					$_SESSION['msg'] = "Address updated";
					header('location: index.php');
						
				}

				//deleting records
				if(isset($_GET['del'])) {
					$id=$GET['del'];
					mysqli_query($db, "DELETE FROM info WHERE id=$id");
					$_SESSION['msg'] = "Address deleetd";
					header('location: index.php');


				}



				//displaying records
				$results = mysqli_query($db, "SELECT * FROM info");


?>