<x-app-layout>

    @section('scripts')
        <script src="{{"jquery.js"}}"></script>
        <script src="{{"parsley.min.js"}}"></script>

    @show

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing a post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 flex justify-center">
                            {{ $post->title }}
                        </h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>


                            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-6">
                                    {!!html_entity_decode($post->body)!!}
                            </div>


                            <div class="bg-white py-14 px-4 pb-5 flex items-center justify-end mt-4">

                                <form method="get" action="{{ route('pages.menus.edit', [$url, $page, $post]) }}">
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

