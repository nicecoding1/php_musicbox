<?php
session_start();
include "common.php";
@extract($_REQUEST);

if($mode == "insert") {
    $arr = explode("\r\n", $songdata);

    $cnt = count($arr);
    for($i=0;$i<$cnt;$i++) {
        list($song, $singer) = explode("\t", $arr[$i]);
        if($song != "") {
            $sql = "insert into music (name, singer, chuid) values ('$song', '$singer', '$chuid')";
            dbquery($sql);
        }

    }
    alert_redir("노래 입력 완료", "songinsert.php");
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
        <form method="post">
        <input type="hidden" name="mode" value="insert">

            <h1 class="h3 mb-3 fw-normal">뮤직박스</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="chuid" id="floatingId" placeholder="추천리스트 번호">
                <label for="floatingId">추천리스트 번호</label>
            </div>

            <div class="form-floating">
                <textarea name="songdata" class="form-control" id="floatingSong" placeholder="노래제목, 가수" style="height:200px;"></textarea>
                <label for="floatingSong">노래제목, 가수</label>
            </div>


            <div class="checkbox mb-3">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">노래 입력</button>

            <p class="mt-5 mb-3 text-muted">&copy; 2021-<?=date('Y-m-d')?></p>
        </form>
    </main>



</body>

</html>