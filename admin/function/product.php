<?php

class Product {
	protected $_id;
	protected $_name;
	protected $_category_name;
	protected $_brand_name;
	protected $_color_name;
	protected $_image;
	protected $_price;
	protected $_gender;

	function __construct($dbrow){
		// parent::__construct($catrow);
		$this->_id = $dbrow['id'];
		$this->_name = $dbrow['name'];
		$this->_category_name = $dbrow['category_name'];
		$this->_brand_name = $dbrow['brand_name']; 
		$this->_color_name = $dbrow['color_name'];
		$this->_image = $dbrow['image'];
		$this->_price = $dbrow['price'];
		$this->_gender = $dbrow['gender'];
	}
	function  getId(){
		return $this->_id;
	}
	function getName(){
		return $this->_name;
	}
	function getCategory_name(){
		return $this->_category_name;
	}
	function getBrand_name(){
		return $this->_brand_name;
	}
	function getColor_name(){
		return $this->_color_name;
	}
	function getImage(){
		return $this->_image;
	}
	function getPrice(){
		return $this->_price;
	}
	function getGender(){
		return $this->_gender;
	}
	function __toString(){
		return "$this->_id $this->_name $this->_category_name $this->_brand_name $this->_color_name $this->_image $this->_price $this->_gender";
	}
}
?>