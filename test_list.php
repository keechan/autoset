<? include ("top.php") ?>
<section>
<br>   
<div id=divsection>
<h2>회원가입</h2>  

<? include("dbconn.php") ?>
<?
$sql = "SELECT * FROM member";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
  <table border=1 width=500>
  <tr>
    <th>순번 </th><th>아이디 </th>  <th>암호 </th> 
    <th>이름 </th> <th>날짜 </th> 
  </tr>
  <?
  while($row = $result->fetch_assoc()) {
    $count++;
    ?>
    <tr>
    <td> <?=$count ?> </td>
    <td> <?=$row["id"]?> </td>
    <td> <?=$row["password"]?></td>
    <td> <?=$row["name"]?></td>
    <td>
         <?=substr($row["reg_date"],0,4)?> 년 
         <?=substr($row["reg_date"],5,2)?> 월 
         <?=substr($row["reg_date"],8,2)?> 일 
    </td>
    </tr>
    <?
  }
  echo " </table>";
} else {
  echo "0 results";
}
$conn->close();
?>


</div>
<br>   
</section>
<? include ("bottom.php") ?>