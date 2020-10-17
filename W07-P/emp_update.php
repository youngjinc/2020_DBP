<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    if(isset($_GET['emp_no'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['emp_no']);
    }else{
        $filtered_id = mysqli_real_escape_string($link, $_POST['emp_no']);
    }
    
    $query = "
        select * 
        from employees 
        where emp_no = '{$filtered_id}'
    ";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $update_link = '';
    if(empty($row)){
        echo '없는 회원정보 입니다. 다시 입력하세요. <a href="index.php">돌아가기</a>';
        error_log(mysqli_error($link));
    } else{
        $update_link = '
        <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보 삭제</h2>
    <form action="emp_update_process.php" method="POST">
        <label>emp_no : </label>
        <input type="text" name="emp_no" value="'.$row['emp_no'].'" placeholder="emp_no"><br><br>
        <label>birth_date : (0000-00-00) </label>
        <input type="text" name="birth_date" value="'.$row['birth_date'].'" placeholder="birth_date"><br><br>
        <label>fist_name : </label>
        <input type="text" name="first_name" value="'.$row['first_name'].'" placeholder="first_name"><br><br>
        <label>last_name : </label>
        <input type="text" name="last_name" value="'.$row['last_name'].'" placeholder="last_name"><br><br>
        <label>gender: (M or F) </label>
        <select name = "gender">
        <option value="M">M</option>
        <option value="F">F</option>
        </select><br><br>
        <label>hire_date: (0000-00-00)</label>
        <input type="text" name="hire_date" value="'.$row['hire_date'].'" placeholder="hire_date"><br><br>
        <input type="submit" value="Update">
    </form>';
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
            body{
                font-family: 'Open Sans', 'Noto Sans KR';
                font-family: 12px;
            }
        </style>
</head>
<body>
    <?=$update_link?>
</body>
</html>