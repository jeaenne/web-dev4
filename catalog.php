<?php
include 'db_connect.php';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';

switch($sort) {
    case 'price_asc':
        $order_by = "price ASC";
        break;
    case 'price_desc':
        $order_by = "price DESC";
        break;
    default:
        $order_by = "name ASC";
}

$sql = "SELECT id, name, price, short_description, image FROM product WHERE available = 1 ORDER BY $order_by";
$result = $conn->query($sql);
?>
<?php include 'header.php'; ?>

<div class="content">
    <div class="sidebar">
        <h3 style="margin-top:0; text-align:center;">Категории</h3>
        <a href="#">Котлы газовые</a>
        <a href="#">Котлы электрические</a>
        <a href="#">Радиаторы</a>
        <a href="#">Трубы и фитинги</a>
        <a href="#">Насосы</a>
        <a href="#">Системы отопления</a>
        <a href="#">Водоснабжение</a>
        <a href="#">Запорная арматура</a>
    </div>

    <div class="main-content">
        <h1>Каталог товаров</h1>
        <hr>

        <div class="sort-links" style="margin:20px 0; padding:15px; background:#fff0f5; border-radius:10px; text-align:center;">
            <strong>Сортировать:</strong>
            <a href="catalog.php?sort=name" style="color:#ff69b4;">По названию</a> |
            <a href="catalog.php?sort=price_asc" style="color:#ff69b4;">Цена (по возрастанию)</a> |
            <a href="catalog.php?sort=price_desc" style="color:#ff69b4;">Цена (по убыванию)</a>
        </div>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product-card" data-product-id="' . $row['id'] . '">';
echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '" class="product-img">';
echo '<div class="product-info">';
echo '<div class="product-name">' . htmlspecialchars($row['name']) . '</div>';
echo '<div class="product-price">💰 ' . number_format($row['price'], 0, '', ' ') . ' руб.</div>';
echo '<p>' . htmlspecialchars($row['short_description']) . '</p>';
echo '<button class="add-to-cart" data-id="' . $row['id'] . '" data-name="' . htmlspecialchars($row['name']) . '" data-price="' . $row['price'] . '" data-image="' . $row['image'] . '">🛒 В корзину</button>';
echo '<a href="product.php?id=' . $row['id'] . '" class="btn">Подробнее →</a>';
echo '</div>';
echo '</div>';
            }
        } else {
            echo "<p>Товары не найдены</p>";
        }
        $conn->close();
        ?>
    </div>

    <div class="right-banners">
        <div>Акция на котлы!</div>
        <div>Бесплатная доставка</div>
        <div>Теплые полы</div>
    </div>
</div>

<?php include 'footer.php'; ?>