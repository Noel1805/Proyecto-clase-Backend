<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        $tecnologia = new Category();
        $tecnologia->name = "Tecnologia";
        $tecnologia->description = "Todo lo relacvionado con Tecnologia";

        $tecnologia->save();
    }
}
