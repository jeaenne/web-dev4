// Класс товара
class CartItem {
    constructor(id, name, price, image, quantity = 1) {
        this.id = id;
        this.name = name;
        this.price = parseFloat(price);
        this.image = image;
        this.quantity = quantity;
    }
}

// Класс корзины
class ShoppingCart {
    constructor() {
        this.items = [];
        this.loadFromStorage();
    }
    
    // Сохранить в localStorage
    saveToStorage() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }
    
    // Загрузить из localStorage
    loadFromStorage() {
        const saved = localStorage.getItem('cart');
        if (saved) {
            this.items = JSON.parse(saved);
        }
    }
    
    // Добавить товар (увеличиваем количество, если уже есть)
    addItem(product) {
        const existing = this.items.find(item => item.id === product.id);
        if (existing) {
            existing.quantity = (existing.quantity || 1) + 1;
        } else {
            this.items.push({
                ...product,
                quantity: 1
            });
        }
        this.saveToStorage();
        this.updateUI();
    }
    
    // Удалить товар полностью
    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.saveToStorage();
        this.updateUI();
    }
    
    // Изменить количество товара
    updateQuantity(productId, delta) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            const newQuantity = (item.quantity || 1) + delta;
            if (newQuantity <= 0) {
                this.removeItem(productId);
            } else {
                item.quantity = newQuantity;
                this.saveToStorage();
                this.updateUI();
            }
        }
    }
    
    // Получить общую сумму
    getTotal() {
        return this.items.reduce((sum, item) => {
            return sum + (item.price * (item.quantity || 1));
        }, 0);
    }
    
    // Получить количество товаров
    getCount() {
        return this.items.reduce((count, item) => {
            return count + (item.quantity || 1);
        }, 0);
    }
    
    // Очистить корзину
    clear() {
        this.items = [];
        this.saveToStorage();
        this.updateUI();
    }
    
    // Обновить интерфейс
    updateUI() {
        // Обновляем счётчик на кнопке корзины
        const cartCount = document.getElementById('cartCount');
        if (cartCount) {
            cartCount.textContent = this.getCount();
        }
        
        // Обновляем содержимое корзины
        this.renderCartItems();
    }
    
    // Отобразить товары в корзине
    renderCartItems() {
        const cartItemsContainer = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');
        
        if (!cartItemsContainer) return;
        
        if (this.items.length === 0) {
            cartItemsContainer.innerHTML = '<div class="empty-cart">🛒 Корзина пуста</div>';
            if (cartTotal) cartTotal.textContent = '0 ₽';
            return;
        }
        
        let html = '';
        this.items.forEach(item => {
            const quantity = item.quantity || 1;
            const itemTotal = item.price * quantity;
            html += `
                <div class="cart-item" data-id="${item.id}">
                    <div class="cart-item-info">
                        <img src="images/${item.image}" alt="${item.name}" class="cart-item-img">
                        <div class="cart-item-title">${item.name}</div>
                    </div>
                    <div class="cart-item-price">${item.price.toLocaleString()} ₽</div>
                    <div class="cart-item-quantity-control">
                        <button class="cart-qty-btn" data-id="${item.id}" data-delta="-1">−</button>
                        <span class="cart-item-quantity">${quantity}</span>
                        <button class="cart-qty-btn" data-id="${item.id}" data-delta="1">+</button>
                    </div>
                    <button class="cart-item-delete" data-id="${item.id}">🗑</button>
                </div>
            `;
        });
        
        cartItemsContainer.innerHTML = html;
        if (cartTotal) {
            cartTotal.textContent = this.getTotal().toLocaleString() + ' ₽';
        }
        
        // Добавляем обработчики для кнопок изменения количества
        document.querySelectorAll('.cart-qty-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.dataset.id);
                const delta = parseInt(btn.dataset.delta);
                this.updateQuantity(id, delta);
            });
        });
        
        // Добавляем обработчики для кнопок удаления
        document.querySelectorAll('.cart-item-delete').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.dataset.id);
                this.removeItem(id);
            });
        });
    }
}

// Инициализация корзины
const cart = new ShoppingCart();

// Ждём загрузку DOM
document.addEventListener('DOMContentLoaded', () => {
    // Кнопка корзины
    const cartButton = document.getElementById('cartButton');
    const cartPopup = document.getElementById('cartPopup');
    const cartClose = document.getElementById('cartClose');
    const cartCheckout = document.getElementById('cartCheckout');
    
    // Открыть корзину
    if (cartButton) {
        cartButton.addEventListener('click', () => {
            cartPopup.classList.add('active');
            cart.renderCartItems();
        });
    }
    
    // Закрыть корзину
    if (cartClose) {
        cartClose.addEventListener('click', () => {
            cartPopup.classList.remove('active');
        });
    }
    
    // Закрыть по клику вне окна
    if (cartPopup) {
        cartPopup.addEventListener('click', (e) => {
            if (e.target === cartPopup) {
                cartPopup.classList.remove('active');
            }
        });
    }
    
    // Оформить заказ
    if (cartCheckout) {
        cartCheckout.addEventListener('click', () => {
            if (cart.getCount() === 0) {
                alert('Корзина пуста!');
                return;
            }
            alert('Спасибо за заказ! Мы свяжемся с вами для подтверждения.');
            cart.clear();
            cartPopup.classList.remove('active');
        });
    }
    
    // Кнопки "В корзину"
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const id = parseInt(btn.dataset.id);
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            const image = btn.dataset.image;
            
            cart.addItem({ id, name, price, image });
            
            // Анимация кнопки
            const originalText = btn.textContent;
            btn.textContent = '✓ Добавлено!';
            btn.style.backgroundColor = '#4CAF50';
            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.backgroundColor = '';
            }, 1000);
        });
    });
    
    // Обновляем интерфейс при загрузке
    cart.updateUI();
});