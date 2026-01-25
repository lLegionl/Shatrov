    </main>
    <link rel="stylesheet" href="main.css">
    <footer role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>О компании</h3>
                    <p>ЛК-Телеком - провайдер качественного интернета в Красногорске и Красногорском районе с 2005 года.</p>
                </div>
                <div class="col-md-4">
                    <h3>Полезные ссылки</h3>
                    <ul>
                        <li><a href="main.php">Главная</a></li>
                        <li><a href="main.php#tariffs">Тарифы</a></li>
                        <li><a href="<?php 
                            if (!empty($_SESSION['auth']) && $_SESSION['auth'] == 1) {
                                echo 'account.php?slide=1';
                            } else {
                                echo 'account.php';
                            }
                        ?>">Личный кабинет</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Контакты</h3>
                    <address>
                        <p>г. Красногорск, ул. Ленина, 1</p>
                        <p>Телефон: <a href="tel:+74951234567">+7 (495) 123-45-67</a></p>
                        <p>Email: <a href="mailto:info@lk-telecom.ru">info@lk-telecom.ru</a></p>
                    </address>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> ЛК-Телеком. Все права защищены.</p>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script>
    // Активация текущей страницы в навигации
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.nav_link a');
        
        navLinks.forEach(link => {
            const linkPage = link.getAttribute('href').split('?')[0];
            if (linkPage === currentPage) {
                link.setAttribute('aria-current', 'page');
                link.style.fontWeight = 'bold';
            }
        });
        
        // Кнопка для мобильных
        if (window.innerWidth <= 768) {
            const mobileCta = document.querySelector('.mobile-cta');
            if (mobileCta) {
                mobileCta.style.display = 'block';
            }
        }
        
        // Плавная прокрутка
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Обновляем URL без перезагрузки
                    if (history.pushState) {
                        history.pushState(null, null, href);
                    }
                }
            });
        });
    });
    
    // Ленивая загрузка изображений
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    }
    
    // Предотвращение двойного клика по кнопкам
    document.querySelectorAll('.order-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.classList.contains('clicked')) {
                e.preventDefault();
                return;
            }
            this.classList.add('clicked');
            setTimeout(() => {
                this.classList.remove('clicked');
            }, 2000);
        });
    });
    </script>
</body>
</html>