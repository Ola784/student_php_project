<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing a page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post" action="{{ route('pages.update', [$url,$page]) }}">

                        @csrf
                        @method("PUT")

                        <div class="mt-4">
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title"  class="block mt-1 w-full" type="text" name="title" :value="$page->title" />

                            <x-label for="cnt" :value="__('Content HTML')" style="padding-top: 32px"/>
                            <textarea id="cnt"  class="block mt-6 w-full h-60" type="text" name="cnt" style="rows: 5">{{ $page->content }}</textarea>

                            <x-label for="cnt2" :value="__('Content MARKDOWN')" style="padding-top: 32px" />
                            <textarea id="cnt2" class="block mt-6 w-full h-60" type="text" name="cnt2">{{ $page->content_markdown }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <x-button class=" bg-red-500 hover:bg-red-700 ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
