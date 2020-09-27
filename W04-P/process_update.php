<?php
  $link = mysqli_connect('localhost', 'root', '20181006', 'assignment');
  $filtered = array(
    'id'=> mysqli_real_escape_string($link, $_POST['id']),
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'care_id'=> mysqli_real_escape_string($link, $_POST['care_id'])
  );

  $query = "
  update plant
    set
      title = '{$filtered['title']}',
      description = '{$filtered['description']}',
      care_id = '{$filtered['care_id']}'
    where
      id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header("Location: index.php");
  }
