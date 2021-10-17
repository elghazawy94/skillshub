<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function name(){
        if(App::getLocale() == "en"){
            return json_decode($this->name)->en;
        }
        return json_decode($this->name)->ar;
    }

}
