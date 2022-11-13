<?php
	
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$connetion = mysqli_connect($servername, $username, $password);
	
	$nameError = $emailError = "";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["name"])){
			$nameError = "Введите имя!";
		} else {
			$name = inputValidate($_POST["name"]);
			if(!preg_match("/^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})?$/", $name)){
				$nameError = "Неверный формат ФИО!";
			}
		}
		
		if(empty($_POST["email"])){
			$nameError = "Введите E-mail!";
		} else {
			$name = inputValidate($_POST["email"]);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailError = "Неверный формат E-mail!";
			}
		}		
	}
	
	if($connection === false){
		die("ОШИБКА:" . mysqli_connect_error());
	}
	
	$fullName = mysqli_real_escape_string($connection, $_REQUEST["name"]);
	$userEmail = mysqli_real_escape_string($connection, $_REQUEST["email"]);
	
	$sql = "INSERT INTO messages (full_name, email) VALUES ('$fullName', '$userEmail')";
	if(mysqli_query($connection, $sql)) {
		echo "Записи добавлены";
	} else {
		echo "ОШИБКА: " . mysqli_error($connection);
	}
	mysqli_close($connetion);
	
	funtion inputValidate($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>