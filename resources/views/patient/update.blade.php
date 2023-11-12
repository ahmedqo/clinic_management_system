@extends('shared.admin.base')
@section('title', __('Update Patient') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Update Patient') }} #{{ $data->id }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <a href="{{ route('actions.patients.delete', $data->id) }}"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-red-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-red-300 focus-within:!text-x-black focus-within:bg-red-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Delete') }}</span>
                        </a>
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
            <form id="form" action="{{ route('actions.patients.update', $data->id) }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                @csrf
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="first_name" class="text-x-black font-x-core text-sm">{{ __('First Name') }}</label>
                    <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                        value="{{ $data->first_name }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="last_name" class="text-x-black font-x-core text-sm">{{ __('Last Name') }}</label>
                    <input id="last_name" type="text" name="last_name" placeholder="{{ __('Last Name') }}"
                        value="{{ $data->last_name }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="gender" class="text-x-black font-x-core text-sm">{{ __('Gender') }}</label>
                    <select x-select id="gender" name="gender" placeholder="{{ __('Gender') }}">
                        @foreach (Core::gender() as $gender)
                            <option value="{{ $gender }}" {{ $gender == $data->gender ? 'selected' : '' }}>
                                {{ ucwords(__($gender)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="birth_date" class="text-x-black font-x-core text-sm">{{ __('Birth Date') }}</label>
                    <input x-date id="birth_date" type="text" name="birth_date" placeholder="{{ __('Birth Date') }}"
                        value="{{ $data->birth_date }}" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="nationality" class="text-x-black font-x-core text-sm">{{ __('Nationality') }}</label>
                    <input id="nationality" type="text" name="nationality" placeholder="{{ __('Nationality') }}"
                        value="{{ $data->nationality }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="identity" class="text-x-black font-x-core text-sm">{{ __('Identity') }}</label>
                    <input id="identity" type="text" name="identity" placeholder="{{ __('Identity') }}"
                        value="{{ $data->identity }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="insurance_provider"
                        class="text-x-black font-x-core text-sm">{{ __('Insurance Provider') }}</label>
                    <input id="insurance_provider" type="text" name="insurance_provider"
                        placeholder="{{ __('Insurance Provider') }}" value="{{ $data->insurance_provider }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="insurance_number"
                        class="text-x-black font-x-core text-sm">{{ __('Insurance Number') }}</label>
                    <input id="insurance_number" type="text" name="insurance_number"
                        placeholder="{{ __('Insurance Number') }}" value="{{ $data->insurance_number }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="email" class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" placeholder="{{ __('Email') }}"
                        value="{{ $data->email }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="phone" class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                    <input id="phone" type="tel" name="phone" placeholder="{{ __('Phone') }}"
                        value="{{ $data->phone }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="address" class="text-x-black font-x-core text-sm">{{ __('Address') }}</label>
                    <input id="address" type="text" name="address" placeholder="{{ __('Address') }}"
                        value="{{ $data->address }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="state" class="text-x-black font-x-core text-sm">{{ __('State') }}</label>
                    <input id="state" type="text" name="state" placeholder="{{ __('State') }}"
                        value="{{ $data->state }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="city" class="text-x-black font-x-core text-sm">{{ __('City') }}</label>
                    <input id="city" type="text" name="city" placeholder="{{ __('City') }}"
                        value="{{ $data->city }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label for="zipcode" class="text-x-black font-x-core text-sm">{{ __('Zipcode') }}</label>
                    <input id="zipcode" type="number" name="zipcode" placeholder="{{ __('Zipcode') }}"
                        value="{{ $data->zipcode }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label class="text-x-black font-x-core text-sm">{{ __('Contacts') }}</label>
                    <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4 lg:gap-[5px]">
                        <div class="bg-x-light border-x-shade border rounded-md w-full overflow-auto lg:col-span-6">
                            <table class="w-max min-w-full">
                                <thead>
                                    <tr>
                                        <td class="text-x-black text-sm font-x-core p-2">
                                            {{ __('First Name') }}
                                        </td>
                                        <td class="text-x-black text-sm font-x-core p-2">
                                            {{ __('Last Name') }}
                                        </td>
                                        <td class="text-x-black text-sm font-x-core p-2">{{ __('Phone') }}</td>
                                        <td class="text-x-black text-sm font-x-core p-2">{{ __('Email') }}</td>
                                        <td class="text-x-black text-sm font-x-core p-2 w-[80px]"></td>
                                    </tr>
                                </thead>
                                <tbody id="contact_display">
                                    @foreach ($data->contacts() as $item)
                                        <tr class="border-[#d1d1d1] border-t">
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->first_name }}
                                            </td>
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->last_name }}
                                            </td>
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->phone }}
                                            </td>
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->email ?? '__' }}
                                            </td>
                                            <td class="p-2">
                                                <button type="button" onclick="removeContactRow(event)"
                                                    data-index="{{ $item->id }}"
                                                    class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                                                    <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor"
                                                        viewBox="0 -960 960 960">
                                                        <path
                                                            d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-col gap-4 lg:gap-[5px] lg:flex-row lg:flex-wrap lg:col-span-6">
                            <div class="lg:flex-1">
                                <input id="contact_first" placeholder="{{ __('First Name') }}"
                                    class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            </div>
                            <div class="lg:flex-1">
                                <input id="contact_last" placeholder="{{ __('Last Name') }}"
                                    class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            </div>
                            <div class="lg:flex-1">
                                <input id="contact_phone" type="tel" placeholder="{{ __('Phone') }}"
                                    class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            </div>
                            <div class="lg:flex-1">
                                <input id="contact_email" type="email" placeholder="{{ __('Email') }}"
                                    class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            </div>
                            <button type="button" onclick="addContactRow()"
                                class="lg:w-[80px] flex gap-2 items-center justify-center font-x-core text-sm rounded-md bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label class="text-x-black font-x-core text-sm">{{ __('Records') }}</label>
                    <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4 lg:gap-[5px]">
                        <div class="bg-x-light border-x-shade border rounded-md w-full overflow-auto lg:col-span-6">
                            <table class="w-max min-w-full">
                                <thead>
                                    <tr>
                                        <td class="text-x-black text-sm font-x-core p-2">
                                            {{ __('Type') }}
                                        </td>
                                        <td class="text-x-black text-sm font-x-core p-2">
                                            {{ __('Content') }}
                                        </td>
                                        <td class="text-x-black text-sm font-x-core p-2 w-[80px]"></td>
                                    </tr>
                                </thead>
                                <tbody id="record_display">
                                    @foreach ($data->records() as $item)
                                        <tr class="border-[#d1d1d1] border-t">
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->type }}
                                            </td>
                                            <td class="p-2 text-[#1d1d1d] text-base">
                                                {{ $item->content }}
                                            </td>
                                            <td class="p-2">
                                                <button type="button" onclick="removeRecordRow(event)"
                                                    data-index="{{ $item->id }}"
                                                    class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                                                    <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor"
                                                        viewBox="0 -960 960 960">
                                                        <path
                                                            d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-col gap-4 lg:gap-[5px] lg:flex-row lg:flex-wrap lg:col-span-6">
                            <div class="lg:flex-1">
                                <select x-select search id="record_type" placeholder="{{ __('Type') }}">
                                    @foreach (Core::record() as $type)
                                        <option value="{{ $type }}">
                                            {{ ucwords(__($type)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="lg:flex-[2]">
                                <input id="record_content" type="tel" placeholder="{{ __('Content') }}"
                                    class="bg-x-light w-full text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            </div>
                            <button type="button" onclick="addRecordRow()"
                                class="lg:w-[80px] flex gap-2 items-center justify-center font-x-core text-sm rounded-md bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        x.Select().DatePicker();
        const save = document.querySelector("#save"),
            form = document.querySelector("#form");
        save.addEventListener("click", e => {
            form.submit();
        });

        const [addContactRow, removeContactRow] = contactItemRow({
            display: "#contact_display",
            first: "#contact_first",
            last: "#contact_last",
            phone: "#contact_phone",
            email: "#contact_email",
        });

        const [addRecordRow, removeRecordRow] = recordItemRow({
            display: "#record_display",
            type: "#record_type",
            content: "#record_content",
        });
    </script>
@endsection
