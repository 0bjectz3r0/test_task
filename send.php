<?php

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
	
	funtion inputValidate($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>