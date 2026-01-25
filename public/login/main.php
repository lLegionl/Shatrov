<?php 
// ===== НАСТРОЙКИ СЕССИИ И БАЗЫ ДАННЫХ =====
session_start();
include "db.php";

// ===== ПОЛУЧЕНИЕ ДАННЫХ ИЗ БАЗЫ =====
try {
    $stm = $connect->query('SELECT * FROM `tariff` ORDER BY `tariff_price` ASC');
    $tariffs = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Ошибка при получении тарифов: " . $e->getMessage());
    $tariffs = [];
}

// ===== SEO НАСТРОЙКИ =====
$page_title = "ЛК-Телеком - Интернет на дом в Красногорске | Подключение оптоволокна";
$page_description = "Подключаем кабельный интернет по оптоволокну в Красногорске и районе. Высокая скорость, стабильное соединение, безлимитные тарифы от 300 руб.";
$page_keywords = "интернет Красногорск, подключение интернета, оптоволокно, тарифы интернет, ЛК-Телеком, интернет на дом, высокоскоростной интернет";

// ===== HTML ШАПКА =====
include "header.php";
?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "ЛК-Телеком",
    "description": "Подключение интернета по оптоволокну в Красногорске и Красногорском районе",
    "url": "https://ваш-сайт.ру/",
    "logo": "https://ваш-сайт.ру/logo.png",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Красногорск",
        "addressRegion": "Московская область",
        "addressCountry": "RU"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+7-XXX-XXX-XX-XX",
        "contactType": "customer service"
    }
}
</script>

<!-- ===== СКРЫТАЯ НАВИГАЦИЯ ДЛЯ ДОСТУПНОСТИ ===== -->
<a href="#tariffs" class="sr-only">Перейти к тарифам</a>

<!-- ===== ОСНОВНОЙ КОНТЕНТ ===== -->
<div class="main_content" itemscope itemtype="https://schema.org/WebPage">
    
    <!-- === БАННЕР === -->
    <section class="short_content" role="banner" aria-label="Баннер компании ЛК-Телеком">
        <p class="company-name" itemprop="name">ЛК-Телеком</p>
        <h1 itemprop="headline">Интернет на дом</h1>
        <p class="tagline">быстро.качественно.надежно</p>
        <a href="#tariffs" class="order-btn cta-button">Выбрать тариф</a>
    </section>

    <!-- === ПРЕИМУЩЕСТВА === -->
    <section aria-labelledby="advantages-title">
        <h2 id="advantages-title">Почему именно мы</h2>
        <div class="description_content">
            
            <!-- Преимущество 1: Стабильность -->
            <article class="block" itemprop="featureList">
                <h3>Стабильность</h3>
                <p>Подключаем кабельный интернет по оптоволокну с 2005 года и имеем обширную сеть с дублирующими каналами</p>
            </article>
            
            <!-- Преимущество 2: Покрытие -->
            <article class="block">
                <h3>Покрытие</h3>
                <p>Осуществляем подключение абонентов частного сектора в пригородах г.Красногорска и Красногорском районе</p>
            </article>
            
            <!-- Преимущество 3: Скорость -->
            <article class="block">
                <h3>Высокая скорость</h3>
                <p>Современное и качественное оборудование гарантирует высокую скорость интернета до 500 Мбит/с</p>
            </article>
            
            <!-- Преимущество 4: Безлимит -->
            <article class="block">
                <h3>Безлимитный интернет</h3>
                <p>Удобная тарифная сетка, демократичная стоимость тарифных планов без ограничений по трафику</p>
            </article>
            
        </div>
    </section>

    <!-- === ТАРИФЫ === -->
    <section aria-labelledby="tariffs-title">
        <h2 id="tariffs-title">Предоставляемые нами тарифы</h2>
        
        <?php if (empty($tariffs)): ?>
            <!-- Состояние загрузки тарифов -->
            <div class="tariff-loading">
                <div class="spinner"></div>
                <p>Загружаем тарифы...</p>
                <p>Или позвоните нам: +7 (495) 123-45-67</p>
            </div>
        <?php else: ?>
            <!-- Список тарифов -->
            <div class="services" id="tariffs">
                
                <?php foreach($tariffs as $tarif): ?>
                <article class="show_tariff" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                    <ul>
                        <!-- Название тарифа -->
                        <li>
                            <h3 itemprop="name"><?php echo htmlspecialchars($tarif['tariff_name']); ?></h3>
                        </li>
                        
                        <!-- Скорость -->
                        <li>
                            <p class="tariff_info">
                                <span itemprop="description">Скорость:</span> 
                                <?php echo htmlspecialchars($tarif['tariff_speed']); ?> Мб/с
                            </p>
                        </li>
                        
                        <!-- Цена -->
                        <li>
                            <p class="tariff_info">
                                <span itemprop="priceCurrency" content="RUB">Цена:</span> 
                                <span itemprop="price" content="<?php echo htmlspecialchars($tarif['tariff_price']); ?>">
                                    <?php echo htmlspecialchars($tarif['tariff_price']); ?> руб/мес
                                </span>
                            </p>
                        </li>
                        
                        <!-- Описание (если есть) -->
                        <?php if(isset($tarif['tariff_description']) && !empty($tarif['tariff_description'])): ?>
                        <li>
                            <p><?php echo htmlspecialchars($tarif['tariff_description']); ?></p>
                        </li>
                        <?php endif; ?>
                        
                        <!-- Кнопка заказа -->
                        <li>
                            <a href="order.php?tariff_id=<?php echo $tarif['id']; ?>" 
                               class="order-btn"
                               itemprop="url">
                                Заказать подключение
                            </a>
                        </li>
                    </ul>
                </article>
                <?php endforeach; ?>
                
            </div>
        <?php endif; ?>
        
        <!-- Кнопка для мобильных -->
        <div class="mobile-cta" style="display: none; text-align: center; margin-top: 30px;">
            <a href="tel:+74951234567" class="order-btn">Позвонить для подключения</a>
        </div>
    </section>
    
    <!-- === КОНТАКТНАЯ ИНФОРМАЦИЯ === -->
    <section class="contact-section" style="margin-top: 50px; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 8px;">
        <h3>Нужна консультация?</h3>
        <p>Наши специалисты помогут подобрать оптимальный тариф для вашего дома</p>
        <div class="contact-info" style="margin-top: 15px;">
            <p><strong>Телефон:</strong> <a href="tel:+74951234567">+7 (495) 123-45-67</a></p>
            <p><strong>Режим работы:</strong> Пн-Пт 9:00-18:00</p>
            <p><strong>Email:</strong> <a href="mailto:info@lk-telecom.ru">info@lk-telecom.ru</a></p>
        </div>
    </section>
    
