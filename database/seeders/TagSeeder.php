<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Node JS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Python',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Java',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'React',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        Tag::insert($data);
    }
}
