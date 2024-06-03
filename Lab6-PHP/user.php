<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<meta charset='UTF-8' />
</head>
<body>
<?php
require_once("funkcje.php");

if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] != 1) {
    header("Location: index.php");
    exit;
}
echo "Zalogowano jako: " . $_SESSION['zalogowanyImie'] . "<br>";

// Sekcja obsługi uploadu pliku
$currentDir = getcwd();
$uploadDirectory = "/zdjeciaUzytkownikow/";
$uploadedFileName = 'uploaded_image.jpg';
$uploadPath = $currentDir . $uploadDirectory . $uploadedFileName;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['myfile'])) {
    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];

    if ($fileName != "" && ($fileType == 'image/png' || $fileType == 'image/jpeg' || $fileType == 'image/jpg')) {
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            echo "Zdjęcie zostało załadowane na serwer.<br>";
        } else {
            echo "Wystąpił problem podczas przesyłania pliku.<br>";
        }
    } else {
        echo "Przesłany plik musi być w formacie JPG, JPEG lub PNG.<br>";
    }
}
if (file_exists($uploadPath)) {
    echo '<img src="' . $uploadDirectory . $uploadedFileName . '" alt="Uploaded Image">.<br>';
} else {
    echo '<p>Zdjęcie nie zostało jeszcze przesłane.</p>';
}
?>

<!-- Formularz uploadu pliku -->
<form action="user.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend>Upload pliku:</legend>
    <label for="fileUpload">Wybierz plik do załadowania (JPG, JPEG, PNG):</label>
    <br>
    <input type="file" name="myfile" id="fileUpload">
    <br>
    <input type="submit" value="Upload">
    </fieldset
    
</form>
<!-- Formularz wylogowania -->
<form action="index.php" method="post">
  <input type="submit" name="wyloguj" value="Wyloguj">
</form>
<a href="index.php">Powrót do strony głównej</a>
</body>
</html>
