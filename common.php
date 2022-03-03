<?php
include "dbconfig.php";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("DB connect fail");
mysqli_query($conn, "set names utf8");

function dbquery($sql) {
	global $conn;
	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	return $res;
}

function dbfetch($res) {
	$row = mysqli_fetch_array($res);
	return $row;
}

function dbqueryfetch($sql) {
	global $conn;
	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($res);
	return $row;
}

function alert_redir($msg, $url) {
	$msg = str_replace("\n", "\\n", $msg);
	echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">");
	echo("<script>\n");
	if($msg) echo("alert(\"$msg\");\n");
	if($url) echo("window.location='$url';\n");
	else echo("history.back();\n");
	echo("</script>\n");
	exit;
}

function alert($msg) {
	$msg = str_replace("\n", "\\n", $msg);
	echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">");
	echo("<script>\n");
	if($msg) echo("alert(\"$msg\");\n");
	echo("</script>\n");
}

function get_chu_name($id) {
    $sql = "select name from chuname where id='$id'";
    $row = dbqueryfetch($sql);
    return $row['name'];
}

function check_song_like($song, $user) {
    $sql = "select * from musiclike where music_no='$song' and member_id='$user'";
    $row = dbqueryfetch($sql);
    if($row['music_no'] == "") return false;
    else return true;
}

?>