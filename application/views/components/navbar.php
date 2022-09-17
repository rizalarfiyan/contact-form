<nav class="main-navbar">
	<div class="flex justify-between container px-3">
		<a class="flex items-center gap-2" href="<?= base_url() ?>">
			<img class="w-6 h-6" src="<?= base_url('assets/img/icon/form.svg') ?>" alt="Contact Form Logo" alt="Contact Form Logo" />
			<h1 class="text-2xl font-semibold text-gray-900">Contact Form</h1>
		</a>
		<div class="flex justify-center items-center gap-4">
			<div x-data="{ isOpen: false }" x-cloak class="relative inline-block">
				<div @click="isOpen = !isOpen" class="flex flex-row cursor-pointer">
					<div class="hidden sm:flex flex-col items-end mr-2">
						<h3 class="text-sm text-gray-900 font-medium"><?= $user->name ?></h3>
						<span class="inline-block text-xs px-1.5 py-0.5 bg-blue-100 text-blue-800 rounded"><?= $user->role ?></span>
					</div>
					<div class="overflow-hidden w-10 h-10 rounded-full">
						<img src="<?= $user->avatar ?>" alt="<?= $user->name ?> Avatar" />
					</div>
				</div>

				<div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-end="opacity-0 transform -translate-y-3" class="dropdown shadow-none mt-8 transition-all duration-300 absolute right-0 z-50 w-48 py-2 bg-white rounded-md">
					<a href="/dashboard" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
						Dashboard
					</a>
					<hr class="border-gray-200 dark:border-gray-700" />
					<a href="/profile" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
						My profile
					</a>
					<a href="/logout" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
						Logout
					</a>
				</div>
			</div>
		</div>
	</div>
</nav>
