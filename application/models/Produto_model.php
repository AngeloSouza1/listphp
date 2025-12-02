<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Retorna todos os produtos
	 */
	public function get_produtos()
	{
		$query = $this->db->get('produtos');
		return $query->result_array();
	}

	/**
	 * Retorna um produto específico
	 */
	public function get_produto($id)
	{
		$query = $this->db->get_where('produtos', array('id' => $id));
		return $query->row_array();
	}

	/**
	 * Cria um novo produto
	 */
	public function criar_produto()
	{
		$data = array(
			'nome' => $this->input->post('nome'),
			'descricao' => $this->input->post('descricao'),
			'preco' => $this->input->post('preco'),
			'estoque' => $this->input->post('estoque'),
			'criado_em' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('produtos', $data);
	}

	/**
	 * Atualiza um produto existente
	 */
	public function atualizar_produto($id)
	{
		$data = array(
			'nome' => $this->input->post('nome'),
			'descricao' => $this->input->post('descricao'),
			'preco' => $this->input->post('preco'),
			'estoque' => $this->input->post('estoque'),
			'atualizado_em' => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		return $this->db->update('produtos', $data);
	}

	/**
	 * Deleta um produto
	 */
	public function deletar_produto($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('produtos');
	}
}
