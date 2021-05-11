<?php
class Animal {
	public $name;
	public $health;
	public function __construct($name) {
		$this->__set("name", $name);
		$this->__set("health", 100);
	}
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
		return $this;
	}
	public function walk() {
		$this->health-=1;
		return $this;
	}
	public function run() {
		$this->health-=5;
		return $this;
	}
	public function displayHealth() {
?>
		<div class="display_health">
			<h1>This is an animal!</h1>
			<p>Name: <?= $this->__get("name"); ?></p>
			<p>Health: <?= $this->__get("health"); ?></p>
		</div>
<?php
	}
}
class Dog extends Animal {
	public function __construct($name) {
		$this->__set("name", $name);
		$this->__set("health", 150);
	}
	public function pet() {
		$this->health+=5;
		return $this;
	}
	public function displayHealth() {
?>
		<h1>This is a dog!</h1>
<?php
		parent::displayHealth();
	}
}
class Dragon extends Animal {
	public function __construct($name) {
		$this->__set("name", $name);
		$this->__set("health", 170);
	}
	public function fly() {
		$this->health-=10;
		return $this;
	}
	public function displayHealth() {
?>
		<h1>This is a dragon!</h1>
<?php
		parent::displayHealth();
	}
}

$animal=new Animal("Animal");
$animal->walk()->walk()->walk()->run()->run()->displayHealth();

$dog=new Dog("Dog");
$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();

$dragon=new Dragon("Dragon");
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();

//$animal->pet()->displayHealth();
//$animal->fly()->displayHealth();
?>