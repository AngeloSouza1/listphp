<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Página inicial da aplicação
	 */
	public function index()
	{
		$data['titulo'] = 'Bem-vindo ao CodeIgniter 3';
		$data['mensagem'] = 'Sua aplicação está funcionando perfeitamente!';
		
		$this->load->view('templates/header', $data);
		$this->load->view('welcome/index', $data);
		$this->load->view('templates/footer');
	}
}
