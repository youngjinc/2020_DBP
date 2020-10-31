<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'netflix');

  $query1 = '
  select distinct SUBSTRING_INDEX (SUBSTRING_INDEX(info.listed_in,\', \',numbers.n),\', \',-1) listed_in
from 
  (select  1 n union  all  select 2  
   union  all  select  3  union  all select 4 
   union  all  select  5  union  all  select  6
   union  all  select  7  union  all  select  8 
   union  all  select  9 union  all  select  10) numbers INNER  JOIN info
   on CHAR_LENGTH ( info . listed_in ) 
     - CHAR_LENGTH ( REPLACE ( info . listed_in ,  \', \' ,  \'\' ))>= numbers . n-1
order by listed_in';

  $result1 = mysqli_query($link, $query1);
  $select_form1 = '<select name = "genre">';
  while ($row = mysqli_fetch_array($result1)) {
      $select_form1 .= '<option value = "'.$row['listed_in'].'">'.$row['listed_in'].'</option>';
  }
  $select_form1 .= '</select>';




  $query2 = '
  select distinct SUBSTRING_INDEX (SUBSTRING_INDEX(info.country,\', \',numbers.n),\', \',-1) country
from 
  (select  1 n union  all  select 2  
   union  all  select  3  union  all select 4 
   union  all  select  5  union  all  select  6
   union  all  select  7  union  all  select  8 
   union  all  select  9 union  all  select  10) numbers INNER  JOIN info
   on CHAR_LENGTH ( info . country ) 
     - CHAR_LENGTH ( REPLACE ( info . country ,  \', \' ,  \'\' ))>= numbers . n-1
order by country';

  $result2 = mysqli_query($link, $query2);
  $select_form2 = '<select name = "country">';
  while ($row = mysqli_fetch_array($result2)) {
      $select_form2 .= '<option value = "'.$row['country'].'">'.$row['country'].'</option>';
  }
  $select_form2 .= '</select>';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>NETFLIX 컨텐츠 조회 시스템</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&family=Open+Sans:wght@700&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: 'Open Sans', 'Noto Sans KR';
        font-family: 12px;
        background: black; 
        color:#ffffff;
    }
    .netflix{
        color:#ff0000;
    }

    .layer{
        width: 100%; height: 100vh; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; align-items: center; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center;
    }

    .inner_layer{ text-align: center; padding: 2em; }
    </style>
</head>

<body>
<div class= "layer">
<div class="inner_layer">
<h1 class = "netflix" style = "display:inline" >NETFLIX </h1> <h1 style = "display:inline">컨텐츠 조회 시스템</h1>
    <form action="actor_select.php" method="get"><br>
        (1) 출연배우로 컨텐츠 조회
        <input type="text" name="actor" placeholder="Actor">
        <input type="submit" value="Search">
    </form><br>
    <form action="genre_select.php" method="get">
        (2) 장르별 컨텐츠 조회 
        <?=$select_form1?>
        <input type="submit" value="Search">
    </form><br>
    <form action="country_select.php" method="get">
        (3) 국가별 컨텐츠 조회 
        <?=$select_form2?>
        <input type="submit" value="Search">
    </form><br>
    <form action="latest_content_select.php" method="POST">
        (4) 최신순으로 컨텐츠 정보 조회 
        <input type="submit" value="Search">
    </form><br>
</div>

</div>
    
</body>

</html>