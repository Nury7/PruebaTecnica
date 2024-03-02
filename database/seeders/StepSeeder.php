<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Task::all() as $task) {
            Step::factory()->count(2)->for($task)->create();
        }

        $task = Task::where('name', 'Completar la tarea X')->first();
        
        Step::create([
            'name' => 'Investigar el tema',
            'description' => 'Es necesario investigar el tema a fondo para poder completar la tarea.',
            'task_id' => $task->id,
        ]);
    }
}
