<?php
function hashtagging($tag)
{
  $hash = "/#+([a-zA-Z0-9_]+)/";
  $tag = preg_replace($hash, '<a href="asdf.php?tag=$1">$0</a>', $tag);
  return($tag);
}
$hello = "#asd";
$hello = hashtagging($hello);
echo $hello;

?>
