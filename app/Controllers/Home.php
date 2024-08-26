<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function ciudadanos()
    {
        $ciudadanosModel = Model('CiudadanosModel');
        $nivelesModel = Model('NivelesAcademicosModel');
        $municipiosModel = Model('MunicipiosModel');
        $data['niveles_academicos'] = $nivelesModel->findAll();
        $data['municipios'] = $municipiosModel->findAll();
        $data['ciudadanos'] = $ciudadanosModel->findAll();

        return view('ciudadanos/ciudadanos', $data);
    }

    public function ciudadanos_edit($id)
    {
        $model = model('CiudadanosModel');
        $nivelesModel = model('NivelesAcademicosModel');
        $municipiosModel = model('MunicipiosModel');
        $data['ciudadano'] = $model->find($id);
        $data['niveles_academicos'] = $nivelesModel->findAll();
        $data['municipios'] = $municipiosModel->findAll();

        return view('ciudadanos/editar_ciudadano', $data);
    }

    public function departamentos(): string
    {
        $departamentosModel = model('DepartamentosModel');
        $regionesModel = model('RegionesModel');
        $data['regiones'] = $regionesModel->findAll();
        $data['departamentos'] = $departamentosModel->findAll();

        return view('departamentos/departamentos', $data);
    }


    public function departamentos_edit($id)
    {
        $model = model('DepartamentosModel');
        $regionesModel = model('RegionesModel');
        $data['departamento'] = $model->find($id);
        $data['regiones'] = $regionesModel->findAll();

        return view('departamentos/editar_departamentos', $data);
    }

    public function municipios()
    {
        $municipiosModel = model('MunicipiosModel');
        $departamentosModel = model('DepartamentosModel');
        $data['departamentos'] = $departamentosModel->findAll();
        $data['municipios'] = $municipiosModel->findAll();

        return view('municipios/municipios',$data);
    }

    public function municipios_edit($id)
    {
        $model = model('MunicipiosModel');
        $departamentosModel = model('DepartamentosModel');
        $data['municipio'] = $model->find($id);
        $data['departamentos'] = $departamentosModel->findAll();

        return view('municipios/editar_municipios', $data);
    }

    public function niveles(): string
    {
        $nivelesModel = model('NivelesAcademicosModel');
        $data['niveles'] = $nivelesModel->findAll();

        return view('niveles/niveles', $data);
    }

    public function niveles_edit($id){
        $model = model('NivelesAcademicosModel');
        $data['nivel'] = $model->find($id);

        return view('niveles/editar_niveles', $data);
    }

    public function regiones(): string
    {
        $regionesModel = model('RegionesModel');
        $data['regiones'] = $regionesModel->findAll();

        return view('regiones/regiones',  $data);
    }

    public function regiones_edit($id)
    {
        $model = model('RegionesModel');
        $data['region'] = $model->find($id);

        return view('regiones/editar_regiones', $data);
    }

}
