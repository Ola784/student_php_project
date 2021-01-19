<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing a gallery') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $gallery->title }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Detailed information.
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Title
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $gallery->title }}
                                </dd>
                            </div>

                            {{--IMAGES--}}
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($images as $image)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $image->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('pages.galleries.show', [$url, $page, $gallery]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <div class="bg-white px-4 pb-5 flex items-center justify-end mt-4">

                                <form method="get" action="{{ route('pages.galleries.images.create', [$url, $page, $gallery]) }}">
                                    <x-button class="ml-4">
                                        {{ __('add image') }}
                                    </x-button>
                                </form>

                                <form method="get" action="{{ route('pages.galleries.edit', [$url, $page, $gallery]) }}">
                                    <x-button class="ml-4">
                                        {{ __('Edit') }}
                                    </x-button>
                                </form>

                                <form method="post" action="{{ route('pages.galleries.destroy', [$url, $page, $gallery]) }}">

                                    @csrf
                                    @method("DELETE")

                                    <x-button class=" bg-red-500 hover:bg-red-700 ml-4">
                                        {{ __('Delete') }}
                                    </x-button>
                                </form>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
