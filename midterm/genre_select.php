<?php
    $link = mysqli_connect("localhost", "admin", "admin", "netflix");

    $genre = mysqli_real_escape_string($link, $_GET['genre']);

    $query = "
    select type, title, director, cast, country, release_year, rating, duration, listed_in
    from info inner join actors 
    on actors.show_id = info.show_id
    inner join contents on contents.show_id = info.show_id
    where info.listed_in like \"%".$genre."%\"";

    $result = mysqli_query($link, $query);

     $content_info ='';
    while($row = mysqli_fetch_array($result)){ 
        $content_info .='<tr>';
        $content_info .='<tr>';
        $content_info .='<td>'.$row['listed_in'].'</td>';
        $content_info .='<td>'.$row['type'].'</td>';
        $content_info .='<td>'.$row['title'].'</td>';
        $content_info .='<td>'.$row['director'].'</td>';
        $content_info .='<td>'.$row['cast'].'</td>';
        $content_info .='<td>'.$row['country'].'</td>';
        $content_info .='<td>'.$row['release_year'].'</td>';
        $content_info .='<td>'.$row['rating'].'</td>';
        $content_info .='<td>'.$row['duration'].'</td>';
        $content_info .='</tr>';
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>NETFLIX 컨텐츠 조회 시스템</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@600&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: 'Open Sans', 'Noto Sans KR';
        font-family: 12px;
        background: black; 
        color:#ffffff;
    }

    .search{
        color:#ff0000;
    }

    table {
        width: 100%;
    }

    th,
    td {
        padding: 10px;
    }
    </style>

<body>

<h2 style = "display:inline" ><a href="index.php" class = "search">NETFLIX 컨텐츠 조회 시스템</a> | <?=$genre?></h2> <h2 style = "display:inline"> 컨텐츠 조회</h2>
    <table border="1">
        <tr>
            <th>listed_in</th>
            <th>type</th>
            <th>title</th>
            <th>director</th>
            <th>cast</th>
            <th>country</th>
            <th>release_year</th>
            <th>rating</th>
            <th>duration</th>
        </tr>
        <?=$content_info?>
    </table>
</body>
</head>

</html>