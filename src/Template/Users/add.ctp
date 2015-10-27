<div id="container">
	<div class="pure-g">
		<div class="pure-u-12-24">
			<h1>Cadastro</h1>
			<?php echo $this->element('Flash/default', ['message'=>'Crie sua conta agora!']); ?>
			<?php
	            echo $this->Form->create($form, ['class'=>'pure-form', 'action'=>'/add']);
	            echo $this->Form->input('name', ['placeholder'=>'Nome...', 'class'=>'pure-input-1']);
	            echo $this->Form->input('email', ['placeholder'=>'Email...', 'class'=>'pure-input-1']);
	            echo $this->Form->input('password', ['label'=>'Senha', 'placeholder'=>'Senha...', 'class'=>'pure-input-1']);
	            echo $this->Form->submit('Acessar', ['class'=>'pure-button pure-button-primary']);
	            echo $this->Form->end();
	        ?>
		</div>
	</div>
</div>

<?php $this->start('css');?>
<style>
	.message {
	  background: #1f8dd6;
	  padding: 0.3em 1em;
	  border-radius: 3px;
	  color: #fff;
	  margin-bottom: 10px;
	}
	input {
		margin-bottom: 10px;
	}
	.pure-u-12-24 {
		padding: 1em;
		box-sizing: border-box;
	}
</style>
<?php $this->end();?>