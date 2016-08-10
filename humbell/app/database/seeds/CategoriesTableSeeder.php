<?php
class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        //to seed categories table
        DB::table('categories')->delete();

        $now = date('Y-m-d H:i:s');

        //for level 0

        for($i = 0; $i < 10; $i++)
        {
            $stringRandomLength = mt_rand(3,10);
            DB::table('categories')->insert(
                array(
                    'name' =>$this->generateRandomString($stringRandomLength),
                    'level' => 0,
                    'created_at' => $now,
                    'updated_at' => $now
                )
            );
        }

        //for level 1

        for($i = 0; $i < 15; $i++)
        {
            $categories = Categories::select('id')->where('level','=',0)->orderBy('id','ASC')->get();
            $records = array();

            foreach ($categories as $category){
                array_push($records, $category);
            }
            $stringRandomLength = mt_rand(3,10);
            $randomRecord = mt_rand(0,9);
            DB::table('categories')->insert(
                array(
                    'name' =>$this->generateRandomString($stringRandomLength),
                    'parentID' => $records[$randomRecord]->id,
                    'level' => 1,
                    'created_at' => $now,
                    'updated_at' => $now
                )
            );
        }

        //for level 2

        for($i = 0; $i < 30; $i++)
        {
            $categories = Categories::select('id')->where('level','=',1)->orderBy('id','ASC')->get();
            $records = array();

            foreach ($categories as $category){
                array_push($records, $category);
            }
            $stringRandomLength = mt_rand(3,10);
            $randomRecord = mt_rand(0,14);          //only 15 rows for level 1
            DB::table('categories')->insert(
                array(
                    'name' =>$this->generateRandomString($stringRandomLength),
                    'parentID' => $records[$randomRecord]->id,
                    'level' => 2,
                    'created_at' => $now,
                    'updated_at' => $now
                )
            );
        }




    }

    public  function generateRandomString($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}