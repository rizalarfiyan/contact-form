<?php include APPPATH . '/views/components/navbar.php' ?>

<section class="pt-32 min-h-screen bg-gray-50 flex justify-center items-center">
	<div class="bg-white w-[94%] max-w-[520px] rounded-xl shadow-smooth">
		<div class="px-6 pb-10">
			<div class="flex flex-wrap justify-center">
				<div class="w-full flex justify-center relative">
					<div class="overflow-hidden border border-gray-300 rounded-full w-36 h-36 bg-gray-100 absolute -top-20 shadow-smooth">
						<img class="w-full h-auto" src="<?= $user->avatar ?>" alt="<?= $user->name ?> Avatar" />
					</div>
				</div>

				<div class="w-full mt-20 flex justify-center items-start gap-5 text-center">
					<div>
						<div class="text-xl font-bold uppercase tracking-wide text-gray-700">
							<?= $form['total'] ?>
						</div>
						<span class="text-sm text-gray-400">Form</span>
					</div>

					<div>
						<div class="text-xl font-bold uppercase tracking-wide text-gray-700">
							<?= $form['submit'] ?>
						</div>
						<span class="text-sm text-gray-400">Submit</span>
					</div>
				</div>
			</div>

			<div class="text-center mt-6">
				<div class="mb-2 pb-1 relative inline-block border-b border-gray-300">
					<h3 class="text-2xl font-bold leading-normal text-gray-700" id="profile-name"><?= $user->name ?></h3>
					<button class="absolute top-0 -right-6 p-1 rounded-sm bg-white hover:bg-gray-100 transition-colors duration-300" x-data="{id : 'change-name'}" x-on:click="$dispatch('modal', {id})">
						<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z">
							</path>
						</svg>
					</button>
				</div>

				<div class="flex flex-col items-center justify-center text-sm text-gray-400 mb-6">
					<div class="flex items-center gap-1">
						<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm-.41,2-5.88,5.88a1,1,0,0,1-1.42,0L5.41,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V7.41l5.88,5.88a3,3,0,0,0,4.24,0L20,7.41Z">
							</path>
						</svg>
						<span><?= $user->email ?></span>
					</div>
					<div class="flex items-center gap-1">
						<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12,2a10,10,0,1,0,5,18.66,1,1,0,1,0-1-1.73A8,8,0,1,1,20,12v.75a1.75,1.75,0,0,1-3.5,0V8.5a1,1,0,0,0-1-1,1,1,0,0,0-1,.79A4.45,4.45,0,0,0,12,7.5,4.5,4.5,0,1,0,15.3,15,3.74,3.74,0,0,0,22,12.75V12A10,10,0,0,0,12,2Zm0,12.5A2.5,2.5,0,1,1,14.5,12,2.5,2.5,0,0,1,12,14.5Z">
							</path>
						</svg>
						<span><?= $user->username ?></span>
					</div>
				</div>

				<button class="btn mx-auto" type="button" x-data="{id : 'change-password'}" x-on:click="$dispatch('modal', {id})">
					Change Password
				</button>
			</div>
		</div>
	</div>
</section>

<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-data="{isOpen:!1,data:{name:'<?= $user->name ?>'},error:{name:''},isLoading:!1,buttonContent:textSubmit,controller:new AbortController,open(a,b){a.detail.id===b&&(this.isOpen=!0)},close(){this.isOpen=!1,this.controller.abort()},submit(a){this.controller=new AbortController,this.buttonContent=textLoading,this.isLoading=!0,this.error.name='',axios.post(BASE_URL+'api/change-name',this.data,{signal:this.controller.signal,headers:{'Content-Type':'multipart/form-data'}}).then(b=>{a('notif',{type:'success',text:b.data.message});const c=document.getElementById('profile-name');!c||(c.innerText=this.data.name),this.close()}).catch(b=>{const c='ERR_CANCELED'===b.code;return a('notif',{type:'error',text:c?'Cancel request by User!':b.response.data.message}),c?this.close():void(400===b.response.status&&(this.error=b.response.data.data))}).finally(()=>{this.isLoading=!1,this.buttonContent=textSubmit})}}" x-on:modal.window="open($event, 'change-name')" x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
	<div class="w-full transition-all transform relative p-4 max-w-md h-full md:h-auto" x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4">
		<div class="relative bg-white rounded-lg shadow">
			<div class="flex justify-between items-center p-4 rounded-t border-b">
				<h3 class="text-xl font-semibold text-gray-900">Change Name</h3>
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

<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-data="{isOpen:!1,data:{password:'',newPassword:''},error:{password:'',newPassword:''},isLoading:!1,buttonContent:textSubmit,controller:new AbortController,open(a,b){a.detail.id===b&&(this.isOpen=!0)},close(){this.isOpen=!1,this.controller.abort()},submit(a){this.controller=new AbortController,this.buttonContent=textLoading,this.isLoading=!0,this.error={password:'',newPassword:''},axios.post(BASE_URL+'api/change-password',this.data,{signal:this.controller.signal,headers:{'Content-Type':'multipart/form-data'}}).then(b=>{a('notif',{type:'success',text:b.data.message}),this.data={password:'',newPassword:''},this.close()}).catch(b=>{const c='ERR_CANCELED'===b.code;return a('notif',{type:'error',text:c?'Cancel request by User!':b.response.data.message}),c?this.close():void(400===b.response.status&&(this.error=b.response.data.data))}).finally(()=>{this.isLoading=!1,this.buttonContent=textSubmit})}}" x-on:modal.window="open($event, 'change-password')" x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
	<div class="w-full transition-all transform relative p-4 max-w-md h-full md:h-auto" x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4">
		<div class="relative bg-white rounded-lg shadow">
			<div class="flex justify-between items-center p-4 rounded-t border-b">
				<h3 class="text-xl font-semibold text-gray-900">Change Password</h3>
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
						<label for="password"> Password </label>
						<input type="password" name="password" class="text" :class="{ 'invalid': error.password }" placeholder="Password" x-model="data.password" id="password" />
						<div class="error" x-text="error.password"></div>
					</div>
					<div class="input-group">
						<label for="new-password"> New Password </label>
						<input type="password" name="new-password" class="text" :class="{ 'invalid': error.newPassword }" placeholder="New Password" x-model="data.newPassword" id="new-password" />
						<div class="error" x-text="error.newPassword"></div>
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
	function changePassword() {
		return {
			isOpen: false,
			data: {
				password: '',
				newPassword: '',
			},
			error: {
				password: '',
				newPassword: '',
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
				this.error = {
					password: '',
					newPassword: '',
				}

				axios.post(BASE_URL + 'api/change-password', this.data, {
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
						this.data = {
							password: '',
							newPassword: '',
						}
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

	function changeName() {
		return {
			isOpen: false,
			data: {
				name: '<?= $user->name ?>'
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

				axios.post(BASE_URL + 'api/change-name', this.data, {
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
						const name = document.getElementById('profile-name')
						if (!!name) name.innerText = this.data.name
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
