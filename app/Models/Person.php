<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $guarded = array('id');

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope('age',
        //     function(Builder $builder)
        //     {
        //         $builder->where('age', '>', 20);
        //     }
        // );
        static::addGlobalScope(new ScopePerson);
    }

    public function board()
    {
        return $this->hasOne('App\Models\Board');
    }
    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }

    public static $rules = array(
        'name' => 'required',
        'email' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
