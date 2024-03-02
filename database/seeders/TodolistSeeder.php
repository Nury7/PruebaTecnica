<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            TodoList::factory()->count(5)->for($user)->create();
        }
       
    }
}
