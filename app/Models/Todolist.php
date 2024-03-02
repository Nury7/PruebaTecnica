<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'user_id', 'state'];

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'state' => ['required', 'string', 'in:' . implode(',', self::STATES)],
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getFormattedStateAttribute()
    {
        return $this->state;
    }

    const STATES = ['IN PROGRESS', 'HOLDING', 'FINISHED'];
}
