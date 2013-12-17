<?php
class UserClass
{
	//Fields
	private $id;
	private $firstname;
	private $infix;
	private $surname;
	private $address;
	private $addressnumber;
	private $city;
	private $zipcode;
	private $country;
	private $telephonenumber;
	private $mobilephonenumber;
	
	//properties
	public function getId() {return $this->id; }
	public function getFirstname() {return $this->firstname;}	
	public function getInfix() {return $this->infix;}	
	public function getSurname() {return $this->surname;}	
	public function getAddress() {return $this->address;}	
	public function getAddressnumber() {return $this->addressnumver;}	
	public function getCity() {return $this->city;}	
	public function getZipcode() {return $this->zipcode;}	
	public function getCountry() {return $this->country;}	
	public function getTelephonenumber() {return $this->telephonenumber;}	
	public function getMobilephonenumber() {return $this->mobilephonenumber;}	
	
	// Constructor
	public function __construct()
	{
		
		
	}
	
}

?>