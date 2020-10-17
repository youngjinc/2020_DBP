<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");

    $filtered_dept_name= mysqli_real_escape_string($link, $_GET['dname']);

    // 입력받은 부서명(departments)으로 해당 부서(dept_emp)에 속한 사원의 정보(employees)와 직급(titles)을 출력
    $query = "
    select title, first_name, last_name, gender, hire_date 
    from departments inner join dept_emp 
    on departments.dept_no = dept_emp.dept_no 
    inner join employees 
    on employees.emp_no = dept_emp.emp_no 
    inner join titles 
    on titles.emp_no = employees.emp_no 
    where departments.dept_name = '".$filtered_dept_name."'";
    $result = mysqli_query($link, $query);

    $emp_info ='';
    while($row = mysqli_fetch_array($result)){ 
        $emp_info .='<tr>';
        $emp_info .='<td>'.$row['title'].'</td>';
        $emp_info .='<td>'.$row['first_name'].'</td>';
        $emp_info .='<td>'.$row['last_name'].'</td>';
        $emp_info .='<td>'.$row['gender'].'</td>';
        $emp_info .='<td>'.$row['hire_date'].'</td>';
        $emp_info .='</tr>';
    }

    $title = " | ".$filtered_dept_name." - 직원, 직급 정보";
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
    <h2><a href="index.php">직원 관리 시스템</a><?=$title?></h2>
    <table border="1">
        <tr>
            <th>title</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hiredate</th>
        </tr>
        <?=$emp_info?>
    </table>
</body>
</head>

</html>