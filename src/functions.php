<?php

include '../config/database.php';

// This function checks register the beneficiary into the database

function beneficiary_reg($name, $email, $password, $dob, $phone_number, $state, $city, $personal_address, $address_code){

	global $db; // State the database as a global entity

	$stmt = "INSERT INTO beneficiary (name, email, password, dob, phone_number, state, city, personal_address, address_code)
			 VALUES('$name', '$email', '$password', '$dob', '$phone_number', '$state', '$city', '$personal_address', '$address_code')";
	
	// If insertion was successful, the user is redirected
	if ($db->query($stmt)) {
		$_SESSION['loggedin'] = true;
		header('Location: dashboard.php');
	} else {
		$errormsg = "Kindly fill out the required fields";
	}
}

// This function logs in the donor
function login_donor()
{
    global $db; 

   // initialize session
	session_start();


function beneficiary_login($email, $password){
	global $db;

	$comm = "SELECT * FROM beneficiary WHERE email = '$email' AND password = '$password' ";

	if ($result = $db->query($comm)) {
		
		//Prints out the database rows
		$row = $result->fetch_assoc();
		var_dump($row);
	}
	
}

beneficiary_login('email@email.com', 'zxcvbnm');


    // attempt  donor login
    $query = "SELECT * FROM donors WHERE email='$email' AND password='$password'";
	$results = mysqli_query($db, $query);

    // checking if donor is found

    // donor found
    if (mysqli_num_rows($results) == 1) 
    {   
        $_SESSION["user"] = $name;  // set session variable to donor name
        // redirect user to their dashboard
        header('location: ..donors-dashboard/dashboard.html'); // redirect page needs to be corrected
    }
    // donor not found
    else
    {
        // redirect user to signup page
        header('location: ..log in and sign up/signup.html'); // redirect page needs to be corrected
    }

// This function logs in the beneficiary
function login_beneficiary()
{
    global $db;  

    // initialize session
	session_start();

    // get beneficiary log in values
	$email = $_POST['email'];
	$password = $_POST['password'];
    $name = $_POST['name'];

    // attempt benefiiary login
    $query = "SELECT * FROM beneficiary WHERE email='$email' AND password='$password'";
	$results = mysqli_query($db, $query);

    // checking if beneficairy is found

    // beneficiary found
    if (mysqli_num_rows($results) == 1) 
    {   
        $_SESSION["user"] = $name;  // set session variable to beneficairy name
        // redirect user to their dashboard
        header('location: index.html'); // redirect page needs to be corrected
    }
    // beneficairy not found
    else
    {
        // redirect user to signup page
        header('location: ..log in and sign up/signup.html'); // redirect page needs to be corrected
    }
 }

}

?>
