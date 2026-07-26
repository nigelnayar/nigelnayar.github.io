 <div class="profilepage">
<?php
  include 'connect.inc.php';
  session_start();
 ?>
<?php

  $follow = @$_POST['followvut'];
  if (isset($follow)) {
    $uid = @$_POST['uitid'];
    $user = $_SESSION["un"];
    $puser = $uid;

    $folthem = mysqli_query($conn, "INSERT INTO followers (followed, follower)
    VALUES ('$uid', '$user')");
  }
  $unfollow = @$_POST['unfollowvut'];
  if (isset($unfollow)) {
    $uid = @$_POST['uitid'];
    $user = $_SESSION["un"];
    $puser = $uid;

    $unfolthem = mysqli_query($conn, "DELETE FROM followers where follower = '$user' AND followed = '$uid'");
  }
  $check = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$puser. "'");
    $get = mysqli_fetch_assoc($check);
  $posts = mysqli_query($conn, "SELECT * FROM posts WHERE Username = '".$puser. "'");
  $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."'");
  $followedalready = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."' AND follower = '$user'");
 ?>