</div>

<!-- ===== JAVASCRIPT ДЛЯ UX ===== -->
<script>
// === КОНФИГУРАЦИЯ ===
const CONFIG = {
    mobileBreakpoint: 768,
    scrollOffset: 80
};

// === ИНИЦИАЛИЗАЦИЯ ПРИ ЗАГРУЗКЕ ===
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Активация мобильной кнопки звонка
    if (window.innerWidth <= CONFIG.mobileBreakpoint) {
        const mobileCta = document.querySelector('.mobile-cta');
        if (mobileCta) {
            mobileCta.style.display = 'block';
        }
    }
    
    // 2. Плавная прокрутка для якорных ссылок
    initSmoothScroll();
    
    // 3. Ленивая загрузка изображений
    if ('IntersectionObserver' in window) {
        initLazyLoading();
    }
    
    // 4. Защита от двойного клика
    initDoubleClickProtection();
    
    // 5. Отслеживание кликов по тарифам
    initTariffTracking();
});

// === ФУНКЦИИ ===

/**
 * Инициализация плавной прокрутки
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - CONFIG.scrollOffset,
                    behavior: 'smooth'
                });
                
                // Обновление URL без перезагрузки
                if (history.pushState) {
                    history.pushState(null, null, targetId);
                }
            }
        });
    });
}

/**
 * Инициализация ленивой загрузки изображений
 */
function initLazyLoading() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                
                // Загрузка изображения
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    delete img.dataset.src;
                }
                
                // Загрузка background-image
                if (img.dataset.bg) {
                    img.style.backgroundImage = `url(${img.dataset.bg})`;
                    delete img.dataset.bg;
                }
                
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px',
        threshold: 0.1
    });
    
    // Наблюдение за всеми изображениями с ленивой загрузкой
    document.querySelectorAll('img[data-src], [data-bg]').forEach(element => {
        imageObserver.observe(element);
    });
}

/**
 * Защита от двойного клика по кнопкам
 */
function initDoubleClickProtection() {
    document.querySelectorAll('.order-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.classList.contains('processing')) {
                e.preventDefault();
                return;
            }
            
            this.classList.add('processing');
            this.innerHTML = 'Обработка...';
            
            // Автоматическое восстановление через 3 секунды
            setTimeout(() => {
                this.classList.remove('processing');
                this.innerHTML = 'Заказать подключение';
            }, 3000);
        });
    });
}

