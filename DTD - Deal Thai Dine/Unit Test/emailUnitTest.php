<?php
/*email unit test*/
class emailTest extends PHPUnit_Framework_TestCase
{

	public function testName(){
		$email = "someone@example.com";
		/*checking the user input*/
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

			$this->assertTrue(False);
		}
		else{
			$this->assertTrue(True);
		}
	}	
}
?>