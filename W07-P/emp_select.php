<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");

    $filtered_number = mysqli_real_escape_string($link, $_GET['number1']);

    $query = "select * from employees order by emp_no desc limit ".$filtered_number;
    $result = mysqli_query($link, $query);

    $emp_info ='';
    while($row = mysqli_fetch_array($result)){ 
        $emp_info .='<tr>';
        $emp_info .='<td>'.$row['emp_no'].'</td>';
        $emp_info .='<td>'.$row['birth_date'].'</td>';
        $emp_info .='<td>'.$row['first_name'].'</td>';
        $emp_info .='<td>'.$row['last_name'].'</td>';
        $emp_info .='<td>'.$row['gender'].'</td>';
        $emp_info .='<td>'.$row['hire_date'].'</td>';
        $emp_info .='<td><a href = "emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .='<td><a href = "emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
        $emp_info .='</tr>';
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
            table{
                width: 100%;
            }
            th,td{
                padding: 10px;    
            }
        </style>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보 조회</h2>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hiredate</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$emp_info?>
    </table>
</body>
</head>

</html>