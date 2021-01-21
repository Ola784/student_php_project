<x-app-layout>

    {{--HEADER Z PRZYCISKAMI--}}
    <x-slot name="header">
        <form method="get" action="{{ route('final.pages.show', [$url, $page]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                    <div class="px-4 py-5 sm:px-6" align="center">
                        <h1 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $gallery->title }}
                        </h1>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            {{--TABELA--}}
                            <table class="min-w-full divide-y divide-gray-200">

                                {{--IMAGES--}}
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($images as $image)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap" align="center">
                                                {{--<div class="text-sm text-gray-900">{{ $image->title }}</div>--}}
                                                <a href="{{ route('final.pages.galleries.images.show', [$url, $page, $gallery, $image]) }}" class="text-indigo-600 hover:text-indigo-900">
                                                    <img src = "{{url('/images/'.$image->file)}}" style="max-width:20%;max-height:20%"/>
                                                </a>
                                            </td>
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
