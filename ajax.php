<?php
require_once 'script.php';
header('Content-Type: application/json; charset=utf-8');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ==================== POST — сохранение ====================
        $name  = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $model = trim($_POST['model'] ?? '');

        if (empty($name) || empty($phone) || empty($email) || empty($model)) {
            echo json_encode(['status' => 'error', 'message' => 'Все поля обязательны']);
            exit;
        }

        if (saveMessage($pdo, $name, $phone, $email, $model)) {
            echo json_encode(['status' => 'success', 'message' => 'Заявка успешно сохранена!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Не удалось сохранить в базу']);
        }
        exit;
    } 
    else {
        // ==================== GET — получение списка ====================
        $messages = getMessages($pdo);
        echo json_encode($messages);
    }
} catch (Exception $e) {
    // Это покажет настоящую ошибку PDO (очень полезно при отладке)
    echo json_encode(['status' => 'error', 'message' => 'Серверная ошибка: ' . $e->getMessage()]);
}
?>
