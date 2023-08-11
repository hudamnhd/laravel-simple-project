@extends('layouts.master')
@section('title', 'Edit Product')
@section('content')

    <form action="{{ route('product.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data"
        class="relative m-5 mx-auto w-fit rounded-xl border px-8 py-6 shadow-md">
        @csrf
        @method('PUT')
        <h1 class="text-xl font-medium">Edit Data Product</h1>
        <span class="mb-4 block text-sm font-medium text-gray-500">Last Update :
            {{ $data->updated_at->format('d-m-Y') }}
        </span>

        <label for="title" class="mb-2 block text-sm font-medium text-gray-600">Title :</label>
        <input
            class="mb-4 block w-full rounded-md border-[1px] border-[#DADADA] px-3 py-2 ring-blue-500 focus:outline-none focus:ring-1 sm:w-[350px]"
            name="title" placeholder="Produk Title" value="{{ $data->title }}" required>

        <div class="max-w-[600px]" x-data="{ message: '{{ $data->overview }}', characterCount: 0, remainingCharacters: 5000 }">
            <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Description :</label>
            <textarea
                class="w-full resize-none rounded-md border border-gray-300 px-2 py-1 shadow-md ring-blue-500 ring-gray-300 focus:outline-none focus:ring-1"
                rows="4" name="overview" placeholder="Description" x-model="message"
                @input="characterCount = message.length; remainingCharacters = 5000 - characterCount"></textarea>
            <p class="mr-2 mt-1 text-end text-xs text-gray-500">
                <span x-text="remainingCharacters"></span>
                Karakter
            </p>
        </div>

        <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Category :</label>
        <div class="mb-8 pl-2">
            @php
                $category = $data->category ?? []; // Assuming $data->category contains the previously checked item IDs during editing
                $items = [
                    ['id' => 'item-1', 'value' => 'Buah Segar', 'label' => 'Buah Segar'], //
                    ['id' => 'item-2', 'value' => 'Sayur Segar', 'label' => 'Sayur Segar'],
                    ['id' => 'item-3', 'value' => 'Buah Organik', 'label' => 'Buah Organik'],
                    ['id' => 'item-4', 'value' => 'Sayur Organik', 'label' => 'Sayur Organik'],
                    ['id' => 'item-5', 'value' => 'Buah Tropis', 'label' => 'Buah Tropis'],
                ];
            @endphp
            @foreach ($items as $item)
                <div class="mb-2 flex items-center gap-2">
                    <input type="checkbox" id="{{ $item['id'] }}" name="category[]" value="{{ $item['value'] }}"
                        @if (in_array($item['value'], $category)) checked @endif
                        class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                    <label for="{{ $item['id'] }}" class="text-sm">{{ $item['label'] }}</label>
                </div>
            @endforeach
        </div>

        <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Price :</label>
        <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-center">
            <span class="flex flex-wrap gap-2">
                <div class="flex w-full shadow-md md:w-fit">
                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 px-3 text-sm">
                        IDR
                    </span>
                    <input type="number" name="priceTextValue" value="{{ $data->priceTextValue }}"
                        class="block w-full flex-1 rounded-none rounded-r-lg border border-gray-300 p-2 text-gray-900"
                        placeholder="0" />
                </div>
            </span>

            <button id="dropdownTipeBudgetButtonFirst" data-dropdown-toggle="dropdownTipeBudgetFirst"
                class="block inline-flex h-fit w-full items-center justify-between rounded-lg border border-[#DADADA] px-4 py-2 text-center font-medium text-[#37474F] shadow-md focus:border-blue-500 focus:ring-blue-500 md:w-[180px]"
                type="button">
                <input value="{{ $data->selectBudget }}" readonly class="w-[100px] cursor-pointer focus:outline-none"
                    name="selectBudget" id="textTipeBudgetButtonFirst">
                <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            @include('grocery.dropdown')
        </div>

        <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Product Images :</label>
        <div class="mb-4 flex gap-2">
            <div id="filePreviewContainerFirst"
                class="relative max-h-[100px] max-h-[150px] max-w-[100px] shadow-md sm:max-w-[150px] md:max-h-[200px] md:max-w-[200px]">
                <label id="labelInputFirst"
                    class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]">
                    @if (isset($data->images[0]))
                        <img src="{{ asset('assets/image/' . $data->images[0]) }}" alt="Image" class="object-cover p-1">
                        <div
                            class="absolute right-3 top-3 flex h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100">
                            <svg class="h-[20px] w-[20px]" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </div>
                    @else
                        <div
                            class="mb-2 h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100">
                            <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" />
                        </div>
                        <p class="px-2 text-[#2264D1]">No image available.</p>
                    @endif

                    <input type="file" id="fileInputFirst" class="disabled hidden" name="image[]" accept="image/*">
                </label>
                <img id="previewImageFirst" src="#" alt="Preview"
                    class="flex h-[100px] w-fit cursor-pointer flex-col items-center justify-center rounded-lg sm:h-[150px] md:h-[200px]"
                    style="display: none;">
                <button type="button" id="deleteButtonFirst" style="display: none;"
                    class="absolute right-2 top-1.5 w-8 rounded rounded-full border-[1px] border-blue-500 bg-white p-1.5 duration-300 hover:scale-110 sm:top-3 md:w-10">
                    <img src="{{ url('/assets/icon/trashap.svg') }}" alt="addproduk" /></button>
            </div>

            <div id="filePreviewContainerSecond"
                class="relative max-h-[100px] max-h-[150px] max-w-[100px] shadow-md sm:max-w-[150px] md:max-h-[200px] md:max-w-[200px]">
                <label id="labelInputSecond"
                    class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]">
                    @if (isset($data->images[1]))
                        <img src="{{ asset('assets/image/' . $data->images[1]) }}" alt="Image"
                            class="object-cover p-1">
                        <div
                            class="absolute right-3 top-3 flex h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100">
                            <svg class="h-[20px] w-[20px]" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </div>
                    @else
                        <div
                            class="mb-2 h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100">
                            <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" />
                        </div>
                        <p class="px-2 text-[#2264D1]">No image available.</p>
                    @endif

                    <input type="file" id="fileInputSecond" class="disabled hidden" name="image2[]"
                        accept="image/*">
                </label>
                <img id="previewImageSecond" src="#" alt="Preview"
                    class="flex h-[100px] w-fit cursor-pointer flex-col items-center justify-center rounded-lg sm:h-[150px] md:h-[200px]"
                    style="display: none;">
                <button type="button" id="deleteButtonSecond" style="display: none;"
                    class="absolute right-2 top-1.5 w-8 rounded rounded-full border-[1px] border-blue-500 bg-white p-1.5 duration-300 hover:scale-110 sm:top-3 md:w-10">
                    <img src="{{ url('/assets/icon/trashap.svg') }}" alt="addproduk" /></button>
            </div>
        </div>
        <div class="flex gap-2">
            <a class="btn_secondary" href="/grocery">Back</a>
            <button class="btn_primary" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
    </div>

    <script>
        function previewImageFirst() {
            const fileInputFirst = document.getElementById('fileInputFirst');
            const labelInputFirst = document.getElementById('labelInputFirst');
            const previewImageFirst = document.getElementById('previewImageFirst');
            const deleteButtonFirst = document.getElementById('deleteButtonFirst');
            const file = fileInputFirst.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    previewImageFirst.src = reader.result;
                    previewImageFirst.style.display = 'block';
                    labelInputFirst.style.display = 'none';
                    deleteButtonFirst.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                previewImageFirst.src = '#';
                previewImageFirst.style.display = 'none';
            }
        }

        function deleteFileFirst() {
            console.log(labelInputFirst)
            const fileInputFirst = document.getElementById('fileInputFirst');
            fileInputFirst.value = null;
            labelInputFirst.style.display = 'inline-flex';
            deleteButtonFirst.style.display = 'none';
            previewImageFirst();
        }
        // Attach event listener to input file
        document.getElementById('fileInputFirst').addEventListener('change', previewImageFirst);
        document.getElementById('deleteButtonFirst').addEventListener('click', deleteFileFirst);

        function previewImageSecond() {
            const fileInputSecond = document.getElementById('fileInputSecond');
            const labelInputSecond = document.getElementById('labelInputSecond');
            const previewImageSecond = document.getElementById('previewImageSecond');
            const deleteButtonSecond = document.getElementById('deleteButtonSecond');
            const file = fileInputSecond.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    previewImageSecond.src = reader.result;
                    previewImageSecond.style.display = 'block';
                    labelInputSecond.style.display = 'none';
                    deleteButtonSecond.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                previewImageSecond.src = '#';
                previewImageSecond.style.display = 'none';
            }
        }

        function deleteFileSecond() {
            const fileInputSecond = document.getElementById('fileInputSecond');
            fileInputSecond.value = null;
            console.log(fileInputSecond.value)
            labelInputSecond.style.display = 'inline-flex';
            deleteButtonSecond.style.display = 'none';
            previewImageSecond();
        }
        // Attach event listener to input file
        document.getElementById('fileInputSecond').addEventListener('change', previewImageSecond);
        document.getElementById('deleteButtonSecond').addEventListener('click', deleteFileSecond);

        let
            jumlahBudgetFirst,
            tipeBudgetFirst = "KG";

        function setTipeDurasi(tipe) {
            button = document.getElementById("dropdownTipeDurasiButtonFirst");
            textButton = document.getElementById("textTipeDurasiButtonFirst");
            textButton.innerText = tipe;
            tipeDurasi = tipe;
            button.click();
        }

        function setSatuanFirst(tipe) {
            console.log(tipe)
            button = document.getElementById("dropdownTipeBudgetButtonFirst");
            textButton = document.getElementById("textTipeBudgetButtonFirst");
            textButton.value = tipe;
            tipeBudgetx = tipe;
            button.click();
        }

        function savebudget() {
            jumlahBudgetInputx = document.getElementById("jumlahBudgetInputFirst");
            textTipeBudgetx = document.getElementById("textTipeBudgetFirst");
            textJumlahBudgetx = document.getElementById("textJumlahBudgetFirst");

            if (jumlahBudgetInputx.value > 0) {
                budget = parseInt(jumlahBudgetInputx.value);
                textJumlahBudgetx.innerText = budget
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                textTipeBudgetx.innerText = tipeBudgetx;
            } else {
                textJumlahBudgetx.innerText = 0;
                jumlahBudgetInputx.value = 0;
            }
        }
        {{--
        function previewImageThird() {
            const fileInputThird = document.getElementById('fileInputThird');
            const labelInputThird = document.getElementById('labelInputThird');
            const previewImageThird = document.getElementById('previewImageThird');
            const deleteButtonThird = document.getElementById('deleteButtonThird');
            const file = fileInputThird.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    previewImageThird.src = reader.result;
                    previewImageThird.style.display = 'block';
                    labelInputThird.style.display = 'none';
                    deleteButtonThird.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                previewImageThird.src = '#';
                previewImageThird.style.display = 'none';
            }
        }

        function deleteFileThird() {
            const fileInputThird = document.getElementById('fileInputThird');
            fileInputThird.value = null;
            console.log(fileInputThird.value)
            labelInputThird.style.display = 'inline-flex';
            deleteButtonThird.style.display = 'none';
            previewImageThird();
        }
        // Attach event listener to input file
        document.getElementById('fileInputThird').addEventListener('change', previewImageThird);
        document.getElementById('deleteButtonThird').addEventListener('click', deleteFileThird);
    --}}
    </script>
