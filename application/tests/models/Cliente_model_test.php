<?php

class Cliente_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Cliente_model');
        $this->Cliente_model = $this->CI->Cliente_model;
    }

    public function test_get_fields()
    {
        $expected = 'no_documentonombreemaildirecciontelefono';
        $campos = $this->Cliente_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $clientes = $this->Cliente_model->get();
        foreach($clientes as $cliente)
        {
            $this->assertIsArray($cliente);
        }
    }

    public function test_get_by_id()
    {
        $expected = '1553227773Fernando Fernandezferfer@abc.comcll 8-211231234567';
        $mascota = $this->Cliente_model->get(1553227773);
        $this->assertEquals($expected, implode($mascota));
    }

    public function test_get_not_existent_by_id()
    {
        $mascota = $this->Cliente_model->get(-1);
        $this->assertIsBool($mascota);
    }
}