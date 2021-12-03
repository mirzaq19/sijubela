<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\BuyerUser;
use App\Models\SellerUser;
use App\Models\Laptop;
use App\Models\SellLaptop;
use App\Models\Order;
use App\Models\OrderDetail;

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

        Laptop::create([
            'laptop_name' => 'Acer Aspire E5-571-51-LN',
            'laptop_brand' => 'Acer',
            'laptop_type' => 'Ultrabook',
            'laptop_desc' => 'lorem ipsum',
            'laptop_condition' => 1,
            'laptop_weight' => 2.0,
            'laptop_price' => 5500000,
            'laptop_stock' => 10,
        ]);

        Laptop::create([
            'laptop_name' => 'Asus VivoBook S15',
            'laptop_brand' => 'Asus',
            'laptop_type' => 'Ultrabook',
            'laptop_desc' => 'lorem ipsum',
            'laptop_condition' => 0,
            'laptop_weight' => 1.2,
            'laptop_price' => 7500000,
            'laptop_stock' => 50,
        ]);

        SellLaptop::create([
            'seller_user_id' => 1,
            'sell_laptop_name' => 'Asus ROG Strix G',
            'sell_laptop_brand' => 'Asus',
            'sell_laptop_type' => 'Gaming',
            'sell_laptop_desc' => 'lorem ipsum',
            'sell_laptop_condition' => 0,
            'sell_laptop_usage_time' => 10,
            'sell_laptop_price' => 15500000,
            'sell_laptop_weight' => 2.1,
        ]);

        SellLaptop::create([
            'seller_user_id' => 2,
            'sell_laptop_name' => 'Lenovo ThinkPad X1 Carbon',
            'sell_laptop_brand' => 'Lenovo',
            'sell_laptop_type' => 'Ultrabook',
            'sell_laptop_desc' => 'lorem ipsum',
            'sell_laptop_condition' => 1,
            'sell_laptop_usage_time' => 0,
            'sell_laptop_price' => 17500000,
            'sell_laptop_weight' => 1.7,
        ]);

        Order::create([
            'buyer_user_id' => 1,
            'payment_id' => 0,
            'order_status' => 'not yet paid',
            'shipping_status' => 'not yet shipped',
            'shipping_cost' => 50000,
            'total_price' => 13050000,
        ]);

        Order::create([
            'buyer_user_id' => 2,
            'payment_id' => 0,
            'order_status' => 'paid',
            'shipping_status' => 'on process',
            'shipping_cost' => 40000,
            'total_price' => 15040000,
        ]);

        OrderDetail::create([
            'order_id' => 1,
            'laptop_id' => 1,
            'order_detail_amount' => 1,
            'order_detail_note' => 'lorem ipsum',
            'price_subtotal' => 5500000,
            'weight_subtotal' => 2.0,
        ]);

        OrderDetail::create([
            'order_id' => 1,
            'laptop_id' => 2,
            'order_detail_amount' => 1,
            'order_detail_note' => 'lorem ipsum',
            'price_subtotal' => 7500000,
            'weight_subtotal' => 1.2,
        ]);

        OrderDetail::create([
            'order_id' => 2,
            'laptop_id' => 2,
            'order_detail_amount' => 2,
            'order_detail_note' => 'lorem ipsum',
            'price_subtotal' => 15000000,
            'weight_subtotal' => 2.4,
        ]);
    }
}
