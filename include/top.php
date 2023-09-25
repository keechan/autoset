<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>쇼핑몰회원관리</title>
<style type="text/css">
  header{
    background-color:#0022ee;  /* 배경색 */
    height:90px;    /* 높이 */
    line-height:90px;  /* 라인의 높이  */
    text-align:center;
    color : #ffffff;
  }
  nav{
    background-color:#6699ff;  /* 배경색 */
    height:40px;    /* 높이 */
    line-height:40px;  /* 라인의 높이  */
    text-align:left;
    color : #ffffff;
  }

  section{ 
    background-color:#CCCCCC;;  /* 배경색 */
    min-height:500px;    /* 최소 높이 */
    text-align:left;
    font-size : 17px;
  }

  #divsection{
    margin : 20px;
    text-align:center;
  }

  #divsection2{
    text-align:center;
  }

  table {
    margin:auto;
  }

  th{
    text-align:center;
  }

  tr{
    text-align:center;
  }

  footer{
    background-color:#2244ff;  /* 배경색 */
    height:40px;    /* 높이 */
    line-height:40px;  /* 라인의 높이  */
    text-align:center;
    color : #ffffff;
    font-size : 17px;   
  }
</style>
</head>
<body>
 
<?php
  $host=$_SERVER['HTTP_HOST'];
  $path="http://".$host;
?>

<header>
<h1> 쇼핑몰 회원관리 ver 1.0 </h1>
</header>
    <nav>
        &emsp;&emsp; <a href=<?=$path?>/member/member.php>회원가입</a>
        &emsp;&emsp; <a href=<?=$path?>/member/member_list.php>회원목록보기 </a>
        &emsp;&emsp; <a href=<?=$path?>/test/test_list.php>목록보기</a>
        &emsp;&emsp; <a href=<?=$path?>/test/test_insert.php>목록보기</a>
        &emsp;&emsp; <a href=<?=$path?>/index.php>홈으로 </a>
    </nav>