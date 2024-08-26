<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadanosModel extends Model
{
    protected $table      = 'ciudadanos';
    protected $primaryKey = 'dpi';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'apellido', 
        'nombre', 
        'direccion', 
        'tel_casa', 
        'tel_movil', 
        'email', 
        'fechanac', 
        'cod_nivel_acad', 
        'cod_muni', 
        'contra'
    ];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
