<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipiosModel extends Model
{
    protected $table      = 'municipios';
    protected $primaryKey = 'cod_muni';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_municipio', 'cod_depto'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
