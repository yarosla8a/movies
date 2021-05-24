<?php
	 function db(){
	 	//data for DB
		$server="localhost";
		$name = "root";
		$pass = "root";
		$db_name = "movie";
		// connection to DB 
		$db = mysqli_connect($server, $name, $pass);
		if (!$db){
			die('error to connection to db');
    		
		}
		//create DB 
		$sql ="CREATE DATABASE IF NOT EXISTS $db_name";

		if (mysqli_query($db, $sql)) {
				$db = mysqli_connect($server, $name, $pass, $db_name);
				//create table
				$sql= "
					CREATE TABLE IF NOT EXISTS movies(
					id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					title VARCHAR(50) NOT NULL,
					release_year INT(4),
					format  VARCHAR(50),
					stars TEXT
					);
				";
				if (mysqli_query($db, $sql)) {
					return $db;
				}else{
					die('ошибка при создании таблици');
					
				}
			}else{
				die("ошибка при создании БД");
				
			}

	}

