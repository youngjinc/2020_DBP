<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from plant";
  $result = mysqli_query($link, $query);
  $list = "";

  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $query = 'select * from care';
  $result = mysqli_query($link, $query);
  $select_form = '<select name = "care_id">';
  while ($row = mysqli_fetch_array($result)) {
      $select_form .= '<option value = "'.$row['id'].'">'.$row['type'].'</option>';
  }
  $select_form .= '</select>';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charseet="utf-8">
  <title>DBP_W04</title>
</head>
<body>
  <h1><a href = "index.php">PLANT</a></h1>
  <a href = care.php>care<a>
  <ol><?=$list?></ol>
  <form action = "process_create.php" method = "post">
    <p><input type = "text" name = "title" placeholder = "title"></p>
    <p><textarea name = "description" placeholder = "description"></textarea></p>
    <?=$select_form?>
    <p><input type = "submit"></p>
  </form>
</body>
</html>
