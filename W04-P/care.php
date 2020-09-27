<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $query = "select * from care";
  $result = mysqli_query($link, $query);
  $care_info = '';

  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
        'id'=> htmlspecialchars($row['id']),
        'type' => htmlspecialchars($row['type']),
        'watering' => htmlspecialchars($row['watering'])
      );

      $care_info .= '<tr>';
      $care_info .= '<td>'.$filtered['id'].'</td>';
      $care_info .= '<td>'.$filtered['type'].'</td>';
      $care_info .= '<td>'.$filtered['watering'].'</td>';
      $care_info .= '<td><a href = "care.php?id='.$filtered['id'].'">update</a></td>';
      $care_info .= '
      <td>
        <form action = "process_delete_careguide.php" method = "post">
        <input type = "submit" value ="delete">
        <input type="hidden" name = id value = "'.$filtered['id'].'">
        </form>
      </td>';
      $care_info .= '</tr>';
  };

  $escaped = array(
    'type' => '',
    'watering' => ''
  );

  $form_action = 'process_create_careguide.php';
  $label_submit = 'Create care guide';
  $form_id = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered, 'integer');
      $query = "select * from care where id ={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped = array(
      'type' => $row['type'],
      'watering' => $row['watering']
    );
      $form_action = 'process_update_careguide.php';
      $label_submit = 'Update care guide';
      $form_id = '<input type ="hidden" name = "id" value = "'.$filtered_id.'">';
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
  <p><a href = index.php>plant<a></p>
    <table border = "1">
      <tr>
        <th>id</th>
        <th>type</th>
        <th>watering</th>
        <th>update</th>
        <th>delete</th>
      </tr>
      <?=$care_info?>
    </table>
    <br>
    <form action = <?=$form_action?> method = "post">
      <?=$form_id?>
    <label for="type">type : </label><br>
    <input type="text" id = "type" name = "type" placeholder = "type" value = "<?=$escaped['type']?>" ><br>
    <label for="watering">watering : </label><br>
    <input type="text" id = "watering" name = "watering" placeholder = "watering" value = "<?=$escaped['watering']?>" ><br><br>
    <input type="submit" value = "<?=$label_submit?>">
  </from>
</body>
</html>
