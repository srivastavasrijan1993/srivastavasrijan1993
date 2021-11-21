<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_record extends Model
{
    use HasFactory;
    protected $table='table_record';
 protected $fillable=['officename','pincode','officeType','deliverystatus','divisionname','regionname','circlename','taluk','districtname','statename'];
}
