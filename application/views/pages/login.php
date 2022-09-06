<h1>Login</h1>
<p>Login to Dashboard</p>

<?php if ($this->session->flashdata('message_login_error')) : ?>
	<div class="invalid-feedback">
		<?= $this->session->flashdata('message_login_error') ?>
	</div>
<?php endif ?>

<form action="" method="post">
	<div>
		<label for="name">Email/Username*</label>
		<input type="text" name="identity" class="<?= form_error('identity') ? 'invalid' : '' ?>" placeholder="Your username or email" value="<?= set_value('identity') ?>" />
		<div class="invalid-feedback"><?= form_error('identity') ?></div>
	</div>
	<div>
		<label for="password">Password*</label>
		<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>" placeholder="Enter your password" value="<?= set_value('password') ?>" />
		<div class="invalid-feedback"><?= form_error('password') ?></div>
	</div>
	<div>
		<input type="submit" class="button button-primary" value="Login">
	</div>
</form>
