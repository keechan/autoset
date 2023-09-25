<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>

<?
$array1 = array("ASP", "JSP", "PHP", "ASP.NET");
$array2 = array(" 초급", " 중급", " 고급");
$array3 = array("영심이","둘리", "하니", "똘이", "하늘이");

for ($i=1;$i<=10;$i++) {
    $random0=mt_rand(1,100);
    $random1=mt_rand(0,3);
    $random2=mt_rand(0,2);
    $random3=mt_rand(0,4);

    $title=$array3[$random3].$random0;
    $content=$array1[$random1].$array2[$random2].$array3[$random3];
    $sql = "INSERT INTO test (title, content) 
                 VALUES ('$title', '$content')";

    $result = $conn->query($sql);
    
    echo $sql."<br>";
}

$conn->close();
?>

<section>
<br>
<div id=divsection2 >
<h2 text-align:center>저장되었습니다!</h2>
</div>
</br>
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>