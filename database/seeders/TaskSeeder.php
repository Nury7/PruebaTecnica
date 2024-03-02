<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (TodoList::all() as $todoList) {
            Task::factory()->count(3)->for($todoList)->create();
        }
        
        $todoList = TodoList::where('name', 'Lista de tareas importante')->first();
        
        Task::create([
            'name' => 'Completar la tarea X',
            'description' => 'Esta tarea es muy importante y debe completarse lo antes posible.',
            'todo_list_id' => $todoList->id,
        ]);
    }
}
