<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $filtered = array(
    'type' => mysqli_real_escape_string($link, $_POST['type']),
    'watering' => mysqli_real_escape_string($link, $_POST['watering']),
    'id'=> mysqli_real_escape_string($link, $_POST['id'])
  );

  $query = "
  update care
    set
      type = '{$filtered['type']}',
      watering = '{$filtered['watering']}'
    where
      id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header("Location: care.php");
  }
