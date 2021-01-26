<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing a page') }}
        </h2>
    </x-slot>

    <div align="center" style="padding: 4px">
        <form method="get" action="{{ route('pages.index', [$url]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <br>
                <div class="flex">
                    <form method="get" action="{{ route('pages.menus.index', [$url, $page]) }}">
                        <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                            {{ __('menus') }}
                        </x-button>
                    </form>

                    <form method="get" action="{{ route('pages.posts.index', [$url, $page]) }}">
                        <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                        {{ __('posts') }}
                        </x-button>
                    </form>
                    {{--   </form>--}}

                    <form method="get" action="{{ route('pages.galleries.index', [$url, $page]) }}">
                        <x-button class=" bg-red-500 hover:bg-red-700 ml-3">
                            {{ __('galleries ') }}
                        </x-button>
                     </form>
                </div>
                <div class="bg-white px-4 pb-5 flex items-center justify-end mt-4">

                    <form method="get" action="{{ route('pages.edit', [$url, $page]) }}">
                        <x-button class="ml-4">
                            {{ __('Edit') }}
                        </x-button>
                    </form>

                    <form method="post" action="{{ route('pages.destroy', [$url, $page]) }}">

                        @csrf
                        @method("DELETE")

                        <x-button class="ml-4">
                            {{ __('Delete') }}
                        </x-button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
