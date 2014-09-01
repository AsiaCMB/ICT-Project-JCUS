<?php
/*phone number unit test*/
class phoneNumberTest extends PHPUnit_Framework_TestCase
{

	public function testNumber(){
		$phoneNumber = "123";
		/*checking the user input*/
		if(!preg_match('/^[0-9]*$/', $phoneNumber, $match)){

			$this->assertTrue(False);
		}
		else{
			$this->assertTrue(True);
		}
	}	
}
?>