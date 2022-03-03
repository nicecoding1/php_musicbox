<?php
session_start();
include "common.php";
if($_SESSION['ss_id'] == "") {
    alert_redir("로그인을 해주세요.", "signin.php");
    exit;
}
$user_id = $_SESSION['ss_id'];
$tag = $_REQUEST['tag'];
?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>뮤직박스</title>

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
        .unlike {
            color: pink;
        }
        .like {
            color: red;
        }
    </style>


</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">개인의 취향에 맞게 음악을 추천해주는 서비스 입니다.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">트위터</a></li>
                            <li><a href="#" class="text-white">페이스북</a></li>
                            <li><a href="#" class="text-white">이메일</a></li>
                        </ul>
                        <p></p>
                        <p></p>
                        <p><a href="signin.php?mode=logout" class="text-white">로그아웃</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="main.php" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 35 35">
                      <path d="M27.606,0.201c-0.248-0.188-0.572-0.25-0.877-0.162l-14,4.016c-0.429,0.121-0.725,0.513-0.725,0.961v18.02
				c-0.838-0.636-1.87-1.025-3-1.025c-2.757,0-5,2.243-5,5c0,2.758,2.243,5,5,5s5-2.242,5-5V9.752l12-3.439v12.722
				c-0.838-0.636-1.87-1.025-3-1.025c-2.757,0-5,2.243-5,5c0,2.758,2.243,5,5,5s5-2.242,5-5V1
				C28.005,0.688,27.858,0.392,27.606,0.201z M9.005,30.008c-1.654,0-3-1.346-3-3c0-1.653,1.346-3,3-3s3,1.347,3,3
				C12.005,28.662,10.659,30.008,9.005,30.008z M23.005,26.008c-1.654,0-3-1.346-3-3c0-1.653,1.346-3,3-3s3,1.347,3,3
				C26.005,24.662,24.659,26.008,23.005,26.008z M26.005,4.23l-12,3.441V5.77l12-3.441V4.23z"/>
                      </svg>
                    <strong>Music</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">태그</h1>
                    <p class="lead text-muted">
                        <span onclick="location.href='listen_tag.php?tag=이별'">#이별</span>
                        <span onclick="location.href='listen_tag.php?tag=드라이브'">#드라이브</span>
                        <span onclick="location.href='listen_tag.php?tag=파티'">#파티</span></p>

                </div>
            </div>
        </section>

        <div class="">
            <div class="container">

                <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">노래</th>
                            <th scope="col" class="text-center">가수</th>
                            <th scope="col" class="text-center">추천수</th>
                            <th scope="col" class="text-center">추천</th>
                        </tr>
                    <?php
                    $sql = "select * from music where if(tag is null,'',tag) like '%$tag%' order by likecount desc, no";
                    $res = dbquery($sql);
                    $i=1;
                    while($row = dbfetch($res)) {?>

                        <?php
                            if(check_song_like($row['no'], $user_id)) {?>
                                <input type="hidden" id="musiclike_fg_<?=$row['no']?>" name="musiclike_fg_<?=$row['no']?>" value="1">
                            <?} else {?>
                                <input type="hidden" id="musiclike_fg_<?=$row['no']?>" name="musiclike_fg_<?=$row['no']?>" value="0">
                            <?}?>
                        <tr>
                            <td class="text-center"><?=$i?></td>
                            <td class="text-center"><?=$row['name']?></td>
                            <td class="text-center"><?=$row['singer']?></td>
                            <td class="text-center"><span id="likecount_<?=$row['no']?>"><?=$row['likecount']?></span></td>
                            <td class="text-center"><span id="musiclike_<?=$row['no']?>" onclick="music_like('<?=$row[no]?>','<?=$user_id?>')">
                            <?php
                            if(check_song_like($row['no'], $user_id)) {?>
                                <i class="fas fa-heart like"></i>
                            <?} else {?>
                                <i class="far fa-heart unlike"></i>
                            <?}?>

                            </span></td>
                        </tr>

                    <?
                        $i++;
                    }?>
                    </table>

                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">뮤직박스</p>
            <p class="mb-0">만든이: 조재상</p>
        </div>
    </footer>

    <script src="./js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/bc2cef3684.js" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>


</body>

</html>

<script>
function music_like(mid, uid) {
    var url = "ajax_music_like.php";
    var fg = $("#musiclike_fg_"+mid).val();
    console.log("fg: "+fg);
    if(fg == "0") {
        $.get(url, {mode:"like", mid:mid, uid:uid}, function(args) {
            if(args != "") {
                $("#likecount_"+mid).html(args);
                $("#musiclike_"+mid).html("<i class='fas fa-heart like'>");
                $("#musiclike_fg_"+mid).val("1");
            }
        });
    } else {
        $.get(url, {mode:"unlike", mid:mid, uid:uid}, function(args) {
            if(args != "") {
                $("#likecount_"+mid).html(args);
                $("#musiclike_"+mid).html("<i class='far fa-heart unlike'>");
                $("#musiclike_fg_"+mid).val("0");
            }
        });
    }
}

</script>