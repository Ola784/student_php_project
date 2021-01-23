<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing a post') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Newest posts</div>

                        <div class="card-body">

                            @forelse ($posts as $post)
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="{{ route('pages.posts.show', [$url, $page, $post->id]) }}"><h2>{{ $post->title }}</h2></a>

                                        <p>{{ substr($post->body, 0, 200) }}...
                                            <a href="{{ route('pages.posts.show', [$url, $page, $post->id]) }}">Read full post</a></p>
                                    </div>
                                </div>
                                <hr />
                            @empty
                                No posts yet.
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
