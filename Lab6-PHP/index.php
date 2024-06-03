<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<meta charset='UTF-8' />
</head>
<body>
<?php
require 'funkcje.php';

echo "<h1>Nasz system</h1>";

if (isset($_POST['wyloguj'])) {
  $_SESSION['zalogowany'] = 0;
}

if (isset($_COOKIE['mojaCookie'])) {
    echo "Wartość cookie 'mojaCookie': " . $_COOKIE['mojaCookie'] . "<br>";
} else {
    echo "Cookie 'mojaCookie' nie zostało ustawione.<br>";
}

?>
<form action="logowanie.php" method="POST">
  <fieldset>
    <legend>Logowanie:</legend>
      <label for="login">Login:</label><br>
      <input type="text" id="login" name="login"><br>
      <label for="haslo">Hasło:</label><br>
      <input type="password" id="haslo" name="haslo"><br>
      <input type="submit" name="zaloguj" value="Zaloguj">
  </fieldset>
</form>
<!-- Nowy formularz do tworzenia cookie -->
<form action="cookie.php" method="get">
  <fieldset>
    <legend>Utwórz Cookie:</legend>
        <label for="czas">Podaj czas życia cookie (w sekundach):</label>
        <input type="number" name="czas" id="czas" required>
        <input type="submit" name="utworzCookie" value="Utwórz Cookie">
</fieldset>
    
</form>
</body>
</html>