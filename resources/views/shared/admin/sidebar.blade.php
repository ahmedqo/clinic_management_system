<aside id="menu" style="height: var(--vh)"
    class="w-full lg:w-[240px] h-screen fixed lg:sticky top-0 -left-full lg:left-0 rtl:left-auto rtl:-right-full lg:rtl:right-0 z-50 lg:z-0 transition-all duration-300 pointer-events-none lg:pointer-events-auto">
    <div class="bg-x-black-blur w-full h-full backdrop-blur-sm relative">
        <button x-toggle targets="#menu"
            properties="left-0, -left-full, rtl:right-0, rtl:-right-full, rtl:left-auto, pointer-events-none, lg:w-[240px], lg:w-0"
            class="text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur p-2 w-[42px] aspect-square flex items-center justify-center rounded-x-core absolute top-4 right-4 rtl:left-4 rtl:right-auto outline-none">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 0 48 48">
                <path
                    d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
            </svg>
        </button>
    </div>
    <nav
        class="w-[240px] lg:w-full h-full flex flex-col bg-x-white shadow-x-core absolute top-0 left-0 rtl:right-0 rtl:left-auto overflow-hidden">
        <div class="flex flex-col h-full gap-4 m-4">
            <header class="flex items-center justify-center overflow-hidden w-full min-w-full">
                <img title="logo-image" alt="logo-image" src="{{ asset('img/logo.png') }}?v={{ env('APP_VERSION') }}"
                    class="block w-full" />
            </header>
            <ul
                class="flex flex-col gap-4 flex-1 overflow-y-auto overflow-x-hidden border-e lg:border-none border-x-white">
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.dashboard.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.dashboard.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-0)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M99-425v-356q0-32.025 24.194-56.512Q147.387-862 179-862h277v437H99Zm405-437h277q32.025 0 56.512 24.488Q862-813.025 862-781v197H504v-278Zm0 763v-436h358v356q0 31.613-24.488 55.806Q813.025-99 781-99H504ZM99-376h357v277H179q-31.613 0-55.806-24.194Q99-147.387 99-179v-197Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.appointments.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.appointments.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-1)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M190-58q-37.175 0-64.088-27.612Q99-113.225 99-149v-601q0-37.588 26.912-64.794Q152.825-842 190-842h59v-22q0-15.375 12.277-27.188Q273.554-903 288.877-903q17.148 0 28.136 11.812Q328-879.375 328-864v22h304v-22q0-15.375 11.577-27.188Q655.154-903 671.377-903q16.648 0 28.136 11.812Q711-879.375 711-864v22h59q37.588 0 64.794 27.206Q862-787.588 862-750v601q0 35.775-27.206 63.388Q807.588-58 770-58H190Zm0-91h580v-419H190v419Zm290.404-246q-18.822 0-32.113-13.177T435-439.877q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112-408.3Q499.225-395 480.404-395Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622-395 608.5-408.177t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404-235q-18.822 0-32.113-13.588Q435-262.175 435-280.096q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525-262 512.112-248.5 499.225-235 480.404-235Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365-262 351.823-248.5t-31.7 13.5Zm319.298 0Q622-235 608.5-248.588 595-262.175 595-280.096q0-17.922 13.588-31.413Q622.175-325 640.096-325q17.922 0 31.413 13.379t13.491 32.2Q685-262 671.621-248.5t-32.2 13.5Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Appointments') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.patients.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.patients.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-2)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M292-309v45q0 16.6 11.7 27.8T332-225q16.6 0 28.3-11.7T372-265v-44h44q16.6 0 28.3-11.7T456-349q0-16.6-11.7-28.3T416-389h-44v-44q0-16.6-11.7-28.3T332-473q-16.6 0-28.3 11.7T292-433v44h-45q-16.6 0-27.8 11.7T208-349q0 16.6 11.7 28.3T248-309h44Zm255-70h172q14.533 0 24.267-9.733Q753-398.467 753-412q0-14.533-9.733-24.267Q733.533-446 719-446H546q-14.533 0-23.767 9.733Q513-426.533 513-412q0 13.533 9.733 23.267Q532.467-379 547-379Zm-1 135h93q14.533 0 24.267-9.233Q673-262.467 673-277q0-13.533-9.733-23.767Q653.533-311 639-311h-93q-14.533 0-23.767 10.233Q513-290.533 513-277q0 14.533 9.233 23.767Q531.467-244 546-244ZM149-59q-37.4 0-64.2-26.8Q58-112.6 58-150v-461q0-37.4 26.8-64.7Q111.6-703 149-703h219v-125q0-32.4 20.8-53.7Q409.6-903 443-903h75q32.4 0 53.7 21.3Q593-860.4 593-828v125h218q37.4 0 64.7 27.3Q903-648.4 903-611v461q0 37.4-27.3 64.2Q848.4-59 811-59H149Zm303-544h57v-216h-57v216Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Patients') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.contacts.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.contacts.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-3)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M152-26q-12.6 0-20.8-8.061-8.2-8.062-8.2-19.5Q123-65 131.2-74t20.8-9h657q11.625 0 19.812 8.556Q837-65.89 837-53.72q0 11.744-8.188 19.732Q820.625-26 809-26H152Zm0-852q-12.6 0-20.8-8.263-8.2-8.263-8.2-20t8.2-20.237q8.2-8.5 20.8-8.5h657q11.625 0 19.812 8.354Q837-918.292 837-906.421q0 11.446-8.188 19.934Q820.625-878 809-878H152Zm327.941 442Q532-436 567.5-470.441t35.5-86.5Q603-609 567.853-644t-87.5-35Q428-679 393-644.059q-35 34.941-35 87t34.941 86.559q34.941 34.5 87 34.5ZM144-140q-37.45 0-64.225-27.475Q53-194.95 53-231v-498q0-39.275 26.775-65.137Q106.55-820 144-820h673q36.05 0 63.025 27.475T907-729v498q0 36.05-26.975 63.525T817-140H144Zm69-80h534q-44-65-118.5-100T480-355q-75 0-148 35T213-220Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Contacts') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.records.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.records.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-4)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M551.5-41q-127.5 0-212-89.238Q255-219.477 255-345v-20q-99-14-164.5-87.238Q25-525.475 25-628v-201q0-18.925 12.487-32.963Q49.975-876 70-876h101v-10q1-15 14.036-25t29.438-10q19.976 0 33.751 12.775Q262-895.45 262-875v92.155Q262-762 248.026-750q-13.973 12-33.815 12-15.843 0-29.027-9Q172-756 171-774v-10h-54v156q0 73.7 52.093 124.35Q221.186-453 296.133-453t127.907-50.65Q477-554.3 477-628v-156h-55v10q-2 17-15.238 26.5t-29.937 9.5q-19.85 0-32.338-12.487Q332-762.975 332-783v-92q0-20.45 12.487-33.225Q356.975-921 376.825-921q16.699 0 29.937 10T422-886v10h100q19.05 0 32.525 14.037Q568-847.925 568-829v201q0 100.525-63.5 173.262Q441-382 346-367v21.887q0 86.38 57.493 149.247Q460.985-133 552.118-133 636-133 696-194.575t60-149.968V-416q-38-13-63.5-48.28T667-542.094q0-56.378 38.5-95.642Q744-677 800.971-677q56.97 0 96 39.264Q936-598.472 936-542.094q0 42.534-25.5 77.814Q885-429 847-416v71q0 126.708-86.5 215.354Q674-41 551.5-41Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Records') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.entries.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.entries.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-5)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M313-286h214q10.35 0 19.175-8.254 8.825-8.255 8.825-20.5Q555-325 546.175-334q-8.825-9-19.175-9H313q-12.35 0-20.675 8.956-8.325 8.956-8.325 20Q284-302 292.325-294T313-286Zm0-165h336q10.35 0 19.175-8.456 8.825-8.456 8.825-21Q677-492 668.175-500T649-508H313q-12.35 0-20.675 8.254-8.325 8.255-8.325 19.5 0 12.246 8.325 20.746Q300.65-451 313-451Zm.333-167H649q10.35 0 19.175-8.456 8.825-8.456 8.825-21 0-10.544-8.825-19.044T649-675H313.333q-12.491 0-20.912 8.754-8.421 8.755-8.421 19.5 0 11.746 8.421 20.246 8.421 8.5 20.912 8.5ZM189-98q-37.45 0-64.225-26.775Q98-151.55 98-189v-582q0-37.863 26.775-64.931Q151.55-863 189-863h582q37.863 0 64.931 27.069Q863-808.863 863-771v582q0 37.45-27.069 64.225Q808.863-98 771-98H189Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Entries') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.prescriptions.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.prescriptions.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-6)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M220-247h-44q-38.212 0-65.106-26.6Q84-300.2 84-338v-358H74q-18 0-29.5-11.7T33-736.623q0-17.223 11.7-30.3Q56.4-780 74-780h146v-67h-30q-17.6 0-29.8-11.7T148-887.623q0-17.223 12.2-30.3Q172.4-931 189.759-931H335q16.675 0 29.337 13.202Q377-904.596 377-887.123q0 16.723-12.663 28.423Q351.675-847 335-847h-31v67h146q17.1 0 30.05 13.202T493-736.123q0 16.723-12.95 28.423T450-696h-10v358q0 37.8-27.125 64.4Q385.75-247 349-247h-45v182q0 13-12.281 20t-23.745-1.269l-28.951-21.52q-11.011-5.317-15.017-15.907T220-105v-142ZM698.5-84q-74.025 0-126.263-51.387Q520-186.775 520-261v-320q0-74 52.128-126.5 52.129-52.5 126-52.5Q772-760 824-707.5T876-581v320q0 74.225-51.944 125.613Q772.112-84 698.5-84ZM168-331h188v-67h-75q-18.4 0-32.2-13.014-13.8-13.015-13.8-31.7 0-19.886 13.8-33.086T281-489h75v-48h-75q-18.4 0-32.2-13.057-13.8-13.057-13.8-31.8Q235-601 248.8-615t32.2-14h75v-67H168v365Zm436-17h188v-147H604v147Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Prescriptions') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.documents.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.documents.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-7)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M150-139q-37 0-64-27t-27-64v-500q0-37 27-64.5t64-27.5h226q17 0 34.5 7.5T440-794l41 41h329q37 0 64.5 27t27.5 64v432q0 37-27.5 64T810-139H150Zm446-225 58 39q5 6 11.5 1.5T671-337l-22-71 61-53q5-5 3-12t-11-7h-72l-23-70q-2-9-11-9t-10 9l-26 70h-70q-11 0-12.5 7t4.5 12l60 53-23 71q-1 9 6 14t12-1l59-40Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Documents') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.invoices.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.invoices.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-8)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M551.5-443q49.5 0 84.5-34.708 35-34.709 35-84.292 0-50.417-35-85.708Q601-683 551-683t-85 35.5q-35 35.5-35 85.206t35.5 84.5Q502-443 551.5-443ZM256-283q-37.725 0-64.863-26.438Q164-335.875 164-375v-375q0-37.188 27.137-64.594Q218.275-842 256-842h592q36.775 0 63.887 27.406Q939-787.188 939-750v375q0 39.125-27.113 65.562Q884.775-283 848-283H256ZM112-140q-36.775 0-63.888-27.112Q21-194.225 21-231v-400q0-19.775 13.56-32.388Q48.12-676 66.86-676 87-676 99.5-663.388 112-650.775 112-631v400h639q18.375 0 31.688 13.375Q796-204.249 796-185.509q0 18.741-13.312 32.125Q769.375-140 751-140H112Zm132-523q41.062 0 70.031-29.469Q343-721.938 343-762h-99v99Zm615 0v-99h-99q0 40 28.525 69.5T859-663ZM244-363h99q0-40.65-28.969-69.325Q285.062-461 244-461v98Zm516 0h99v-98q-42 0-70.5 28.675T760-363Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Invoices') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.events.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.events.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-9)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="m480-389 54 43q12 10 26-.5t11-24.5l-22-68 54-46q12-9 6.5-24.5T589-525h-64l-24-66q-5-16-21-16t-21 16l-24 66h-63q-16 0-22 15t7 25l54 46-20 69q-5 14 8.5 24t27.5 0l53-43ZM150-138q-38 0-64.5-26.5T59-229v-135q0-7 5-15.5T78-391q30-8 48-35t18-54q0-27-18-54t-48-35q-9-3-14-11.5T59-597v-133q0-38 26.5-65t64.5-27h660q38 0 65 27t27 65v134q0 7-5.5 15.5T882-569q-30 8-48 35t-18 54q0 27 18 54t48 35q9 3 14.5 11.5T902-364v135q0 38-27 64.5T810-138H150Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Events') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.users.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.users.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-10)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M68-130q-20.1 0-33.05-12.45Q22-154.9 22-174.708V-246q0-42.011 21.188-75.36 21.187-33.348 59.856-50.662Q178-404 238.469-419 298.938-434 363-434q66.062 0 126.031 15Q549-404 624-372q38.812 16.018 60.406 49.452Q706-289.113 706-246v71.708Q706-155 693.275-142.5T660-130H68Zm679 0q11-5 20.5-17.5T777-177v-67q0-65-32.5-108T659-432q60 10 113 24.5t88.88 31.939q34.958 18.329 56.539 52.945Q939-288 939-241v66.787q0 19.505-13.225 31.859Q912.55-130 893-130H747ZM364-494q-71.55 0-115.275-43.725Q205-581.45 205-652.5q0-71.05 43.725-115.275Q292.45-812 363.5-812q70.05 0 115.275 44.113Q524-723.775 524-653q0 71.55-45.112 115.275Q433.775-494 364-494Zm386-159q0 70.55-44.602 114.775Q660.796-494 591.035-494 578-494 567.5-495.5T543-502q26-27.412 38.5-65.107 12.5-37.696 12.5-85.599 0-46.903-12.5-83.598Q569-773 543-804q10.75-3.75 23.5-5.875T591-812q69.775 0 114.387 44.613Q750-722.775 750-653Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('Users') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.system.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.system.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-11)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M291-405v21q0 13.033 7.983 21.017Q306.967-355 320-355t21.517-7.983Q350-370.967 350-384v-101q0-13.033-8.483-21.517Q333.033-515 320-515t-21.017 8.483Q291-498.033 291-485v20h-31q-13.033 0-21.017 8.483Q231-448.033 231-435q0 12.533 8.733 21.267Q248.467-405 261-405h30Zm149 0h260q13.033 0 21.517-8.733Q730-422.467 730-435t-8.483-21.267Q713.033-465 700-465H440q-12.733 0-21.367 8.483Q410-448.033 410-435q0 12.533 8.733 21.267Q427.467-405 440-405Zm230-181h30q13.033 0 21.517-9.233Q730-604.467 730-616.791q0-11.324-8.483-20.766Q713.033-647 700-647h-30v-20q0-11.733-8.483-20.867Q653.033-697 640-697t-21.017 9.133Q611-678.733 611-667v100q0 12.733 7.983 21.867Q626.967-536 640-536t21.517-9.133Q670-554.267 670-567v-19Zm-409 0h260q12.3 0 21.15-9.233 8.85-9.234 8.85-21.558 0-11.324-8.85-20.766Q533.3-647 521-647H260q-13.033 0-21.017 9.193Q231-628.615 231-616.791q0 12.324 8.733 21.558Q248.467-586 261-586ZM149-178q-37.45 0-64.225-26.775Q58-231.55 58-269v-501q0-37.863 26.775-64.931Q111.55-862 149-862h662q37.863 0 64.931 27.069Q903-807.863 903-770v501q0 37.45-27.069 64.225Q848.863-178 811-178H641v33q0 21-13.763 33.5Q613.475-99 595-99H366q-19.6 0-32.8-12.5Q320-124 320-145v-33H149Z" />
                                </svg>
                                <span class="text-md font-x-core">{{ __('System') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>
