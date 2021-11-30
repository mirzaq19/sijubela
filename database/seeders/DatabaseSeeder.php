<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\BuyerUser;
use App\Models\SellerUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        BuyerUser::create([
            'buyer_username' => 'husin-buyer',
            'buyer_full_name' => 'Husin Muhammad', 
            'buyer_email' => 'husin@gmail.com',
            'buyer_password' => bcrypt('husin123'),
            'buyer_phone' => '081212121212',
        ]);

        BuyerUser::create([
            'buyer_username' => 'mirzaq-buyer',
            'buyer_full_name' => 'M Auliya Mirzaq', 
            'buyer_email' => 'mirzaq@gmail.com',
            'buyer_password' => bcrypt('mirzaq123'),
            'buyer_phone' => '081291029102',
        ]);

        BuyerUser::create([
            'buyer_username' => 'yusrilz-buyer',
            'buyer_full_name' => 'Yusril Z', 
            'buyer_email' => 'yusril@gmail.com',
            'buyer_password' => bcrypt('yusril123'),
            'buyer_phone' => '081291021212',
        ]);

        SellerUser::create([
            'seller_username' => 'husin-seller',
            'seller_full_name' => 'Husin Muhammad', 
            'seller_email' => 'husin@gmail.com',
            'seller_password' => bcrypt('husin123'),
            'seller_phone' => '081212121212',
        ]);

        SellerUser::create([
            'seller_username' => 'mirzaq-seller',
            'seller_full_name' => 'M Auliya Mirzaq', 
            'seller_email' => 'mirzaq@gmail.com',
            'seller_password' => bcrypt('mirzaq123'),
            'seller_phone' => '081291029102',
        ]);

        SellerUser::create([
            'seller_username' => 'yusrilz-seller',
            'seller_full_name' => 'Yusril Z', 
            'seller_email' => 'yusril@gmail.com',
            'seller_password' => bcrypt('yusril123'),
            'seller_phone' => '081291021212',
        ]);

        AdminUser::create([
            'admin_username' => 'husin-admin',
            'admin_password' => bcrypt('husin123'),
        ]);

        AdminUser::create([
            'admin_username' => 'mirzaq-admin',
            'admin_password' => bcrypt('mirzaq123'),
        ]);

        AdminUser::create([
            'admin_username' => 'yusrilz-admin',
            'admin_password' => bcrypt('yusril123'),
        ]);
    }
}
