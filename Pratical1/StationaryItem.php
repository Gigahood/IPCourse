<?php
require_once 'Item.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StationaryItem
 *
 * @author User
 */
class StationaryItem extends Item {
    //put your code here
    private $weight;
    
    function __construct($weight, $description, $code, $price) {
        parent::__construct($code, $description, $price);
        $this->weight = $weight;
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
    
    public function getOtherDetails() {
        return $this->weight;
    }
    
    
    public function __toString() {
        return parent::__toString() . 
                "Weight : $this->weight<br/><br/>";
    }

}
