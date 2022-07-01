<?php

class Mascota_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Mascota_model');
        $this->Mascota_model = $this->CI->Mascota_model;
    }

    public function test_get_fields()
    {
        $expected = 'idnombreespecierazafecha_nacimientono_documento_cliente';
        $campos = $this->Mascota_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $mascotas = $this->Mascota_model->get();
        foreach($mascotas as $mascota)
        {
            $this->assertIsArray($mascota);
        }
    }

    public function test_get_by_id()
    {
        $expected = '1RoskiCaninolabrador25/4/20151553227773';
        $mascota = $this->Mascota_model->get(1);
        $this->assertEquals($expected, implode($mascota));
    }

    public function test_get_not_existent_by_id()
    {
        $mascota = $this->Mascota_model->get(-1);
        $this->assertIsBool($mascota);
    }
}