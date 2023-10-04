<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>   
<div id=divsection>
<h2>자료실 목록보기</h2>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?
$sql = "SELECT * FROM examtbl_psd";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
  <table border=1 width=500>
  <tr>
    <th>번호 </th><th>이름</th><th>파일명</th><th>사진</th>
  </tr>
<?
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td>
    <a href="psd_edit.php?sNo=<?=$row['sNo']?>"><?=$row["sNo"]?></a>
    </td>
    <td> <?=$row["sName"]?></td>
    <td> <?=$row["img"]?></td>
    <td><img src='./files/<?=$row["img"]?>' width=30 height=30 /></td>
  </tr>
<?
  }
}
$conn->close();
?>
  </table>
</div>
<br>   
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>