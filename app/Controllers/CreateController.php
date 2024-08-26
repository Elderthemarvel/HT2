<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CreateController extends BaseController
{
    public function index()
    {
        //
    }

    public function ciudadanos_save()
    {
        $model = new \App\Models\CiudadanosModel();
        $data = [
            'dpi'           => $this->request->getPost('dpi'),
            'apellido'      => $this->request->getPost('apellido'),
            'nombre'        => $this->request->getPost('nombre'),
            'direccion'     => $this->request->getPost('direccion'),
            'tel_casa'      => $this->request->getPost('tel_casa'),
            'tel_movil'     => $this->request->getPost('tel_movil'),
            'email'         => $this->request->getPost('email'),
            'fechanac'      => $this->request->getPost('fechanac'),
            'cod_nivel_acad'=> $this->request->getPost('cod_nivel_acad'),
            'cod_muni'      => $this->request->getPost('cod_muni'),
            'contra'        => password_hash($this->request->getPost('contra'), PASSWORD_DEFAULT),
        ];
        if($model->insert($data)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function departamentos_save(){
        $model = model('DepartamentosModel');
        $data = [
            'nombre_depto' => $this->request->getPost('nombre_depto'),
            'cod_region'   => $this->request->getPost('cod_region'),
        ];
        if($model->insert($data)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function municipios_save(){
        $model = model('MunicipiosModel');
        $data = [
            'nombre_municipio' => $this->request->getPost('nombre_municipio'),
            'cod_depto'        => $this->request->getPost('cod_depto'),
        ];
        if($model->insert($data)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function niveles_save(){
        $model = model('NivelesAcademicosModel');
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        if($model->insert($data)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }

    public function regiones_save()
    {
        $model = model('RegionesModel');
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        if($model->insert($data)){
            $response['error']=false;
        }else{
            $response['error']=true;
        }
        return $this->response->setJSON($response);
    }
}

