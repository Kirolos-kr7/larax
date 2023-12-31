<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'tags', 'description'];

    public function scopeFilter($query, $filter)
    {
        if ($filter['tag'] ?? false)
            $query->where("tags", 'like', '%' . $filter['tag'] . '%');

        if ($filter['search'] ?? false)
            $query->where("tags", 'like', '%' . $filter['search'] . '%')->orWhere("title", 'like', '%' . $filter['search'] . '%')->orWhere("description", 'like', '%' . $filter['search'] . '%')->orWhere("company", 'like', '%' . $filter['search'] . '%')->orWhere("location", 'like', '%' . $filter['search'] . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
