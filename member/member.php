<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<section>
<br>
<div id=divsection2 >
    <h2>회원가입하기</h2>
    <form action=form_ok.php>
        <table border=1>
            <tr><td>아이디</td><td><input type=text name=id></td></tr>
            <tr><td>암&nbsp&nbsp호</td><td><input type=text name=password></td></tr>
            <tr><td>이&nbsp&nbsp름</td><td><input type=text name=name></td></tr>
            <tr><td colspan=2 align=center><input type=submit value="저장하기"></td></tr>
    </table>
    </form>
</div>
<br>
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>