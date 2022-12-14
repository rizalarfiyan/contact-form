<div class="flex items-center min-h-screen bg-gray-50">
	<div class="flex-1 h-full w-[94%] max-w-[402px] md:max-w-3xl lg:max-w-4xl mx-auto bg-white rounded-2xl shadow-smooth overflow-hidden">
		<div class="flex flex-col md:flex-row">
			<div class="hidden md:block md:w-1/2 bg-gray-50">
				<img class="object-cover w-full h-full" src="<?= base_url('assets/img/illustration/login.svg') ?>" alt="illustration login" />
			</div>
			<div class="relative flex items-center justify-center p-12 md:w-1/2">
				<a class="btn back-home" href="/">
					<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
						<path d="M11.29,12l3.54-3.54a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L9.17,11.29a1,1,0,0,0,0,1.42L13.41,17a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41Z">
						</path>
					</svg>
					<span>Back</span>
				</a>
				<div class="w-full">
					<div class="mb-6 text-center">
						<h1 class="text-2xl font-bold text-gray-700">Login</h1>
						<p class="text-sm text-gray-500">
							Fill the form with credentials match!
						</p>
					</div>
					<?php if ($this->session->flashdata('message_login_error')) : ?>
						<div class="alert">
							<?= $this->session->flashdata('message_login_error') ?>
						</div>
					<?php endif ?>
					<form action="" method="post">
						<div class="input-group">
							<label for="identity">
								Username or Email
							</label>
							<input type="text" name="identity" class="text <?= form_error('identity') ? 'invalid' : '' ?>" placeholder="Your Username or Email" id="identity" value="<?= set_value('identity') ?>" />
							<div class="error"><?= form_error('identity') ?></div>
						</div>
						<div class="input-group mt-4">
							<label for="password">
								Password
							</label>
							<input type="password" name="password" class="text <?= form_error('password') ? 'invalid' : '' ?>" placeholder="Your Password" id="password" value="<?= set_value('password') ?>" />
							<div class="error"><?= form_error('password') ?></div>
						</div>
						<button type="submit" class="btn fluid mt-6">
							Login
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
