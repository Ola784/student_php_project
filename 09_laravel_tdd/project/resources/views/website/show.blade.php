<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$page->title}}</title>
    <meta name="author" content="name" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />
    <link
        href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"
        rel="stylesheet"
    />
    <!--Replace with your tailwind.css once created-->
</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<nav id="header" class="fixed w-full z-10 top-0">

    <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

        <div class="pl-4">
            <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="#">
         {{$page->title}}
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                @foreach($menus as $menu)
                    <li class="px-2 md:px-4">
                        <a href="" class="text-green-800 font-semibold hover:text-green-600"> {{$menu->title}} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

{{--LINKI DO GALERII--}}
<div class="container w-full md:max-w-3xl mx-auto pt-20">
<table class="min-w-full divide-y divide-gray-200">
    
        @foreach($galleries as $gallery)
        <tr>
            <td class="px-1 py-1 whitespace-nowrap">
                <form method="get" action="{{ route('final.pages.galleries.show', [$url, $page, $gallery]) }}">
                    <x-button class=" bg-red-500 hover:bg-red-700 ml-3 ">
                        {{ __($gallery->title) }}
                    </x-button>
                </form>
            </td>
            </tr>
        @endforeach
    
</table>
</div>

<!--Container-->
<div class="container w-full md:max-w-3xl mx-auto pt-20">
    {!!html_entity_decode($page->content)!!}
    {!!html_entity_decode($page->content_markdown)!!}


{{--contact--}}
<form method="get" action="/contact">

    <x-button class="ml-4">
        {{ __('contact') }}
    </x-button>
</form>

<footer class="bg-white border-t border-gray-400 shadow">
    <div class="container max-w-4xl mx-auto flex py-8">

        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full md:w-1/2 ">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">About</h3>
                    <p class="py-4 text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                    </p>
                </div>
            </div>

            <div class="flex w-full md:w-1/2">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">Social</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



    </div>
</footer>

</body>

</html>