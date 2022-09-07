<nav class="main-navbar">
	<div class="flex justify-between container px-3">
		<div class="flex items-center gap-2">
			<img class="w-6 h-6" src="<?= base_url('assets/img/icon/form.svg') ?>" alt="Contact Form Logo">
			<h1 class="text-2xl font-semibold text-gray-900">
				Contact Form
			</h1>
		</div>
		<div class="scroll-spy-wrapper flex justify-center items-center gap-2">
			<a class="btn scroll-spy-nav active" href="#about"> About </a>
			<a class="btn scroll-spy-nav" href="#feature"> Feature </a>
			<?php if ($isLogin) : ?>
				<a class="btn" href="/dashboard"> Dashboard </a>
			<?php else : ?>
				<a class="btn" href="/login"> Login </a>
			<?php endif ?>
		</div>
	</div>
</nav>

<section id="about" class="container scroll-spy p-3 pt-32">
	<div class="flex justify-between items-center flex-col-reverse md:flex-row">
		<div class="max-w-full lg:max-w-[520px] xl:max-w-[560px] my-6">
			<h1 class="text-3xl lg:text-4xl xl:text-5xl font-medium text-gray-900">
				Want anything to be easy with <b>Contact Form</b>.
			</h1>
			<p class="text-gray-600 mt-4 mb-6">
				Keep full control over the look and feel of your forms. Let
				<b>Contact Form</b> take care of the rest.Solutions for agencies,
				freelancers, developers and marketing teams.
			</p>
			<?php if ($isLogin) : ?>
				<a href="/dashboard" class="btn hero"> Go to Dashboard </a>
			<?php else : ?>
				<a href="/login" class="btn hero"> Go to Login </a>
			<?php endif ?>
		</div>
		<div class="flex w-full max-w-[320px] md:max-w-[520px] h-full">
			<img src="<?= base_url('assets/img/illustration/hero-section.svg') ?>" alt="Hero Section Illustration" />
		</div>
	</div>
	<div class="w-full flex">
		<div class="rounded-lg w-full grid grid-flow-row sm:grid-flow-row grid-cols-1 sm:grid-cols-3 py-9 divide-y-2 sm:divide-y-0 sm:divide-x-2 divide-gray-100 bg-white-500 z-10">
			<div class="flex items-center justify-start sm:justify-center py-4 sm:py-6 w-8/12 px-4 sm:w-auto mx-auto sm:mx-0">
				<div class="flex mx-auto w-40 sm:w-auto">
					<div class="flex items-center justify-center bg-blue-100 w-12 h-12 mr-6 rounded-full">
						<img src="<?= base_url('assets/img/icon/user.svg') ?>" class="h-6 w-6" />
					</div>
					<div class="flex flex-col">
						<p class="text-xl text-black-600 font-bold">390+</p>
						<p class="text-lg text-black-500">Users</p>
					</div>
				</div>
			</div>
			<div class="flex items-center justify-start sm:justify-center py-4 sm:py-6 w-8/12 px-4 sm:w-auto mx-auto sm:mx-0">
				<div class="flex mx-auto w-40 sm:w-auto">
					<div class="flex items-center justify-center bg-blue-100 w-12 h-12 mr-6 rounded-full">
						<img src="<?= base_url('assets/img/icon/form.svg') ?>" class="h-6 w-6" />
					</div>
					<div class="flex flex-col">
						<p class="text-xl text-black-600 font-bold">2120+</p>
						<p class="text-lg text-black-500">Submit</p>
					</div>
				</div>
			</div>
			<div class="flex items-center justify-start sm:justify-center py-4 sm:py-6 w-8/12 px-4 sm:w-auto mx-auto sm:mx-0">
				<div class="flex mx-auto w-40 sm:w-auto">
					<div class="flex items-center justify-center bg-blue-100 w-12 h-12 mr-6 rounded-full">
						<img src="<?= base_url('assets/img/icon/document.svg') ?>" class="h-6 w-6" />
					</div>
					<div class="flex flex-col">
						<p class="text-xl text-black-600 font-bold">1+</p>
						<p class="text-lg text-black-500">Forms</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="feature" class="container scroll-spy p-3 flex justify-between items-center flex-col md:flex-row">
	<div class="flex w-full max-w-[320px] md:max-w-[520px] h-full">
		<img src="<?= base_url('assets/img/illustration/feature.svg') ?>" alt="Feature Illustration" />
	</div>
	<div class="max-w-full lg:max-w-[520px] xl:max-w-[560px] my-6">
		<h3 class="text-3xl lg:text-4xl xl:text-5xl font-medium text-gray-900">
			We Provide Many Features You Can Use
		</h3>
		<p class="text-gray-600 my-4">
			You can explore the features that we provide with fun and have their
			own functions each feature.
		</p>
		<ul class="text-gray-600 self-start list-inside ml-8">
			<li class="relative circle-check">No servers to manage.</li>
			<li class="relative circle-check">No databases to handle.</li>
			<li class="relative circle-check">No APIs or frameworks to learn.</li>
			<li class="relative circle-check">
				JavaScript not required (but well supported).
			</li>
			<li class="relative circle-check">Perfect for static sites.</li>
		</ul>
	</div>
</section>

<footer class="py-6 text-center bg-gray-100">
	<span class="text-gray-400"> &#169; 2022 Contact Form </span>
</footer>
