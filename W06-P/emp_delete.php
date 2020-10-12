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
    $delete_link = '';
    if(empty($row)){
        echo '없는 회원정보 입니다. 다시 입력하세요. <a href="index.php">돌아가기</a>';
        error_log(mysqli_error($link));
    } else{
        $delete_link = '
        <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보 삭제</h2>
    <form action="emp_delete_process.php" method="POST">
        <label>emp_no : </label>
        <input type="text" name="emp_no" value="'.$row['emp_no'].'" placeholder="emp_no" readonly><br>
        <label>birth_date : (0000-00-00) </label>
        <input type="text" name="birth_date" value="'.$row['birth_date'].'" placeholder="birth_date" readonly><br>
        <label>fist_name : </label>
        <input type="text" name="first_name" value="'.$row['first_name'].'" placeholder="first_name" readonly><br>
        <label>last_name : </label>
        <input type="text" name="last_name" value="'.$row['last_name'].'" placeholder="last_name" readonly><br>
        <label>gender: (M or F) </label>
        <input type="text" name="gender" value="'.$row['gender'].'" placeholder="gender" readonly><br>
        <label>hire_date: (0000-00-00)</label>
        <input type="text" name="hire_date" value="'.$row['hire_date'].'" placeholder="hire_date" readonly><br>
        <input type="submit" value="Delete">
    </form>';
    }
    //print_r($row); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<body>
   <?=$delete_link?>
</body>
</html>