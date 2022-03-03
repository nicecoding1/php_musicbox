<?php
include "common.php";
@extract($_REQUEST);

//회원가입
if($mode == "signup") {
    if($name == "") {
        alert_redir("이름을 입력해주세요.", "");
        exit;
    }
    if($id == "") {
        alert_redir("아이디를 입력해주세요.", "");
        exit;
    }
    if($pw == "") {
        alert_redir("비밀번호를 입력해주세요.", "");
        exit;
    }
    //아이디 중복검사
    $sql = "select count(*) from member where id='$id'";
    $row = dbqueryfetch($sql);
    $dup = $row[0];

    if($dup) {//아이디 중복 시
        alert_redir("이미 사용 중인 아이디 입니다.\n다른 아이디를 입력해주세요.", "");
        exit;
    }

    //데이터 입력
    $enc_pw = sha1($pw);
    $sql = "insert into member (id, pw, name, insdt) values ('$id', '$enc_pw', '$name', now())";
    $ret = dbquery($sql);
    
    if($ret) {
        alert_redir("회원가입 완료", "signin.php");
    } else {
        alert_redir("회원가입 실패", "");
    }
    exit;
}

?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M">
    <meta name="generator" content="">
    <title>회원가입</title>

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
    <link href="signup.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form name="signup_form" method="post">
        <input type="hidden" name="mode" value="signup">

            <h1 class="h3 mb-3 fw-normal">뮤직박스</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="name" id="floatingName" placeholder="이름">
                <label for="floatingName">이름</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="id" id="floatingId" placeholder="아이디">
                <label for="floatingId">아이디</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pw" id="floatingPassword" placeholder="비밀번호">
                <label for="floatingPassword">비밀번호</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pw2" id="floatingPassword2" placeholder="비밀번호 확인">
                <label for="floatingPassword2">비밀번호 확인</label>
            </div>

            <div class="checkbox mb-3">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="button" onClick="form_check()">회원가입</button>

            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>

    <script src="./js/jquery.min.js"></script>

</body>

</html>

<script>
function form_check() {
    form = document.signup_form;
    var name = $("#floatingName").val();
    var id = $("#floatingId").val();
    var pw = $("#floatingPassword").val();
    var pw2 = $("#floatingPassword2").val();

    if(name == "") {
        alert('이름을 입력해주세요.');
        form.name.focus();
        return false;
    }

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

    if(pw2 == "") {
        alert('확인용 비밀번호를 입력해주세요.');
        form.pw2.focus();
        return false;
    }

    if(pw != pw2) {
        alert('비밀번호가 일치하지 않습니다. 다시 입력해주세요');
        form.pw.value = '';
        form.pw2.value = '';
        form.pw.focus();
        return false;
    }
    if(!confirm('회원가입 정보를 전송하시겠습니까?')) return;
    form.submit();
}
</script>