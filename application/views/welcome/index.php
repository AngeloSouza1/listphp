<div class="page-hero">
	<div class="hero-grid">
		<div>
			<span class="eyebrow">
				<i class="fa-solid fa-sparkles"></i>
				Console moderno
			</span>
			<h1 class="hero-title">Produtos sob controle e ação rápida</h1>
			<p class="hero-subtext">Uma camada visual vibrante para gerenciar estoque com confiabilidade, velocidade e foco em transações críticas.</p>
			<div class="hero-actions">
				<a href="<?php echo base_url('produtos/criar'); ?>" class="btn">
					<i class="fa-solid fa-bolt"></i> Começar agora
				</a>
				<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary">
					<i class="fa-solid fa-grid-2"></i> Ver catálogo
				</a>
			</div>
			<div class="hero-pills">
				<span class="pill"><i class="fa-solid fa-circle-nodes"></i>Fluxo transacional</span>
				<span class="pill"><i class="fa-solid fa-shield-check"></i>Confiabilidade</span>
				<span class="pill"><i class="fa-solid fa-chart-simple"></i>Observabilidade</span>
			</div>
		</div>
		<div class="hero-panel">
			<h3><i class="fa-solid fa-chart-line"></i> Console em tempo real</h3>
			<p>Monitore seu catálogo como um painel de entregabilidade.</p>
			<div class="stat-grid">
				<div class="stat-chip">
					<span>Visão unificada</span>
					<strong>Catálogo único</strong>
				</div>
				<div class="stat-chip">
					<span>Tempo de ação</span>
					<strong>Instantâneo</strong>
				</div>
				<div class="stat-chip">
					<span>Disponibilidade</span>
					<strong>24/7</strong>
				</div>
			</div>
			<div class="stat-row" style="margin-top: 10px;">
				<span><i class="fa-regular fa-circle-check"></i> Uptime pensado para missões críticas</span>
				<strong>99,9%</strong>
			</div>
		</div>
	</div>
</div>

<div class="section-grid">
	<div class="feature-card">
		<div class="pill" style="display: inline-flex; margin-bottom: 10px; color: var(--text-primary); border-color: #e4e8f6; background: var(--surface-muted);">
			<i class="fa-regular fa-compass"></i>Console de produtos
		</div>
		<h3>Organização clara</h3>
		<p>Acesse, filtre e navegue no catálogo sem fricção, com a mesma clareza de um painel transacional.</p>
		<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary btn-sm">
			<i class="fa-regular fa-folder-open"></i> Abrir catálogo
		</a>
	</div>

	<div class="feature-card">
		<div class="pill" style="display: inline-flex; margin-bottom: 10px; color: var(--text-primary); border-color: #e4e8f6; background: var(--surface-muted);">
			<i class="fa-solid fa-bolt"></i> Cadastre em segundos
		</div>
		<h3>Cadastro rápido</h3>
		<p>Inclua novos itens com campos essenciais e feedback imediato, mantendo a fluidez do fluxo transacional.</p>
		<a href="<?php echo base_url('produtos/criar'); ?>" class="btn btn-sm">
			<i class="fa-solid fa-plus"></i> Criar produto
		</a>
	</div>

	<div class="feature-card">
		<div class="pill" style="display: inline-flex; margin-bottom: 10px; color: var(--text-primary); border-color: #e4e8f6; background: var(--surface-muted);">
			<i class="fa-solid fa-shield"></i> Observabilidade
		</div>
		<h3>Indicadores claros</h3>
		<p>Visualize disponibilidade, preços e estoque com cartões claros e responsivos.</p>
		<button class="btn btn-secondary btn-sm" disabled style="opacity: 0.7; cursor: not-allowed;">
			<i class="fa-regular fa-clock"></i> Relatórios em breve
		</button>
	</div>
</div>
