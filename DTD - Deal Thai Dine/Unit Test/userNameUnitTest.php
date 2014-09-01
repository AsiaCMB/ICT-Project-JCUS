<?php
/*checking the user name*/
class userNameTest extends PHPUnit_Framework_TestCase
{

	public function testNumber(){
		$member = array("Peter", "Joe", "Glenn", "Cleveland");
		$userName = "Glenn";
		/*checking the user input*/
		if (in_array($userName, $member)){
			$this->assertTrue(False);
		}
		else{
			$this->assertTrue(True);
		}
	}	
}
?>