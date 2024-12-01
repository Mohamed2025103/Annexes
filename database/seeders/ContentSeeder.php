<?php

namespace Database\Seeders;
use App\Models\Content;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    Content::create([
        'title' => 'Bienvenue sur notre site',
        'description' => 'Explorez les actualités royales, événements et plus encore.',
        'image_path' => 'images/accueil.jpg', // Store this image in the public/images folder
    ]);
    public function run(): void
    {
        //
    }
}
