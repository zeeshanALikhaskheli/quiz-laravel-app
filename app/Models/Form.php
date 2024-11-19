<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'fields'];

      // A form has many submissions
      public function submissions()
      {
          return $this->hasMany(FormSubmission::class);
      }
}
