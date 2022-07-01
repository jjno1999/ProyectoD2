<?php

class Factura_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Factura_model');
        $this->Factura_model = $this->CI->Factura_model;
    }

    public function test_get_fields()
    {
        $expected = 'idfechadescripcionmontoestadoid_historia_clinica';
        $campos = $this->Factura_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $facturas = $this->Factura_model->get();
        foreach($facturas as $factura)
        {
            $this->assertIsArray($factura);
        }
    }

    public function test_get_by_id()
    {
        $expected = '130/6/2022medicamentos300000pagada1';
        $factura = $this->Factura_model->get(1);
        $this->assertEquals($expected, implode($factura));
    }

    public function test_get_not_existent_by_id()
    {
        $factura = $this->Factura_model->get(-1);
        $this->assertIsBool($factura);
    }
}