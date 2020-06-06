<?php

use Illuminate\Database\Seeder;
class TaskTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (range(0, 3) as $i) {
    		DB::table('task_ctf')->insert([
                'id_category' => 5,
    			'name_task' => 'Forensic',
    			'hint' => 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya',
    			'task_point' => 200,
    			'flag' => 'CTF{hahaah_benar}',
    			'author' => 'iqbal'
    		]); 	
    	}
    }
}
