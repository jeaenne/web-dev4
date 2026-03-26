<hr>

<div class="footer">
    <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
    <p style="margin-top: 10px;">
        <a href="javascript:void(0)" 
           onclick="window.open('privacy.pdf', 'Политика конфиденциальности', 'width=700,height=500,resizable=yes,scrollbars=yes')" 
           style="color: #ffb6c1; text-decoration: none;">
           📄 Политика конфиденциальности
        </a>
        &nbsp;|&nbsp;
        <a href="privacy.pdf" download 
           style="color: #ffb6c1; text-decoration: none;">
           ⬇ Скачать
        </a>
    </p>
</div>
<script>
// ========== СЛАЙДЕР ==========
document.addEventListener('DOMContentLoaded', function() {
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    const dotsContainer = document.querySelector('.slider-dots');
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoSlideInterval;
    
    // Создаём точки
    slides.forEach((_, index) => {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });
    
    const dots = document.querySelectorAll('.dot');
    
    function goToSlide(index) {
        if (index < 0) index = totalSlides - 1;
        if (index >= totalSlides) index = 0;
        
        sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
        
        // Обновляем активные точки
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }
    
    function nextSlide() {
        goToSlide(currentIndex + 1);
    }
    
    function prevSlide() {
        goToSlide(currentIndex - 1);
    }
    
    // Запускаем авто-слайд
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 10000);
    }
    
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }
    
    // Навешиваем обработчики
    prevBtn.addEventListener('click', () => {
        prevSlide();
        stopAutoSlide();
        startAutoSlide();
    });
    
    nextBtn.addEventListener('click', () => {
        nextSlide();
        stopAutoSlide();
        startAutoSlide();
    });
    
    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', stopAutoSlide);
    sliderContainer.addEventListener('mouseleave', startAutoSlide);
    
    // Стартуем
    startAutoSlide();
});
</script>
<script src="cart.js"></script>
</body>
</html>