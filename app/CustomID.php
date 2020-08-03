<?php 

namespace App;
use DB;

class CustomID 
{
	public function UUID() {

		$year = date('Y');
		$key = 'petani';

		$member = DB::table('users_petani')->get();
		$i = strval($member->count());
		$i++;
		$format = str_pad($i, 5, "0", STR_PAD_LEFT);
		$format = "PTNI" . $year . strtoupper($key) . $format;

		return $format;
	}
}

?>