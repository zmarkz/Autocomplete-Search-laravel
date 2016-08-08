<?php
class ItemTableSeeder extends Seeder {

    public function run()
    {
        DB::table('items')->delete();

        $now = date('Y-m-d H:i:s');

        for($i = 0; $i < 100; $i++)     //generate 100 rows
        {
            $categories = Categories::select('id')->get();
            $records = array();

            foreach ($categories as $category){
                array_push($records, $category);
            }
            $stringRandomLength = mt_rand(3,10);
            $randomRecord = mt_rand(0,54);
            $price = mt_rand(1,10000);
            DB::table('items')->insert(
                array(
                    'name' =>$this->generateRandomString($stringRandomLength),
                    'price' => $price,
                    'parentID' => $records[$randomRecord]->id,
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