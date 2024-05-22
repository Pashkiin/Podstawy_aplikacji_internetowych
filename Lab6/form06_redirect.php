<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    $_SESSION['message'] = "Connect failed: " . mysqli_connect_error();
    header("Location: form06_post.php");
    exit();
}

if (isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && isset($_POST['nazwisko']) && is_string($_POST['nazwisko'])) {
    $id_prac = intval($_POST['id_prac']);
    $nazwisko = $_POST['nazwisko'];

    $sql = "INSERT INTO pracownicy (id_prac, nazwisko) VALUES (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $id_prac, $nazwisko);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['message'] = "Pracownik został dodany pomyślnie.";
        header("Location: form06_get.php");
    } else {
        $_SESSION['message'] = "Query failed: " . mysqli_error($link);
        header("Location: form06_post.php");
    }
    $stmt->close();
} else {
    $_SESSION['message'] = "Nieprawidłowe dane wejściowe.";
    header("Location: form06_post.php");
}

$link->close();
exit();
?>