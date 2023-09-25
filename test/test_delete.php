<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>
<section>
<br>
<?
    $num_id = $_GET["num_id"];
    $ch1 = $_GET["ch1"];
    $ch2 = $_GET["ch2"];
    //echo $num_id;
    $sql_del = "DELETE FROM test WHERE NUM_ID = '$num_id'";
    $result_del = $conn->query($sql_del);
    $conn->close();

    //echo $ch1 . "/" . $ch2;
?>

<div id=divsection2 >    
<script>
    location.href="test_list.php?ch1="+'<?=$ch1?>'+"&ch2="+'<?=$ch2?>';
</script>
</div>
</br>
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>


