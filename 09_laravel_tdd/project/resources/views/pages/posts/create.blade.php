@extends('layouts.app')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creating a menu') }}
            </h2>
        </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new article</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form method="post" action="{{ route('pages.posts.store', [$url, $page]) }}">
                            @csrf

                            Article title*:
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                            <br />

                            Article text*:
                            <textarea name="body" class="form-control" rows="10">{{ old('body') }}</textarea>
                            <br />

                            Categories:
                            <br />
                            @foreach ($categories as $cat)
                                <input type="checkbox" name="categories[]" value="{{ $cat->id }}" /> {{ $cat->name }}
                                <br />
                            @endforeach
                            <br />

                            Tags (comma-separated):
                            <input type="text" name="tags" class="form-control" />
                            <br />

                            Main image:
                            <br />
                            <input type="file" name="main_image" />
                            <br /><br />

                            <input type="submit" value=" Save article " class="btn btn-primary" />

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


