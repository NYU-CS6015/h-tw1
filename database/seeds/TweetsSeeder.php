<?php
use Illuminate\Database\Seeder;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for($i=0;$i<$limit;$i++) {
            DB::table('tweets')->insert([
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
                'tweet' => $faker->text($maxNbChars = 50),
            ]);
        }
    }
}