    error_reporting(E_ALL);
ini_set('display_errors', 1);
<?php
require_once 'script.php';
$items = getItems($conn);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartStore - Каталог</title>
        
    <link rel="icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXX"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXX');
    </script>
</head>
<body>

<!-- ====================== ШАПКА ====================== -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="SmartStore" height="54">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-center gap-4">
                    <li class="nav-item"><a class="nav-link fw-medium" href="index.html">Главная</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium active" href="catalog.php">Каталог</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium" href="consultation.html">Контакты</a></li>
                </ul>
                <a href="#" class="btn btn-profile">Профиль</a>
            </div>
        </div>
    </nav>
</header>

<!-- ====================== КАТАЛОГ ====================== -->
<section class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold display-5">Каталог</h1>
        
        <!-- Поиск -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Поиск смартфона...">
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="productList">
            <?php foreach ($items as $item): ?>
                <div class="col product-card" data-name="<?php echo $item['name']; ?>">
                    <div class="card h-100">
                        <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo $item['name']; ?></h5>
                            <p class="price"><?php echo $item['price']; ?> ₽</p>
                            <a href="<?php echo $item['detail_link']; ?>" class="btn btn-dark">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====================== ФУТЕР ====================== -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-3 mb-4">
                <img src="images/logo.png" alt="SmartStore" height="48">
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Информация</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">О компании</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Вакансии</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Покупателям</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Доставка</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Способы оплаты</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Обмен и возврат</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Обратная связь</h5>
                <ul class="list-unstyled">
                    <li><a href="consultation.html" class="text-white text-decoration-none">Заказать консультацию</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-5 pt-4 border-top border-secondary">
            © 2026 SmartStore. Все права защищены.
        </div>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
