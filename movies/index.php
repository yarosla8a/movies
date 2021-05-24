<?php
require_once 'config/db.php';
require_once 'base_html.php';
require_once 'config/operations.php';
$db = db(); 
?>
<body style="padding-top: 100px;">
	<div style="width: 60%; margin-left: 20%;">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		    <form class="form-inline my-2 my-lg-0" method="post">
		      <input type="text" name="search"  class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		      <input type="submit" name="submit" class="btn btn-secondary my-2 my-sm-0" placeholder="Search">
		    </form>
		  </div>
		   <div style="margin-left: 330px;">
				<a href="add_movie.php"><button type="button" class="btn btn-success">add</button></a>
			</div> 
		</nav>
	<div>
		<table class="table">
  		<thead>
    		<tr>
    			<th scope="col">id</th>
      			<th scope="col">Название фильма</th>
      			<th scope="col">Актеры</th>
      			<th scope="col"></th>
      			<th scope="col"></th>
    		</tr>
  		</thead>
  		<tbody id="movies">
	  	 <?php
		  	if (isset($_POST['submit'])) {
		  		$s =search();
		  		if ($s) {
					while ($movie = mysqli_fetch_assoc($s)) {
		?>
	    		<tr >
	      			<th ><?=$movie["id"]?></th>
	      			<td><?=$movie["title"]?></td>
	      			<td><?=$movie["stars"]?></td>
	      			<td><a href="movie_info.php?id=<?=$movie["id"]?>">Детально</a></td>
	      			<td><a href="movie_delete.php?id=<?=$movie["id"]?>">Удалить</a></td>
	    		</tr> 
	   <?php
					}
				}			
			}else{
				$result = allMovies();
				if ($result) {	
					while ($movie = mysqli_fetch_assoc($result)) {
		?>
	    		<tr >
	      			<th ><?=$movie["id"]?></th>
	      			<td><?=$movie["title"]?></td>
	      			<td><?=$movie["stars"]?></td>
	      			<td><a href="movie_info.php?id=<?=$movie["id"]?>">Детально</a></td>
	      			<td><a href="movie_delete.php?id=<?=$movie["id"]?>">Удалить</a></td>
	      				
	    		</tr>
	   <?php
					}
				}
			}

		?>
 		</tbody>
		</table>
	</div>  
</div>

</body>
</html>