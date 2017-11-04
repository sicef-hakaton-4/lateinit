<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertDescription extends BaseModel
{
    protected $table = 'expert_descriptions';

    protected $hidden = ['expert_id'];
}
