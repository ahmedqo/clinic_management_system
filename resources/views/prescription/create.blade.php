@extends('shared.admin.base')
@section('title', __('Create Prescription'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Create Prescription') }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <button id="save"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-purple-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-purple-300 focus-within:!text-x-black focus-within:bg-purple-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M190-99q-37.125 0-64.062-26.938Q99-152.875 99-190v-580q0-37.125 26.938-64.562Q152.875-862 190-862h464q18.816 0 36.024 7.543Q707.232-846.913 719-834l115 115q12.913 11.768 20.457 28.976Q862-672.816 862-654v464q0 37.125-27.438 64.062Q807.125-99 770-99H190Zm289.647-157Q522-256 552-285.647q30-29.647 30-72T552.353-430q-29.647-30-72-30T408-430.353q-30 29.647-30 72T407.647-286q29.647 30 72 30ZM290-577h263q18.375 0 31.688-12.625Q598-602.25 598-623v-48q0-19.775-13.312-32.388Q571.375-716 553-716H290q-20.75 0-33.375 12.612Q244-690.775 244-671v48q0 20.75 12.625 33.375T290-577Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Save') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
            <form id="form" action="{{ route('actions.prescriptions.create') }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                @csrf
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="patient" class="text-x-black font-x-core text-sm">{{ __('Patient') }}</label>
                    <select x-select search id="patient" name="patient" placeholder="{{ __('Patient') }}"
                        {{ request()->get('patient') ? 'x-disabled' : '' }}>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ request()->get('patient') == $patient->id ? 'selected' : '' }}>
                                {{ strtoupper($patient->last_name) }} {{ ucfirst($patient->first_name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="type" class="text-x-black font-x-core text-sm">{{ __('Items') }}</label>
                    <div class="bg-x-light border-x-shade border rounded-md w-full overflow-auto">
                        <table class="w-max min-w-full">
                            <thead>
                                <tr>
                                    <td class="text-x-black text-sm font-x-core p-2">{{ __('Type') }}</td>
                                    <td class="text-x-black text-sm font-x-core p-2">{{ __('Content') }}</td>
                                    <td class="text-x-black text-sm font-x-core p-2">{{ __('Note') }}</td>
                                    <td class="text-x-black text-sm font-x-core p-2 w-[80px]"></td>
                                </tr>
                            </thead>
                            <tbody id="row_display">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col gap-4 lg:flex-row lg:flex-wrap lg:col-span-6">
                    <div class="lg:flex-1">
                        <select x-select search id="row_type" placeholder="{{ __('Type') }}">
                            @foreach (Core::prescription() as $type)
                                <option value="{{ $type }}">
                                    {{ ucwords(__($type)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:flex-1">
                        <input id="row_content" placeholder="{{ __('Content') }}"
                            class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="lg:flex-[2]">
                        <input id="row_note" placeholder="{{ __('Note') }}"
                            class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <button type="button" onclick="addRow()"
                        class="lg:w-[80px] flex gap-2 items-center justify-center font-x-core text-sm rounded-md bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="note" class="text-x-black font-x-core text-sm">{{ __('Note') }}</label>
                    <textarea id="note" name="note" placeholder="{{ __('Note') }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 min-h-[140px]"></textarea>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        x.Select();
        const save = document.querySelector("#save"),
            form = document.querySelector("#form");
        save.addEventListener("click", e => {
            form.submit();
        });

        const [addRow] = prescriptionItemRow({
            display: "#row_display",
            content: "#row_content",
            type: "#row_type",
            note: "#row_note",
        });
    </script>
@endsection
