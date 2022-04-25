<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attraction;
use App\Models\Tour;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
        	'name' => 'username',
        	'email' => 'test@mail.com',
        	'email_verified_at' => now(),
        	'password' => '$2y$10$DDX8JRUnnODkmfLPkaWHX.RvkF1ROcwk8WoZQIo5ijGDsa6b8cype',
        	'remember_token' => true
        ]);

        for($i = 0; $i < 8; $i++){
            $attraction = Attraction::factory()->create();

            Tour::factory(2)->create([
                'attraction_id' => $attraction->id
            ]);    
        }

        // $attr1 = Attraction::create([
        // 	'location' => 'Moscow',
        // 	'image' => 'images/9zvNtKAiUVwfnnm1W6Pr7pFvHpPHmsOWszpTYLhw.jpg'
        // ]);
        // $attr2 = Attraction::create([
        // 	'location' => 'Chisinau',
        // 	'image' => 'images/9zvNtKAiUVwfnnm1W6Pr7pFvHpPHmsOWszpTYLhw.jpg'
        // ]);
        // $attr3 = Attraction::create([
        // 	'location' => 'Odessa',
        // 	'image' => 'images/7C6poO73u0SvAVOOxiVEo2w9xWW62z5HV6A8B85Z.jpg'
        // ]);
        // $attr4 = Attraction::create([
        // 	'location' => 'Chicago',
        // 	'image' => 'images/9zvNtKAiUVwfnnm1W6Pr7pFvHpPHmsOWszpTYLhw.jpg'
        // ]);
        // $attr5 = Attraction::create([
        // 	'location' => 'Berlin',
        // 	'image' => 'images/7C6poO73u0SvAVOOxiVEo2w9xWW62z5HV6A8B85Z.jpg'
        // ]);

        // Tour::create([
        // 	'cost' => '1000000000',
        // 	'date' => now(),
        // 	'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        // 	'attraction_id' => $attr1->id
        // ]);
        // Tour::create([
        // 	'cost' => '876',
        // 	'date' => now(),
        // 	'description' => 'Nunc et imperdiet diam. Aenean condimentum porta massa a sodales. Maecenas sodales ultricies sapien, vel viverra ipsum imperdiet at. Curabitur ultricies a ligula quis suscipit. Suspendisse potenti. Aliquam sit amet neque elementum, lacinia purus nec, varius diam',
        // 	'attraction_id' => $attr2->id
        // ]);
        // Tour::create([
        // 	'cost' => '250',
        // 	'date' => now(),
        // 	'description' => 'Curabitur eu vehicula orci. Pellentesque ornare consequat eros, id vestibulum nibh dignissim quis. Sed eget interdum metus. Curabitur nec ligula posuere, vestibulum leo et, tristique urna. Maecenas sodales imperdiet ante, ut tempor tortor elementum vel. Fusce mi nisl, malesuada aliquam mollis id, faucibus vel dolor.',
        // 	'attraction_id' => $attr3->id
        // ]);
        // Tour::create([
        // 	'cost' => '600',
        // 	'date' => now(),
        // 	'description' => 'Sed sit amet porta leo. Aenean tellus diam, aliquam a sem non, vehicula semper arcu. In interdum lacus ut turpis porttitor, eget dictum sapien accumsan. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam at faucibus risus.',
        // 	'attraction_id' => $attr4->id
        // ]);
        // Tour::create([
        // 	'cost' => '343',
        // 	'date' => now(),
        // 	'description' => 'Etiam pharetra molestie dui, sit amet tincidunt eros porttitor sit amet. In sed ante eget orci egestas pellentesque. Quisque euismod velit felis, id dictum sem maximus vel. Curabitur sit amet lacus vitae justo venenatis pretium. Aliquam erat volutpat. Phasellus fringilla tempor ligula, quis cursus diam elementum et. ',
        // 	'attraction_id' => $attr5->id
        // ]);
    }
}
