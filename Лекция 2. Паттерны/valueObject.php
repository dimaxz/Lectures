<?php
class User{
	
	protected $name;
	
	protected $email;
			
	function __construct($name, Email $email) {
		$this->name = $name;
		$this->email = $email;
	}
	
}
 class Email{
	 
	 protected $email;
	 
	 function __construct($email) {
		 
		 if(!$this->validate($email)){
			 throw new InvalidArgumentException("email not valid");
		 }
		 
		 $this->email = $email;
	 }
	 
	 protected function validate($email){
		 
		 return false;
	 }
	 
	 public function getEmail(){
		 return $this->email;
	 }
 }
 
 try{
	 $user = new User("dima",new Email("dffff.ru"));
 } catch (InvalidArgumentException $ex) {
	 echo $ex->getMessage();
 }
 
 
 