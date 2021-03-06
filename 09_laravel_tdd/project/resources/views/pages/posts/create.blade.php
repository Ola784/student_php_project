
    <x-app-layout>

    @section('scripts')
            <script src="{{"jquery.js"}}"></script>
            <script src="{{"parsley.min.js"}}"></script>
            <script src="{{"https://cdn.tiny.cloud/1/ug2urxtldpl5qrxe9twuocjt351ia7q8mf9nibgmt5npql0d/tinymce/5/tinymce.min.js"}}"></script>
            <script>tinymce.init({selector:'textarea'});</script>
    @show

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creating a post') }}
            </h2>
        </x-slot>

        <div align="center" style="padding: 4px">
            <form method="get" action="{{ route('pages.posts.index', [$url, $page]) }}">
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

                            <form method="post" action="{{ route('pages.posts.store', [$url, $page]) }}">
                            @csrf

                            <div class="mt-4">
                                <x-label for="title" class="block mt-2 w-50" :value="__('Post Title')" />
                                <x-input id="title" name="title" class="block mt-1 w-full" type="text" value="{{ old('title') }}" />
                            <br />

                                <x-label for="body" class="block mt-1 w-50 " :value="__('Post Body')" />
                                <textarea name="body" class="block mt-6 h-80 w-full"></textarea>

                            <br /><br />
                            <div class="py-7" style="display:flex; justify-content:right">
                                <x-button class=" bg-red-500 hover:bg-red-700 ml-1">
                                    {{ __('Create post') }}
                                </x-button>
                            </div>
                            </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


