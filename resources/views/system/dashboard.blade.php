@extends('shared.admin.base')
@section('title', __('Dashboard'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="flex flex-col lg:flex-row gap-4">
            <div
                class="w-full lg:flex-1 flex-wrap text-x-black bg-x-white rounded-x-core shadow-x-core p-4 flex gap-4 items-center">
                <svg class="pointer-events-none block w-[50px] h-[50px] !text-[var(--color-2)]" fill="currentColor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M58-116q-18.35 0-31.675-13.325T13-162v-130q0-36.938 24.031-60.969Q61.063-377 98-377h146q20.357 0 34.179 7Q292-363 300-352q32 44 79.5 69.5T479.679-257q52.77 0 101.045-25.5Q629-308 663-352q6.104-10.703 19.432-17.851Q695.759-377 717-377h146q36.938 0 61.469 24.031T949-292v130q0 19.35-13.825 32.675Q921.35-116 903-116H703q-18.35 0-31.675-13.325T658-162v-82q-38 30-83.156 46.5-45.156 16.5-94.65 16.5-47.857 0-94.025-16Q340-213 304-243v81q0 19.35-13.825 32.675Q276.35-116 258-116H58Zm422.204-214Q447-330 418.5-344.5T372-387q-22-29-48-43t-60-18q36-31 98.869-48t117.422-17q55.553 0 117.631 17T698-448q-34 4-61 18t-45.692 42.807Q572-360 542.641-345q-29.358 15-62.437 15ZM159.647-473q-49.064 0-81.855-32.909Q45-538.819 45-589.618q0-48.799 33.145-82.09Q111.289-705 160.353-705t82.855 33.576Q277-637.848 277-589.882q0 51.299-34.145 84.09Q208.711-473 159.647-473Zm640 0q-49.064 0-81.855-32.909Q685-538.819 685-589.618q0-48.799 33.145-82.09Q751.289-705 800.353-705t82.855 33.576Q917-637.848 917-589.882q0 51.299-34.145 84.09Q848.711-473 799.647-473Zm-320-136q-49.064 0-81.855-32.409Q365-673.819 365-724.618q0-49.799 33.145-83.09Q431.289-841 480.353-841t82.855 33.576Q597-773.848 597-724.882q0 51.299-34.145 83.59Q528.711-609 479.647-609Z" />
                </svg>
                <div class="flex-1 flex flex-col">
                    <h1 class="font-x-core text-lg lg:text-xl">{{ __('Patients') }}</h1>
                    <h2 class="text-lg lg:text-xl">{{ $patientCount }}</h2>
                </div>
            </div>
            <div
                class="w-full lg:flex-1 flex-wrap text-x-black bg-x-white rounded-x-core shadow-x-core p-4 flex gap-4 items-center">
                <svg class="pointer-events-none block w-[50px] h-[50px] !text-[var(--color-1)]" fill="currentColor"
                    viewBox="0 -960 960 960">
                    <path
                        d="m433-317 160.921-160.921Q604-488 617.179-487.5q13.179.5 23.718 10.431Q651-465.703 651-452.265q0 13.439-10 22.265L465-255q-13.545 14-32.273 14Q414-241 402-255l-89-86q-10-10.261-10-23.63 0-13.37 10.5-23.87 9.5-9.5 23-9.5t23.679 10.179L433-317ZM190-58q-37.175 0-64.088-27.612Q99-113.225 99-149v-601q0-37.588 26.912-64.794Q152.825-842 190-842h59v-22q0-15.375 12.277-27.188Q273.554-903 288.877-903q17.148 0 28.136 11.812Q328-879.375 328-864v22h304v-22q0-15.375 11.577-27.188Q655.154-903 671.377-903q16.648 0 28.136 11.812Q711-879.375 711-864v22h59q37.588 0 64.794 27.206Q862-787.588 862-750v601q0 35.775-27.206 63.388Q807.588-58 770-58H190Zm0-91h580v-419H190v419Z" />
                </svg>
                <div class="flex-1 flex flex-col">
                    <h1 class="font-x-core text-lg lg:text-xl">{{ __('Appointments') }}</h1>
                    <h2 class="text-lg lg:text-xl">{{ $appointmentCount }}</h2>
                </div>
            </div>
            <div
                class="w-full lg:flex-1 flex-wrap text-x-black bg-x-white rounded-x-core shadow-x-core p-4 flex gap-4 items-center">
                <svg class="pointer-events-none block w-[50px] h-[50px] !text-[var(--color-8)]" fill="currentColor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M551.5-443q49.5 0 84.5-34.708 35-34.709 35-84.292 0-50.417-35-85.708Q601-683 551-683t-85 35.5q-35 35.5-35 85.206t35.5 84.5Q502-443 551.5-443ZM256-283q-37.725 0-64.863-26.438Q164-335.875 164-375v-375q0-37.188 27.137-64.594Q218.275-842 256-842h592q36.775 0 63.887 27.406Q939-787.188 939-750v375q0 39.125-27.113 65.562Q884.775-283 848-283H256ZM112-140q-36.775 0-63.888-27.112Q21-194.225 21-231v-400q0-19.775 13.56-32.388Q48.12-676 66.86-676 87-676 99.5-663.388 112-650.775 112-631v400h639q18.375 0 31.688 13.375Q796-204.249 796-185.509q0 18.741-13.312 32.125Q769.375-140 751-140H112Zm132-523q41.062 0 70.031-29.469Q343-721.938 343-762h-99v99Zm615 0v-99h-99q0 40 28.525 69.5T859-663ZM244-363h99q0-40.65-28.969-69.325Q285.062-461 244-461v98Zm516 0h99v-98q-42 0-70.5 28.675T760-363Z" />
                </svg>
                <div class="flex-1 flex flex-col">
                    <h1 class="font-x-core text-lg lg:text-xl">{{ __('Revenue') }}</h1>
                    <h2 class="text-lg lg:text-xl">{{ $revenue }} {{ Core::system()->currency }}</h2>
                </div>
            </div>
            <div
                class="w-full lg:flex-1 flex-wrap text-x-black bg-x-white rounded-x-core shadow-x-core p-4 flex gap-4 items-center">
                <svg class="pointer-events-none block w-[50px] h-[50px] !text-[var(--color-11)]" fill="currentColor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M255-638q-38.2 0-64.6-27.125Q164-692.25 164-730v-100q0-38.613 26.4-65.306Q216.8-922 255-922h450q38.613 0 65.306 26.694Q797-868.613 797-830v100q0 37.75-26.694 64.875Q743.613-638 705-638H255Zm12-80h426q8 0 15.5-7.1T716-741v-78q0-8-7.5-15.5T693-842H267q-8 0-15.5 7.5T244-819v78q0 8.8 7.5 15.9T267-718ZM130-38q-38.612 0-65.306-26.694Q38-91.388 38-130v-55h884v55q0 38.612-26.694 65.306Q868.613-38 830-38H130ZM38-214l153-341q10-24 32.405-39T274-609h413q27.143 0 49.571 15Q759-579 770-555l153 341H38Zm291-80h40q11.2 0 18.1-7 6.9-7 6.9-17.5 0-11.5-6.9-19T369-345h-40q-11 0-18.5 7.4T303-319q0 11 7.5 18t18.5 7Zm0-91h40q11.2 0 18.1-7.5 6.9-7.5 6.9-18 0-11.5-6.9-18.5t-18.1-7h-40q-11 0-18.5 6.9T303-411q0 11 7.5 18.5T329-385Zm0-91h40q11.2 0 18.1-7.5 6.9-7.5 6.9-18 0-11.5-6.9-19T369-528h-40q-11 0-18.5 7.4T303-502q0 11 7.5 18.5T329-476Zm131 182h40q11.2 0 18.6-7 7.4-7 7.4-17.5 0-11.5-7.4-19T500-345h-40q-11 0-18.5 7.4T434-319q0 11 7.5 18t18.5 7Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-18.5t-18.6-7h-40q-11 0-18.5 6.9T434-411q0 11 7.5 18.5T460-385Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-19T500-528h-40q-11 0-18.5 7.4T434-502q0 11 7.5 18.5T460-476Zm131 182h40q11.2 0 18.6-7 7.4-7 7.4-17.5 0-11.5-7.4-19T631-345h-40q-10.2 0-17.6 7.4-7.4 7.4-7.4 18.6 0 11 7.4 18t17.6 7Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-18.5t-18.6-7h-40q-10.2 0-17.6 6.9-7.4 6.9-7.4 18.1 0 11 7.4 18.5T591-385Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-19T631-528h-40q-10.2 0-17.6 7.4-7.4 7.4-7.4 18.6 0 11 7.4 18.5T591-476Z" />
                </svg>
                <div class="flex-1 flex flex-col">
                    <h1 class="font-x-core text-lg lg:text-xl">{{ __('Registry') }}</h1>
                    <h2 class="text-lg lg:text-xl">{{ $registry }} {{ Core::system()->currency }}</h2>
                </div>
            </div>
        </div>
        <div id="wrapper" class="w-full"></div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core overflow-hidden border border-x-white">
            <div id="calendar" class="w-full"></div>
        </div>
    </div>
    <dialog id="modal" style="height: var(--vh)"
        class="bg-x-black-blur hidden fixed inset-0 w-full h-screen z-[50]  backdrop-blur-sm p-2 lg:p-4 overflow-auto">
        <section class="w-full lg:p-4 lg:w-1/2 mx-auto mt-auto lg:my-auto">
            <div class="flex flex-col gap-4 bg-x-white rounded-md shadow-x-core lg:rounded-x-core p-4">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Create Appointment') }}</h1>
                    <div class="w-max flex gap-[2px] ms-auto rounded-md overflow-hidden">
                        <button id="close"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-red-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-red-300 focus-within:!text-x-black focus-within:bg-red-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 0 48 48">
                                <path
                                    d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Cancel') }}</span>
                        </button>
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
                <form id="form" action="{{ route('actions.appointment.create') }}" method="POST"
                    class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                    @csrf
                    <div class="flex flex-col gap-px lg:col-span-3">
                        <label for="date" class="text-x-black font-x-core text-sm">{{ __('Date') }}</label>
                        <input x-date id="date" type="text" name="date" placeholder="{{ __('Date') }}"
                            disabled-days="{{ Core::disabled() }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 pointer-events-none" />
                    </div>
                    <div class="flex flex-col gap-px lg:col-span-3">
                        <label for="time" class="text-x-black font-x-core text-sm">{{ __('Time') }}</label>
                        <select x-select search id="time" name="time" placeholder="{{ __('Time') }}">
                            @foreach (Core::timeSlot() as $time)
                                <option value="{{ $time }}">
                                    {{ $time }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-px lg:col-span-6">
                        <label for="patient" class="text-x-black font-x-core text-sm">{{ __('Patient') }}</label>
                        <select x-select search id="patient" name="patient" placeholder="{{ __('Patient') }}">
                            <option value="new">
                                {{ __('New') }}
                            </option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">
                                    {{ strtoupper($patient->last_name) }} {{ ucfirst($patient->first_name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-fields hidden flex-col gap-px lg:col-span-3">
                        <label for="first_name" class="text-x-black font-x-core text-sm">{{ __('First Name') }}</label>
                        <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="hidden-fields hidden flex-col gap-px lg:col-span-3">
                        <label for="last_name" class="text-x-black font-x-core text-sm">{{ __('Last Name') }}</label>
                        <input id="last_name" type="text" name="last_name" placeholder="{{ __('Last Name') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="hidden-fields hidden flex-col gap-px lg:col-span-6">
                        <label for="phone" class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                        <input id="phone" type="text" name="phone" placeholder="{{ __('Phone') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:col-span-6">
                        <label for="note" class="text-x-black font-x-core text-sm">{{ __('Note') }}</label>
                        <textarea id="note" name="note" placeholder="{{ __('Note') }}" rows="2"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2"></textarea>
                    </div>
                </form>
            </div>
        </section>
    </dialog>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/locales-all.global.min.js"></script>
    <script>
        x.Select().DatePicker();

        const
            modal = document.querySelector("#modal"),
            close = document.querySelector("#close"),
            patient = document.querySelector("#patient"),
            date = document.querySelector("#date"),
            time = document.querySelector("#time"),
            note = document.querySelector("#note"),
            save = document.querySelector("#save"),
            form = document.querySelector("#form");

        save.addEventListener("click", e => {
            form.submit();
        });

        patient.addEventListener("x-change", e => {
            if (e.detail.target.dataset.value === "new") toggleFields(".hidden-fields", true);
            else toggleFields(".hidden-fields", false);
        });

        close.addEventListener("click", e => {
            document.body.classList.remove("no-body");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            toggleFields(".hidden-fields", false);
            patient.clear();
            time.clear();
            date.value = "";
            note.value = "";
        });

        var calendar = new FullCalendar.Calendar(document.querySelector("#calendar"), {
            headerToolbar: {
                "{{ Core::lang('ar') ? 'right' : 'left' }}": 'dayGridMonth,timeGridWeek,timeGridDay today',
                center: "title",
                "{{ Core::lang('ar') ? 'left' : 'right' }}": "prev,next"
            },
            initialView: "{{ Core::system()->report == 'month' ? 'dayGridMonth' : (Core::system()->report == 'week' ? 'timeGridWeek' : 'timeGridDay') }}",
            allDaySlot: false,
            timeZone: 'UTC',
            slotDuration: "{{ \Carbon\Carbon::createFromTime(0, Core::system()->slot)->format('H:i:s') }}",
            locale: "{{ app()->getLocale() }}",
            events: {!! json_encode($calendar) !!},
            dateClick: function(info) {
                const [dateVal, timeVal] = parseDateStr(info.dateStr);
                dateVal && date.setAttribute("value", dateVal);
                if (timeVal) {
                    [...time.children].forEach(e => {
                        if (e.value === timeVal) e.setAttribute("selected", "");
                        else e.removeAttribute("selected");
                    });
                }
                document.body.classList.add("no-body");
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            },
            eventDidMount: function(event) {
                const dot = event.el.querySelector(".fc-daygrid-event-dot");
                if (dot) dot.remove();
                event.el.style.backgroundColor = event.borderColor;
                event.el.style.borderColor = event.borderColor;
            },
            businessHours: [{
                    daysOfWeek: Array.from(Array(7).keys()).filter(item => !"{{ Core::disabled() }}".split(",")
                        .includes(String(item + 1))),
                    startTime: "{{ Core::system()->work_start }}",
                    endTime: "{{ Core::system()->break_start }}",
                },
                {
                    daysOfWeek: Array.from(Array(7).keys()).filter(item => !"{{ Core::disabled() }}".split(",")
                        .includes(String(item + 1))),
                    startTime: "{{ Core::system()->break_end }}",
                    endTime: "{{ Core::system()->work_end }}",
                }
            ]
        });
        calendar.render();

        document.addEventListener("DOMContentLoaded", () => {
            const wrapper = document.querySelector("#wrapper"),
                tools = document.querySelector(".fc-toolbar"),
                prev = document.querySelector(".fc-prev-button"),
                next = document.querySelector(".fc-next-button");
            prev.innerHTML = `
                <svg class="block pointer-events-none w-8 h-8 rtl:rotate-180" fill="currentColor" viewBox="0 -960 960 960">
                    <path d="M528-251 331-449q-7-6-10.5-14t-3.5-18q0-9 3.5-17.5T331-513l198-199q13-12 32-12t33 12q13 13 12.5 33T593-646L428-481l166 166q13 13 13 32t-13 32q-14 13-33.5 13T528-251Z"></path>
                </svg>
            `;
            next.innerHTML = `
                <svg class="block pointer-events-none w-8 h-8 rtl:rotate-180" fill="currentColor" viewBox="0 -960 960 960">
                    <path d="M344-251q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407-712l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408-251q-13 13-32 12.5T344-251Z"></path>
                </svg>
            `;
            wrapper.appendChild(tools);
        });



        document.querySelector("#trigger_menu").addEventListener("click", _ => {
            if (matchMedia("(min-width: 1024px)").matches) {
                setTimeout(() => {
                    calendar.render();
                    [...document.querySelectorAll(".fc-daygrid-event-dot")].forEach(e => e.remove());
                }, 250);
            }
        });

        window.addEventListener('resize', _ => {
            calendar.render();
            [...document.querySelectorAll(".fc-daygrid-event-dot")].forEach(e => e.remove());
        });
    </script>
@endsection
