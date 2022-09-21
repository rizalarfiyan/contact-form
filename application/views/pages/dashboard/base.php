<?php include APPPATH . '/views/components/navbar.php' ?>

<section class="pt-32 bg-gray-50 min-h-screen" x-init="$nextTick(() => {$dispatch('form-content', true)})">
	<div class="container" x-data="getContent" x-on:form-content.window="loadContent($dispatch, $event.detail)">
		<div class="flex flex-col gap-6">
			<button class="btn ml-auto has-icon" type="button" x-data="{id : 'add-form'}" x-on:click="$dispatch('modal', {id})">
				<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
					<path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"></path>
				</svg>
				<span>Add</span>
			</button>
			<div class="flex gap-4 justify-center items-center flex-wrap">
				<div class="min-h-[320px] w-full rounded-xl flex justify-center items-center bg-gray-100" x-show="isLoading" x-cloak>
					<div class="loader border-gray-800 border-t-gray-200 border-4 h-10 w-10"></div>
				</div>
				<template x-for="content of contents" :key="content.id">
					<a x-bind:href="getFormLink(content.id)" class="w-full rounded-lg max-w-[360px] py-4 px-6 flex gap-4 items-center justify-between shadow-smooth border border-gray-200">
						<h2 class="text-xl text-gray-800 font-semibold line-clamp-2" x-text="content.name"></h2>
						<div class="flex gap-1 flex-col items-center text-gray-6s00 p-2 rounded-md shadow-lg min-w-[65px]">
							<svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
								<path d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z">
								</path>
							</svg>
							<span class="text-xs" x-text="content.total">0</span>
						</div>
					</a>
				</template>
			</div>
			<div class="mx-auto">
				<button class="btn has-icon" type="button" x-show="hasLoadMore" x-cloak @click="loadContent($dispatch)">
					Load More
				</button>
			</div>
		</div>
	</div>
</section>

<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-data="addForm" x-on:modal.window="open($event, 'add-form')" x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
	<div class="w-full transition-all transform relative p-4 max-w-md h-full md:h-auto" x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4">
		<div class="relative bg-white rounded-lg shadow">
			<div class="flex justify-between items-center p-4 rounded-t border-b">
				<h3 class="text-xl font-semibold text-gray-900">Add Form</h3>
				<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" x-on:click="close">
					<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
						<path d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
						</path>
					</svg>
				</button>
			</div>
			<form @submit.prevent="submit($dispatch)">
				<div class="p-4 text-left space-y-4">
					<div class="input-group">
						<label for="name"> Name </label>
						<input type="text" name="name" class="text" :class="{ 'invalid': error.name }" placeholder="Name" x-model="data.name" id="name" />
						<div class="error" x-text="error.password"></div>
					</div>
				</div>
				<div class="flex justify-end p-4 border-t border-gray-200">
					<button class="btn" type="button" x-on:click="close">
						Cancel
					</button>
					<button class="btn ml-2" :class="{'cursor-not-allowed': isLoading}" type="submit" :disabled="isLoading" x-html="buttonContent">
						Change
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function getContent() {
		return {
			hasLoadMore: true,
			isLoading: true,
			next: '',
			contents: [],
			getFormLink(idx) {
				return BASE_URL + 'form/' + idx
			},
			loadContent($dispatch, isFirst = false) {
				this.isLoading = true
				axios.get(BASE_URL + 'api/form', {
						params: {
							position: isFirst ? '' : this.next,
						},
					})
					.then((res) => {
						if (isFirst) {
							this.contents = res.data.data.content;
							this.hasLoadMore = true;
						} else {
							this.contents = [...this.contents, ...res.data.data.content];
						}
						this.next = res.data.data.next;
						if (this.next == '') this.hasLoadMore = false
					})
					.catch((res) => {
						$dispatch('notif', {
							type: 'error',
							text: res.response.data.message
						})
					})
					.finally(() => {
						this.isLoading = false
					})
			}
		}
	}

	function addForm() {
		return {
			isOpen: false,
			data: {
				name: ''
			},
			error: {
				name: '',
			},
			isLoading: false,
			buttonContent: textSubmit,
			controller: new AbortController(),
			open(that, id) {
				if (that.detail.id === id) {
					this.isOpen = true
				}
			},
			close() {
				this.isOpen = false
				this.controller.abort()
			},
			submit($dispatch) {
				this.controller = new AbortController()
				this.buttonContent = textLoading
				this.isLoading = true
				this.error.name = ''

				axios.post(BASE_URL + 'api/form', this.data, {
						signal: this.controller.signal,
						headers: {
							'Content-Type': 'multipart/form-data',
						},
					})
					.then((res) => {
						$dispatch('notif', {
							type: 'success',
							text: res.data.message
						})
						this.data.name = ''
						$dispatch('form-content', true)
						this.close()
					})
					.catch((res) => {
						const isCancel = res.code === "ERR_CANCELED"
						$dispatch('notif', {
							type: 'error',
							text: isCancel ? 'Cancel request by User!' : res.response.data.message
						})
						if (isCancel) return this.close();
						if (res.response.status === 400) this.error = res.response.data.data
					})
					.finally(() => {
						this.isLoading = false
						this.buttonContent = textSubmit
					})
			},
		}
	}
</script>
