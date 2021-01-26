<x-app-layout>

    <x-slot name="header">
        <div class ="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Viewing a post') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 flex justify-center">
                            {{ $post->title }}
                        </h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <tbody class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-white px-4 pb-10 max-w-6xl mx-auto sm:px-6 lg:px-8 mt-8">
                                <tr>
                                    {!!html_entity_decode($post->body)!!}
                                </tr>

                            </div>
                        </tbody>
                        <p class="px-6 py-4 text-left text-xs font-medium text-gray-500">Created on: {{ date('M j, Y', strtotime($post->created_at)) }} by {{$url}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

