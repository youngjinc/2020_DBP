<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from plant";
  $result = mysqli_query($link, $query);
  $list = "";

  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  };
?>

<!DOCTYPE html>
<html>
<head>
  <meta charseet="utf-8">
  <title>DBP_WK02</title>
</head>
<body>
  <h1><a href = "index.php">PLANT</a></h1>
  <ol><?=$list?></ol>
  <form action = "process_create.php" method = "post">
    <p><input type = "text" name = "title" placeholder = "title"></p>
    <p><textarea name = "description" placeholder = "description"></textarea></p>
    <p><input type = "submit"></p>
  </form>
</body>
</html>
