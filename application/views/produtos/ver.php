<?php
	$badgeClass = $produto['estoque'] > 10 ? 'badge-success' : ($produto['estoque'] > 0 ? 'badge-warning' : 'badge-danger');
	$statusText = $produto['estoque'] > 0 ? 'Disponível' : 'Esgotado';
?>

<div class="page-hero hero-compact">
	<div class="hero-row">
		<div>
			<span class="eyebrow">
				<i class="fa-solid fa-box"></i>
				Detalhes do produto
			</span>
			<h2 class="hero-title"><?php echo htmlspecialchars($produto['nome']); ?></h2>
			<p class="hero-subtext">ID #<?php echo $produto['id']; ?> | visão detalhada com interface clara.</p>
		</div>
		<div class="hero-actions">
			<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary btn-sm">
				<i class="fa-regular fa-circle-left"></i> Voltar
			</a>
			<a href="<?php echo base_url('produtos/editar/'.$produto['id']); ?>" class="btn btn-sm">
				<i class="fa-regular fa-pen-to-square"></i> Editar
			</a>
		</div>
	</div>
	<div class="stat-grid">
		<div class="stat-chip">
			<span>Preço</span>
			<strong>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></strong>
		</div>
		<div class="stat-chip">
			<span>Estoque</span>
			<strong><?php echo $produto['estoque']; ?> un.</strong>
		</div>
		<div class="stat-chip">
			<span>Status</span>
			<strong><?php echo $statusText; ?></strong>
		</div>
	</div>
</div>

<div class="section-grid">
	<div class="feature-card" style="grid-column: span 2;">
		<div class="pill" style="display: inline-flex; margin-bottom: 12px; color: var(--text-primary); border-color: #e4e8f6; background: var(--surface-muted);">
			<i class="fa-solid fa-quote-left"></i> Descrição
		</div>
		<p style="color: var(--text-primary); line-height: 1.7; white-space: pre-line;">
			<?php echo htmlspecialchars($produto['descricao']); ?>
		</p>
	</div>

	<div class="feature-card">
		<h3>Status e estoque</h3>
		<p style="margin-bottom: 10px;">Monitoramento com sinais visuais claros.</p>
		<span class="badge <?php echo $badgeClass; ?>">
			<?php echo $statusText; ?>
		</span>
		<p style="margin-top: 12px; margin-bottom: 0;">Quantidade: <strong><?php echo $produto['estoque']; ?></strong> unidades.</p>
	</div>

	<div class="feature-card">
		<h3>Identificação</h3>
		<p style="margin-bottom: 6px;">ID interno: <strong>#<?php echo $produto['id']; ?></strong></p>
		<?php if (isset($produto['criado_em'])): ?>
			<p style="margin-bottom: 6px;">Criado em: <strong><?php echo date('d/m/Y H:i', strtotime($produto['criado_em'])); ?></strong></p>
		<?php endif; ?>
		<?php if (isset($produto['atualizado_em']) && $produto['atualizado_em']): ?>
			<p style="margin-bottom: 0;">Atualizado em: <strong><?php echo date('d/m/Y H:i', strtotime($produto['atualizado_em'])); ?></strong></p>
		<?php endif; ?>
	</div>
</div>
