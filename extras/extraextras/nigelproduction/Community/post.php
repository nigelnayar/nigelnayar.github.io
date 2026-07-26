<?php include 'header.inc.php';
 ?>
 <?php
$un = @$_POST['user_post'];
$unr = str_replace("'", "''", $un);
function hashtagging($str)
{
  $regex = "/#+([a-zA-Z0-9_]+)/";
  $str = preg_replace($regex, '<a href="asdf.php?tag=$1">$0</a>', $str);
  return($str);
}
$unre = hashtagging($unr);
$d = date("Y-m-d");
$time = date("H:i:s");
$search = @$_POST['s'];
$s = @$_POST['search'];
$submit = @$_POST['submit'];
if (isset($un)) {
if (empty(trim($un))) {
  echo "No";
}
else {
  // code...
  if (preg_match('/www./',$un)) //checks if there's www. in the field. alternatively use http: instead of www.
  {
  $link_start_pos = strpos($un,'www.'); //returns the link-start-pos, alternatively use http: instead of www.

      // find the end of the link
  if($link_end_pos = strpos($un, ' ', $link_start_pos) === false)
      { //if theres no space after the link, it's propably on the end of the text
          $link_end_pos = strlen($un);
      }
      // form a string with the actual link in it
  $link = substr($un,$link_start_pos,$link_end_pos);
      // and make it clickable
  $link_insert = '<a href="'.$link.'" target="_blank">'.$link.'</a>';
  }
$sql = "INSERT INTO posts (username, post, dateposted, hour)
VALUES ('$user', '$unr', '$d', '$time')";
if ($conn->query($sql) === TRUE) {
  echo '<br><br>';
    echo "Thank You For Helping The Community To Grow! ";
    echo "";
    echo @$_POST['name'];
    echo '<br><br><br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}}
?>
