<?php

class Login_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'login');
		$this->assertStringContainsString('<title>login - Veterinaria ACME</title>', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'login/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_log_in_veterinario_method()
	{
		$_POST['nombre'] = 'Juan D';
		$_POST['password'] = '12345';
		$this->request('POST', 'login/log_in', $_POST);
		$this->assertEquals('veterinario', $_SESSION['rol']);
	}

	public function test_log_in_administrador_method()
	{
		$_POST['nombre'] = 'admin';
		$_POST['password'] = 'admin';
		$this->request('POST', 'login/log_in', $_POST);
		$this->assertEquals('administrador', $_SESSION['rol']);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}
