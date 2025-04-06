<?php 
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алаверды | Настоящая кавказская кухня</title>
    <style>
        :root {
            --primary-color: #8b0000; /* Темно-красный вместо синего */
            --secondary-color: #ff8c00; /* Оранжевый вместо оранжево-красного */
            --accent-color: #5c2018; /* Коричнево-красный */
            --light-color: #fff5ee; /* Светлый кремовый фон */
            --dark-color: #3e2723; /* Темно-коричневый для текста */
        }
        
        body {
            font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--dark-color);
            line-height: 1.6;
            background-color: var(--light-color);
        }
        
        .hero {
            background: url('https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 8rem 0;
            position: relative;
            text-align: center;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(139, 0, 0, 0.85); /* Темно-красный оверлей */
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .btn {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            background-color: #e07d00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .advantages {
            padding: 5rem 0;
            background-color: var(--light-color);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.2rem;
            color: var(--primary-color);
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            margin: 1rem auto 0;
        }
        
        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .advantage-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .advantage-card:hover {
            transform: translateY(-10px);
        }
        
        .advantage-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        
        .advantage-card h3 {
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .menu {
            padding: 5rem 0;
            background-color: white;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .menu-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            background: white;
        }
        
        .menu-card:hover {
            transform: translateY(-10px);
        }
        
        .menu-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        
        .menu-info {
            padding: 1.5rem;
        }
        
        .menu-info h3 {
            margin: 0 0 0.5rem;
            color: var(--primary-color);
        }
        
        .menu-description {
            color: #666;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .menu-price {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .order-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .order-btn:hover {
            background: var(--accent-color);
        }
        
        .contacts {
            padding: 5rem 0;
            background-color: var(--primary-color);
            color: white;
        }
        
        .contacts .section-title {
            color: white;
        }
        
        .contacts .section-title::after {
            background: var(--secondary-color);
        }
        
        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .contact-card {
            background: rgba(255,255,255,0.1);
            padding: 2rem;
            border-radius: 8px;
        }
        
        .contact-card h3 {
            margin-top: 0;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .contact-item i {
            margin-right: 1rem;
            width: 20px;
            text-align: center;
        }
        
        /* Специальные стили для шашлычной */
        .special-offer {
            background-color: var(--accent-color);
            color: white;
            padding: 3rem 0;
            text-align: center;
        }
        
        .offer-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .offer-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .offer-text {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0.5rem 1rem;
            }
            
            .hero {
                padding: 5rem 0;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Настоящая кавказская кухня</h1>
            <p>Почувствуйте вкус настоящего кавказского гостеприимства в нашем ресторане. Только свежие продукты и традиционные рецепты.</p>
            <a href="#menu" class="btn">Посмотреть меню</a>
        </div>
    </section>
    
    <section class="advantages">
        <div class="container">
            <h2 class="section-title">Почему выбирают нас</h2>
            <div class="advantages-grid">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Настоящие рецепты</h3>
                    <p>Готовим по традиционным кавказским рецептам, передаваемым из поколения в поколение</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h3>Живой огонь</h3>
                    <p>Наши шашлыки готовятся только на древесном угле для неповторимого вкуса</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Свежие продукты</h3>
                    <p>Ежедневно отбираем только лучшее мясо и самые свежие овощи</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-wine-glass-alt"></i>
                    </div>
                    <h3>Богатая карта вин</h3>
                    <p>Лучшие кавказские вина и другие напитки к вашему столу</p>
                </div>
            </div>
        </div>
    </section>

    <section class="special-offer">
        <div class="container offer-content">
            <h2 class="offer-title">Специальное предложение!</h2>
            <p class="offer-text">При заказе от 3000 рублей - бутылка домашнего вина в подарок!</p>
            <a href="#contacts" class="btn">Забронировать стол</a>
        </div>
    </section>
    
    <section class="menu" id="menu">
        <div class="container">
            <h2 class="section-title">Наше меню</h2>
            <div class="menu-grid">
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Шашлык из баранины" class="menu-img">
                    <div class="menu-info">
                        <h3>Шашлык из баранины</h3>
                        <p class="menu-description">Нежное мясо молодого барашка, маринованное с луком и специями</p>
                        <div class="menu-price">
                            <span>450 ₽/порция</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1603105037880-880cd4edfb0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Хачапури по-аджарски" class="menu-img">
                    <div class="menu-info">
                        <h3>Хачапури по-аджарски</h3>
                        <p class="menu-description">Традиционная грузинская лепешка с сыром и яйцом</p>
                        <div class="menu-price">
                            <span>380 ₽</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Салат с баклажанами" class="menu-img">
                    <div class="menu-info">
                        <h3>Салат с баклажанами</h3>
                        <p class="menu-description">Запеченные баклажаны с помидорами, зеленью и грецкими орехами</p>
                        <div class="menu-price">
                            <span>320 ₽</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1601050690117-8b5f2e5e1b3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Люля-кебаб" class="menu-img">
                    <div class="menu-info">
                        <h3>Люля-кебаб</h3>
                        <p class="menu-description">Фарш из баранины с луком и специями, приготовленный на углях</p>
                        <div class="menu-price">
                            <span>420 ₽/порция</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1603105037880-880cd4edfb0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Хинкали" class="menu-img">
                    <div class="menu-info">
                        <h3>Хинкали</h3>
                        <p class="menu-description">Традиционные грузинские пельмени с мясом и бульоном (5 шт.)</p>
                        <div class="menu-price">
                            <span>350 ₽</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card">
                    <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Долма" class="menu-img">
                    <div class="menu-info">
                        <h3>Долма</h3>
                        <p class="menu-description">Виноградные листья с мясным фаршем и рисом (6 шт.)</p>
                        <div class="menu-price">
                            <span>390 ₽</span>
                            <button class="order-btn">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="contacts" id="contacts">
        <div class="container">
            <h2 class="section-title">Контакты</h2>
            <div class="contact-info">
                <div class="contact-card">
                    <h3>Наш ресторан</h3>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>г. Москва, ул. Кавказская, 42</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Ежедневно: 11:00 - 23:00</span>
                    </div>
                </div>
                
                <div class="contact-card">
                    <h3>Свяжитесь с нами</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>+7 (495) 765-43-21</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@alaverdi.ru</span>
                    </div>
                </div>
                
                <div class="contact-card">
                    <h3>Мы в соцсетях</h3>
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <span>@alaverdi_rest</span>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-vk"></i>
                        <span>vk.com/alaverdi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>