<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing a post') }}
        </h2>
    </x-slot>

    <div align="center" style="padding: 4px">
        <form method="get" action="{{ route('pages.posts.index', [$url, $page, $post]) }}">
            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                {{ __('go back ') }}
            </x-button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $post->title }}
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
                                    {{ $post->title }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Description
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {!!html_entity_decode($post->body)!!}
                                </dd>
                            </div>
                            <div class="bg-white px-4 pb-5 flex items-center justify-end mt-3">
                                <form method="get" action="{{ route('pages.posts.edit', [$url, $page, $post]) }}">
                                    <x-button class="ml-4">
                                        {{ __('Edit') }}
                                    </x-button>
                                </form>

                                <form method="post" action="{{ route('pages.menus.destroy', [$url, $page, $post]) }}">

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
