<?php 
namespace App\Helpers;

class EncryptDecrypt
{
	
	public function __construct()
	{
		# code...
	}

	    /*
        Encrypt Data
    */
        private function encrypt($string, $key=6){
        	$result = '';
        	for ($i=0, $k =  strlen($string); $i<$k; $i++) { 
        		$char = substr($string, $i, 1);
        		$keychar = substr($key, ($i % strlen($key)) -1 , 1);
        		$char = chr(ord($char)+ord($keychar));
        		$result .= $char; 
        	}
        	return base64_encode($result);   
        }

    /*
        Dcrypt Data
    */
        private function decrypt($string, $key=6) {
        	$result = '';
        	$string = base64_decode($string);
        	for($i=0,$k=strlen($string); $i< $k ; $i++) {
        		$char = substr($string, $i, 1);
        		$keychar = substr($key, ($i % strlen($key))-1, 1);
        		$char = chr(ord($char)-ord($keychar));
        		$result.=$char;
        	}
        	return $result;
        }
}

?>