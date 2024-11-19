<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;
    protected $fillable = ['form_id', 'data']; // Allow mass assignment for form_id and data fields

    // Cast the data column to array automatically
    protected $casts = [
        'data' => 'array',
    ];

    // Relationship to the form (if needed)
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
