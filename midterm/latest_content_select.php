<?php
    $link = mysqli_connect("localhost", "admin", "admin", "netflix");

    $query = "
    select type, title, director, cast, country, release_year, rating, duration, listed_in, description
    from info inner join actors 
    on actors.show_id = info.show_id
    inner join contents on contents.show_id = info.show_id
    order by release_year desc
    ";

    $result = mysqli_query($link, $query);

    $content_info ='';
    while($row = mysqli_fetch_array($result)){ 
        $content_info .='<tr>';
        $content_info .='<td>'.$row['type'].'</td>';
        $content_info .='<td>'.$row['title'].'</td>';
        $content_info .='<td>'.$row['director'].'</td>';
        $content_info .='<td>'.$row['cast'].'</td>';
        $content_info .='<td>'.$row['country'].'</td>';
        $content_info .='<td>'.$row['release_year'].'</td>';
        $content_info .='<td>'.$row['rating'].'</td>';
        $content_info .='<td>'.$row['duration'].'</td>';
        $content_info .='<td>'.$row['listed_in'].'</td>';
        $content_info .='<td>'.$row['description'].'</td>';
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
    </style>
</head>

<body>
<form action="title_select.php" method="POST" class="search" style = "display:inline">
        컨텐츠 제목으로 검색:
        <input type="text" name="title" placeholder="Title">
        <input type="submit" value="Search">
    </form>
    <form action="index.php" method="POST" style = "display:inline">
        <input type="submit" value="Back">
    </form><br>
    <table border="1">
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
        <?=$content_info?>
    </table>
</body>

</html>