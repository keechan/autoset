<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>   
<div id=divsection>
<h2>테스트 목록보기</h2>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?
//시작페이지
$start=$_GET['start'];
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

$sql = "SELECT * FROM test LIMIT $start, $page_size ";

$result = $conn->query($sql);

//전체 레코드 수 표시
$sql_tc = "SELECT count(*) tc, ceil(count(*)/10) cc FROM test";
$result_tc = $conn->query($sql_tc);
$row_tc = $result_tc->fetch_assoc();

if ($result->num_rows > 0) {
  ?>
  전체 레코드 수 : <?=$row_tc['tc']?>, 페이지 : <?=ceil(($start+1)/$page_size)?> / <?=$row_tc['cc']?>
  <table border=1 width=500>
  <tr>
    <th>번호 </th><th>제목 </th>  <th>내용 </th> 
  </tr>
  <?
  while($row = $result->fetch_assoc()) {
?>
  <tr bgcolor='<?=$bg?>'>
    <td> <?=$row["num_id"]?> </td>
    <td> <?=$row["title"]?></td>
    <td> <?=$row["content"]?></td>
  </tr>
  <?
  }
  ?>
  </table>
<?  if($start == 0) { ?>
  이전
<?  } else { ?>
  <a href=test_list.php?start=<?=$previos_page?>>이전</a>
<?  } ?>

<?  if($next_page==$row_tc['cc']) { ?>
  이전
<? } else { ?>
  <a href=test_list.php?start=<?=$next_page?>>다음</a>
<? } ?>


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