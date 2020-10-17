<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit(0);
    }

    $filtered_number = mysqli_real_escape_string($link, $_GET['number']);

    $query = "
        select first_name, last_name, salary, from_date, to_date 
        from salaries
        left join employees
        on employees.emp_no = salaries.emp_no
        order by salary desc limit ".$filtered_number //limit 뒤에 띄어쓰기 주의!!!
    ;

    $article = '';

    $result = mysqli_query($link, $query);
    while($row=mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["first_name"];
        $article .= '</td><td>';
        $article .= $row["last_name"];
        $article .= '</td><td>';
        $article .= $row["salary"];
        $article .= '</td><td>';
        $article .= $row["from_date"];
        $article .= '</td><td>';
        $article .= $row["to_date"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>연봉 정보</title>
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
    </head>
    <body>
        <h2><a href="index.php">직원 관리 시스템</a> | 연봉정보</h2>
        <table border = "1">
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>salary</th> 
                <th>from_date</th>
                <th>to_date</th>
            </tr>
            <?=$article?>
        </table>
    </body>
</html>