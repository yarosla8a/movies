<?php
require_once 'base_html.php';
require_once 'config/operations.php';
?>

<div class="col-6 center"><form action="config/operations.php" method="post">
<a href="/"> ГЛАВНАЯ</a>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Release Year</label>
    <input type="text" name="release_year" class="form-control" id="exampleFormControlInput1" maxlength="4">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Format</label>
    <select class="form-control" name="format" id="exampleFormControlSelect1">
      <option value="VHS">VHS</option>
      <option value="DVD">DVD</option>
      <option value="Blu-Ray">Blu-Ray</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Stars</label>
    <textarea class="form-control" name="stars" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
   <button type="submit" name="create" class="btn btn-success" ><i class="fas fa-plus">add</i></button>
</form></div>

<div>
  <h5>ИЛИ загрузите файл с данными</h5>
    <form action="config/operations.php" enctype="multipart/form-data" method="post">
      <input type="file" name="file" placeholder="загрузите файл " accept=".txt">
      <!-- <input type="submit" placeholder="send file"> -->
      <button type="submit" name="file" class="btn btn-success" ><i class="fas fa-plus">add</i></button>
    </form>
  </div> 
