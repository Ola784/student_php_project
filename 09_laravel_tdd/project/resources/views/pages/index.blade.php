<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <br>
                <div class="flex">
                     <form method="get" action="{{ route('pages.menus.create',$page) }}">
                    <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                        {{ __('menus') }}
                    </x-button>
                    {{--  <form method="get" action="{{ route('post.create') }}">--}}
                    <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                        {{ __('posts') }}
                    </x-button>
                    {{--   </form>--}}
                    {{--   <form method="get" action="{{ route('gallery.create') }}">--}}
                    <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                        {{ __('gallery ') }}
                    </x-button>
                    {{--  </form>--}}
                </div>
                <br>
            </div>
        </div>
</x-app-layout>
