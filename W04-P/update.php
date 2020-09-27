<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from plant";
  $result = mysqli_query($link, $query);
  $list = "";

  while ($row = mysqli_fetch_array($result)) {
      $list .= "<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  };

  if (isset($_GET['id'])) {
      $filtered_id= mysqli_real_escape_string($link, $_GET['id']);
      $query = "select * from plant where plant.id={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped = array(
      'title' => htmlspecialchars($row['title']),
      'description' => htmlspecialchars($row['description'])
    );
      $query = "select * from care";
      $result = mysqli_query($link, $query);
      $select_form = '<select name = "care_id">';
      while ($row = mysqli_fetch_array($result)) {
          $select_form .= '<option value = "'.$row['id'].'">'.$row['type'].'</option>';
      };
      $select_form .= '</select>';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charseet="utf-8">
  <title>DBP_WK04</title>
</head>
<body>
  <h1><a href = "index.php">PLANT</a></h1>
  <ol><?=$list?></ol>
  <form action = "process_update.php" method = "post">
    <input type="hidden" name='id' value="<?=$filtered_id?>">
    <p><input type = "text" name = "title" placeholder = "title" value="<?=$escaped['title']?>"></p>
    <p><textarea name = "description" placeholder = "description"><?=$escaped['description']?></textarea></p>
    <?=$select_form?>
    <p><input type = "submit"></p>
  </form>
</body>
</html>
