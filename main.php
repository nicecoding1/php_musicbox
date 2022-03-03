<?php
session_start();
include "common.php";
if($_SESSION['ss_id'] == "") {
    alert_redir("로그인을 해주세요.", "signin.php");
    exit;
}
$user_id = $_SESSION['ss_id'];

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
                        <span onclick="location.href='listen_tag.php?tag='">#전체</span>
                        <span onclick="location.href='listen_tag.php?tag=이별'">#이별</span>
                        <span onclick="location.href='listen_tag.php?tag=드라이브'">#드라이브</span>
                        <span onclick="location.href='listen_tag.php?tag=파티'">#파티</span></p>
                    </p>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $sql = "select * from chuname order by id";
                    $res = dbquery($sql);
                    while($row = dbfetch($res)) {?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                            <div class="card-body">
                                <p class="card-text"><?=$row['name']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='listen_list.php?chuid=<?=$row['id']?>'">듣기</button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?}?>

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


    <script src="./js/bootstrap.bundle.min.js"></script>


</body>

</html>