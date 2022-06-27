<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guest Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('guestbook.index')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Index</a>
                    <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        First Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guestbooks as $gb)
                                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                    <td class="px-6 py-4">
                                        {{$loop->iteration}}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$gb->first_name}}
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex">
                                            <form method="POST" action="{{route('guestbook.restore', $gb->id)}}" class="d-inline">
                                            @csrf
                                                <input type="submit" value="Restore" class="bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-2 px-4 rounded-l cursor-pointer"/>
                                            </form>
                                            <form method="POST" action="{{route('guestbook.deletePermanent', $gb->id)}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                            @csrf
                                            @method("DELETE")
                                                <input type="submit" value="Delete" class="bg-red-500 hover:bg-red-400 text-slate-900 font-bold py-2 px-4 rounded-r cursor-pointer">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
