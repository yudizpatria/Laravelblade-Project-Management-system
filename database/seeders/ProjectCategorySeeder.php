<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new ProjectCategory();
        $category->category_name = 'Pengadaan Barang';
        $category->save();

        $category = new ProjectCategory();
        $category->category_name = 'Alat Peraga';
        $category->save();

        $category = new ProjectCategory();
        $category->category_name = 'Perbaikan mesin';
        $category->save();
    }
}
