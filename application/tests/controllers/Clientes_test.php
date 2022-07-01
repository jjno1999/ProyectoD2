<?php

class Clientes_test extends TestCase
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
		$output = $this->request('GET', 'administrador/clientes');
		$this->assertStringContainsString('<title>clientes - Veterinaria ACME</title>', $output);
	}

	public function test_modificar()
	{
		$output = $this->request('GET', 'administrador/clientes/modificar/87415131');
		$this->assertStringContainsString('<title>clientes - Veterinaria ACME</title>', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'administrador/clientes/method_not_exist');
		$this->assertResponseCode(404);
	}
}
