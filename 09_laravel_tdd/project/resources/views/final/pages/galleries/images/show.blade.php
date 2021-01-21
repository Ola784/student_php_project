<x-app-layout>

    {{--HEADER Z PRZYCISKAMI--}}
    <x-slot name="header">
        <form method="get" action="{{ route('final.pages.galleries.show', [$url, $page, $gallery]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                    {{--TITLE--}}
                    <div class="px-4 py-5 sm:px-6" align="center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $image->title }}
                        </h3>
                    </div>

                    <div class="border-t border-gray-200"">
                        {{-- DESCRIPTION --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" align="center">
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3"">
                                {{ $image->description }}
                            </dd>
                        </div>

                        {{-- FILE (IMAGE) --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" align="center">
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3"">
                                <img src = "{{url('/images/'.$image->file)}}" />
                            </dd>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
