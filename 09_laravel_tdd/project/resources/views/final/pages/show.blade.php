<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $page->title }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Galleries.
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            {{--TABELA--}}
                            <table class="min-w-full divide-y divide-gray-200">

                                {{--HEADER--}}
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Gallery
                                        </th>
                                        <th scope="col"
                                            class="relative px-6 py-3">
                                            <span class="sr-only">Details</span>
                                        </th>
                                    </tr>
                                </thead>

                                {{--GALLERIES--}}
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($galleries as $gallery)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $gallery->title }} a</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('final.pages.galleries.show', [$url, $page, $gallery]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
