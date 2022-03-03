<?php
session_start();
include "common.php";
@extract($_REQUEST);

//로그인 검사
if($mode == "signin") {
    if($id == "") {
        alert_redir("아이디를 입력해주세요.", "");
        exit;
    }
    if($pw == "") {
        alert_redir("비밀번호를 입력해주세요.", "");
        exit;
    }

    $enc_pw = sha1($pw);
    $sql = "select * from member where id='$id'";
    $row = dbqueryfetch($sql);

    if($row['id'] != "" && $row['pw'] == $enc_pw) {
        //로그인 성공
        $_SESSION['ss_id'] = $row['id'];
        $_SESSION['ss_name'] = $row['name'];
        alert_redir("로그인 성공", "main.php");
    } else {
        //로그인 실패
        alert_redir("로그인 실패", "");
    }
    exit;
} else if($mode == "logout") {
    $_SESSION['ss_id'] = "";
    $_SESSION['ss_name'] = "";
    alert_redir("로그아웃 하셨습니다", "signin.php");
    exit;
}

?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>로그인</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="post" name="signin_form">
        <input type="hidden" name="mode" value="signin">

            <h1 class="h3 mb-3 fw-normal">뮤직박스</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="id" id="floatingId" placeholder="아이디">
                <label for="floatingId">아이디</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pw" id="floatingPassword" placeholder="비밀번호">
                <label for="floatingPassword">비밀번호</label>
            </div>

            <div class="checkbox mb-3">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="button" onclick="form_check()">로그인</button>

            <p>&nbsp;</p>
            <p>아직 회원이 아니세요?</p>
            <button class="w-100 btn btn-lg btn-warning" type="button" onclick="location.href='signup.php'">회원가입</button>

            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>

    <script src="./js/jquery.min.js"></script>

</body>

</html>

<script>
function form_check() {
    form = document.signin_form;
    var id = $("#floatingId").val();
    var pw = $("#floatingPassword").val();

    if(id == "") {
        alert('아이디를 입력해주세요.');
        form.id.focus();
        return false;
    }

    if(pw == "") {
        alert('비밀번호를 입력해주세요.');
        form.pw.focus();
        return false;
    }

    form.submit();
}
</script>