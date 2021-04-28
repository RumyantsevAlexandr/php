<?php
    header('Content-type: text/html; charset=utf-8');
    class Person{
        private $name;
        private $age;
        private $hp;
        private $mother;
        private $father;
        
        function __construct($name,$age,$mother,$father){
        $this->name = $name;
        $this->age = $age;
        $this->hp = 100;
        $this->mother = $mother;
        $this->father = $father;
        }
        
        function getMother(){return $this->mother;}
        function getFather(){return $this->father;}
        function getName(){return $this->name;}
        function sayHi($name){
            echo "Привет $name, меня зовут ".$this->name;
        }
        function getHp(){return $this->hp." ед.";}
        function setHp($hp){
            if($this->hp + $hp >= 100) $this->hp = 100;
            else $this->hp = $this->hp + $hp;
        }
        
        
        function getInfo(){
            $info = "Привет, меня зовут ".$this->name."<br>
                    Мне ".$this->age."лет<br>";
            
            if($this->mother != null){
            $info .= "Мою маму зовут ".$this->mother->getName()."<br>";
            
            if($this->father != null){
            $info .="Папу зовут ".$this->father->getName()."<br>";
        }
            if($this->mother->getMother() != null){
            $info .="Бабушку по маминой линии зовут ".$this->mother->getMother()->getName()."<br>";
        }
            if($this->mother->getMother() != null){
            $info .="Дедушку по маминой линии зовут ".$this->mother->getFather()->getName()."<br>";
        }
            if($this->father->getFather() != null){
            $info .="Дедушку по папиной линии зовут ".$this->father->getFather()->getName()."<br>";
        }
            if($this->father->getFather() != null){
            $info .="Бабушку по папиной линии зовут ".$this->father->getMother()->getName()."<br>";
        }
            }
        
        echo $info;
        }    
    }  
    $Anna = new Person("Анна",87);
    $Anton = new Person("Антон",90);
    $Misha = new Person("Миша",88);
    $Sveta = new Person("Света",86);
    $Marina = new Person("Марина",62,$Sveta,$Misha);
    $Yuriy = new Person("Юрий",65,$Anna,$Anton);
    $Sasha = new Person("Саша",38,$Marina,$Yuriy);
    //echo $Nadya->getMother()->getName(),"<br>";
    //echo $Nadya->getMother()->getMother()->getName(),"<br>";
    echo $Sasha->getInfo();
?>
