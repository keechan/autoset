<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?php
    $sno = $_REQUEST['sNo'];
    $sql = "SELECT * FROM examtbl_psd WHERE sNo = $sno";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sname = $row["sName"];
?>
<section>
<br>
<div align=center>
<h2>자료실 상세보기</h2>
<form action=psd_update.php method="post" enctype="multipart/form-data">
    <table border=1 width=300 height=350>
        <tr>
            <td colspan=2 align=center>
                <img src=./files/<?=$row['img']?> width=290 height=300/>
            </td>
        </tr>
        <tr><td>번호</td>
        <td><input type=text name=sno value=<?=$sno?> readonly></td></tr>
        <><td>이름</td>
        <td><input type=text name=sname value=<?=$sname?>></td>
        <tr><td>사진</td>
        <td><input type=file name=img></td></tr>
        <tr><td colspan=2><input type=submit value="수정하기"></td></tr>
    </table>
</form>
<hr width=80%>
<a href= "./psd_delete.php?sno=<?=$sno?>">삭제하기</a> &emsp;
<a href= "./psd_list.php">목록보기</a> &emsp;
<a href= "psdForm.php">저장하기</a> &emsp;
</div>
</br>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>