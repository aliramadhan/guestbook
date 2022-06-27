<x-app-layout>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('guestbook.index')}}" class="text-blue-300 hover:text-blue-400">Index</a> / {{ __('Add Guest Book') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
				<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-lg mx-auto" action="{{route('guestbook.update',$guestbook->id)}}" method="POST">
				@csrf
				@method("PUT")
				  <div class="flex flex-wrap -mx-3 mb-6">
				    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
				        First Name
				      </label>
				      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane" name="first_name" value="{{ $guestbook->first_name }}">
				      <!--<p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
				    </div>
				    <div class="w-full md:w-1/2 px-3">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
				        Last Name
				      </label>
				      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe" name="last_name" value="{{ $guestbook->last_name }}">
				    </div>
				  </div>
				  <div class="flex flex-wrap -mx-3 mb-6">
				    <div class="w-full px-3">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-organization">
				        Organization
				      </label>
				      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-organization" type="text" placeholder="Example. CIA" name="organization" value="{{ $guestbook->organization }}">
				    </div>
				  </div>
				  <div class="flex flex-wrap -mx-3 mb-6">
				    <div class="w-full px-3">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-address">
				        Address
				      </label>
				      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-address" type="text" placeholder="Example. Giant Street" name="address" value="{{ $guestbook->address }}">
				    </div>
				  </div>
				  <div class="flex flex-wrap -mx-3 mb-4">
				    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-province">
				        Province
				      </label>
				      <div class="relative">
				        <select class="province block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-province" name="province">
				          @foreach($provinces as $province)
				          	<option @if($province->nama == $guestbook->province) selected @endif>{{$province->nama}}</option>
				          @endforeach
				        </select>
				        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
				          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
				        </div>
				      </div>
				    </div>
				    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
				        City
				      </label>
				      <div class="relative">
				        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" name="city">
				          @foreach($cities as $city)
				          	<option @if($city->nama == $guestbook->city) selected @endif>{{$city->nama}}</option>
				          @endforeach
				        </select>
				        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
				          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
				        </div>
				      </div>
				    </div>
				  </div>
				  <div class="flex flex-wrap -mx-3 mb-6">
				    <div class="w-full px-3">
				      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
				        Phone
				      </label>
				      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-phone" type="text" placeholder="Example. 0812345678910" name="phone" value="{{ $guestbook->phone }}">
				    </div>
				  </div>
				  <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Update</button>
				</form>
			</div>
		</div>
	</div>
	<script>
	    $(".province").select2();
	</script>
</x-app-layout>