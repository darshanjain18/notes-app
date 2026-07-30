<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            [
                'title' => 'Laravel Basics',
                'description' => 'Foundation of Laravel',
                'user_id' => 1
            ],
            [
                'title' => 'Laravel Intermediate',
                'description' => 'Eloquent ORM, Routing, Controllers, Views',
                'user_id' => 1
            ],
            [
                'title' => 'Laravel Advanced',
                'description' => 'Middleware, Testing, Deployment',
                'user_id' => 1
            ],
            [
                'title' => 'PHP arrays',
                'description' => 'Understanding arrays in PHP',
                'user_id' => 1
            ],
            [
                'title' => 'SQL Joins',
                'description' => 'Understanding SQL joins',
                'user_id' => 1
            ],

            // Notes for user 2

            [
                'title' => 'Cricket',
                'description' => 'Fav Team Mumbai Indians',
                'user_id' => 2
            ],
            [
                'title' => 'Movies',
                'description' => 'hollywood movies',
                'user_id' => 2
            ],
            [
                'title' => 'Finance',
                'description' => 'Forex Trading',
                'user_id' => 2
            ],
            [
                'title' => 'Food',
                'description' => 'Pav Bhaji',
                'user_id' => 2
            ],
            [
                'title' => 'Travel',
                'description' => 'Fav Destination Switzerland',
                'user_id' => 2
            ],

            // note for user 3

            [
                'title' => 'Python',
                'description' => 'Learning Python',
                'user_id' => 3
            ],
            [
                'title' => 'SQL',
                'description' => 'Learning SQL',
                'user_id' => 3
            ],
            [
                'title' => 'Power BI',
                'description' => 'Learning Power BI',
                'user_id' => 3
            ],
            [
                'title' => 'Statistics',
                'description' => 'Learning Statistics',
                'user_id' => 3
            ],
            [
                'title' => 'Machine Learning',
                'description' => 'Learning Machine Learning',
                'user_id' => 3
            ]

        ];

        foreach ($notes as $note) {
            Note::create($note);
        }
    }
}