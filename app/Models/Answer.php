<?php

// app/Models/Answer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'discussion_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function replies()
    {
        return $this->hasMany(Answer::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(Answer::class, 'parent_id');
    }
}
