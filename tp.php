<?php
$cookie_name = "user";
$cookie_value = "John Doe";
$PHPSESSID = "PHPSESSID";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$PHPSESSID])) {
    echo "Cookie named '" . $PHPSESSID . "' is not set!";
} else {
    echo "Cookie '" . $PHPSESSID . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$PHPSESSID];
}
?>

</body>
</html>