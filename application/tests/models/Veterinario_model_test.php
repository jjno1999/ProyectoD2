<?php

class Veterinario_model_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Veterinario_model');
        $this->Veterinario_model = $this->CI->Veterinario_model;
    }

    public function test_get_fields()
    {
        $expected = 'no_documentonombrefecha_nacimientotelefonoemaildireccionespecialidadid_usuario';
        $campos = $this->Veterinario_model->get_fields();
        $this->assertEquals($expected, implode($campos));
    }

    public function test_get()
    {
        $veterinarios = $this->Veterinario_model->get();
        foreach($veterinarios as $veterinario)
        {
            $this->assertIsArray($veterinario);
        }
    }

    public function test_get_by_id()
    {
        $expected = '9572691Alejandro Diaz23/4/19768537753724esunvet@abc.comcll 30-128Inmunologo3';
        $veterinario = $this->Veterinario_model->get(9572691);
        $this->assertEquals($expected, implode($veterinario));
    }

    public function test_get_not_existent_by_id()
    {
        $veterinario = $this->Veterinario_model->get(-1);
        $this->assertIsBool($veterinario);
    }

    public function test_get_veterinario_desde_usuario()
    {
        $expected = '9572691Alejandro Diaz23/4/19768537753724esunvet@abc.comcll 30-128Inmunologo3';
        $usuario = $this->Veterinario_model->get_veterinario_desde_usuario(3);
        $this->assertEquals($expected, implode($usuario));
    }
}