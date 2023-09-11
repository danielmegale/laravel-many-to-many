<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        Storage::makeDirectory('project_image');
        for ($i = 1; $i <= 3; $i++) {
            $project = new Project();
            $project->category_id = $faker->numberBetween(1, 5);
            $project->title = $faker->text(20);
            $project->description = $faker->paragraph(15, true);
            // $project->image = Storage::putFile('project_images', $faker->image(storage_path('app/public/project_images')), 250, 250);
            $project->url = $faker->url();
            $project->save();
        }
    }
}
