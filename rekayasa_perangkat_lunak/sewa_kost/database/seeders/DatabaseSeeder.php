<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'telepon' => '0313011146',
            'alamat' => 'Bangkalan',
            'tanggal_lahir' => '2002-02-02',
            'image' => '',
            'password' => Hash::make('123456'),
            ]
        ]);
        DB::table('pemiliks')->insert([
            [
            'username' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'telepon' => '0313011146',
            'alamat' => 'Bangkalan',
            'image' => '',
            'password' => Hash::make('123456'),
            ]
        ]);
        DB::table('admins')->insert([
            [
                'username' => '',
                'email' => 'admin@gmail.com',
                'telepon' => '',
                'alamat' => '',
                'tanggal_lahir' => '2000-01-01',
                'image' => '',
                'password' => Hash::make('123456'),
            ]
        ]);
        DB::table('kosts')->insert([
            [
                'nama' => 'Mawar',
                'pemilik_id' => '1',
                'tersedia' => '25',
                'penghuni' => '2',
                'harga' => '12500',
                'image' => 'kamarekonomi.jpeg',
                'deskripsi' => 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem',
                'lokasi' => 'https://goo.gl/maps/LpAsHZF7zD7wierg8?coh=178572&entry=tt',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Arumdam',
                'pemilik_id' => '1',
                'tersedia' => '20',
                'penghuni' => '2',
                'harga' => '13000',
                'image' => 'kamarekonomi.jpeg',
                'deskripsi' => 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem',
                'lokasi' => 'https://goo.gl/maps/LpAsHZF7zD7wierg8?coh=178572&entry=tt',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Afif',
                'pemilik_id' => '1',
                'tersedia' => '36',
                'penghuni' => '2',
                'harga' => '12500',
                'image' => 'kamarekonomi.jpeg',
                'deskripsi' => 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem',
                'lokasi' => 'https://goo.gl/maps/LpAsHZF7zD7wierg8?coh=178572&entry=tt',
                'status' => 'aktif',
            ],
        ]);
        DB::table('aboutuss')->insert([
            [
            'site_title' => '',
            'site_about' => '',
            'deskripsi' => '',
            ]
        ]);
        DB::table('aboutcontacts')->insert([
            [
            'alamat' => '',
            'maps' => '',
            'telepon' => '',
            'telepon_rujukan' => '',
            'email' => '',
            'email_rujukan' => '',
            'media_sosial' => '',
            'medsos_rujukan' => '',
            'iframe' => '',
            ]
        ]);
    }
}
