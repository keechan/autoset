<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>
<?
    //$_GET, $POST, $_REQUEST
    $sno = $_REQUEST['sno'];
    $sname = $_REQUEST['sname'];
    $img = $_FILES['img']['name']; //파일이름
    $tmp = $_FILES['img']['tmp_name']; //실제 파일

    if ($img == '') {
        $img='space.png';
    } else {
        if (file_exists("./files/$img")) {
            echo "동일 파일 존재"."<br>";
            $f1 = basename($img);
            echo "fname : ".$f1."<br>"; //이미지2.png

            $f2=strrchr($img, '.');
            echo "f2 : ".$f2."<br>"; //.png

            $fname=basename($img, strrchr($img, '.'));
            echo "fname : ".$fname."<br>"; //이미지2

            $time = date("His", time());
            echo "time : ".$time."<br>"; //시(H)분(i)초(s)가 붙음

            $ext = strrchr($img, '.');
            echo "ext : ".$ext."<br>"; //확장자

            $img = $fname."_".$time.$ext;
            echo "img : ".$img."<br>"; 
        }
    }
    move_uploaded_file($tmp, "./files/$img"); //파일저장
    $sql = "insert into examtbl_psd (sNo, sName, img)
            values ('$sno', '$sname', '$img')";
    $conn->query($sql);
    header("location:psd_list.php");
?>
<div align=center>
<h1>저장완료!!</h1>
</div>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>