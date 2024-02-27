<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Fiction', 'Nonfiction', 'Fantasy', 'Comics', 'Romance', 'Horror', 'Science',
        ];

        foreach($data as $value){
            Category::insert(
                [
                    'name' => $value
                ]
                );
        }
    }
}