@endsection

{{-- <div id="filePreviewContainerThird" class="relative max-w-[100px] max-h-[100px] sm:max-w-[150px] max-h-[150px] md:max-w-[200px] md:max-h-[200px] shadow-md"> --}}
{{--     <label id="labelInputThird" class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]"> --}}
{{--         @if (isset($data->images[2])) --}}
{{--             <img src="{{ asset('assets/image/' . $data->images[2]) }}" alt="Image" --}}
{{--                 class="object-cover p-1"> --}}
{{--             <div --}}
{{--                 class="absolute right-3 top-3 flex h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100"> --}}
{{--                 <svg class="h-[20px] w-[20px]" fill="none" stroke="currentColor" --}}
{{--                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" --}}
{{--                     xmlns="http://www.w3.org/2000/svg"> --}}
{{--                     <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" /> --}}
{{--                     <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /> --}}
{{--                 </svg> --}}
{{-- --}}
{{--             </div> --}}
{{--         @else --}}
{{--             <div --}}
{{--                 class="mb-2 h-[40px] w-[40px] items-center justify-center rounded-full border border-[#2264D1] bg-white p-1 text-[#2264D1] hover:bg-blue-100"> --}}
{{--                 <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" /> --}}
{{--             </div> --}}
{{--             <p class="px-2 text-[#2264D1]">No image available.</p> --}}
{{--         @endif --}}
{{-- --}}
{{--         <input type="file" id="fileInputThird" class="disabled hidden" name="image3[]" --}}
{{--             accept="image/*"> --}}
{{--     </label> --}}
{{--     <img id="previewImageThird" src="#" alt="Preview" class="flex h-[100px] sm:h-[150px] md:h-[200px] w-fit cursor-pointer flex-col items-center justify-center rounded-lg" --}}
{{--         style="display: none;"> --}}
{{--     <button type="button" id="deleteButtonThird" style="display: none;" class="w-8 md:w-10 absolute right-2 top-1.5 sm:top-3 rounded rounded-full border-[1px] border-blue-500 bg-white p-1.5 duration-300 hover:scale-110"> --}}
{{--         <img src="{{ url('/assets/icon/trashap.svg') }}" alt="addproduk" /></button> --}}
{{-- </div> --}}
