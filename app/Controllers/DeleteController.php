<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DeleteController extends BaseController
{
    public function index()
    {
        //
    }

    public function ciudadanos_delete($id)
    {
        $request = \Config\Services::request();
        $model = model('CiudadanosModel');
        if($model->delete($id)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function departamentos_delete($id)
    {
        $request = \Config\Services::request();
        $model = model('DepartamentosModel');
        if($model->delete($id)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function municipios_delete($id)
    {
        $request = \Config\Services::request();
        $model = model('MunicipiosModel');
        if($model->delete($id)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function niveles_delete($id)
    {
        $request = \Config\Services::request();
        $model = model('NivelesAcademicosModel');
        if($model->delete($id)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function regiones_delete($id)
    {
        $request = \Config\Services::request();
        $model = model('RegionesModel');
        if($model->delete($id)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }
    
}
