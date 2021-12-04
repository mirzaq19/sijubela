<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\BuyerUser;
use App\Models\Address;
use App\Models\SellerUser;
use App\Models\Laptop;
use App\Models\LaptopImage;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Testimonial;
use App\Models\SellLaptop;

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
        Address::create([
            'full_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'province' => 'Jawa Timur',
            'district' => 'Mojokerto',
            'subdistrict' => 'Sooko',
            'village' => 'Japan',
            'postal_code' => '61361',
            'buyer_user_id' => 2,
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
            'laptop_name' => 'Lenovo V15-G1 15IML',
            'laptop_brand' => 'Lenovo',
            'laptop_type' => 'V15-G1 15IML',
            'laptop_desc' => 'Highlights :
            • Ada slot SSD M.2 yang bisa request pasang.
            • Storage yang bisa diupgrade untuk penyimpanan lebih besar dan performa yang lebih tinggi.
            
            BARANG ORI 100% - NEW
            - Stock Ready Bisa Di Order
            - Bonus Tas
            - Bonus Instal Os Trial ( Wajib Chat Penjual Dulu )
            - Garansi Distributor 1 Tahun
            
            ADA 4 VARIAN :
            -4GB RAM+1TB HDD
            -8GB RAM+1TB HDD
            -12GB RAM + 1TB HDD
            -4GB RAM+1TB HDD+256 SSD M.2
            -8GB RAM+1TB HDD+256 SSD M.2
            
            SPEK :
            Notebook : Lenovo V15-G1 15IML
            Processor : Intel® Core™ i3-10110U CPU @ 2.10 Ghz ( 2 Cores 4 Threads )
            RAM : 1X4096 MB DDR4 (4 GB DDR4-21300) OnBoard + 1 Slot Memori Kosong
            Harddisk : 1000 GB HDD + 1 SLOT SSD M.2 (22mm x 80mm) NVME
            Kamera : VGA Web Camera
            VGA : Intel® UHD Graphics, Dedicated 128 MB, Shared 3983 MB, Up to 4111 MB
            Baterai : 2 Cell Li-ion 4610mAh
            Fitur : BT, WiFi, Card Reader,1 Port USB 2.0,2 Port USB 3.0, HDMI
            Layar : 15,6 HD TN (1366 X 768)
            Berat Barang : 1.7 Kg
            Berat Kemasan : 2.5 Kg
            Ukuran Barang : 36.2 x 25 x 1.8 cm
            Ukuran Kemasan : 53 x 33 x 7 cm
            Warna : Iron grey
            Operation System (OS) : No OS
            Garansi : 1 Tahun',
            'laptop_condition' => 1,
            'laptop_weight' => 2.3,
            'laptop_price' => 6910995,
            'laptop_stock' => 10,
        ]);
        Laptop::create([
            'laptop_name' => 'LAPTOP GAMING ASUS X413JA',
            'laptop_brand' => 'Asus',
            'laptop_type' => 'X413JA',
            'laptop_desc' => 'Spesifikasi Lengkap :

                Asus X413JA-211
                Operation System : Windows 10 Home In S mode 64-Bit
                Processor : Intel Core i3-1005G1 @ 1.20 Ghz
                RAM : 4GB DDR4
                Internal : 128 GB M.2 NMVE + SSD 256GB NVME
                
                Layar : 14" FULL HD RESOLUSI (1920X1080)
                VGA : Intel® UHD Graphics Dedicated 128 MB
                Baterai : Cell LI-ion 19V (3550 mAh)
                Warna : Dreamy White
                
                FITUR :
                - Micro SD
                - WIFI
                - Bluetooth
                - Webcam
                - CardReader
                - 2 port USB 2.0
                - 1 port USB 3.0
                - 1 Port USB 3.1 type C
                - Port HDMI
                
                Kelengkapan :
                * Dus Ori lengkap
                * Manual Book
                * Kartu Garansi
                * Adaptor+Charger
                
                Garansi : 1 Tahun ( FULL SERVICE + SPAREPART )',
            'laptop_condition' => 1,
            'laptop_weight' => 2.3,
            'laptop_price' => 7623000,
            'laptop_stock' => 10,
        ]);
        Laptop::create([
            'laptop_name' => 'HP PAVILION 14-DV0068TX',
            'laptop_brand' => 'HP',
            'laptop_type' => 'PAVILION 14-DV0068TX',
            'laptop_desc' => 'Spesifikasi:

                - Processor Onboard : Intel Core™ i7-1165G7 (12M Cache, up to 4.70 GHz)
                - Memori Standar : 8 GB DDR4-3200 SDRAM
                - SSD : 512GB PCIe® NVMe™
                - Tipe Grafis : Intel® iRis XE & NVIDIA GEFORCE MX450 (2 GB GDDR5 dedicated)
                - Display : 14" FHD IPS BrightView micro-edge WLED-backlit (1920 x 1080)
                - Audio : Dual speakers
                - Keyboard : Full-size island-style natural silver backlit keyboard
                - Webcam : HP TrueVision HD Camera with integrated digital microphone
                - Wireless Network : Realtek 802.11 a/b/g/n/ac (1x1) Wi-Fi® and Bluetooth® 4.2 Combo
                - Interfaces
                1x USB 3.1 Gen 1 Type-C™ (Data transfer only, data 5 Gb/s signaling rate)
                2x USB 3.1 Gen 1 (Data transfer only)
                1x HDMI 1.4b
                1x RJ-45
                1x headphone/microphone combo
                
                - Sistem Operasi : Windows 10 Home + Microsoft Office Home & Student 2019 ORIGINAL PERMANEN
                - Baterai : 3-cell, 41 Wh Li-ion
                - Dimensi : 32.4 x 22.59 x 1.99 cm
                - Weight : 1,43Kg
                - Color : Silver, Gold',
            'laptop_condition' => 1,
            'laptop_weight' => 2.3,
            'laptop_price' => 15492500,
            'laptop_stock' => 10,
        ]);

        LaptopImage::create([
            'laptop_image' => 'img/product/p1-1.webp',
            'laptop_id' => 1,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p1-2.webp',
            'laptop_id' => 1,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p2-1.webp',
            'laptop_id' => 2,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p2-2.webp',
            'laptop_id' => 2,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p3-1.webp',
            'laptop_id' => 3,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p3-2.webp',
            'laptop_id' => 3,
        ]);
        Cart::create([
            'cart_amount' => 1,
            'cart_note' => 'Segera dikirim ya',
            'laptop_id' => 1,
            'buyer_user_id' => 2,
        ]);
        Cart::create([
            'cart_amount' => 1,
            'cart_note' => 'Segera dikirim ya',
            'laptop_id' => 2,
            'buyer_user_id' => 2,
        ]);
        Order::create([
            'order_status' => 'not_paid',
            'shipping_status' => 'Belum dikirim',
            'shipping_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'shipping_number' => 'not_shipped',
            'shipping_cost' => 20000,
            'total_price' => 6910995,
            'buyer_user_id' => 2,
        ]);
        OrderDetail::create([
            'order_detail_amount' => 1,
            'order_detail_note' => 'Segera dikirim ya',
            'price_subtotal' => 6910995,
            'weight_subtotal' => 2.3,
            'order_id' => 1,
            'laptop_id' => 1,
        ]);
        Order::create([
            'order_status' => 'shipping',
            'shipping_status' => 'Paket berada di warehouse sidoarjo',
            'shipping_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'shipping_number' => 'JNE-123456789',
            'shipping_cost' => 20000,
            'total_price' => 7623000,
            'buyer_user_id' => 2,
        ]);
        OrderDetail::create([
            'order_detail_amount' => 1,
            'order_detail_note' => 'Segera dikirim ya',
            'price_subtotal' => 7623000,
            'weight_subtotal' => 2.3,
            'order_id' => 2,
            'laptop_id' => 2,
        ]);
        Payment::create([
            'payment_image' => 'payment/r1.jpg',
            'payment_status' => 'wait_confirmation',
            'payment_bank_name' => 'bni',
            'payment_account_name' => 'Mirzaq',
            'payment_account_number' => '123456789',
            'order_id' => 2,
        ]);
        Order::create([
            'order_status' => 'finished',
            'shipping_status' => 'Paket sudah sampai',
            'shipping_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'shipping_number' => 'JNE-123456789',
            'shipping_cost' => 20000,
            'total_price' => 15492500,
            'buyer_user_id' => 2,
        ]);
        OrderDetail::create([
            'order_detail_amount' => 1,
            'order_detail_note' => 'Segera dikirim ya',
            'price_subtotal' => 15492500,
            'weight_subtotal' => 2.3,
            'order_id' => 3,
            'laptop_id' => 3,
        ]);
        Payment::create([
            'payment_image' => 'payment/r2.jpg',
            'payment_status' => 'confirmed',
            'payment_bank_name' => 'bni',
            'payment_account_name' => 'Mirzaq',
            'payment_account_number' => '123456789',
            'order_id' => 3,
        ]);

        Testimonial::create([
            'rating' => 5,
            'testimonial_desc' => 'Alhamdullilah, laptop sudah sampai dengan selamat, barangnya bagus dan bisa digunakan',
            'buyer_user_id' => 2,
            'order_detail_id' => 3,
            'laptop_id' => 3,
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
        LaptopImage::create([
            'laptop_image' => 'img/product/p3-1.webp',
            'laptop_id' => 4,
        ]);
        LaptopImage::create([
            'laptop_image' => 'img/product/p3-2.webp',
            'laptop_id' => 5,
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
            'order_status' => 'not_paid',
            'shipping_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'shipping_status' => 'Belum dikirim',
            'shipping_number' => 'not_shipped',
            'shipping_cost' => 50000,
            'total_price' => 13050000,
        ]);

        Order::create([
            'buyer_user_id' => 2,
            'order_status' => 'paid',
            'shipping_address' => 'Jl. Bola Volly A.20, Japan Raya, Sooko, Mojokerto',
            'shipping_status' => 'on process',
            'shipping_number' => 'not_shipped',
            'shipping_cost' => 40000,
            'total_price' => 15040000,
        ]);

        OrderDetail::create([
            'order_id' => 4,
            'laptop_id' => 4,
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
