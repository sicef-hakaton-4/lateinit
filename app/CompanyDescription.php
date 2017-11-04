<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDescription extends BaseModel
{
    protected $table = 'company_descriptions';

    protected $fillable = ['company_id', 'description', 'founded', 'employees', 'headquarters'];
}
