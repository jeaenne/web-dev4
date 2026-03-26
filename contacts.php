<?php include 'header.php'; ?>

<div class="content">
    <!-- Левая колонка (меню) -->
    <div class="sidebar">
        <h3 style="margin-top:0; text-align:center;">📞 Связь с нами</h3>
        
        <!-- Кнопки связи - новый дизайн -->
        <div style="display:flex; flex-direction:column; gap:12px; margin-top:15px;">
            
            <!-- Телефон -->
            <div style="background:white; border:2px solid #ffb6c1; border-radius:10px; padding:12px; text-align:center;">
                <div style="font-size:28px; margin-bottom:5px;">📞</div>
                <div style="font-weight:bold; margin-bottom:8px;">Телефон</div>
                <a href="tel:+74951234567" style="display:inline-block; background:#ff69b4; color:white; padding:6px 15px; border-radius:5px; text-decoration:none; font-size:13px;">Позвонить</a>
            </div>
            
            <!-- Email -->
            <div style="background:white; border:2px solid #ffb6c1; border-radius:10px; padding:12px; text-align:center;">
                <div style="font-size:28px; margin-bottom:5px;">✉️</div>
                <div style="font-weight:bold; margin-bottom:8px;">Email</div>
                <a href="mailto:info@fahrenheit.ru?subject=Вопрос%20с%20сайта" style="display:inline-block; background:#ff69b4; color:white; padding:6px 15px; border-radius:5px; text-decoration:none; font-size:13px;">Написать</a>
            </div>
            
            <!-- WhatsApp -->
            <div style="background:white; border:2px solid #ffb6c1; border-radius:10px; padding:12px; text-align:center;">
                <div style="font-size:28px; margin-bottom:5px;">📱</div>
                <div style="font-weight:bold; margin-bottom:8px;">WhatsApp</div>
                <a href="https://wa.me/74951234567?text=Здравствуйте!%20Вопрос%20с%20сайта" target="_blank" style="display:inline-block; background:#ff69b4; color:white; padding:6px 15px; border-radius:5px; text-decoration:none; font-size:13px;">Написать</a>
            </div>
            
            <!-- Telegram -->
            <div style="background:white; border:2px solid #ffb6c1; border-radius:10px; padding:12px; text-align:center;">
                <div style="font-size:28px; margin-bottom:5px;">✈️</div>
                <div style="font-weight:bold; margin-bottom:8px;">Telegram</div>
                <a href="https://t.me/fahrenheit_support" target="_blank" style="display:inline-block; background:#ff69b4; color:white; padding:6px 15px; border-radius:5px; text-decoration:none; font-size:13px;">Написать</a>
            </div>
        </div>
        
        <hr style="border-color:#ff69b4; margin:20px 0;">
        
        <h4 style="text-align:center; margin:10px 0;">Часы работы:</h4>
        <p style="text-align:center; font-size:14px; margin:0;">
            Пн-Пт: 9:00-20:00<br>
            Сб: 10:00-18:00<br>
            Вс: выходной
        </p>
    </div>

    <!-- Центральная колонка (контакты) -->
    <div class="main-content">
        <h1>Контакты</h1>
        <hr>

        <h2>Напишите нам</h2>
        <div style="background:#fff0f5; border:2px solid #ffb6c1; border-radius:10px; padding:25px; margin-bottom:30px;">
            <form method="post" action="#">
                <label style="display:block; margin-top:15px; font-weight:bold;">Имя:</label>
                <input type="text" name="name" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px; box-sizing:border-box;">

                <label style="display:block; margin-top:15px; font-weight:bold;">Email:</label>
                <input type="email" name="email" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px; box-sizing:border-box;">

                <label style="display:block; margin-top:15px; font-weight:bold;">Тема:</label>
                <input type="text" name="subject" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px; box-sizing:border-box;">

                <label style="display:block; margin-top:15px; font-weight:bold;">Сообщение:</label>
                <textarea name="message" rows="5" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px; box-sizing:border-box;"></textarea>

                <div style="text-align:center; margin-top:20px;">
                    <button type="submit" style="background:#ff69b4; color:white; padding:12px 30px; border:none; border-radius:5px; cursor:pointer; font-size:16px; font-weight:bold;">✉ Отправить сообщение</button>
                </div>
            </form>
        </div>

        <h2>Адрес</h2>
        <div style="background:#ffe4e1; padding:20px; border-radius:10px; margin-bottom:30px;">
            <p><strong>📞 Телефон:</strong> <a href="tel:+74951234567" style="color:#ff69b4;">+7 (495) 123-45-67</a></p>
            <p><strong>✉ Email:</strong> <a href="mailto:info@fahrenheit.ru" style="color:#ff69b4;">info@fahrenheit.ru</a></p>
            <p><strong>📍 Адрес:</strong> г. Москва, ул. Строителей, д. 1</p>
            <p><strong>🕒 Режим работы:</strong> Пн-Пт 9:00-20:00, Сб 10:00-18:00</p>
        </div>

        <h3>*Карта проезда</h3>
        <div style="border:3px solid #ffb6c1; border-radius:10px; overflow:hidden; margin-top:20px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2250.22052883512!2d37.859103000000005!3d55.667765200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414ab65d2d965cbb%3A0x5348fff486c8ab17!2z0YPQuy4g0KHRgtGA0L7QuNGC0LXQu9C10LksIDEsINCa0L7RgtC10LvRjNC90LjQutC4LCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LsuLCAxNDAwNTQ!5e0!3m2!1sru!2sru!4v1772106015786!5m2!1sru!2sru" 
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Правая колонка (баннеры) -->
    <div class="right-banners">
        <h3 style="margin-top:0;">🔥 Горячие предложения</h3>
        
        <div style="background:#ffb6c1; padding:15px; border-radius:5px; margin-bottom:15px;">
            <strong>⚡ СКИДКА 20%</strong><br>
            На все котлы до конца месяца
        </div>
        
        <div style="background:#ff69b4; color:white; padding:15px; border-radius:5px; margin-bottom:15px;">
            <strong>🎁 ПОДАРОК</strong><br>
            Терморегулятор в подарок
        </div>
        
        <div style="background:#ffb6c1; padding:15px; border-radius:5px; margin-bottom:15px;">
            <strong>🚚 БЕСПЛАТНАЯ ДОСТАВКА</strong><br>
            При заказе от 30 000 руб.
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>