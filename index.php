<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
//header("Location: http://localhost/moodle/front/");

$loadpath = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/front/";

//echo $actual_link;

//header("Location: http://web.njit.edu/~vp78/localhost/moodle/front/");
header("Location: $loadpath");

?>

