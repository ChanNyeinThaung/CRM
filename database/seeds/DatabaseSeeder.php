<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new App\User();
        $user->name = "Bob";
        $user->email = "bob@gmail.com";
        $user->password = bcrypt('123456');
        $user->role = 1;
        $user->save();

        $user = new App\User();
        $user->name = "Alice";
        $user->email = "alice@gmail.com";
        $user->password = bcrypt('123456');
        $user->role = 2;
        $user->save();

        for($i=0; $i<10; $i++) {
            $customer = new App\Customer();
            $customer->name = $faker->name();
            $customer->email = $faker->email();
            $customer->phone = $faker->phoneNumber();
            $customer->address = $faker->address();
            $customer->save();
        }

        $products = [
            'iPhone XS', 'Samsung Galaxy X', 'Oppo F5', 'Huawei P9', 'Vevo Z10',
            'iPhone XS Max', 'Samsung Galaxy Note', 'Oppo F3', 'Huawei P7', 'Vevo Z8'
        ];

        for($i=0; $i<10; $i++) {
            $product = new App\Product();
            $product->name = $products[$i];
            $product->brand = strtoupper( str_random(5) );
            $product->model = strtoupper( str_random(5) );
            $product->save();
        }

        for($i=0; $i<20; $i++) {
            $complain = new App\Complain();
            $complain->subject = $faker->sentence();
            $complain->detail = $faker->paragraph();
            $complain->product_id = rand(1, 10);
            $complain->customer_id = rand(1, 10);
            $complain->user_id = rand(1, 2);
            $complain->status = rand(0, 4);
            $complain->save();
        }

        for($i=0; $i<20; $i++) {
            $comment = new App\Comment();
            $comment->comment = $faker->paragraph();
            $comment->complain_id = rand(1, 20);
            $comment->save();
        }

        // $this->call(UsersTableSeeder::class);
    }
}
