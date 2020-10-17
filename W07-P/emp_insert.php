

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
            body{
                font-family: 'Open Sans', 'Noto Sans KR';
                font-family: 12px;
            }
        </style>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 신규 직원 등록</h2>
    <form action="emp_insert_process.php" method="POST">
        <label>emp_no : </label>
        <input type="text" name="emp_no" placeholder="emp_no"><br><br>
        <label>birth_date : (0000-00-00) </label>
        <input type="text" name="birth_date" placeholder="birth_date"><br><br>
        <label>fist_name : </label>
        <input type="text" name="first_name" placeholder="first_name"><br><br>
        <label>last_name : </label>
        <input type="text" name="last_name" placeholder="last_name"><br><br>
        <label>gender: (M or F) </label>
        <select name = "gender">
        <option value="M">M</option>
        <option value="F">F</option>
        </select><br><br>
        <label>hire_date: (0000-00-00)</label>
        <input type="text" name="hire_date" placeholder="hire_date"><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>