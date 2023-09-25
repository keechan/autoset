<? include("top.php") ?>
<? include("dbconn.php") ?>
<?
$id=$_GET['id'];
$password=$_GET['password'];
$name=$_GET['name'];

$sql = "INSERT INTO member (ID, PASSWORD, NAME, REG_DATE) 
                    VALUES ('$id', '$password', '$name', now())";

$result = $conn->query($sql);
$conn->close();
?>

<section>
<br>
<div id=divsection2 >
<h2 text-align:center>저장되었습니다!</h2>
</div>
</br>
</section>

<?include("bottom.php") ?>