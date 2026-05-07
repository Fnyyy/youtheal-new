<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Staff BK',
            'email' => 'staff@youtheal.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        $categories = [
            'Perundungan Fisik',
            'Perundungan Verbal',
            'Perundungan Siber (Cyberbullying)',
            'Perundungan Relasional/Sosial',
            'Pelecehan Seksual',
            'Lainnya'
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'description' => 'Kategori pelanggaran: ' . $category,
            ]);
        }
    }
}
