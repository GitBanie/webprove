<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
                      array('name'=>'HTML/CSS/JS'),
                      array('name'=>'PHP'),
                      array('name'=>'Node.js'),
                      array('name'=>'Vue.js'),
                      array('name'=>'AngularJs'),
                      array('name'=>'React'),
                      array('name'=>'Symfony'),
                      array('name'=>'Laravel'),
                      );

        DB::table('categories')->insert($data);
    }
}
