<?php
class Bike {
  public $price;
  public $max_speed;
  public $miles;
  public function __construct($price, $max_speed) {
    $this->price=$price;
	$this->max_speed=$max_speed;
	$this->miles=0;
  }
  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->property;
    }
  }
  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
    return $this;
  }
  public function displayInfo() {
    echo "<p>Price: ".$this->price."</p>";
	echo "<p>Max Strength: ".$this->max_speed."</p>";
	echo "<p>Miles: ".$this->miles."</p>";
  }
  public function drive() {
    echo "<p>Driving</p>";
	$this->miles+=10;
  }
  public function reverse() {
    echo "<p>Reversing</p>";
	if($this->miles-5>=0) {
		$this->miles-=5;
	}
  }
}
$bike1=new Bike(1, 1);
$bike2=new Bike(1, 1);
$bike3=new Bike(1, 1);

$bike1->drive();
$bike1->drive();
$bike1->drive();
$bike1->reverse();
$bike1->displayInfo();

$bike2->drive();
$bike2->drive();
$bike2->reverse();
$bike2->reverse();
$bike2->displayInfo();

$bike3->reverse();
$bike3->reverse();
$bike3->reverse();
$bike3->displayInfo();
?>