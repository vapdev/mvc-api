<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professor::create([
            'nome' => 'Test User',
            'matricula' => '123456789',
            'email' => 'test@example.com',
            'user_id' => 1
        ]);
        Professor::factory()->count(2)->create();
    }
}
