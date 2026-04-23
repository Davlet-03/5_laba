<?php
require_once 'script.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SmartStore - Обратная связь (AJAX)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="index.html">SmartStore</a>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="catalog.php">Каталог</a></li>
                <li class="nav-item"><a class="nav-link" href="form.php">Контакты</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="py-5">
    <div class="container">
        <h2>Обратная связь (AJAX)</h2>
        <p>Форма отправляется без перезагрузки страницы. Сообщения загружаются через GET.</p>

        <form id="feedbackForm">
            <div class="mb-3">
                <label class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Сообщение</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

        <button id="refreshBtn" class="btn btn-secondary mt-3">🔄 Обновить список сообщений</button>

        <h3 class="mt-5">Список сообщений</h3>
        <button onclick="loadData()">Показать данные</button>

        <div id="data-container" class="row mt-3">
            <p>Загрузка...</p>
        </div>
    </div>
</section>

<footer class="bg-dark text-white py-4 text-center">
    © 2026 SmartStore
</footer>

<!-- Модальное окно успеха -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">✅ Успешно!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Данные успешно сохранены!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно ошибки -->
<div class="modal fade" id="errorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">❌ Ошибка</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="errorModalBody">Что-то пошло не так.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
