<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerList extends Model
{
    use HasFactory;

    protected $table = 'borrowers';

    public const CREATED_AT = null;
    public const UPDATED_AT = 'updated_on';

    protected $primarykey = 'borrowernumber';

    

}
