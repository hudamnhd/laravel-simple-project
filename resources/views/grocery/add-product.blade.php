@extends('layouts.master')
@section('title', 'Add Product')
@section('content')

    <form id="myForm" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data"
        class="relative m-5 mx-auto w-fit rounded-xl border px-8 py-6 shadow-md">
        @csrf

        <h1 class="mb-4 text-xl font-medium">Add Data Product</h1>

        <label for="title" class="mb-2 block text-sm font-medium text-gray-600">Title :</label>
        <input
            class="mb-4 block w-full rounded-md border-[1px] border-[#DADADA] px-3 py-2 ring-blue-500 focus:outline-none focus:ring-1 sm:w-[350px]"
            name="title" placeholder="Produk Title" required>
        <div class="mb-4 max-w-[600px]" x-data="{ message: '', characterCount: 0, remainingCharacters: 5000 }">
            <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Description :</label>
            <textarea
                class="w-full resize-none rounded-md border border-gray-300 px-2 py-1 shadow-md ring-blue-500 ring-gray-300 focus:outline-none focus:ring-1"
                rows="4" name="overview" placeholder="Description" x-model="message"
                @input="characterCount = message.length; remainingCharacters = 5000 - characterCount" required></textarea>
            <p class="mr-2 mt-1 text-end text-xs text-gray-500">
                <span x-text="remainingCharacters"></span>
                Karakter
            </p>
        </div>
        <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Category :</label>
        <div class="mb-8 pl-2">
            @php
                $category = $data->category ?? []; // Assuming $data->category contains the previously checked item IDs during editing
            @endphp

            <div class="mb-2 flex items-center gap-2">
                <input type="checkbox" id="item-1" name="category[]" value="Buah Segar"
                    @if (in_array('Buah Segar', $category)) checked @endif
                    class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                <label for="item-1" class="text-sm">Buah Segar</label>
            </div>

            <div class="mb-2 flex items-center gap-2">
                <input type="checkbox" id="item-2" name="category[]" value="Sayur Segar"
                    @if (in_array('Sayur Segar', $category)) checked @endif
                    class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                <label for="item-2" class="text-sm">Sayur Segar</label>
            </div>

            <div class="mb-2 flex items-center gap-2">
                <input type="checkbox" id="item-3" name="category[]" value="Buah Organik"
                    @if (in_array('Buah Organik', $category)) checked @endif
                    class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                <label for="item-3" class="text-sm">Buah Organik</label>
            </div>

            <div class="mb-2 flex items-center gap-2">
                <input type="checkbox" id="item-4" name="category[]" value="Sayur Organik"
                    @if (in_array('Sayur Organik', $category)) checked @endif
                    class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                <label for="item-4" class="text-sm">Sayur Organik</label>
            </div>

            <div class="mb-2 flex items-center gap-2">
                <input type="checkbox" id="item-5" name="category[]" value="Buah Tropis"
                    @if (in_array('Buah Tropis', $category)) checked @endif
                    class="h-4 w-4 rounded border-2 border-[#3D56F5] bg-[#F3F3FE] text-[#3D56F5] focus:outline-none">
                <label for="item-5" class="text-sm">Buah Tropis</label>
            </div>
        </div>

        <label for="overview" class="mb-2 block text-sm font-medium text-gray-600">Price :</label>
        <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-center">
            <span class="flex flex-1 flex-wrap gap-2">
                <div class="flex w-full md:w-fit">
                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 px-3 text-sm">
                        IDR
                    </span>
                    <input type="number" name="priceTextValue"
                        class="block w-full flex-1 rounded-none rounded-r-lg border border-gray-300 p-2 text-gray-900"
                        placeholder="0" required>
                </div>
                <button id="dropdownTipeBudgetButtonFirst" data-dropdown-toggle="dropdownTipeBudgetFirst"
                    class="block inline-flex h-fit w-full items-center justify-between rounded-lg border border-[#DADADA] px-4 py-2 text-center font-medium text-[#37474F] focus:border-blue-500 focus:ring-blue-500 md:w-[180px]"
                    type="button">
                    <input placeholder="KG" value="KG" readonly class="w-[100px] cursor-pointer focus:outline-none"
                        name="selectBudget" id="textTipeBudgetButtonFirst" required>
                    <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                @include('grocery.dropdown')
            </span>
        </div>

        <div class="mb-4 flex gap-2">
            <div id="filePreviewContainerFirst"
                class="relative max-h-[100px] max-h-[150px] max-w-[100px] sm:max-w-[150px] md:max-h-[200px] md:max-w-[200px]">
                <label id="labelInputFirst"
                    class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]">
                    <div
                        class="flex h-[50px] w-[50px] items-center justify-center rounded-full border border-[#2264D1] p-1">
                        <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" />
                    </div>
                    <input type="file" id="fileInputFirst" class="imageInput disabled hidden" name="image[]"
                        accept="image/*">
                </label>
                <img id="previewImageFirst" src="#" alt="Preview"
                    class="flex h-[100px] w-fit cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] md:h-[200px]"
                    style="display: none;">
                <button type="button" id="deleteButtonFirst" style="display: none;"
                    class="absolute right-2 top-1.5 w-8 rounded rounded-full border-[1px] border-blue-500 bg-white p-1.5 duration-300 hover:scale-110 sm:top-3 md:w-10">
                    <img src="{{ url('/assets/icon/trashap.svg') }}" alt="addproduk" /></button>
            </div>

            <div id="filePreviewContainerSecond"
                class="relative max-h-[100px] max-h-[150px] max-w-[100px] sm:max-w-[150px] md:max-h-[200px] md:max-w-[200px]">
                <label id="labelInputSecond"
                    class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]">
                    <div
                        class="flex h-[50px] w-[50px] items-center justify-center rounded-full border border-[#2264D1] p-1">
                        <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" />
                    </div>
                    <input type="file" id="fileInputSecond" class="imageInput disabled hidden" name="image2[]"
                        accept="image/*">
                </label>
                <img id="previewImageSecond" src="#" alt="Preview"
                    class="flex h-[100px] w-fit cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] md:h-[200px]"
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
    <script>
        {{-- Validasi checkboxes and image --}}
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            const checkboxes = document.querySelectorAll('input[name="category[]"]');
            const fileInputFirst = document.getElementById('fileInputFirst');
            const imageInputs = document.querySelectorAll('.imageInput');
            form.addEventListener("submit", function(event) {
                let checkedCount = 0;
                let imageCount = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checkedCount++;
                    }
                });

                if (checkedCount === 0) {
                    event.preventDefault();
                    alert("Minimal harus memilih satu kategori.");
                }
                imageInputs.forEach(function(input) {
                    if (input.files.length > 0) {
                        // Gambar diunggah pada input ini
                        imageCount++;
                    }
                });

                if (imageCount === 0) {
                    event.preventDefault();
                    alert("Anda harus mengunggah setidaknya satu gambar sebelum mengirim formulir.");
                }
            });
        });

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
{{-- <div id="filePreviewContainerThird" class="relative max-w-[100px] max-h-[100px] sm:max-w-[150px] max-h-[150px] md:max-w-[200px] md:max-h-[200px]"> --}}
{{--     <label id="labelInputThird" class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]"> --}}
{{--         <div --}}
{{--             class="flex h-[50px] w-[50px] items-center justify-center rounded-full border border-[#2264D1] p-1"> --}}
{{--             <Image src="{{ url('/assets/icon/plus.svg') }}" width="36" alt="plus" /> --}}
{{--         </div> --}}
{{--         <input type="file" id="fileInputThird" class="imageInput disabled hidden" name="image3[]" --}}
{{--             accept="image/*"> --}}
{{--     </label> --}}
{{--     <img id="previewImageThird" src="#" alt="Preview" class="flex h-[100px] w-[100px] cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-[#2264D1] bg-gray-50 sm:h-[150px] sm:w-[150px] md:h-[200px] md:w-[200px]" style="display: none;"> --}}
{{--     <button type="button" id="deleteButtonThird" style="display: none;" class="w-8 md:w-10 absolute right-2 top-1.5 sm:top-3 rounded rounded-full border-[1px] border-blue-500 bg-white p-1.5 duration-300 hover:scale-110"> --}}
{{--         <img src="{{ url('/assets/icon/trashap.svg') }}" alt="addproduk" /></button> --}}
{{-- </div> --}}
