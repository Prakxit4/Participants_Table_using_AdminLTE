<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'dob',
        'tenth_offering',
        'image',
        'document_type_id',
        'document_file',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}