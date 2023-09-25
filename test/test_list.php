<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>   
<div id=divsection>
<h2>테스트 목록보기</h2>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?
//시작페이지
$start=$_GET['start'];

//검색값
$ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];

//페이지 사이즈
$page_size = 10;
if($start=='') {
  $start=0;
} else {
  $start = $_GET['start'];
}

if($start==0) {
  $previos_page=0;
} else {
  $previos_page=$start-$page_size;
}
//다음페이지
$next_page=$start+$page_size;

if ($ch1 == null) {
  $sql = "SELECT * FROM test LIMIT $start, $page_size ";
} else if ($ch1 == "title") {
  $sql = "SELECT * FROM test WHERE TITLE LIKE '%$ch2%' LIMIT $start, $page_size ";
} else {
  $sql = "SELECT * FROM test WHERE CONTENT LIKE '%$ch2%' LIMIT $start, $page_size ";
}

$result = $conn->query($sql);

//전체 레코드 수 표시
if ($ch1 == null) {
  $sql_tc = "SELECT count(*) tc, ceil(count(*)/$page_size) cc FROM test";
} else if ($ch1 == "title") {
  $sql_tc = "SELECT count(*) tc, ceil(count(*)/$page_size) cc FROM test WHERE TITLE LIKE '%$ch2%'";
} else {
  $sql_tc = "SELECT count(*) tc, ceil(count(*)/$page_size) cc FROM test WHERE CONTENT LIKE '%$ch2%'";
}

//echo $sql_tc;
$result_tc = $conn->query($sql_tc);
$row_tc = $result_tc->fetch_assoc();

if ($result->num_rows > 0) {
  ?>
  전체 레코드 수 : <?=$row_tc['tc']?>, 전체 페이지 : <?=$row_tc['cc']?>, 현재 페이지 : <?=ceil(($start+1)/$page_size)?>
  <table border=1 width=500>
  <tr>
  <th>순번 </th><th>번호 </th><th>제목 </th>  <th>내용 </th> 
  </tr>
  <?
  while($row = $result->fetch_assoc()) {
    $count++;
    if ($count % 2 == 0 ) {
      $bg="#99aaCC";
    }else{
      $bg="#aaffaa";
    }
  ?>
  <tr bgcolor='<?=$bg?>'>
    <td> <?=$count?></td>
    <td> <?=$row["num_id"]?> </td>
    <td> <?=$row["title"]?></td>
    <td> <a href=test_delete.php?num_id=<?=$row["num_id"]?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>><?=$row["content"]?></a></td>
  </tr>
  <?
  }
  ?>
  </table>
<a href=test_list.php?start=0>처음으로</a> &emsp;
  
<?  if($start == 0) { ?>
  이전
<?  } else { ?>
  <a href=test_list.php?start=<?=$previos_page?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>이전</a>&emsp;
<?  } ?>

<? if($next_page/$page_size==$row_tc['cc']) { ?>
  다음
<? } else { ?>
  <a href=test_list.php?start=<?=$next_page?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>다음</a>&emsp;
<? } ?>
<?
    //마지막 페이지 : 
    $end=($row_tc['cc'] - 1) * $page_size;
?>
<a href=test_list.php?start=<?=$end?>>마지막으로</a>

<form>
  <select name=ch1>
    <option value=title>제목</option>
    <option value=content>내용</option>
  </select>
  <input type=text name=ch2>
  <input type=submit value="검색하기">
</form>

<?
  } else {
    echo "0 results";
  }
  $conn->close();
?>

</div>
<br>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>