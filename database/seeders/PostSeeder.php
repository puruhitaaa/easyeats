<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 1;

        $posts = [
            [
                'user_id' => $userId,
                'content' => 'Just finished building my first Laravel application! The journey was challenging but incredibly rewarding. #webdev #Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'content' => 'Exploring the power of Livewire + Alpine.js combination. The reactivity is amazing! 🚀',
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            [
                'user_id' => $userId,
                'content' => 'Who else loves the simplicity of Tailwind CSS? It\'s changed the way I approach frontend development.',
                'created_at' => now()->subHours(5),
                'updated_at' => now()->subHours(5),
            ],
            [
                'user_id' => $userId,
                'content' => 'Pro tip: Always remember to validate your forms both on the frontend and backend! Security first 🔒',
                'created_at' => now()->subHours(8),
                'updated_at' => now()->subHours(8),
            ],
            [
                'user_id' => $userId,
                'content' => 'Working on a new project using TALL stack (Tailwind, Alpine, Laravel, Livewire). The developer experience is fantastic!',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id' => $userId,
                'content' => 'Just discovered a cool new feature in PHP 8.2. What\'s your favorite PHP 8+ feature?',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_id' => $userId,
                'content' => 'Database optimization day! Remember folks: indexes are your friends 📊',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $userId,
                'content' => 'Testing is not just important, it\'s essential. What\'s your preferred testing framework?',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'user_id' => $userId,
                'content' => 'Code review day! Remember: good code is readable code.',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'user_id' => $userId,
                'content' => 'Just implemented authentication using Laravel Breeze. So clean and simple!',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
        ];

        Post::insert($posts);
    }
}
