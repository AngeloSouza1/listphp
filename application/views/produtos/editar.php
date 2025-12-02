<div class="page-hero hero-compact hero-slim">
	<div class="hero-row">
		<div>
			<span class="eyebrow">
				<i class="fa-solid fa-pen-to-square"></i>
				Atualização rápida
			</span>
			<h2 class="hero-title"><?php echo $titulo; ?></h2>
			<p class="hero-subtext">Edite informações mantendo tudo limpo e consistente.</p>
		</div>
		<div class="hero-actions">
			<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary btn-sm">
				<i class="fa-regular fa-circle-left"></i> Voltar
			</a>
		</div>
	</div>
</div>

<div class="form-shell">
	<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>

	<?php echo form_open('produtos/editar/'.$produto['id']); ?>
		<div class="form-grid">
			<div>
				<div class="form-group">
					<label for="nome">Nome do Produto</label>
					<input type="text" name="nome" id="nome" value="<?php echo set_value('nome', $produto['nome']); ?>" required>
				</div>

				<div class="form-group" style="margin-bottom: 0;">
					<label for="descricao">Descrição</label>
					<textarea name="descricao" id="descricao" rows="5" required><?php echo set_value('descricao', $produto['descricao']); ?></textarea>
				</div>
			</div>

			<div>
				<div class="form-group">
					<label for="preco">Preço (R$)</label>
					<input type="number" name="preco" id="preco" step="0.01" min="0" value="<?php echo set_value('preco', $produto['preco']); ?>" required>
				</div>

				<div class="form-group">
					<label for="estoque">Estoque</label>
					<input type="number" name="estoque" id="estoque" min="0" value="<?php echo set_value('estoque', $produto['estoque']); ?>" required>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn">Salvar alterações</button>
					<a href="<?php echo base_url('produtos'); ?>" class="btn btn-secondary" style="text-align: center;">Cancelar</a>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
