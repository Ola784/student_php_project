<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$page->title}}</title>
    <meta name="author" content="name"/>
    <meta name="description" content="description here"/>
    <meta name="keywords" content="keywords,here"/>
    <link
        href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"
        rel="stylesheet"
    />
    <!--Replace with your tailwind.css once created-->
</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<nav id="header" class="fixed w-full z-10 top-0 bg-white opacity-90">

    <div id="progress" class="h-1 z-20 top-0"
         style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

        <div class="pl-4">
            <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="#">
                {{$page->title}}
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>

        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20"
            id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                @foreach($menus as $menu)
                    <li class="px-2 md:px-4">
                        <a href="{{$menu->link}}"
                           class="text-red-800 font-semibold hover:text-red-600"> {{$menu->title}} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>


<!--Container-->
<div class="container w-full md:max-w-5xl mx-auto pt-20">
    @if(!empty($page->content))
    <div class="flex justify-center px-6 py-4 pt-10 text-red-500">
        <p> {!!html_entity_decode($page->content)!!}</p>
    </div>
    @endif
    @if(!empty($page->content_markdown))
    <div class="flex justify-center px-6 py-4 mt-1 pb-20 text-red-500">
        <p> {!!html_entity_decode($page->content_markdown)!!}</p>
    </div>
    @endif
    <!--Posty-->
    <div class="flex justify-center">
        <div class="w-2/3">
            @if($posts->isEmpty())
                {{--<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="p-6 flex justify-center">No posts for this page.</p>
                </div>
                --}}

            @else
                @foreach($posts as $post)
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div>
                            <div class="bg-white pb-3">
                                <h1 class="text-lg leading-6 text-gray-900 flex justify-center">
                                    <a href="{{ route('final.pages.posts.show', [$url, $page, $post]) }}"
                                       class="btn btn-default btn-sm flex justify-center mt-4">{{ $post->title }}</a>
                                </h1>
                            </div>
                            <div class="bg-grey-50 pb-0.5"></div>
                            <div class="bg-white">
                                <div class="px-10 py-4 ">
                                    <p class="flex justify-center">
                                        <a href="{{ route('final.pages.posts.show', [$url, $page, $post]) }}"
                                           class="px-6 btn btn-default btn-sm mt-2">{!!html_entity_decode($post->body)!!}</a>
                                    </p>
                                </div>

                                <p class="px-6 py-4 text-left text-xs font-medium text-gray-500 mt-4">Created
                                    on: {{ date('M j, Y', strtotime($post->created_at)) }} by {{$url}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-10"></div>
                @endforeach
            @endif
        </div>

        <!--SideBar-->
        <div class="w-1/3">
            <div class="flex justify-end">
                <div class="w-4/5">
                    <!--About-->
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white pb-4" style="padding: 1px">
                            <!--Contact-->
                            <form method="get" action="/contact">
                                <div class="flex justify-center mt-2" style="padding: 1px">
                                    <x-button>
                                        {{ __('contact') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="pt-10"> <!--Odstep-->

                        <!--Galleries-->
                        @if(!$galleries->isEmpty())
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-white pb-3 pt-3">
                                <h1 class="text-lg leading-6 text-gray-900 flex justify-center">
                                    Galleries
                                </h1>
                            </div>
                            <div class="bg-grey-50 pb-0.5"></div>
                            <div class="bg-white pb-4">
                                <div class="px-6 py-4 ">
                                    <div class="container w-full md:max-w-3xl mx-auto pt-2">
                                        <table class="min-w-full divide-y divide-gray-200">

                                            @foreach($galleries as $gallery)
                                                <tr>
                                                    <td class="px-1 py-1 whitespace-nowrap">
                                                        <form method="get"
                                                              action="{{ route('final.pages.galleries.show', [$url, $page, $gallery]) }}">
                                                            <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                                                                {{ __($gallery->title) }}
                                                            </x-button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
