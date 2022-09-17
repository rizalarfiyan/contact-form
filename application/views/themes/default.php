<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<meta name="resource-type" content="document" />
	<meta name="robots" content="all, index, follow" />
	<meta name="googlebot" content="all, index, follow" />
	<?php
	if (!empty($meta)) {
		foreach ($meta as $name => $content) {
			echo "\n\t<meta name=\"${name}\" content=\"${content}\" />";
		}
	}
	if (!empty($canonical)) {
		echo "<link rel=\"canonical\" href=\"${canonical}\" />";
	}
	?>
	<link rel="stylesheet" href="<?= base_url("assets/css/style.min.css") ?>" type="text/css" />
	<?php
	if (!empty($css)) {
		foreach ($css as $file) {
			echo "\n\t<link rel=\"stylesheet\" href=\"${file}\" type=\"text/css\" />";
		}
	} ?>
	<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body class="font-sans antialiased" x-data="{ showNav: false }">
	<div x-data="{notifies:[],visible:[],add(i){i.id=Date.now(),this.notifies.push(i),this.fire(i.id)},fire(i){this.visible.push(this.notifies.find(s=>s.id==i));let s=2e3*this.visible.length;setTimeout(()=>{this.remove(i)},s)},remove(i){let s=this.visible.find(s=>s.id==i),e=this.visible.indexOf(s);this.visible.splice(e,1)}}" class="fixed inset-0 flex flex-col-reverse items-end justify-start h-screen w-screen" @notif.window="add($event.detail)" style="pointer-events: none">
		<template x-for="notif of notifies" :key="notif.id">
			<div x-show="visible.includes(notif)" @click="remove(notif.id)" x-transition:enter="transition ease-in duration-200" x-transition:enter-start="transform opacity-0 translate-y-2" x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-out duration-500" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform translate-x-full opacity-0" class="notif shadow-xl w-full max-w-[320px] min-w-[100px] mb-4 mr-6 py-2 px-4 flex items-center justify-center gap-4 bg-white text-gray-600 cursor-pointer overflow rounded-lg border-r-8" :class="{success:'success'===notif.type,info:'info'===notif.type,warning:'warning'===notif.type,error:'error'===notif.type}">
				<div class="p-2 rounded-full text-white icon">
					<template x-if="notif.type === 'success'">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z">
							</path>
						</svg>
					</template>
					<template x-if="notif.type === 'info'">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Zm0-8.5a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0v-3A1,1,0,0,0,12,11.5Zm0-4a1.25,1.25,0,1,0,1.25,1.25A1.25,1.25,0,0,0,12,7.5Z">
							</path>
						</svg>
					</template>
					<template x-if="notif.type === 'warning'">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12,16a1,1,0,1,0,1,1A1,1,0,0,0,12,16Zm10.67,1.47-8.05-14a3,3,0,0,0-5.24,0l-8,14A3,3,0,0,0,3.94,22H20.06a3,3,0,0,0,2.61-4.53Zm-1.73,2a1,1,0,0,1-.88.51H3.94a1,1,0,0,1-.88-.51,1,1,0,0,1,0-1l8-14a1,1,0,0,1,1.78,0l8.05,14A1,1,0,0,1,20.94,19.49ZM12,8a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V9A1,1,0,0,0,12,8Z">
							</path>
						</svg>
					</template>
					<template x-if="notif.type === 'error'">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
							</path>
						</svg>
					</template>
				</div>
				<p class="text-sm leading-tight w-full" x-text="notif.text"></p>
			</div>
		</template>
	</div>
	<?= $output; ?>
	<script type="text/javascript">
		const BASE_URL = '<?= base_url() ?>';
		const textSubmit = 'Submit'
		const textLoading = textSubmit + '<div class="loading"><div class="loader border-blue-600 border-t-white border-4 h-6 w-6"></div></div>'
	</script>
	<?php
	if (!empty($js)) {
		foreach ($js as $file) {
			echo "\n\t<script src=\"${file}\" type=\"text/javascript\"></script>";
		}
	}
	?>
</body>

</html>
