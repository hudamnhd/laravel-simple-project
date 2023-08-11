@extends('layouts.master')
@section('title', 'Laravel Project')
@section('content')
    <!-- component -->
    <nav id="header" class="top-10 z-30 w-full border-b border-indigo-400 py-1 shadow-lg">
        <div class="mt-0 flex w-full items-center justify-between px-6 py-2">
            <label for="menu-toggle" class="block cursor-pointer md:hidden">
                <svg class="fill-current text-indigo-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">

            <div class="order-3 hidden w-full md:order-1 md:flex md:w-auto md:items-center" id="menu">
                <nav>
                    <ul class="items-center justify-between pt-4 text-base text-indigo-600 md:flex md:pt-0">
                        <li><a class="inline-block px-4 py-2 font-medium no-underline hover:text-slate-500 lg:-ml-2"
                                href="#">Home</a></li>
                        <li><a class="inline-block px-4 py-2 font-medium no-underline hover:text-slate-500 lg:-ml-2"
                                href="#">Project</a></li>
                        <li><a class="inline-block px-4 py-2 font-medium no-underline hover:text-slate-500 lg:-ml-2"
                                href="#">About</a></li>
                        <li><a class="inline-block px-4 py-2 font-medium no-underline hover:text-slate-500 lg:-ml-2"
                                href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="order-2 mr-0 flex flex-wrap items-center justify-end md:order-3 md:mr-4" id="nav-content">
                <div class="auth flex w-full items-center md:w-full">
                    <button onclick="location.href='/login'" type="button"
                        class="mr-4 rounded-lg border border-indigo-500 bg-transparent px-4 py-2 text-sm font-medium text-indigo-600 hover:bg-gray-100">Sign
                        in</button>
                    <button onclick="location.href='/register'" type="button"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-gray-200 hover:bg-indigo-500">Sign
                        up</button>
                </div>
            </div>
        </div>
    </nav>
    <section class="">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="text-3xl font-bold sm:text-4xl">Project Laravel</h2>

                <p class="mt-4">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
                    aliquam doloribus nesciunt eos fugiat. Vitae aperiam fugit consequuntur
                    saepe laborum.
                </p>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <a class="block rounded-lg border-[1px] p-8 shadow-xl transition duration-300 hover:scale-105 hover:border-indigo-500/30 hover:shadow-indigo-500/30"
                    href="/siswa">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="h-10 w-10 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                    <h2 class="mt-4 text-xl font-semibold">Simple CRUD Data Text</h2>
                    <p class="mt-1 text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ut quo
                        possimus adipisci distinctio alias voluptatum blanditiis laudantium.
                    </p>
                </a>
                <a class="block rounded-lg border-[1px] p-8 shadow-xl transition duration-300 hover:scale-105 hover:border-indigo-500/30 hover:shadow-indigo-500/30"
                    href="/grocery">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="h-10 w-10 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                    <h2 class="mt-4 text-xl font-semibold">Table Grocery Fruit and Vegetable</h2>
                    <p class="mt-1 text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ut quo
                        possimus adipisci distinctio alias voluptatum blanditiis laudantium.
                    </p>
                </a>
                <a class="block rounded-lg border-[1px] p-8 shadow-xl transition duration-300 hover:scale-105 hover:border-indigo-500/30 hover:shadow-indigo-500/30"
                    href="/services/digital-campaigns">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="h-10 w-10 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                    <h2 class="mt-4 text-xl font-semibold">Lorem ipsum dolor sit</h2>
                    <p class="mt-1 text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ut quo
                        possimus adipisci distinctio alias voluptatum blanditiis laudantium.
                    </p>
                </a>
            </div>
        </div>
        @include('components.footer')
    </section>
@endsection