/**
 * Отслеживание кликов по тарифам для аналитики
 */
function initTariffTracking() {
    document.querySelectorAll('.show_tariff .order-btn').forEach(button => {
        button.addEventListener('click', function() {
            const tariffName = this.closest('.show_tariff').querySelector('h3').textContent;
            
            // Отправка данных в Google Analytics (пример)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tariff_click', {
                    'event_category': 'Conversion',
                    'event_label': tariffName,
                    'value': 1
                });
            }
            
            // Локальное сохранение в localStorage
            const clicks = localStorage.getItem('tariff_clicks') || 0;
            localStorage.setItem('tariff_clicks', parseInt(clicks) + 1);
        });
    });
}

/**
 * Адаптивная загрузка изображений
 */
function loadResponsiveImage(element) {
    const width = window.innerWidth;
    let imageUrl = element.dataset.srcDefault;
    
    if (width < 480) {
        imageUrl = element.dataset.srcSmall || imageUrl;
    } else if (width < 768) {
        imageUrl = element.dataset.srcMedium || imageUrl;
    } else if (width < 1200) {
        imageUrl = element.dataset.srcLarge || imageUrl;
    } else {
        imageUrl = element.dataset.srcXLarge || imageUrl;
    }
    
    return imageUrl;
}

// === ОБРАБОТЧИКИ СОБЫТИЙ ===

// Изменение размера окна
window.addEventListener('resize', debounce(function() {
    if (window.innerWidth <= CONFIG.mobileBreakpoint) {
        document.querySelector('.mobile-cta').style.display = 'block';
    } else {
        document.querySelector('.mobile-cta').style.display = 'none';
    }
}, 250));

// Дебаунс функция
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Отправка формы (если будет форма на странице)
function handleFormSubmit(form) {
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Отправка...';
    
    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showSuccessMessage('Заявка успешно отправлена!');
            form.reset();
        } else {
            showErrorMessage('Ошибка отправки. Попробуйте позже.');
        }
    })
    .catch(error => {
        showErrorMessage('Ошибка сети. Проверьте соединение.');
        console.error('Form submission error:', error);
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Отправить';
    });
}

// Вспомогательные функции UI
function showSuccessMessage(message) {
    const alert = document.createElement('div');
    alert.className = 'alert success';
    alert.textContent = message;
    alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background: #4CAF50;
        color: white;
        border-radius: 5px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
    `;
    
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => alert.remove(), 300);
    }, 3000);
}

function showErrorMessage(message) {
    const alert = document.createElement('div');
    alert.className = 'alert error';
    alert.textContent = message;
    alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background: #f44336;
        color: white;
        border-radius: 5px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
    `;
    
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => alert.remove(), 300);
    }, 3000);
}

// Добавление CSS анимаций
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    .order-btn.processing {
        opacity: 0.7;
        cursor: not-allowed;
    }
`;
document.head.appendChild(style);

// Отслеживание видимости элементов
if ('IntersectionObserver' in window) {
    const visibilityObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Отправка события в аналитику
                if (typeof gtag !== 'undefined' && entry.target.id === 'tariffs') {
                    gtag('event', 'view_tariffs', {
                        'event_category': 'Engagement',
                        'non_interaction': true
                    });
                }
            }
        });
    }, {
        threshold: 0.5
    });
    
    // Наблюдение за важными секциями
    const importantSections = ['advantages-title', 'tariffs-title'];
    importantSections.forEach(id => {
        const element = document.getElementById(id);
        if (element) visibilityObserver.observe(element);
    });
}

// Оффлайн поддержка
window.addEventListener('online', () => {
    showSuccessMessage('Соединение восстановлено');
});

window.addEventListener('offline', () => {
    showErrorMessage('Потеряно соединение с интернетом');
});

// Сохранение позиции скролла
window.addEventListener('beforeunload', () => {
    sessionStorage.setItem('scrollPosition', window.pageYOffset);
});

// Восстановление позиции скролла при возврате
if (sessionStorage.getItem('scrollPosition')) {
    window.scrollTo(0, parseInt(sessionStorage.getItem('scrollPosition')));
    sessionStorage.removeItem('scrollPosition');
}
</script>

<?php 
// ===== ЗАВЕРШЕНИЕ =====
// Закрываем соединение с БД
if (isset($stm)) {
    $stm->closeCursor();
}

// Подключаем футер
include "footer.php";
?>