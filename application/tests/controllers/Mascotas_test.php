<?php

class Mascotas_test extends TestCase
{
    public function setUp(): void
    {
        $_SESSION['nombre'] = 'admin';
        $_SESSION['password'] = 'admin';
        $_SESSION['rol'] = 'administrador';
        $_SESSION['estado'] = 'activo';
    }

	public function test_index()
	{
		$output = $this->request('GET', 'administrador/mascotas');
		$this->assertStringContainsString('<title>mascotas - Veterinaria ACME</title>', $output);
	}

	public function test_modificar()
	{
		$output = $this->request('GET', 'administrador/mascotas/modificar/1');
		$this->assertStringContainsString('<title>mascotas - Veterinaria ACME</title>', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'administrador/mascotas/method_not_exist');
		$this->assertResponseCode(404);
	}
}
