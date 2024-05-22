<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Dodaj Pracownika</title>
<meta charset='UTF-8' />
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<form action="form06_redirect.php" method="POST">
    id_prac <input type="text" name="id_prac" required><br>
    nazwisko <input type="text" name="nazwisko" required><br>
    <input type="submit" value="Wstaw">
    <input type="reset" value="Wyczysc">
</form>
<a href="form06_get.php">Zobacz listę pracowników</a>
</body>
</html>