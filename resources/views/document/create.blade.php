@extends('shared.admin.base')
@section('title', __('Upload Documents'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Upload Documents') }}</h1>
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
            <form id="form" action="{{ route('actions.documents.create') }}" method="POST"
                enctype="multipart/form-data" class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                @csrf
                <div class="flex flex-col gap-px lg:col-span-3">
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
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="type" class="text-x-black font-x-core text-sm">{{ __('Type') }}</label>
                    <select x-select search id="type" name="type" placeholder="{{ __('Type') }}">
                        @foreach (Core::document() as $type)
                            <option value="{{ $type }}">
                                {{ ucwords(__($type)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="content" class="text-x-black font-x-core text-sm">{{ __('Documents') }}</label>
                    <div
                        class="bg-x-light border border-x-shade text-x-black rounded-md overflow-hidden focus-within:outline-x-prime focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">
                        <div class="relative w-full">
                            <input id="documents" type="file" tabindex="-1"
                                class="opacity-0 block absolute top-0 left-0 w-full h-full cursor-pointer"
                                name="documents[]" onchange="upload(this)" multiple />
                            <input readonly id="display" type="text" placeholder="{{ __('Documents') }}"
                                class="bg-transparent text-x-black text-base rounded-md block w-full pr-10 p-2 outline-none" />
                            <svg class="block w-5 h-5 text-x-black pointer-events-none absolute right-2 top-1/2 -translate-y-1/2"
                                fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M480.009-335q-19.641 0-32.825-13.312Q434-361.625 434-380v-311l-82 82q-13 12-31.511 12.5t-30.409-13.42Q276-623.133 276-642.067 276-661 290-676l158-158q6.167-4.909 14.532-8.955Q470.898-847 479.744-847q8.847 0 17.601 3.864Q506.1-839.273 512-834l159 160q14 13 13.5 32t-13.63 32.13q-12.137 13.101-31.003 12.485Q621-598 607-611l-82-80v311q0 18.375-12.675 31.688Q499.649-335 480.009-335ZM205-116q-36.05 0-63.525-26.897T114-208.5V-350q0-18.8 13.56-32.4 13.559-13.6 32.3-13.6 20.14 0 32.64 13.6t12.5 32.297V-208h549v-142.103q0-18.697 12.86-32.297 12.859-13.6 32.5-13.6Q819-396 832-382.4t13 32.297V-208q0 38.5-28 65.25T754-116H205Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="items"
                    class="lg:col-span-6 flex-col rounded-md bg-x-light border border-x-shade overflow-hidden hidden">
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

        const DATA = new DataTransfer();
        const doc = document.querySelector('#documents');
        const dis = document.querySelector('#display');
        dis.addEventListener("click", () => doc.click());
        dis.addEventListener("keydown", (e) => {
            if (e.keyCode === 13) doc.click();
        });

        function upload(e) {
            for (const file of e.files) {
                const top = document.querySelector("#items").innerHTML.trim();
                DATA.items.add(file);
                document.querySelector("#items").insertAdjacentHTML('afterbegin', `
                    <div class="data-doc flex flex-wrap gap-2 items-center justify-between p-2 border-x-shade border-t">
                        <div class="block flex-1 text-base truncate text-ellipsis overflow-hidden">
                            ${file.name}
                        </div>
                        <button data-file type="button" onclick="remove(event)"
                            class="flex p-1 items-center rounded-md text-red-400  focus-within:outline-red-400 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                        </button>
                    </div>
                `);
            }
            e.files = DATA.files;
            rename();
        }

        function remove(e) {
            const files = [...document.querySelectorAll("[data-file]")];
            const index = files.indexOf(e.target);
            DATA.items.remove(index);
            e.target.parentElement.remove();
            document.querySelector('#documents').files = DATA.files;
            rename();
        }

        function rename() {
            const items = document.querySelector("#items");
            document.querySelector("#display").value = (!DATA.files.length) ?
                "" : DATA.files.length + " Files selected";
            if (!DATA.files.length) {
                items.classList.remove("flex");
                items.classList.add("hidden");
            } else {
                items.classList.remove("hidden");
                items.classList.add("flex");
            }
        }
    </script>
@endsection
