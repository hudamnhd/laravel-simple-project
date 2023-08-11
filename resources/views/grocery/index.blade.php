@extends('layouts.master')
@section('title', 'Grocery Products')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('content')
    <nav class="">
        <div class="fixed top-0 z-50 w-full bg-white px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button id="mobile-menu-button" type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div onclick="location.href='/'" type="button" class="flex flex-shrink-0 cursor-pointer items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="h-6 h-6 text-indigo-600 sm:h-8 sm:w-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                        </svg>
                    </div>
                    <div class="hidden sm:ml-2 sm:block">
                        <div class="flex">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-400 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="rounded-md px-3 py-2 font-medium text-indigo-600"
                                aria-current="page">Dashboard</a>
                            <a href="#"
                                class="rounded-md px-3 py-2 font-medium text-gray-400 hover:text-indigo-600">Menu</a>

                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button"
                        class="relative rounded-full p-1 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full text-sm focus:outline-none"
                                id="list-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>

                        <div id="menu"
                            class="absolute right-0 z-10 mt-2 hidden w-48 origin-top-right rounded-md bg-white py-1 shadow-lg focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#"
                                class="focus:shadow-outline mt-2 block bg-transparent px-4 py-2 text-sm hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#"
                                class="focus:shadow-outline mt-2 block bg-transparent px-4 py-2 text-sm hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <form action="{{ route('logout') }}" method="POST" class="mb-0 w-full">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="focus:shadow-outline mt-2 block w-full bg-transparent px-4 py-2 text-left text-sm hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="fixed top-16 z-50 hidden w-full bg-white" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-400 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-indigo-600"
                    aria-current="page">Dashboard</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Team</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Projects</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Calendar</a>
            </div>
        </div>
    </nav>
    <section class="mx-10 mt-20 max-w-[1366px]">
        <header class="mb-8">
            <div class="mx-auto">
                <div class="sm:flex sm:justify-between">
                    <div class="text-center sm:text-left">
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                            Welcome Back, {{ Auth::user()->name }} </h1>
                        <p class="mt-1.5 text-gray-500">
                            Anda login sebagai <span class="font-semibold capitalize">{{ Auth::user()->role }} 🎉
                        </p>
                        <form class="mt-4" action="{{ url('grocery') }}" method="get">
                            <input class="rounded-lg px-4 py-2.5" type="search" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Masukkan kata kunci"
                                aria-label="Search">
                            <button class="rounded-lg bg-[#3D56F5] px-4 py-2.5 font-medium text-white"
                                type="submit">Cari</button>
                        </form>

                    </div>

                    <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-start">

                        <a href='/grocery/add-product'
                            class="mt-5 flex items-center justify-center gap-1.5 rounded-lg border border border-gray-200 border-indigo-500 bg-[#3D56F5] px-5 py-2.5 font-medium text-white transition hover:bg-indigo-600">
                            <span class="text-sm font-medium"> Tambah Data </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        @if ($imageData->count() > 0)
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($imageData as $data)
                    <div
                        class="card group relative flex w-auto cursor-pointer flex-col items-start gap-2 overflow-hidden rounded-lg shadow-md transition-all duration-300 hover:shadow-lg hover:shadow-indigo-600">
                        <div class="absolute left-0 top-0 h-16 w-16">
                            <div
                                class="absolute left-[-34px] top-[32px] z-10 w-[170px] -rotate-45 transform border border-white bg-indigo-600 py-1 text-center font-semibold text-white">
                                {{ 'Rp ' . number_format($data->priceTextValue, 0, ',', '.') }} /
                                {{ $data->selectBudget }} </div>
                        </div>



                        <div x-data="{ showModal: false, }" class="h-fit w-full" x-cloak>
                            <!-- Modal -->
                            <div x-show="showModal"
                                class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
                                <div class="fixed inset-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="relative max-w-[470px] rounded-lg bg-white shadow [@media(max-width:370px)]:w-[90%] [@media(max-width:615px)]:mx-3 [@media(max-width:615px)]:w-auto">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between rounded-t pl-8 pr-4 pt-4">
                                        <h3 class="text-lg font-medium text-gray-900">
                                            Detail Product
                                        </h3>
                                        <button type="button"
                                            class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                            @click="showModal = false">
                                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div
                                        class="max-h-[85%] space-y-2.5 overflow-y-auto px-6 pb-8 pt-1.5 sm:px-8 md:max-h-[550px] md:max-w-[600px] [@media(max-width:615px)]:w-auto">
                                        <h3 class="font-medium text-gray-900 sm:text-lg">
                                            {{ $data->title }}
                                        </h3>
                                        <div class="flex hidden gap-2 text-sm font-medium">
                                            <h4 class="">Posted</h4>
                                            <p class="">{{ $data->created_at->diffForHumans() }}</p>
                                        </div>



                                        <div class="relative max-h-[250px] w-[400px]" x-data="{ activeSlide: 0 }">
                                            <div class="">
                                                @foreach ($data->images as $index => $image)
                                                    <div x-data="{ showModal: false, }" class="item relative" x-cloak>
                                                        <!-- Modal -->
                                                        <div x-show="showModal"
                                                            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
                                                            <div
                                                                class="fixed inset-0 flex justify-end bg-black bg-opacity-70 pr-4 pt-2">
                                                                <button type="button"
                                                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-gray-200 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    @click="showModal = false">
                                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close
                                                                        modal</span>
                                                                </button>

                                                            </div>
                                                            <div
                                                                class="relative max-w-[600px] rounded-lg bg-white shadow [@media(max-width:370px)]:w-[90%] [@media(max-width:615px)]:mx-3 [@media(max-width:615px)]:w-auto">
                                                                <!-- Modal body -->
                                                                <div class="p-2" id="imageModal" tabindex="-1"
                                                                    aria-labelledby="imageModalLabel" aria-hidden="true">
                                                                    <div class="modal-body">
                                                                        <img src="{{ asset('assets/image/' . $image) }}"
                                                                            class="rounded-md">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- bottom  -->
                                                        </div>

                                                        <div @click="showModal = true;" x-data="{ isActive: false }"
                                                            x-show="activeSlide === {{ $index }}"
                                                            @click="activeSlide = {{ $index }}; isActive = !isActive"
                                                            class="relative cursor-pointer rounded-xl border-2 border-indigo-600 shadow-lg transition-opacity duration-300">
                                                            <img src="{{ asset('assets/image/' . $image) }}"
                                                                class="max-h-[250px] w-[400px] rounded-xl p-0.5">
                                                        </div>

                                                    </div>
                                                @endforeach
                                                <div class="absolute bottom-2 left-8 h-16 w-16">
                                                    <div
                                                        class="absolute left-[-34px] top-[32px] z-10 w-[170px] border border-white bg-indigo-600 py-1 text-center font-semibold text-white">
                                                        {{ 'Rp ' . number_format($data->priceTextValue, 0, ',', '.') }}
                                                        /
                                                        {{ $data->selectBudget }} </div>
                                                </div>
                                            </div>
                                            <button
                                                @click="activeSlide = (activeSlide - 1 + {{ count($data->images) }}) % {{ count($data->images) }}"
                                                class="absolute left-2 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                                                <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
                                            </button>

                                            <button @click="activeSlide = (activeSlide + 1) % {{ count($data->images) }}"
                                                class="absolute right-2 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                                                <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
                                            </button>
                                        </div>

                                        <div class="">

                                            <h4 class="mb-1 pt-2 font-semibold">Deskripsi</h4>
                                            <p class="font-medium text-gray-600">
                                                {{ $data->overview }}
                                            </p>

                                            <h4 class="pt-2 font-semibold">
                                                Category </h4>
                                        </div>
                                        <div class="flex flex-wrap gap-1.5">
                                            @if (isset($data->category) && is_array($data->category) && count($data->category) > 0)
                                                @foreach ($data->category as $item)
                                                    <span
                                                        class="block w-fit rounded-lg bg-[#FFE07D] px-3 py-1.5 text-xs font-medium text-[#2264D1]">{{ $item }}</span>
                                                @endforeach
                                            @else
                                                <span
                                                    class="m-1 block w-fit rounded-lg bg-[#FFE07D] px-3 py-1.5 text-xs font-medium text-[#2264D1]">No
                                                    categories found.</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <!-- bottom -->
                            </div>

                            <img @click="showModal = true;" src="{{ asset('assets/image/' . $data->images[0]) }}"
                                class="max-h-[200px] w-full object-cover duration-500 group-hover:scale-105" />
                        </div>


                        <div class="flex h-full flex-col justify-between gap-4 px-4 pb-4 pt-2">
                            <div class="space-y-3">
                                <div class="flex gap-2">

                                    <h2 class="text-2xl font-semibold"> {{ $data->title }}
                                    </h2>

                                    <button id="dotBtn"
                                        class="dot-menu flex h-8 w-8 items-center justify-center rounded-full border-[1px] border-indigo-600 bg-white p-1.5 text-indigo-600 duration-500 hover:bg-slate-200"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>

                                    <div id="dotMenu"
                                        class="w-46 absolute end-1 z-10 mt-8 hidden rounded-md border border-gray-100 bg-white shadow-lg"
                                        role="menu">
                                        <div class="p-2">




                                            <button
                                                onclick="window.location='{{ url('grocery/product/' . $data->id . '/edit') }}'"
                                                type="submit"
                                                class="flex w-full items-center gap-2 rounded-lg p-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                                Edit Product
                                            </button>

                                            <form onsubmit="return confirm('Yakin akan menghapus data?')" method="POST"
                                                action="{{ route('delete.product', ['id' => $data->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex w-full items-center gap-2 rounded-lg p-2 text-sm text-red-700 hover:bg-red-100"
                                                    role="menuitem">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>

                                                    Delete Product
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                </div>


                                <p class="text-sm font-medium text-slate-600">
                                    {{ $data->overview }}
                                </p>
                            </div>
                            <div class="flex gap-1.5">

                                <span
                                    class="block w-fit rounded-full bg-slate-200 px-3 py-1.5 text-[12px] font-medium text-indigo-600">
                                    {{ $data->category[0] }}
                                </span>
                                <span
                                    class="block w-fit rounded-full bg-slate-200 px-3 py-1.5 text-[12px] font-medium text-indigo-600">
                                    {{ $data->category[1] }}
                                </span>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <!-- Tampilkan pesan ketika tidak ada data yang cocok -->
                <p>Tidak ada data yang cocok dengan pencarian Anda.</p>
        @endif
        </div>
        @include('components.footer')
    </section>


    <script>
        document.addEventListener("click", function(event) {
            var listMenuButton = document.getElementById("mobile-menu-button");
            var menu = document.getElementById("mobile-menu");

            if (!listMenuButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add("hidden");
            } else {
                menu.classList.toggle("hidden");
            }
        });

        document.addEventListener("click", function(event) {
            var listMenuButton = document.getElementById("list-menu-button");
            var menu = document.getElementById("menu");

            if (!listMenuButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add("hidden");
            } else {
                menu.classList.toggle("hidden");
            }
        });

        const sliderItems = document.querySelectorAll('.slider-item');

        console.log(sliderItems)
        let currentSlide = 0;
        const totalSlides = @json(isset($data) && $data->images ? count($data->images) : 0);

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function nextSlide() {
            console.log("clicked");
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function updateSlider() {
            sliderItems.forEach((item, index) => {
                item.style.display = index === currentSlide ? 'block' : 'none';
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const cardButtons = document.querySelectorAll(".card .dot-menu");

            cardButtons.forEach(function(button) {
                const dropdown = button.nextElementSibling; // Use nextElementSibling to target the dropdown
                button.addEventListener("click", function() {
                    dropdown.classList.toggle("hidden");
                    button.classList.add("flex");
                });

                // Close dropdown when clicking outside
                document.addEventListener("click", function(event) {
                    if (!dropdown.contains(event.target) && event.target !== button && !button
                        .contains(event.target)) {
                        dropdown.classList.add("hidden");
                    }
                });
            });
        });
    </script>
@endsection
