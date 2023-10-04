<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?php
    $sql="SELECT NVL(MAX(SNO) + 1, 1001) AS sno FROM EXAMTBL_PSD";
    $result=$conn->query($sql);
    //if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sno=$row['sno'];
    if($sno=="") {
        $sno=1001;
    }
    //}
?>
<section>
<br>
<div align=center>
<h2>자료실 폼만들기</h2>
<form action=psdForm_ok.php method="post" enctype="multipart/form-data">
    <table border=1>
        <tr><td>번호</td><td><input type=text name=sno value=<?=$sno?>> </td></tr>
        <tr><td>이름</td><td><input type=text name=sname></td></tr>
        <tr><td>사진</td><td><input type=file name=img></td></tr>
        <tr><td colspan=2><input type=submit></td></tr>
    </table>
</form>
</div>
</br>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>