<?php
session_start();
include "common.php";
if($_SESSION['ss_id'] == "") {
    exit;
}
$user_id = $_SESSION['ss_id'];
$mid = $_REQUEST['mid'];
$uid = $_REQUEST['uid'];
$mode = $_REQUEST['mode'];

if($mode == "like") {
    $sql = "select * from musiclike where music_no='$mid' and member_id='$uid'";
    $row = dbqueryfetch($sql);
    if($row['music_no'] != "") exit;

    $sql = "insert into musiclike (music_no, member_id, insdt) values ('$mid', '$uid', now())";
    $ret = dbquery($sql);

    if($ret) {
        $sql2 = "update music set likecount=likecount+1 where no='$mid'";
        $ret2 = dbquery($sql2);
        if($ret2) {
            $sql3 = "select likecount from music where no='$mid'";
            $row3 = dbqueryfetch($sql3);
            $likecount = $row3['likecount'];
            echo $likecount;
        }
    }

} else if($mode == "unlike") {
    $sql = "select * from musiclike where music_no='$mid' and member_id='$uid'";
    $row = dbqueryfetch($sql);
    if($row['music_no'] == "") exit;

    $sql = "delete from musiclike where music_no='$mid' and member_id='$uid'";
    $ret = dbquery($sql);

    if($ret) {
        $sql2 = "update music set likecount=likecount-1 where no='$mid'";
        $ret2 = dbquery($sql2);
        if($ret2) {
            $sql3 = "select likecount from music where no='$mid'";
            $row3 = dbqueryfetch($sql3);
            $likecount = $row3['likecount'];
            echo $likecount;
        }
    }
}

?>
