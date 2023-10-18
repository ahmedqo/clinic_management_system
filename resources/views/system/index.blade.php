@extends('shared.admin.base')
@section('title', __('Update System'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Update System') }}</h1>
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
            <form id="form" action="{{ route('actions.system.update') }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                @csrf
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="cost" class="text-x-black font-x-core text-sm">{{ __('Cost') }}</label>
                    <input id="cost" type="text" name="cost" placeholder="{{ __('Cost') }}"
                        value="{{ $data->cost }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="currency" class="text-x-black font-x-core text-sm">{{ __('Currency') }}</label>
                    <input id="currency" type="text" name="currency" placeholder="{{ __('Currency') }}"
                        value="{{ $data->currency }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="slot" class="text-x-black font-x-core text-sm">{{ __('Time Slot') }}
                        ({{ __('minutes') }})</label>
                    <input id="slot" type="text" name="slot"
                        placeholder="{{ __('Time Slot') }} ({{ __('minutes') }})" value="{{ $data->slot }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="work_days" class="text-x-black font-x-core text-sm">{{ __('Work Days') }}</label>
                    <select x-select search multiple id="work_days" name="work_days[]" placeholder="{{ __('Work Days') }}">
                        @foreach (Core::days() as $day)
                            <option value="{{ $day }}" {{ in_array($day, $data->workDays()) ? 'selected' : '' }}>
                                {{ ucwords(__($day)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="work_start" class="text-x-black font-x-core text-sm">{{ __('Work Start') }}</label>
                    <select x-select search id="work_start" name="work_start" placeholder="{{ __('Work Start') }}">
                        @foreach (Core::slot() as $slot)
                            <option value="{{ $slot }}" {{ $slot == $data->work_start ? 'selected' : '' }}>
                                {{ ucwords(__($slot)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="work_end" class="text-x-black font-x-core text-sm">{{ __('Work End') }}</label>
                    <select x-select search id="work_end" name="work_end" placeholder="{{ __('Work End') }}">
                        @foreach (Core::slot() as $slot)
                            <option value="{{ $slot }}" {{ $slot == $data->work_end ? 'selected' : '' }}>
                                {{ ucwords(__($slot)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="break_start" class="text-x-black font-x-core text-sm">{{ __('Break Start') }}</label>
                    <select x-select search id="break_start" name="break_start" placeholder="{{ __('Break Start') }}">
                        @foreach (Core::slot() as $slot)
                            <option value="{{ $slot }}" {{ $slot == $data->break_start ? 'selected' : '' }}>
                                {{ ucwords(__($slot)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label for="break_end" class="text-x-black font-x-core text-sm">{{ __('Break End') }}</label>
                    <select x-select search id="break_end" name="break_end" placeholder="{{ __('Break End') }}">
                        @foreach (Core::slot() as $slot)
                            <option value="{{ $slot }}" {{ $slot == $data->break_end ? 'selected' : '' }}>
                                {{ ucwords(__($slot)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label for="report" class="text-x-black font-x-core text-sm">{{ __('Report') }}</label>
                    <select x-select search id="report" name="report" placeholder="{{ __('Report') }}">
                        @foreach (Core::report() as $report)
                            <option value="{{ $report }}" {{ $report == $data->report ? 'selected' : '' }}>
                                {{ ucwords(__($report)) }}
                            </option>
                        @endforeach
                    </select>
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
    </script>
@endsection
