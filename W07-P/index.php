<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

  $query = 'select dept_name from departments';
  $result = mysqli_query($link, $query);
  $select_form = '<select name = "dname">';
  while ($row = mysqli_fetch_array($result)) {
      $select_form .= '<option value = "'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
  }
  $select_form .= '</select>';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
            body{
                font-family: 'Open Sans', 'Noto Sans KR';
                font-family: 12px;
            }
        </style>
</head>

<body>
    <h1>직원 관리 시스템</h1>
    <form action="emp_select.php" method="get">
        (1) 직원 정보 조회: 
    <input type="text" name="number1" placeholder="number">
    <input type="submit" value="Search">
    </form><br> (2) 
    <a href="emp_insert.php"> 직원 정보 등록 </a><br><br>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Update">
    </form><br>
    <form action="emp_delete.php" method="POST">
        (4) 직원 정보 삭제:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Delete">
    </form><br>
    <form action="salary_info.php" method="get">
        (5) 연봉 정보:
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form><br>
    <form action="emp_title_info.php" method="get">
        (6) 부서 내 직원, 직급 정보:
        <?=$select_form?>
        <input type="submit" value="Search">
    </form>
</body>
</html>