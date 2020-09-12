<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from plant";
  $result = mysqli_query($link, $query);
  $list = "";
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }
  $article = array(
    'title' => 'Welcome',
    'description' => 'Let me introduce my lovely plants.🌿'
  );

  if(isset($_GET['id'])){
    $query = "select * from plant where id ={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>DBP_WK02</title>
</head>
<body>
  <h1><a href = "index.php">PLANT</a></h1>
  <ol><?= $list?></ol>
  <a href = "create.php">create</a>
  <h2><?=$article['title']?></h2>
  <?=$article['description']?>
</body>
</html>
