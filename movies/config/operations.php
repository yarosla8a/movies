<?php
require_once "db.php";
$db = db();
if(isset($_POST['create'])){ //if clik  bnt with  name = 'create'
	createMovie();
}
if(isset($_POST['file'])){
	file_upload();
}
function map($n){
 	$n = explode(': ', $n)[1];
 	//cut 1 element(str) after " :" and returt all after ":"
 		return $n;	
}
function filter($var){
    return ($var !== NULL && $var !== FALSE && $var !== "");
}
function allMovies(){
	
	$sql ="SELECT * FROM `movies` ORDER BY `title` ASC";
	$movies = mysqli_query($GLOBALS['db'], $sql);
	return $movies;
}
function search(){
	
	$search = explode(" ", $_POST['search']);
	$count =count($search);
	$array = array();
	$i=0;
		foreach ($search as $key ) {
				$i++;
				if ($i<$count) {
					$array[]="CONCAT(`title`, `stars`)LIKE '%".$key."%' OR "; 
				}else{
					$array[]="CONCAT(`title`, `stars`)LIKE '%".$key."%'";
				}
		}
	$sql = "SELECT * FROM `movies` WHERE ".implode(" ", $array);
	$movies=mysqli_query($GLOBALS['db'],$sql);
	
	return $movies;
}
function createMovie(){
	$title = $_POST["title"];
	$release_year=$_POST["release_year"];
	$format =$_POST["format"];
	$stars = $_POST["stars"];

	if (!empty($title)||!empty($release_year)|| !empty($stars)) {
	 
	 $sql =	"INSERT INTO `movies`(`id`,`title`, `release_year`, `format`, `stars`)
	                    VALUES(NULL, '$title', '$release_year', '$format', '$stars')";
	                    
 		if (mysqli_query($GLOBALS['db'], $sql)) {
 			
 			header('Location:../index.php');
 			
		}else{
			die('ошибка добавления фильма');
			
		}
	}
}
function deleteMovie(){
	$id = $_GET["id"];
	 
	 $sql =	"DELETE FROM `movies` WHERE `movies`.`id`=$id ";
	                    
 		if (mysqli_query($GLOBALS['db'], $sql)) {
 			// echo(arg1)
 			header('Location:../index.php');
 			
 
		}else{
			die('ошибка удаления');
		}
}
function file_upload(){
	$name = trim(mb_strtolower($_FILES['file']['name']));

	$tmp = $_FILES['file']['tmp_name'];
	if (!file_exists('files')) {
		mkdir('files');
	}
	 $filename="files/$name";
	 move_uploaded_file($tmp, $filename);

	if (file_exists($filename) && !empty($_FILES)) {
	   	$contents = file_get_contents($filename); // file in str
		$contents = explode("\r\n", $contents); // str in array
	   	$data = array_chunk(// divide  the array by 4
	   		array_filter( // filter array by function filter( array without  elememts === null)
	   			array_map('map',  $contents) // get array with function result  (emements after :)
	   			, 'filter'), 4);
	   
	   	foreach ($data as $row) {
	   		list($title, $release_year, $format, $stars) = $row;
	   		$sql ="INSERT INTO `movies`(`id`,`title`, `release_year`, `format`, `stars`)
		                    VALUES(NULL, '$title', '$release_year', '$format', '$stars')";
	   		if (mysqli_query($GLOBALS['db'], $sql)) {
 			
 			header('Location:../index.php');
 			
 
			}else{
				die('ошибка добавления данных из файла');
			}
		}
		
	}
}
function infoMovie(){
	$id = $_GET["id"];
	$sql ="SELECT * FROM `movies` WHERE `id` = $id";
	$movie = mysqli_query($GLOBALS['db'], $sql);
	
	return $movie;
 
}
