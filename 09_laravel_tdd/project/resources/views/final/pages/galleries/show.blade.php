{{--FINALOWA--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Final gallery') }}
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
                            {{--TABELA--}}
                            <table class="min-w-full divide-y divide-gray-200">

                                {{--IMAGES--}}
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($images as $image)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{--<div class="text-sm text-gray-900">{{ $image->title }}</div>--}}
                                                <img src = "{{url('/images/'.$image->file)}}" style="max-width:20%;max-height:20%"/>
                                            </td>
                                            
                                            {{--
                                            <a href="{{ route('pages.galleries.images.show', [$url, $page, $gallery, $image]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                            --}}
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
