<?php 
class Auto {
    public $name,$price,$year,$power;
    public function __construct($name,$price,$year,$power){
    $this->name = $name;
    $this->price = $price;
    $this->year = $year;
    $this->power = $power;
 }
    public function print() {
        echo 
        $this->name.' '.
        $this->price.' '.
        $this->year.' '.
        $this->power.
        '<br>';
    }
}
$jeep = new Auto('Jeep Grand Cherokee','5 000 000','2024','280');
$niva = new Auto('Niva Sport','1 700 000','2025','120');
$jeep->print();
$niva->print();
?>

