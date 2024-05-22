<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<meta charset='UTF-8' />
</head>
<body>
<?php
if (isset($_GET['czas']) && is_numeric($_GET['czas'])) {
    $czas = intval($_GET['czas']);
    setcookie("mojaCookie", "wartoscCookie", time() + $czas, "/");
    echo "Cookie zostało utworzone na " . $czas . " sekund.<br>";
} else {
    echo "Nie podano prawidłowego czasu życia cookie.<br>";
}
?>
<a href="index.php">Powrót do strony głównej</a>
</body>
</html>
