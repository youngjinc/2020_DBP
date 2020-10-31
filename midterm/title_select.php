<?php
    $link = mysqli_connect("localhost", "admin", "admin", "netflix");
    
    $title = mysqli_real_escape_string($link, $_POST['title']);

    $query = "
    select type, title, director, cast, country, release_year, rating, duration, listed_in, description
    from info inner join actors 
    on actors.show_id = info.show_id
    inner join contents on contents.show_id = info.show_id
    where title = '{$title}'
    ";

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $content_info = '';
    if(empty($row)){
        echo '입력하신 컨텐츠가 존재하지 않습니다. <a href="latest_content_select.php">돌아가기</a>';
        error_log(mysqli_error($link));
    }else{
        $content_info = '
        <table border="1" class = table>
        <tr>
            <th>type</th>
            <th>title</th>
            <th>director</th>
            <th>cast</th>
            <th>country</th>
            <th>release_year</th>
            <th>rating</th>
            <th>duration</th>
            <th>listed_in</th>
            <th>description</th>
        </tr>
        <tr>
        <th>'.$row['type'].'</th>
        <th>'.$row['title'].'</th>
        <th>'.$row['director'].'</th>
        <th>'.$row['cast'].'</th>
        <th>'.$row['country'].'</th>
        <th>'.$row['release_year'].'</th>
        <th>'.$row['rating'].'</th>
        <th>'.$row['duration'].'</th>
        <th>'.$row['listed_in'].'</th>
        <th>'.$row['description'].'</th>
        </tr>
    </table>
        ';

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>NETFLIX 컨텐츠 조회 시스템</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
            body{
                font-family: 'Open Sans', 'Noto Sans KR';
                font-family: 12px;
                background: black; 
                color:#ff0000;
            }

            .table{
                color:#ffffff;
            }

        </style>
</head>
<body>
    <?=$content_info?>
</body>
</html>