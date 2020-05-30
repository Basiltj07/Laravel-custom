<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Example extends Model implements Auditable
{
//    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
//    protected $dates = ['deleted_at'];
    protected $table = "sample";
    protected $fillable = [
        'example_name',
        'example_age'
    ];

    protected $auditInclude = [
        'example_name',
        'example_age'
    ];

}
