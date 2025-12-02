<?php
	$totalProdutos = (isset($produtos) && is_array($produtos)) ? count($produtos) : 0;
	$totalEstoque = 0;
	$criticos = 0;

	if (!empty($produtos) && is_array($produtos)) {
		foreach ($produtos as $p) {
			$quantidade = isset($p['estoque']) ? (int) $p['estoque'] : 0;
			$totalEstoque += $quantidade;
			if ($quantidade <= 3) {
				$criticos++;
			}
		}
	}
?>

<div class="page-hero hero-compact">
	<div class="hero-row">
		<div>
			<span class="eyebrow">
				<i class="fa-solid fa-boxes-stacked"></i>
				Catálogo transacional
			</span>
			<h2 class="hero-title">Produtos sob controle total</h2>
			<p class="hero-subtext">Visual limpo, alta confiabilidade e estatísticas rápidas para produtos que não podem parar.</p>
			<div class="hero-pills">
				<span class="pill"><i class="fa-solid fa-gauge-high"></i>Performance</span>
				<span class="pill"><i class="fa-solid fa-shield"></i>Estabilidade</span>
				<span class="pill"><i class="fa-solid fa-satellite-dish"></i>Status em tempo real</span>
			</div>
		</div>
		<div class="hero-actions">
			<a href="<?php echo base_url('produtos/criar'); ?>" class="btn">
				<i class="fa-solid fa-plus"></i> Novo produto
			</a>
			<a href="<?php echo base_url(); ?>" class="btn btn-ghost btn-sm">
				<i class="fa-regular fa-circle-left"></i> Início
			</a>
		</div>
	</div>
	<div class="stat-grid">
		<div class="stat-chip">
			<span>Itens em catálogo</span>
			<strong><?php echo $totalProdutos; ?></strong>
		</div>
		<div class="stat-chip">
			<span>Unidades em estoque</span>
			<strong><?php echo $totalEstoque; ?></strong>
		</div>
		<div class="stat-chip">
			<span>Estoques críticos</span>
			<strong><?php echo $criticos; ?></strong>
		</div>
	</div>
</div>

<?php if (empty($produtos)): ?>
	<div class="empty-state">
		<div class="icon"><i class="fa-solid fa-box-open"></i></div>
		<h3 style="color: var(--text-primary); margin-bottom: 8px;">Nenhum produto cadastrado</h3>
		<p style="margin-bottom: 16px;">Traga seu catálogo para um console otimizado.</p>
		<a href="<?php echo base_url('produtos/criar'); ?>" class="btn btn-secondary">
			<i class="fa-solid fa-plus"></i> Adicionar primeiro produto
		</a>
	</div>
<?php else: ?>
	<div class="table-shell">
		<div style="display: flex; align-items: center; justify-content: space-between; padding: 14px 18px; border-bottom: 1px solid #e0e8ff; background: #f8faff;">
			<div>
				<strong style="color: var(--text-primary);">Catálogo ativo</strong>
				<p style="margin: 2px 0 0; color: var(--text-secondary);">Visão rápida do estoque em uma interface cuidada.</p>
			</div>
			<a href="<?php echo base_url('produtos/criar'); ?>" class="btn btn-secondary btn-sm">
				<i class="fa-solid fa-plus"></i> Novo produto
			</a>
		</div>
		<div style="overflow-x: auto;">
			<table>
				<thead>
					<tr>
						<th style="width: 90px;">ID</th>
						<th>Produto</th>
						<th style="width: 160px;">Preço</th>
						<th style="width: 160px;">Estoque</th>
						<th style="width: 180px; text-align: right;">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtos as $produto): ?>
					<tr>
						<td style="font-family: monospace; color: var(--text-secondary); font-weight: 700;">#<?php echo $produto['id']; ?></td>
						<td>
							<div style="font-weight: 700; color: var(--text-primary); font-size: 1.02rem; letter-spacing: -0.01em;"><?php echo htmlspecialchars($produto['nome']); ?></div>
						</td>
						<td style="font-weight: 600; color: var(--text-primary);">
							R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
						</td>
						<td>
							<?php 
								$badgeClass = $produto['estoque'] > 10 ? 'badge-success' : ($produto['estoque'] > 0 ? 'badge-warning' : 'badge-danger');
								$iconClass = $produto['estoque'] > 10 ? 'fa-check-circle' : ($produto['estoque'] > 0 ? 'fa-exclamation-circle' : 'fa-times-circle');
								$statusText = $produto['estoque'] > 0 ? $produto['estoque'] . ' un.' : 'Esgotado';
							?>
							<span class="badge <?php echo $badgeClass; ?>">
								<i class="fa-solid <?php echo $iconClass; ?>"></i>
								<?php echo $statusText; ?>
							</span>
						</td>
						<td style="text-align: right;">
							<div style="display: inline-flex; gap: 8px;">
								<a href="<?php echo base_url('produtos/ver/'.$produto['id']); ?>" class="btn btn-secondary btn-sm" title="Ver Detalhes" style="padding: 8px 10px;">
									<i class="fa-regular fa-eye"></i>
								</a>
								<a href="<?php echo base_url('produtos/editar/'.$produto['id']); ?>" class="btn btn-secondary btn-sm" title="Editar" style="padding: 8px 10px;">
									<i class="fa-regular fa-pen-to-square"></i>
								</a>
								<a href="<?php echo base_url('produtos/deletar/'.$produto['id']); ?>" 
								   class="btn btn-danger btn-sm delete-link" 
								   title="Excluir"
								   style="padding: 8px 10px;"
								   data-nome="<?php echo htmlspecialchars($produto['nome']); ?>">
									<i class="fa-regular fa-trash-can"></i>
								</a>
							</div>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endif; ?>

<div class="modal-backdrop" id="deleteModal">
	<div class="modal-shell">
		<div class="modal-header">
			<div class="modal-title">
				<div class="modal-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
				<div>
					<h3>Confirmar exclusão</h3>
					<span class="modal-note">Ação permanente, sem desfazer.</span>
				</div>
			</div>
		</div>
		<div class="modal-body">
			<p id="deleteMessage">Remover este produto definitivamente? Essa ação não pode ser desfeita.</p>
		</div>
		<div class="modal-actions">
			<button type="button" class="btn btn-secondary btn-sm" id="cancelDelete">Cancelar</button>
			<a href="#" class="btn btn-danger btn-sm" id="confirmDelete">Excluir</a>
		</div>
	</div>
</div>

<script>
	(function() {
		const modal = document.getElementById('deleteModal');
		const confirmBtn = document.getElementById('confirmDelete');
		const cancelBtn = document.getElementById('cancelDelete');
		const message = document.getElementById('deleteMessage');
		let pendingHref = '#';

		function openModal(href, nome) {
			pendingHref = href;
			confirmBtn.setAttribute('href', href);
			message.textContent = nome
				? `Remover "${nome}" definitivamente? Essa ação não pode ser desfeita.`
				: 'Remover este produto definitivamente? Essa ação não pode ser desfeita.';
			modal.classList.add('active');
		}

		function closeModal() {
			modal.classList.remove('active');
			pendingHref = '#';
		}

		document.querySelectorAll('.delete-link').forEach(link => {
			link.addEventListener('click', function(e) {
				e.preventDefault();
				openModal(this.getAttribute('href'), this.dataset.nome || '');
			});
		});

		cancelBtn.addEventListener('click', closeModal);
		modal.addEventListener('click', function(e) {
			if (e.target === modal) closeModal();
		});

		confirmBtn.addEventListener('click', function() {
			closeModal();
		});
	})();
</script>
