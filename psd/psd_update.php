<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>
<section>
<br>
<?
    //$_GET, $POST, $_REQUEST
    $sno = $_REQUEST['sno'];
    $sname = $_REQUEST['sname'];
    $img = $_FILES['img']['name']; //파일이름
    $tmp = $_FILES['img']['tmp_name']; //실제 파일

    $sql = "SELECT * FROM examtbl_psd where sNo = $sno ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    //삭제할 파일
    $delFile=$row["img"];
    
    if ($img=='') {
      //첨부파일이 없는 경우
      $update_sql = "update examtbl_psd set sName='$sname' WHERE sNo=$sno";
      $update_result = $conn->query($update_sql);
    } else {
      //기존파일 체크
      //기존파일이 space인지 아닌지 확인. space인경우 삭제 불필요
      if ($delFile!='space.png') {
        //삭제
        $targetDelFile="./files/$delFile";
        unlink($targetDelFile);
      }
      if (file_exists("./files/$img")) {
        $f1 = basename($img);
        $f2=strrchr($img, '.');
        $fname=basename($img, strrchr($img, '.'));
        $time = date("His", time());
        $ext = strrchr($img, '.');
        $img = $fname."_".$time.$ext;
      }
      move_uploaded_file($tmp, "./files/$img"); //파일저장

      //첨부파일이 있는 경우
      $updateImg_sql = "update examtbl_psd set sName='$sname', img='$img' WHERE sNo=$sno";
      $update_result = $conn->query($updateImg_sql);
    }
    $conn->close();
    header("location:psd_list.php");
?>
<div align=center>
<h1>저장완료!!</h1>
</div>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>