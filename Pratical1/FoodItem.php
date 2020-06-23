<?php
require_once 'Item.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FoodItem
 *
 * @author User
 */
class FoodItem extends Item {
    //put your code here
    private $unit;
    
    function __construct($unit, $description, $price, $code) {
        parent::__construct($code, $description, $price);
        $this->unit = $unit;
    }
    
    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            parent::__set($name, $value);
        }
        
    }
    
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return parent::__get($name);
        }
    }
    
    public function __toString() {
        return parent::__toString() . 
                "Unit : $this->unit<br/><br/>";
    }

    public function getOtherDetails() {
        return $this->unit;
    }
}
