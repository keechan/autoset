<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? 
$ch1=$_GET["ch1"];
$ch2=$_GET["ch2"];
?>

<section>
<br>
<div align=center>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/dbconn.php" ?>
<h2>학생 성적 처리 프로그램</h2>
    <table border=1>
    <tr>
        <th>학년</th><th>반</th><th>번호</th>
        <th>사진</th>
        <th>이름</th><th>국어</th>
        <th>영어</th><th>수학</th><th>역사</th>
        <th>합계</th><th>평균</th><th>평점</th>
    </tr>
<?
    //echo $ch1 . "/" . $ch2;
    if ($ch1=="") {
        $sql="SELECT sNo, sName, kor, eng, math, hist, case when round((kor + eng + math + hist) / 4, 1) >= 90 then 'A' else 'F' end grade FROM examtbl";
    } else if ($ch1=="sname") {
        $sql="SELECT sNo, sName, kor, eng, math, hist, case when round((kor + eng + math + hist) / 4, 1) >= 90 then 'A' else 'F' end grade FROM examtbl WHERE sName LIKE '%$ch2%'";
    } else if ($ch1=="grade") {
        $sql="SELECT sNo, sName, kor, eng, math, hist, grade FROM (SELECT sNo, sName, kor, eng, math, hist, case when round((kor + eng + math + hist) / 4, 1) >= 90 then 'A' else 'F' end grade FROM examtbl) examtbl WHERE grade LIKE '%$ch2%'";
    }
    echo $sql;
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sumExam = 0;
        $avgExam = 0;    
        while($row = $result->fetch_assoc()) {
            $count++;
            $imgSrc="./img/".$count.".PNG";
            $ksum += $row["kor"];
            $esum += $row["eng"];
            $msum += $row["math"];
            $hsum += $row["hist"];
//            if ($count % 2 == 0) {
//                $bg="#ccffff";
//            } else {
//                $bg="#F08282";
//            }
            $sumExam = $row["kor"] + $row["eng"] + $row["math"] + $row["hist"];
            $avgExam = $row["kor"] + $row["eng"] + $row["math"] + $row["hist"] / 4;
            //$row["grade"];
            $gsum += $sumExam;
            if($grade = "A") {
                $bg = "#CCCCCC";                
            } else {
                $bg = "#FF0000";
            }
?>
    <tr>
        <td><?=substr($row["sNo"], 0, 1)?></td>
        <td><?=substr($row["sNo"], 1, 2)?></td>
        <td><?=substr($row["sNo"], 3, 2) ?></td>
        <td align=center><img src=<?=$imgSrc?> width=30 height=30/></td>
        <td><?=$row["sName"]?></td><td><?=$row["kor"]?></td>
        <td><?=$row["eng"]?></td><td><?=$row["math"]?></td><td><?=$row["hist"]?></td>
        <td><?=$sumExam?></td><td><?=$avgExam?></td>
        <td bgcolor='<?=$bg?>'><?=$grade?></td>
    </tr>
<?      }
        $kavg = $ksum / $count;
        $eavg = $esum / $count;
        $mavg = $msum / $count;
        $havg = $hsum / $count;
        $gavg = $gsum / $count;
?>
    <tr>
        <td align="center" colspan=5>누적합</td>
        <td><?=$ksum?></td>
        <td><?=$esum?></td>
        <td><?=$msum?></td>
        <td><?=$hsum?></td>
        <td><?=$gsum?></td>
        <td><?=$AvgExam?></td>
        <td rowspan=2></td>
    </tr>
    <tr>
        <td align="center" colspan=5>누적평균</td>
        <td><?=$kavg?></td>
        <td><?=$eavg?></td>
        <td><?=$mavg?></td>
        <td><?=$havg?></td>
        <td><?=$gavg?></td>
        <td><?=$gAvgExam/$count?></td>
    </tr>
<?
    }
    $conn->close();
?>
</table>
<form>
    <select name=ch1>
        <option value="sname">이름</option>
        <option value="grade">평점</option>
    </select>
    <input type=text name=ch2>
    <input type=submit>
</form>
</div>
</br>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>