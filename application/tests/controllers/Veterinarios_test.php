<?php

class Veterinarios_test extends TestCase
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
		$output = $this->request('GET', 'administrador/veterinarios');
		$this->assertStringContainsString('<title>veterinarios - Veterinaria ACME</title>', $output);
	}

	public function test_modificar()
	{
		$output = $this->request('GET', 'administrador/veterinarios/modificar/74246782');
		$this->assertStringContainsString('<title>veterinarios - Veterinaria ACME</title>', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'administrador/veterinarios/method_not_exist');
		$this->assertResponseCode(404);
	}
}
