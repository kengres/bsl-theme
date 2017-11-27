<?php
$time = date('Y-m-d H:i:s ',strtotime('now'));


$dbh = new PDO('mysql:host=localhost;dbname=host1394375_2728', 'host1394375_2728', 'e9b03d98');
$dbh-> exec("SET CHARACTER SET utf8");
$email=$_POST['email'];
$name=$_POST['name'];
$comment=$_POST['comment'];
$sex = $_POST['optionsRadios'];
$ip=$_SERVER['REMOTE_ADDR'];
$dbh->query("insert into wp_comments(`comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES (148,'$name','$email','','$ip','$time','$time','$comment',0,0,'','$sex',0,0)");

header("Location:/reviews");