<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Change Password') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
				<div class="w-full max-w-xs mx-auto">
					<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('profile.change_password')}}" method="POST">
						@csrf
						<div class="mb-6">
					  		<label class="block text-gray-700 text-sm font-bold mb-2" for="old-password">
						    Old Password
					  		</label>
					  		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="old-password" type="password" placeholder="*************" name="old_password">
					  		@if($errors->has('old_password'))
					  			<p class="text-red-500 text-xs italic">{{ $errors->first('old_password') }}</p>
					  		@endif
						</div>
						<div class="mb-6">
					  		<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
						    New Password
					  		</label>
					  		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="*************" name="password">
					  		@if($errors->has('password'))
					  			<p class="text-red-500 text-xs italic">{{ $errors->first('password') }}</p>
					  		@endif
						</div>
						<div class="mb-6">
					  		<label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
						    Confirm New Password
					  		</label>
					  		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="*************" name="password_confirmation">
					  		@if($errors->has('password_confirmation'))
					  			<p class="text-red-500 text-xs italic">{{ $errors->first('password_confirmation') }}</p>
					  		@endif
						</div>
						<div class="flex items-center justify-between">
						  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
						    Create New
						  </button>
						</div>
					</form>
					<p class="text-center text-gray-500 text-xs">
						&copy;2022 Gradazy. All rights reserved.
					</p>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>