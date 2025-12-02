<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($titulo) ? $titulo : 'CodeIgniter App'; ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		:root {
			--page-bg: #f5f7fb;
			--text-primary: #0f172a;
			--text-secondary: #475569;
			--border-color: #d8e3ff;
			--accent-primary: #6f3ffd;
			--accent-secondary: #2b7bff;
			--accent-tertiary: #12d7c7;
			--surface-color: #ffffff;
			--surface-muted: #eef2ff;
			--shadow-lg: 0 25px 60px rgba(47, 62, 129, 0.18);
			--font-sans: 'Inter', 'Sora', system-ui, -apple-system, sans-serif;
			--font-display: 'Sora', 'Inter', system-ui, -apple-system, sans-serif;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: var(--font-sans);
			background:
				radial-gradient(circle at 12% 22%, rgba(111, 63, 253, 0.18), transparent 35%),
				radial-gradient(circle at 88% 10%, rgba(18, 215, 199, 0.18), transparent 30%),
				var(--page-bg);
			color: var(--text-primary);
			line-height: 1.6;
			-webkit-font-smoothing: antialiased;
		}

		a {
			color: inherit;
			text-decoration: none;
		}

		.page-wrap {
			position: relative;
			min-height: 100vh;
			overflow: hidden;
			padding: 28px 0 36px;
		}

		.bg-blob {
			position: absolute;
			filter: blur(60px);
			opacity: 0.55;
			z-index: 0;
		}

		.bg-blob.blob-1 {
			width: 520px;
			height: 520px;
			background: radial-gradient(circle, rgba(111, 63, 253, 0.35), transparent 60%);
			top: -160px;
			left: -120px;
		}

		.bg-blob.blob-2 {
			width: 480px;
			height: 480px;
			background: radial-gradient(circle, rgba(18, 215, 199, 0.3), transparent 55%);
			top: 140px;
			right: -140px;
		}

		.container {
			position: relative;
			z-index: 1;
			max-width: 1180px;
			margin: 0 auto;
			padding: 0 24px 48px;
			width: 100%;
		}

		.site-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 16px;
			padding: 14px 18px;
			background: rgba(255, 255, 255, 0.9);
			border: 1px solid #e4e8f6;
			border-radius: 16px;
			box-shadow: 0 10px 40px rgba(31, 41, 79, 0.08);
			backdrop-filter: blur(12px);
			margin-bottom: 30px;
		}

		.brand {
			display: flex;
			align-items: center;
			gap: 12px;
		}

		.brand-mark {
			width: 44px;
			height: 44px;
			border-radius: 12px;
			background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
			color: #fff;
			display: grid;
			place-items: center;
			font-weight: 800;
			font-family: var(--font-display);
			font-size: 1.2rem;
			box-shadow: 0 15px 30px rgba(54, 85, 255, 0.35);
		}

		.brand-copy {
			display: flex;
			flex-direction: column;
		}

		.brand-title {
			font-family: var(--font-display);
			font-weight: 700;
			letter-spacing: -0.01em;
			color: var(--text-primary);
		}

		.brand-sub {
			color: var(--text-secondary);
			font-size: 0.85rem;
		}

		nav {
			display: flex;
			align-items: center;
			gap: 10px;
			flex: 1;
		}

		nav a {
			position: relative;
			color: var(--text-secondary);
			font-weight: 600;
			padding: 10px 12px;
			border-radius: 10px;
			transition: all 0.2s ease;
		}

		nav a::after {
			content: '';
			position: absolute;
			left: 12px;
			right: 12px;
			bottom: 6px;
			height: 3px;
			border-radius: 999px;
			background: linear-gradient(90deg, var(--accent-primary), var(--accent-tertiary));
			opacity: 0;
			transform: translateY(6px);
			transition: all 0.2s ease;
		}

		nav a:hover {
			background: rgba(111, 63, 253, 0.08);
			color: var(--text-primary);
		}

		nav a:hover::after {
			opacity: 1;
			transform: translateY(0);
		}

		.header-actions {
			display: flex;
			align-items: center;
			gap: 10px;
		}

		main.content {
			display: flex;
			flex-direction: column;
			gap: 24px;
		}

		h1, h2, h3 {
			font-family: var(--font-display);
			color: var(--text-primary);
			font-weight: 700;
			letter-spacing: -0.02em;
		}

		h2 {
			font-size: 1.9rem;
		}

		p {
			color: var(--text-secondary);
		}

		/* Buttons */
		.btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			padding: 11px 18px;
			background: linear-gradient(120deg, var(--accent-primary), var(--accent-secondary) 50%, var(--accent-tertiary));
			color: #fff;
			font-family: var(--font-sans);
			font-weight: 700;
			font-size: 0.96rem;
			border-radius: 12px;
			text-decoration: none;
			transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
			border: 1px solid rgba(255, 255, 255, 0.18);
			box-shadow: 0 12px 30px rgba(54, 85, 255, 0.35);
			cursor: pointer;
			letter-spacing: -0.01em;
		}

		.btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 16px 36px rgba(54, 85, 255, 0.42);
			filter: brightness(1.03);
		}

		.btn:active {
			transform: translateY(0);
			box-shadow: 0 8px 18px rgba(54, 85, 255, 0.32);
		}

		.btn-secondary {
			background: #fff;
			color: var(--text-primary);
			border: 1px solid #d9e1f2;
			box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
		}

		.btn-secondary:hover {
			background-color: #f1f5ff;
		}

		.btn-ghost {
			background: transparent;
			color: var(--text-primary);
			border: 1px dashed #cbd5e1;
			box-shadow: none;
		}

		.btn-danger {
			background: linear-gradient(180deg, #ef4444 0%, #dc2626 100%);
			color: white;
			border: 1px solid rgba(255, 255, 255, 0.1);
			box-shadow: 0 8px 20px rgba(220, 38, 38, 0.35);
		}

		.btn-sm {
			padding: 8px 12px;
			font-size: 0.9rem;
		}

		/* Badges */
		.badge {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 6px 11px;
			border-radius: 999px;
			font-size: 0.82rem;
			font-weight: 700;
			letter-spacing: 0;
		}

		.badge-success { background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); }
		.badge-warning { background: rgba(245, 158, 11, 0.16); color: #b45309; border: 1px solid rgba(245, 158, 11, 0.35); }
		.badge-danger { background: rgba(239, 68, 68, 0.15); color: #b91c1c; border: 1px solid rgba(239, 68, 68, 0.35); }

		/* Tables */
		.table-shell {
			margin-top: 16px;
			background: var(--surface-color);
			border-radius: 16px;
			border: 1px solid #e4e8f6;
			box-shadow: 0 10px 34px rgba(31, 41, 79, 0.08);
			overflow: hidden;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		table th {
			text-align: left;
			padding: 14px 18px;
			background: linear-gradient(90deg, #f3f6ff 0%, #eef2ff 100%);
			border-bottom: 1px solid #e0e8ff;
			font-family: var(--font-sans);
			font-weight: 700;
			font-size: 0.78rem;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			color: var(--text-secondary);
		}

		table td {
			padding: 14px 18px;
			border-bottom: 1px solid #edf0f7;
			color: var(--text-secondary);
			font-size: 0.98rem;
			transition: background-color 0.2s;
		}

		table tr:last-child td {
			border-bottom: none;
		}

		table tr:hover td {
			background-color: #f7f9ff;
			color: var(--text-primary);
		}

		/* Forms */
		.form-group {
			margin-bottom: 1.4rem;
		}

		.form-group label {
			display: block;
			margin-bottom: 0.5rem;
			font-weight: 600;
			color: var(--text-primary);
			font-size: 0.92rem;
		}

		.form-group input,
		.form-group textarea {
			width: 100%;
			padding: 12px 14px;
			border: 1px solid #d9e1f2;
			border-radius: 10px;
			font-family: var(--font-sans);
			font-size: 0.96rem;
			background: #fff;
			transition: all 0.2s ease;
			color: var(--text-primary);
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
		}

		.form-group input:focus,
		.form-group textarea:focus {
			outline: none;
			border-color: var(--accent-primary);
			box-shadow: 0 0 0 4px rgba(111, 63, 253, 0.15);
		}

		.form-shell {
			background: var(--surface-color);
			border: 1px solid #e4e8f6;
			border-radius: 18px;
			padding: 22px;
			box-shadow: 0 12px 34px rgba(31, 41, 79, 0.08);
		}

		.form-grid {
			display: grid;
			grid-template-columns: 1.4fr 1fr;
			gap: 18px;
		}

		.form-actions {
			display: flex;
			flex-direction: column;
			gap: 10px;
			margin-top: 16px;
		}

		/* Cards & sections */
		.grid-container,
		.section-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			gap: 18px;
			margin-top: 1.4rem;
		}

		.card,
		.feature-card {
			background: var(--surface-color);
			border: 1px solid #e4e8f6;
			padding: 24px;
			border-radius: 16px;
			transition: all 0.25s ease;
			position: relative;
			overflow: hidden;
			box-shadow: 0 12px 34px rgba(31, 41, 79, 0.08);
		}

		.card::before,
		.feature-card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 4px;
			background: linear-gradient(90deg, var(--accent-primary), var(--accent-tertiary));
			opacity: 0.35;
		}

		.card:hover,
		.feature-card:hover {
			border-color: rgba(111, 63, 253, 0.35);
			transform: translateY(-4px);
			box-shadow: 0 16px 46px rgba(31, 41, 79, 0.12);
		}

		.feature-card h3 {
			font-size: 1.22rem;
			margin-bottom: 0.65rem;
		}

		.feature-card p {
			margin-bottom: 0.2rem;
			color: var(--text-secondary);
		}

		/* Hero */
		.page-hero {
			position: relative;
			overflow: hidden;
			background: linear-gradient(135deg, #0f1c48 0%, #2b6ef6 55%, #12d7c7 100%);
			color: #f8fbff;
			border-radius: 22px;
			padding: 32px;
			box-shadow: var(--shadow-lg);
		}

		.page-hero.hero-compact { padding: 26px 24px; }
		.page-hero.hero-slim { padding: 20px 18px; }

		.page-hero::before,
		.page-hero::after {
			content: '';
			position: absolute;
			border-radius: 50%;
			filter: blur(50px);
			opacity: 0.5;
		}

		.page-hero::before {
			width: 240px;
			height: 240px;
			background: rgba(255, 255, 255, 0.16);
			top: -60px;
			right: 20%;
		}

		.page-hero::after {
			width: 200px;
			height: 200px;
			background: rgba(18, 215, 199, 0.25);
			bottom: -90px;
			left: 10%;
		}

		.hero-grid {
			display: grid;
			grid-template-columns: 1.1fr 0.9fr;
			gap: 22px;
			align-items: center;
		}

		.hero-row {
			display: flex;
			align-items: flex-start;
			justify-content: space-between;
			gap: 16px;
			flex-wrap: wrap;
		}

		.hero-actions {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 12px;
			margin-top: 16px;
		}

		.eyebrow {
			display: inline-flex;
			align-items: center;
			gap: 8px;
			background: rgba(255, 255, 255, 0.14);
			padding: 8px 14px;
			border-radius: 999px;
			font-weight: 700;
			letter-spacing: 0.04em;
			font-size: 0.88rem;
		}

		.hero-title {
			color: #fff;
			margin: 12px 0 8px;
			font-size: 2rem;
		}

		.hero-subtext {
			color: rgba(255, 255, 255, 0.9);
			font-size: 1rem;
			max-width: 620px;
		}

		.hero-pills {
			display: flex;
			flex-wrap: wrap;
			gap: 8px;
			margin-top: 12px;
		}

		.pill {
			display: inline-flex;
			align-items: center;
			gap: 8px;
			background: rgba(255, 255, 255, 0.12);
			color: #fff;
			border: 1px solid rgba(255, 255, 255, 0.3);
			padding: 8px 12px;
			border-radius: 12px;
			font-weight: 600;
			font-size: 0.9rem;
		}

		.hero-panel {
			background: rgba(255, 255, 255, 0.12);
			border: 1px solid rgba(255, 255, 255, 0.25);
			border-radius: 18px;
			padding: 20px;
			backdrop-filter: blur(6px);
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
		}

		.hero-panel h3 {
			color: #fff;
			font-size: 1.1rem;
			margin-bottom: 8px;
		}

		.hero-panel p {
			color: rgba(255, 255, 255, 0.85);
			margin-bottom: 12px;
		}

		.stat-chip {
			background: rgba(255, 255, 255, 0.14);
			color: #fff;
			border: 1px solid rgba(255, 255, 255, 0.35);
			border-radius: 14px;
			padding: 12px 14px;
			display: flex;
			flex-direction: column;
			gap: 2px;
		}

		.stat-chip strong {
			font-size: 1.3rem;
			letter-spacing: -0.02em;
		}

		.stat-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
			gap: 10px;
			margin-top: 12px;
		}

		.stat-row {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 10px 12px;
			border-radius: 12px;
			background: rgba(255, 255, 255, 0.08);
			color: #fff;
		}

		/* Alerts */
		.alert {
			padding: 12px 14px;
			border-radius: 10px;
			margin-bottom: 14px;
			font-weight: 600;
			border: 1px solid transparent;
		}

		.alert-error {
			background: #fef2f2;
			color: #b91c1c;
			border-color: #fecdd3;
		}

		/* Empty state */
		.empty-state {
			text-align: center;
			border: 1px dashed #cfd8ea;
			border-radius: 18px;
			padding: 38px;
			background: var(--surface-color);
			color: var(--text-secondary);
			box-shadow: 0 12px 34px rgba(31, 41, 79, 0.08);
		}

		.empty-state .icon {
			font-size: 3rem;
			color: #9ca3af;
			margin-bottom: 10px;
		}

		/* Footer */
		.site-footer {
			margin-top: 24px;
			color: var(--text-secondary);
		}

		.footer-shell {
			position: relative;
			overflow: hidden;
			background: rgba(255, 255, 255, 0.9);
			border: 1px solid #e4e8f6;
			border-radius: 18px;
			padding: 16px 18px;
			box-shadow: 0 12px 34px rgba(31, 41, 79, 0.08);
			backdrop-filter: blur(8px);
		}

		.footer-shell::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 4px;
			background: linear-gradient(90deg, var(--accent-primary), var(--accent-tertiary));
			opacity: 0.6;
		}

		.footer-inner {
			display: flex;
			align-items: center;
			justify-content: space-between;
			flex-wrap: wrap;
			gap: 14px;
		}

		.footer-brand {
			display: flex;
			align-items: center;
			gap: 12px;
		}

		.footer-mark {
			width: 42px;
			height: 42px;
			border-radius: 12px;
			background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
			display: grid;
			place-items: center;
			color: #fff;
			font-weight: 800;
			box-shadow: 0 12px 26px rgba(54, 85, 255, 0.3);
		}

		.footer-meta strong {
			display: block;
			color: var(--text-primary);
			font-size: 1rem;
		}

		.footer-meta span {
			display: block;
		}

		.footer-links {
			display: flex;
			align-items: center;
			gap: 12px;
		}

		.footer-links a {
			font-weight: 700;
			color: var(--text-primary);
			padding: 8px 10px;
			border-radius: 10px;
			transition: background 0.2s ease;
		}

		.footer-links a:hover {
			background: rgba(111, 63, 253, 0.08);
		}

		/* Modal */
		.modal-backdrop {
			position: fixed;
			inset: 0;
			background: rgba(15, 23, 42, 0.55);
			display: none;
			align-items: center;
			justify-content: center;
			z-index: 50;
			padding: 18px;
			backdrop-filter: blur(4px);
		}

		.modal-backdrop.active { display: flex; }

		.modal-shell {
			position: relative;
			background: #fff;
			border-radius: 18px;
			box-shadow: 0 28px 80px rgba(15, 23, 42, 0.24);
			border: 1px solid #e4e8f6;
			max-width: 440px;
			width: 100%;
			overflow: hidden;
		}

		.modal-shell::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 5px;
			background: linear-gradient(120deg, #ff5f6d, #d60080, var(--accent-primary));
			opacity: 0.9;
		}

		.modal-header {
			padding: 18px;
			border-bottom: 1px solid #eef2ff;
		}

		.modal-title {
			display: flex;
			align-items: center;
			gap: 12px;
		}

		.modal-icon {
			width: 44px;
			height: 44px;
			border-radius: 12px;
			display: grid;
			place-items: center;
			background: rgba(239, 68, 68, 0.12);
			color: #b91c1c;
			border: 1px solid rgba(239, 68, 68, 0.25);
			box-shadow: 0 10px 24px rgba(239, 68, 68, 0.15);
		}

		.modal-header h3 {
			margin: 0;
			font-size: 1.1rem;
			color: var(--text-primary);
		}

		.modal-note {
			display: block;
			font-size: 0.9rem;
			color: var(--text-secondary);
		}

		.modal-body {
			padding: 18px;
			color: var(--text-secondary);
			background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
		}

		.modal-body p {
			margin-bottom: 0;
			font-weight: 600;
			color: var(--text-primary);
			line-height: 1.5;
		}

		.modal-body .highlight {
			color: #b91c1c;
			font-weight: 700;
		}

		.modal-actions {
			display: flex;
			justify-content: flex-end;
			gap: 10px;
			padding: 14px 18px 16px;
			background: #f8faff;
			border-top: 1px solid #eef2ff;
		}

		/* Responsive */
		@media (max-width: 960px) {
			.site-header {
				flex-direction: column;
				align-items: flex-start;
			}

			nav {
				width: 100%;
				justify-content: flex-start;
				flex-wrap: wrap;
			}

			.hero-grid {
				grid-template-columns: 1fr;
			}

			.form-grid {
				grid-template-columns: 1fr;
			}
		}

		@media (max-width: 640px) {
			.container { padding: 0 18px 36px; }
			.page-hero { padding: 22px 18px; }
			.header-actions { width: 100%; justify-content: flex-start; flex-wrap: wrap; }
			.hero-row { flex-direction: column; }
		}
	</style>
</head>
<body>
	<div class="page-wrap">
		<div class="bg-blob blob-1" aria-hidden="true"></div>
		<div class="bg-blob blob-2" aria-hidden="true"></div>
		<div class="container">
			<header class="site-header">
				<div class="brand">
					<div class="brand-mark"><i class="fa-solid fa-cubes"></i></div>
					<div class="brand-copy">
						<span class="brand-title">StockDesk</span>
						<span class="brand-sub">Console de produtos</span>
					</div>
				</div>
				<nav>
					<a href="<?php echo base_url(); ?>">Início</a>
					<a href="<?php echo base_url('produtos'); ?>">Produtos</a>
					<a href="<?php echo base_url('produtos/criar'); ?>">Novo produto</a>
				</nav>
				<div class="header-actions">
					<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary btn-sm">
						<i class="fa-regular fa-circle-play"></i> Catálogo
					</a>
					<a href="<?php echo base_url('produtos/criar'); ?>" class="btn btn-sm">
						<i class="fa-solid fa-bolt"></i> Criar
					</a>
				</div>
			</header>
			<main class="content">
