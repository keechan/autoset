<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>
<div id=divsection>
<h2>자료실 목록보기</h2>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?
  $sno = $_REQUEST['sno'];
  $sql = "SELECT img FROM examtbl_psd WHERE sNo=$sno";
  $result = $conn->query($sql);
  $row=$result->fetch_assoc();
  //echo $row["img"];
  
  //파일 삭제
  $filedir = "./files/".$row["img"];
  if(!unlink($filedir)){
    echo 'failed\n';
  } else {
    echo 'success\n';
  }
  
  //레코드 삭제
  $sql="delete FROM examtbl_psd where sNo=$sno";
  $conn->query($sql);

  $conn->close();

  header("location:psd_list.php");
  ?>
  

  <section>
  <br>
  <div id=divsection2 >
  <h2 text-align:center>삭제 되었습니다!</h2>
  </div>
  </br>
  </section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>