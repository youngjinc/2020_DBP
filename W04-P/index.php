<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from plant";
  $result = mysqli_query($link, $query);
  $list = "";

  while ($row = mysqli_fetch_array($result)) {
      $list .= "<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $escaped = array(
    'title' => 'Welcome',
    'description' => 'Let me introduce my lovely plants.🌿'
  );

  $update_link = '';
  $delete_link = '';
  $care = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      $query = "select * from plant left join care on plant.care_id = care.id where plant.id ={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped = array(
      'title' => htmlspecialchars($row['title']),
      'description' => htmlspecialchars($row['description']),
      'type' => htmlspecialchars($row['type']));
      $update_link = '<a href="update.php?id='.$filtered_id.'">update</a>';
      $delete_link = '
        <form action = "process_delete.php" style = "display:inline;" method="POST">
          <input type = "hidden" name ="id" value="'.$filtered_id.'">
          <input type = "submit" value = "delete">
      </form>
      ';
      $care = "<p>Type : {$escaped['type']} </p>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>DBP_W04</title>
</head>
<body>
  <h1><a href = "index.php">PLANT</a></h1>
  <a href = care.php>care<a>
  <ol><?= $list?></ol>
  <a href = "create.php">create</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2><?=$escaped['title']?></h2>
  <?=$escaped['description']?>
  <?= $care?>
</body>
</html>
