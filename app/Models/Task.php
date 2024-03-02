<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'state', 'todo_list_id'];

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'state' => ['required', 'string', 'in:' . implode(',', self::STATES)],
        ];
    }

    public function todoList()
    {
        return $this->belongsTo(TodoList::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function getFormattedStateAttribute()
    {
        return $this->state;
    }

    const STATES = ['IN PROGRESS', 'HOLDING', 'FINISHED'];
}
