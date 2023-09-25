<? include ("top.php") ?>
<section>
<br>   
<div id=divsection>
<h2>회원관리 목록보기</h2>  

<? include("dbconn.php") ?>

<?
$ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];

echo $ch1 . "/" . $ch2;

if ($ch1=="" || $ch2=="") {
    $sql = "SELECT * FROM member LIMIT 0, 7 ";
} else if ($ch1 == "id") {
    $sql = "SELECT * FROM member where id LIKE '%$ch2%'";
} else if ($ch1 == "name") {
    $sql = "SELECT * FROM member where name like '%$ch2%'";
} 

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
    if ($count % 2 == 0) {
        $bg="#ccffff";
    } else {
        $bg="#aaffaa";
    }
?>
  <tr bgcolor='<?=$bg?>'>
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
<form action="#">
    <select name=ch>
        <option value=ch1 value=>아이디</option>
        <option value=ch2 value>이&nbsp&nbsp름</option>
    </select>
    <input type=text>
    <input type=submit value="검색하기">
</form>

</div>
<br>   
</section>
<? include ("bottom.php") ?>