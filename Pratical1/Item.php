<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author User
 */
abstract class Item {
    //put your code here
    private $code;
    private $description;
    private $price;
    
    function __construct($code, $description, $price) {
        $this->code = $code;
        $this->description = $description;
        $this->price = $price;
    }
    
//    function getCode() {
//        return $this->code;
//    }
//
//    function getDescription() {
//        return $this->description;
//    }
//
//    function getPrice() {
//        return $this->price;
//    }
//
//    function setCode($code): void {
//        $this->code = $code;
//    }
//
//    function setDescription($description): void {
//        $this->description = $description;
//    }
//
//    function setPrice($price): void {
//        $this->price = $price;
//    }

    public function __set($name, $value) {
        $this -> $name = $value;
    }
    
    public function __get($name) {
        return $name;
    }
    
    public abstract function getOtherDetails();
    
    public function __toString() {
        echo "Item code : $this->code <br/>"
                . "Description : $this->$description<br/>"
                . "Price (RM): " . number_format($this->price, 2) . "<br/>";
    }

}
