<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Siswa 1',
                'identity' => '1234567890',
                'kelas' => 'A',
                'email' => 'siswa@mail.com',
                'password' => bcrypt('siswa123'),
            ],
            [
                'name' => 'Guru',
                'identity' => '0987654321',
                'kelas' => 'A',
                'email' => 'guru@mail.com',
                'role' => 'guru',
                'password' => bcrypt('guru123'),
            ]];
        foreach ($user as $data) {
            \App\Models\User::create($data);
        }
        $this->command->info('guru dan siswa berhasil di seeder');
    }
}
