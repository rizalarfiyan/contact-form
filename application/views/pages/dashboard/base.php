<?php include APPPATH . '/views/components/navbar.php' ?>

<section class="pt-32 bg-gray-50 min-h-screen">
	<div class="container" x-data="{ hasLoadMore: false }">
		<div class="flex flex-col gap-6">
			<button class="btn ml-auto has-icon" type="button" x-data="{id : 'add-form'}" x-on:click="$dispatch('modal', {id})">
				<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
					<path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"></path>
				</svg>
				<span>Add</span>
			</button>
			<div class="flex gap-4 justify-center items-center flex-wrap">
				<div class="min-h-[320px] w-full rounded-xl flex justify-center items-center bg-gray-100">
					<div class="loader border-gray-800 border-t-gray-200 border-4 h-10 w-10"></div>
				</div>
			</div>
			<div class="mx-auto" x-show="hasLoadMore" x-cloak>
				<button class="btn has-icon" type="button">
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

				axios.post(BASE_URL + 'api/add-form', this.data, {
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
						// update dispatch
						this.data.name = ''
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
