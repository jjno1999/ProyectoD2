<?php

class Historia_clinica_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Historia_clinica_model');
        $this->Historia_clinica_model = $this->CI->Historia_clinica_model;
    }

    public function test_get_fields()
    {
        $expected = 'idfecha_ingresofecha_salidadiagnosticoobservacionestratamientono_documento_veterinarioid_mascota';
        $campos = $this->Historia_clinica_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $historia_clinicas = $this->Historia_clinica_model->get();
        foreach($historia_clinicas as $historia_clinica)
        {
            $this->assertIsArray($historia_clinica);
        }
    }

    public function test_get_by_id()
    {
        $expected = '130/6/20221/7/2022demenciasufre demenciaconfinamiento preventivo843135184';
        $historia_clinica = $this->Historia_clinica_model->get(1);
        $this->assertEquals($expected, implode($historia_clinica));
    }

    public function test_get_not_existent_by_id()
    {
        $historia_clinica = $this->Historia_clinica_model->get(-1);
        $this->assertIsBool($historia_clinica);
    }
}