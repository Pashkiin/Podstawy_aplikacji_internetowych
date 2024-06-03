<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Lista Pracowników</title>
<meta charset='UTF-8' />
</head>
<body>
<?php
$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);

if ($result) {
    foreach ($result as $v) {
        echo $v["ID_PRAC"] . " " . $v["NAZWISKO"] . "<br/>";
    }
    $result->free();
} else {
    echo "Błąd zapytania: " . mysqli_error($link);
}

$link->close();
?>
<a href="form06_post.php">Dodaj nowego pracownika</a>
</body>
</html>