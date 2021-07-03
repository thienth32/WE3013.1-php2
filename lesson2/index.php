<?php
class A{
    const NAME = "thienth";
    public $age = 20;
    protected $salary = 2000;
    private $name = "phát gầy";

    

    public function setName($newName){
        $this->name = $newName;
    }
}

class B extends A{
    function getSalary(){
        return $this->salary;
    }
    public function getName(){
        return $this->name;
    }
}

// echo A::NAME;

$phat = new B();
echo $phat->getName();
// echo "<br>";
// echo $phat->getName();
// $phat->setName("Vin FAT");
// echo $phat->getName();;



?>