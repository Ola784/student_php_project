<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adding an image') }}
        </h2>
    </x-slot>

    <div align="center" style="padding: 4px">
        <form method="get" action="{{ route('pages.galleries.show', [$url, $page, $gallery]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post" action="{{ route('pages.galleries.images.store', [$url, $page, $gallery]) }}" enctype="multipart/form-data">

                        @csrf

                        {{--TITLE--}}
                        <div class="mt-4">
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                        </div>

                        {{--FILE--}}
                        <div class="col-md-5">
                            <x-label for="file" :value="__('File')" />
                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" />
                        </div>

                        {{--DESCRIPTION--}}
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class=" bg-red-500 hover:bg-red-700 ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
