<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event (Minimal 3 Sesuai Tugas)
        $category = \App\Models\Category::firstOrCreate([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);
        
        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        // Tambahan Kategori Ke-3
        $category3 = \App\Models\Category::firstOrCreate([
            'name' => 'Workshop & Pelatihan',
            'slug' => 'workshop-pelatihan',
        ]);

        // 3. Insert Sampel Events (Minimal 6 Sesuai Tugas)
        
        // Event 1 
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        // Event 2 
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Hackaton - Unleash Your Inner Developer',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Event 3 
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        // Event 4 
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Stand Up Comedy Campus Tour',
            'description' => 'Tertawa bersama komika-komika ternama tanah air di kampus tercinta.',
            'date' => '2026-06-15 19:00:00',
            'location' => 'Ruang Citra 2',
            'price' => 75000,
            'stock' => 150,
            'poster_path' => 'posters/event-4.png',
        ]);

        // Event 5 
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'UI/UX Design Intensive Bootcamp',
            'description' => 'Pelajari cara merancang antarmuka pengguna yang menarik dan fungsional dari nol.',
            'date' => '2026-07-20 09:00:00',
            'location' => 'Lab Komputer 4',
            'price' => 150000,
            'stock' => 40,
            'poster_path' => 'posters/event-5.png',
        ]);

        // Event 6 
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Digital Marketing 101',
            'description' => 'Kuasai teknik pemasaran digital untuk meningkatkan penjualan bisnis Anda.',
            'date' => '2026-08-10 13:00:00',
            'location' => 'Ruang Kelas 2.1.1',
            'price' => 100000,
            'stock' => 50,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}