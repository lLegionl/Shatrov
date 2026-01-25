<?php 
// Уже есть session_start() в main.php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'ЛК-Телеком'; ?></title>
    
    <!-- Общие мета-теги -->
    <?php if (isset($page_description)): ?>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <?php endif; ?>
    
    <?php if (isset($page_keywords)): ?>
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <?php endif; ?>
    
    <!-- CSS -->
    <link rel="stylesheet" href="main.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <!-- Предзагрузка критичных ресурсов -->
    <link rel="preload" href="main_images.jpg" as="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <header>
        <nav class="nav_bar" role="navigation" aria-label="Основная навигация">
            <div class="nav_container">
                <h2>ЛК-Телеком</h2>
                <ul class="nav_list">
                    <li class="nav_link">
                        <a href="main.php" aria-current="<?php echo basename($_SERVER['PHP_SELF']) == 'main.php' ? 'page' : 'false'; ?>">
                            Главная
                        </a>
                    </li>
                    <li class="nav_link">
                        <a href="<?php 
                            if (isset($_SESSION['auth'])) {
                                echo 'account.php?slide=1';
                            } else {
                                echo 'account.php';
                            }
                        ?>">
                            <?php echo isset($_SESSION['auth']) ? 'Личный кабинет' : 'Войти'; ?>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                    <li class="nav_link">
                        <a href="admin.php">Админ панель</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    
    <main id="main-content">