<?php

namespace App\Models;

use CodeIgniter\Model;

class NivelesAcademicosModel extends Model
{
    protected $table      = 'nivelesacademicos';
    protected $primaryKey = 'cod_nivel_acad';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
