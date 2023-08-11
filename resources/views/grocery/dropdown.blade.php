<!-- Dropdown tipe budget -->
<div id="dropdownTipeBudgetFirst"
    class="z-10 hidden w-fit divide-y divide-gray-100 rounded-lg border border-[#DADADA] bg-white shadow-lg md:w-[210px]">
    @php
        $satuanOptions = [
            'berat' => [
                'KG' => 'KG',
                'HG' => 'HG',
                'DAG' => 'DAG',
                'G' => 'G',
                'DG' => 'DG',
                'CG' => 'CG',
                'MG' => 'MG',
            ],
            'panjang' => [
                'KM' => 'KM',
                'HM' => 'HM',
                'DAM' => 'DAM',
                'M' => 'M',
                'DM' => 'DM',
                'CM' => 'CM',
                'MM' => 'MM',
            ],
            'liter' => [
                'KL' => 'KL',
                'HL' => 'HL',
                'DAL' => 'DAL',
                'L' => 'L',
                'DL' => 'DL',
                'CL' => 'CL',
                'ML' => 'ML',
            ],
            'bebas' => [
                'Lembar' => 'Lembar',
                'Botol' => 'Botol',
                'Piece' => 'Piece',
                'Unit' => 'Unit',
                'Pasang' => 'Pasang',
                'Pack' => 'Pack',
                'Ton' => 'Ton',
            ],
        ];
    @endphp

    <ul class="py-2 text-[#37474F]" aria-labelledby="dropdownTipeBudgetButtonFirst">
        <!-- Berat Dropdown -->
        <li>
            <button id="beratDropdownButtonFirst" data-dropdown-toggle="beratDropdownFirst" data-dropdown-placement="right"
                type="button" class="flex w-full items-center justify-between px-4 py-2 hover:bg-[#F6D10080]">
                Satuan Berat
                <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </button>
            <div id="beratDropdownFirst" class="z-10 hidden w-fit divide-y divide-gray-100 rounded-lg bg-white shadow">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="beratDropdownButtonFirst">
                    @foreach ($satuanOptions['berat'] as $key => $value)
                        <li>
                            <div class="block cursor-pointer px-4 py-2 hover:bg-[#F6D10080]"
                                onclick="setSatuanFirst('{{ $value }}')">
                                {{ $value }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <!-- Panjang Dropdown -->
        <li>
            <button id="panjangDropdownButtonFirst" data-dropdown-toggle="panjangDropdownFirst"
                data-dropdown-placement="right" type="button"
                class="flex w-full items-center justify-between px-4 py-2 hover:bg-[#F6D10080]">
                Satuan Panjang
                <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </button>
            <div id="panjangDropdownFirst"
                class="z-10 hidden w-fit divide-y divide-gray-100 rounded-lg bg-white shadow">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="panjangDropdownButtonFirst">
                    @foreach ($satuanOptions['panjang'] as $key => $value)
                        <li>
                            <div class="block cursor-pointer px-4 py-2 hover:bg-[#F6D10080]"
                                onclick="setSatuanFirst('{{ $value }}')">
                                {{ $value }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <!-- Liter Dropdown -->
        <li>
            <button id="literDropdownButtonFirst" data-dropdown-toggle="literDropdownFirst"
                data-dropdown-placement="right" type="button"
                class="flex w-full items-center justify-between px-4 py-2 hover:bg-[#F6D10080]">
                Satuan liter
                <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </button>
            <div id="literDropdownFirst" class="z-10 hidden w-fit divide-y divide-gray-100 rounded-lg bg-white shadow">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="literDropdownButtonFirst">
                    @foreach ($satuanOptions['liter'] as $key => $value)
                        <li>
                            <div class="block cursor-pointer px-4 py-2 hover:bg-[#F6D10080]"
                                onclick="setSatuanFirst('{{ $value }}')">
                                {{ $value }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <!-- Bebas Dropdown -->
        <li>
            <button id="bebasDropdownButtonFirst" data-dropdown-toggle="bebasDropdownFirst"
                data-dropdown-placement="right" type="button"
                class="flex w-full items-center justify-between px-4 py-2 hover:bg-[#F6D10080]">
                Satuan bebas
                <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </button>
            <div id="bebasDropdownFirst" class="z-10 hidden w-fit divide-y divide-gray-100 rounded-lg bg-white shadow">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="bebasDropdownButtonFirst">
                    @foreach ($satuanOptions['bebas'] as $key => $value)
                        <li>
                            <div class="block cursor-pointer px-4 py-2 hover:bg-[#F6D10080]"
                                onclick="setSatuanFirst('{{ $value }}')">
                                {{ $value }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <!-- ... -->
    </ul>
</div>
