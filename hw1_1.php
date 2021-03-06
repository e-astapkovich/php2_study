<?php 

// класс товара
class Product {
	public $id;
	public $name;
	public $price;

	public function __construct($id=null, $name="product", $price=0) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}
}


// класс списка товаров. Родительский класс для классов каталога и корзины
abstract class ProductList {

	// содержимое списка
	public $contents = [];

	// вывод содержимого списка
	public function showContents() {
		if (!empty($this->contents)) {
			echo static::class . " contents: <br>";
			foreach ($this->contents as $product) {
				var_dump($product);
				echo "<br>";
			}
		} else {
			echo static::class . " is empty. <br>";
		}
	}
}


// класс каталога
class Catalog extends ProductList {

	// Создание в каталоге нового товара.
	public function addProduct($id, $name, $price) {
		$this->contents[] = new Product($id, $name, $price);
		echo "Товар с id $id добавлен в каталог.<br>";
	}
}

// клаасс корзины
class Cart extends ProductList {

	// Добавление товара в корзину
	public function addToCart($product_id) {

		/* Провряем, содержится ли уже в корзине товар с переданным id.
		* Если да, то увеличиваем количество на 1.
		*/
		for ($i=0; $i < count($this->contents)-1; $i++) { 
			if ($this->contents[$i]['id'] == $product_id) {
				$this->contents[$i]['quantity'] += 1;
				echo "Товар с id $product_id добавлен в корзину<br>";
				return;
			}
		}

		// Если товар в корзине не обнаружен, то добавляем товар, установив количество 1.
		$this->contents[] = ['id' => $product_id, 'quantity' => 1];

		echo "Товар с id $product_id добавлен в корзину<br>";
	}
}



// Создаем экземпляры каталога и корзины
$catalog = new Catalog;
$cart = new Cart;

// Проверяем содержимое каталога и корзины на данном этапе выполнения скрипта
$catalog->showContents();
$cart->showContents();

// создаем несколько товаров в каталоге.
$catalog->addProduct(0, 'pen', 5);
$catalog->addProduct(1, 'pencil', 7);
$catalog->addProduct(2, 'book', 9);
$catalog->addProduct(3, 'eraser', 3);
$catalog->addProduct(4, 'stapler', 2);

// Проверяем содержимое каталога и корзины на данном этапе выполнения скрипта
$catalog->showContents();
$cart->showContents();

// Добавляем товар в корзину
$cart->addToCart(3);

// Проверяем содержимое каталога и корзины на данном этапе выполнения скрипта
$catalog->showContents();
$cart->showContents();

// Добавляем еще товары в корзину.
$cart->addToCart(0);
$cart->addToCart(4);
$cart->addToCart(4);
$cart->addToCart(3);

// Проверяем содержимое каталога и корзины на данном этапе выполнения скрипта
$catalog->showContents();
$cart->showContents();


?>
