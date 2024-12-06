<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'cuti_types';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'duration_day'];
}
