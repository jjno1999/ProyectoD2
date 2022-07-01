<?php

class Usuario_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Usuario_model');
        $this->Usuario_model = $this->CI->Usuario_model;
    }

    public function test_get_fields()
    {
        $expected = 'idnombrepasswordrolestado';
        $campos = $this->Usuario_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $usuarios = $this->Usuario_model->get();
        foreach($usuarios as $usuario)
        {
            $this->assertIsArray($usuario);
        }
    }

    public function test_get_by_id()
    {
        $expected = '1adminadminadministradoractivo';
        $admin = $this->Usuario_model->get(1);
        $this->assertEquals($expected, implode($admin));
    }

    public function test_get_not_existent_by_id()
    {
        $admin = $this->Usuario_model->get(-1);
        $this->assertIsBool($admin);
    }

    public function test_get_veterinarios()
    {
        $usuarios_veterinarios = $this->Usuario_model->get_veterinarios();
        foreach($usuarios_veterinarios as $usuario)
        {
            $this->assertIsArray($usuario);
        }
    }
}