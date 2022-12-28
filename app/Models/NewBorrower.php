<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBorrower extends Model
{
    use HasFactory;

    protected $table = 'lts_api_post_test';

    public const CREATED_AT = 'dateenrolled';
    public const UPDATED_AT = 'updated_on';

    public $fillable = [
        
        'cardnumber',
        'surname',
        'branchcode',
        'email',
        'userid',
        'dateexpiry',
        'categorycode',
        'matric_no',
        'kuly_desc',
        'gonenoaddress',
        'lost',
        'flags',
        'privacy',
        'privacy_guarantor_fines',
        'checkprevcheckout',
        'lang',
        'anonymized',
        'autorenew_checkouts',
        'borrowernumber',

    ];
}
