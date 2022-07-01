<?php

class Administrador_test extends TestCase
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
		$output = $this->request('GET', 'administrador');
		$this->assertStringContainsString('<title>administrador - Veterinaria ACME</title>', $output);
	}
	
	public function test_method_404()
	{
		$this->request('GET', 'administrador/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_login_check_administrador()
	{
        $_SESSION['rol'] = 'veterinario';
		$this->request('GET', 'administrador');
		$this->assertRedirect('veterinario');
	}
}
