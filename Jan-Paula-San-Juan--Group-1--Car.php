<?php
class Car {
  public $price;
  public $speed;
  public $fuel;
  public $mileage;
  public $tax;
  public function __construct($price, $speed, $fuel, $mileage) {
    $this->price=$price;
	$this->speed=$speed;
	$this->fuel=$fuel;
	$this->mileage=$mileage;
	if($this->price>10000) {
		$this->tax=0.15;
	} else {
		$this->tax=0.12;
	}
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
  public function Display_all() {
	echo "<div>";
    echo "	<p>Price: ".$this->price."</p>";
	echo "	<p>Speed: ".$this->speed."mph</p>";
	echo "	<p>Fuel: ".$this->fuel."</p>";
	echo "	<p>Mileage: ".$this->mileage."mpg</p>";
	echo "	<p>Tax: ".$this->tax."</p>";
	echo "</div>";
  }
}
$car1=new Car(2000, 35, "Full", 15);
$car2=new Car(2000, 5, "Not Full", 105);
$car3=new Car(2000, 15, "Kind of Full", 95);
$car4=new Car(2000, 25, "Full", 25);
$car5=new Car(2000, 45, "Empty", 25);
$car6=new Car(20000000, 35, "Empty", 15);

$car1->Display_all();
$car2->Display_all();
$car3->Display_all();
$car4->Display_all();
$car5->Display_all();
$car6->Display_all();
?>