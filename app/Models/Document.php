<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name','description','file_path','fiscal_year_id'
    ];

    public function docFolder()
    {
    	return $this->belongsTo('App\Models\DocumentFolder','document_folder_id','id');
    }

    public function fiscalYear()
    {
    	return $this->belongsTo('App\Models\FiscalYear','fiscal_year_id','id');
    }
}
