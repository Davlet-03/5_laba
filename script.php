<?php
$host = '127.0.0.1';  // вместо 'localhost'
$user = 'root';
$password = '';
$dbname = 'smartstore_db';

$conn = new mysqli($host, $user, $password, $dbname, 3307);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение товаров
function getItems($conn) {
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

// Сохранение формы
function saveFeedback($conn, $name, $email, $message) {
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
}
?>
echo "OK";
