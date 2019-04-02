<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'description', 
        'image', 
        'content', 
        'layout', 
        'contact_form', 
        'header', 
        'aside', 
        'footer', 
        'active'
    ];
   
}
