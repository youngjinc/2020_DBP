<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $filtered = array(
    'type' => mysqli_real_escape_string($link, $_POST['type']),
    'watering' => mysqli_real_escape_string($link, $_POST['watering'])
  );

  $query = "
  insert into care
    (type, watering)
  value (
      '{$filtered['type']}',
      '{$filtered['watering']}'
      )
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header("Location: care.php");
  }
