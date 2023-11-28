<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()
        ->count(5)->state(new Sequence(
            fn (Sequence $sequence) => ['task_list_id' => TaskList::all()->random()],
        ))
        ->create();
    }
}
