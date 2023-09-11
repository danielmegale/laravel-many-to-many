<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
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
        $technology_ids = Technology::pluck('id')->toArray();
        Storage::makeDirectory('project_image');
        for ($i = 1; $i <= 3; $i++) {
            $project = new Project();
            $project->category_id = $faker->numberBetween(1, 5);
            $project->title = $faker->text(20);
            $project->description = $faker->paragraph(15, true);
            // $project->image = Storage::putFile('project_images', $faker->image(storage_path('app/public/project_images')), 250, 250);
            $project->url = $faker->url();
            $project->save();

            $project_technologies = [];
            foreach ($technology_ids as $technology_id) {
                if ($faker->boolean()) $project_technologies[] = $technology_id;
            }
            $project->technologies()->attach($project_technologies);
        }
    }
}
