<x-app-layout>
    <x-slot name="header">
        <div class ="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <div class="mt-4 px-8 pb-4">
                <form method="get" action="{{ route('pages.posts.create', [$url, $page]) }}">
                    <x-button class=" bg-red-500 hover:bg-red-700 ml-4">
                        {{ __('Create new...') }}
                    </x-button>
                </form>
            </div>

        </div>
    </x-slot>
    <div align="center" style="padding: 4px">
        <form method="get" action="{{ route('pages.show', [$url, $page]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if($posts->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p class="p-6 flex justify-center">No posts for this page.</p>
                </div>
            @else
                @foreach($posts as $post)
                    <table class="min-w-full  divide-y divide-gray-200">

                        <div class="overflow-hidden shadow-sm sm:rounded-lg">

                            <thead class="overflow-hidden shadow-sm sm:rounded-lg bg-white">

                            <th scope="col"
                                class="bg-grey-50 px-6 py-3 text-left text-s font-medium text-gray-700 tracking-wider flex justify-center">

                                <a href="{{ route('pages.posts.show', [$url, $page, $post]) }}" class="btn btn-default btn-sm">{{ $post->title }}</a>
                            </th>
                            </a>
                            </thead>

                            <tbody class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <tr>
                                <td class="px-6 py-4 ">
                                    <p class="flex justify-center">
                                        <a href="{{ route('pages.posts.show', [$url, $page, $post]) }}" class="btn btn-default btn-sm">{!!html_entity_decode($post->body)!!}</a></p>
                                </td>
                            </tr>

                            <td class="px-6 py-4 text-left text-xs font-medium text-gray-500">Created on: {{ date('M j, Y', strtotime($post->created_at)) }} by {{$url}}</td>

                            <div class="pb-10"></div>
                            @endforeach
                            </tbody>
                        </div>

                    </table>

                    @endif
        </div>
    </div>

</x-app-layout>

