<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produto_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	/**
	 * Lista todos os produtos
	 */
	public function index()
	{
		$data['titulo'] = 'Lista de Produtos';
		$data['produtos'] = $this->produto_model->get_produtos();
		
		$this->load->view('templates/header', $data);
		$this->load->view('produtos/index', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * Exibe detalhes de um produto
	 */
	public function ver($id = NULL)
	{
		if ($id === NULL) {
			show_404();
		}

		$data['produto'] = $this->produto_model->get_produto($id);

		if (empty($data['produto'])) {
			show_404();
		}

		$data['titulo'] = $data['produto']['nome'];

		$this->load->view('templates/header', $data);
		$this->load->view('produtos/ver', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * Cria um novo produto
	 */
	public function criar()
	{
		$data['titulo'] = 'Criar Produto';

		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('preco', 'Preço', 'required|decimal');
		$this->form_validation->set_rules('estoque', 'Estoque', 'required|integer');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('produtos/criar');
			$this->load->view('templates/footer');
		} else {
			$this->produto_model->criar_produto();
			redirect('produtos');
		}
	}

	/**
	 * Edita um produto existente
	 */
	public function editar($id = NULL)
	{
		if ($id === NULL) {
			show_404();
		}

		$data['produto'] = $this->produto_model->get_produto($id);

		if (empty($data['produto'])) {
			show_404();
		}

		$data['titulo'] = 'Editar Produto';

		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('preco', 'Preço', 'required|decimal');
		$this->form_validation->set_rules('estoque', 'Estoque', 'required|integer');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('produtos/editar', $data);
			$this->load->view('templates/footer');
		} else {
			$this->produto_model->atualizar_produto($id);
			redirect('produtos');
		}
	}

	/**
	 * Deleta um produto
	 */
	public function deletar($id)
	{
		$this->produto_model->deletar_produto($id);
		redirect('produtos');
	}
}
