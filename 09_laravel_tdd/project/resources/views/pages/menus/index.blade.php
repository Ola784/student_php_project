<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of menus') }}
        </h2>
    </x-slot>

    <div align="center" style="padding: 4px">
        <form method="get" action="{{ route('pages.show', [$url, $page]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if($menus->isEmpty())
                    <p class="p-6">No menus for this page</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Details</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($menus as $menu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $menu->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('pages.menus.show', [$url, $page, $menu]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="flex items-center justify-end mt-4 px-4 pb-5">
                    <form method="get" action="{{ route('pages.menus.create', [$url, $page]) }}">
                        <x-button class=" bg-red-500 hover:bg-red-700 ml-4">
                            {{ __('Create new...') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
