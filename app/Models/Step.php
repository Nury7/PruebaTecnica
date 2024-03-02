<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'state', 'task_id'];

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'state' => ['required', 'string', 'in:' . implode(',', self::STATES)],
        ];
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function getFormattedStateAttribute()
    {
        return $this->state;
    }

    const STATES = ['IN PROGRESS', 'HOLDING', 'FINISHED'];
}
