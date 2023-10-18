@extends('shared.admin.base')
@section('title', __('Patient') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4 lg:flex-row-reverse lg:flex-wrap lg:items-start">
        <nav class="w-full overflow-auto lg:w-[200px] lg:sticky lg:top-[76px] no-scrollbar">
            <ul
                class="flex w-max items-center gap-2 lg:flex-col lg:w-full lg:gap-[2px] lg:rounded-x-core lg:overflow-hidden">
                <li class="w-max lg:w-full">
                    <a href="#general"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-0)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M150-138q-37.175 0-64.088-27.612Q59-193.225 59-229v-502q0-36.188 26.912-64.094Q112.825-823 150-823h660q37.588 0 64.794 27.906Q902-767.188 902-731v502q0 35.775-27.206 63.388Q847.588-138 810-138H150Zm364-91h296v-502H514v502Zm224-113q12.567 0 20.783-8.487Q767-358.974 767-371.953q0-12.547-8.5-20.797T737-401H588q-12.567 0-20.783 8.197Q559-384.606 559-372.07q0 12.537 8.217 21.303Q575.433-342 588-342h150Zm-1-120q13 0 21.5-8.487t8.5-21.466q0-12.98-8.5-21.514Q750-522 737-522H589q-13 0-21.5 8.487t-8.5 21.466q0 12.98 8.5 21.514Q576-462 589-462h148Zm1-121q12.567 0 20.783-8.487Q767-599.974 767-612.953q0-12.547-8.5-20.797T737-642H588q-12.567 0-20.783 8.197Q559-625.606 559-613.07q0 12.537 8.217 21.303Q575.433-583 588-583h150Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('General') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#appointments"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-1)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M190-58q-37.175 0-64.088-27.612Q99-113.225 99-149v-601q0-37.588 26.912-64.794Q152.825-842 190-842h59v-22q0-15.375 12.277-27.188Q273.554-903 288.877-903q17.148 0 28.136 11.812Q328-879.375 328-864v22h304v-22q0-15.375 11.577-27.188Q655.154-903 671.377-903q16.648 0 28.136 11.812Q711-879.375 711-864v22h59q37.588 0 64.794 27.206Q862-787.588 862-750v601q0 35.775-27.206 63.388Q807.588-58 770-58H190Zm0-91h580v-419H190v419Zm290.404-246q-18.822 0-32.113-13.177T435-439.877q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112-408.3Q499.225-395 480.404-395Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622-395 608.5-408.177t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404-235q-18.822 0-32.113-13.588Q435-262.175 435-280.096q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525-262 512.112-248.5 499.225-235 480.404-235Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365-262 351.823-248.5t-31.7 13.5Zm319.298 0Q622-235 608.5-248.588 595-262.175 595-280.096q0-17.922 13.588-31.413Q622.175-325 640.096-325q17.922 0 31.413 13.379t13.491 32.2Q685-262 671.621-248.5t-32.2 13.5Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Appointments') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#contacts"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-3)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M152-26q-12.6 0-20.8-8.061-8.2-8.062-8.2-19.5Q123-65 131.2-74t20.8-9h657q11.625 0 19.812 8.556Q837-65.89 837-53.72q0 11.744-8.188 19.732Q820.625-26 809-26H152Zm0-852q-12.6 0-20.8-8.263-8.2-8.263-8.2-20t8.2-20.237q8.2-8.5 20.8-8.5h657q11.625 0 19.812 8.354Q837-918.292 837-906.421q0 11.446-8.188 19.934Q820.625-878 809-878H152Zm327.941 442Q532-436 567.5-470.441t35.5-86.5Q603-609 567.853-644t-87.5-35Q428-679 393-644.059q-35 34.941-35 87t34.941 86.559q34.941 34.5 87 34.5ZM144-140q-37.45 0-64.225-27.475Q53-194.95 53-231v-498q0-39.275 26.775-65.137Q106.55-820 144-820h673q36.05 0 63.025 27.475T907-729v498q0 36.05-26.975 63.525T817-140H144Zm69-80h534q-44-65-118.5-100T480-355q-75 0-148 35T213-220Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Contacts') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#records"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-4)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M551.5-41q-127.5 0-212-89.238Q255-219.477 255-345v-20q-99-14-164.5-87.238Q25-525.475 25-628v-201q0-18.925 12.487-32.963Q49.975-876 70-876h101v-10q1-15 14.036-25t29.438-10q19.976 0 33.751 12.775Q262-895.45 262-875v92.155Q262-762 248.026-750q-13.973 12-33.815 12-15.843 0-29.027-9Q172-756 171-774v-10h-54v156q0 73.7 52.093 124.35Q221.186-453 296.133-453t127.907-50.65Q477-554.3 477-628v-156h-55v10q-2 17-15.238 26.5t-29.937 9.5q-19.85 0-32.338-12.487Q332-762.975 332-783v-92q0-20.45 12.487-33.225Q356.975-921 376.825-921q16.699 0 29.937 10T422-886v10h100q19.05 0 32.525 14.037Q568-847.925 568-829v201q0 100.525-63.5 173.262Q441-382 346-367v21.887q0 86.38 57.493 149.247Q460.985-133 552.118-133 636-133 696-194.575t60-149.968V-416q-38-13-63.5-48.28T667-542.094q0-56.378 38.5-95.642Q744-677 800.971-677q56.97 0 96 39.264Q936-598.472 936-542.094q0 42.534-25.5 77.814Q885-429 847-416v71q0 126.708-86.5 215.354Q674-41 551.5-41Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Records') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#entries"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-5)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M313-286h214q10.35 0 19.175-8.254 8.825-8.255 8.825-20.5Q555-325 546.175-334q-8.825-9-19.175-9H313q-12.35 0-20.675 8.956-8.325 8.956-8.325 20Q284-302 292.325-294T313-286Zm0-165h336q10.35 0 19.175-8.456 8.825-8.456 8.825-21Q677-492 668.175-500T649-508H313q-12.35 0-20.675 8.254-8.325 8.255-8.325 19.5 0 12.246 8.325 20.746Q300.65-451 313-451Zm.333-167H649q10.35 0 19.175-8.456 8.825-8.456 8.825-21 0-10.544-8.825-19.044T649-675H313.333q-12.491 0-20.912 8.754-8.421 8.755-8.421 19.5 0 11.746 8.421 20.246 8.421 8.5 20.912 8.5ZM189-98q-37.45 0-64.225-26.775Q98-151.55 98-189v-582q0-37.863 26.775-64.931Q151.55-863 189-863h582q37.863 0 64.931 27.069Q863-808.863 863-771v582q0 37.45-27.069 64.225Q808.863-98 771-98H189Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Entries') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#prescriptions"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-6)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M220-247h-44q-38.212 0-65.106-26.6Q84-300.2 84-338v-358H74q-18 0-29.5-11.7T33-736.623q0-17.223 11.7-30.3Q56.4-780 74-780h146v-67h-30q-17.6 0-29.8-11.7T148-887.623q0-17.223 12.2-30.3Q172.4-931 189.759-931H335q16.675 0 29.337 13.202Q377-904.596 377-887.123q0 16.723-12.663 28.423Q351.675-847 335-847h-31v67h146q17.1 0 30.05 13.202T493-736.123q0 16.723-12.95 28.423T450-696h-10v358q0 37.8-27.125 64.4Q385.75-247 349-247h-45v182q0 13-12.281 20t-23.745-1.269l-28.951-21.52q-11.011-5.317-15.017-15.907T220-105v-142ZM698.5-84q-74.025 0-126.263-51.387Q520-186.775 520-261v-320q0-74 52.128-126.5 52.129-52.5 126-52.5Q772-760 824-707.5T876-581v320q0 74.225-51.944 125.613Q772.112-84 698.5-84ZM168-331h188v-67h-75q-18.4 0-32.2-13.014-13.8-13.015-13.8-31.7 0-19.886 13.8-33.086T281-489h75v-48h-75q-18.4 0-32.2-13.057-13.8-13.057-13.8-31.8Q235-601 248.8-615t32.2-14h75v-67H168v365Zm436-17h188v-147H604v147Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Prescriptions') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#documents"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-7)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M150-139q-37 0-64-27t-27-64v-500q0-37 27-64.5t64-27.5h226q17 0 34.5 7.5T440-794l41 41h329q37 0 64.5 27t27.5 64v432q0 37-27.5 64T810-139H150Zm446-225 58 39q5 6 11.5 1.5T671-337l-22-71 61-53q5-5 3-12t-11-7h-72l-23-70q-2-9-11-9t-10 9l-26 70h-70q-11 0-12.5 7t4.5 12l60 53-23 71q-1 9 6 14t12-1l59-40Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Documents') }}</span>
                    </a>
                </li>
                <li class="w-max lg:w-full">
                    <a href="#invoices"
                        class="link flex gap-2 items-center font-x-core w-full lg:text-start p-2 px-3 text-sm outline-none rounded-x-core text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                        <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-8)]" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M551.5-443q49.5 0 84.5-34.708 35-34.709 35-84.292 0-50.417-35-85.708Q601-683 551-683t-85 35.5q-35 35.5-35 85.206t35.5 84.5Q502-443 551.5-443ZM256-283q-37.725 0-64.863-26.438Q164-335.875 164-375v-375q0-37.188 27.137-64.594Q218.275-842 256-842h592q36.775 0 63.887 27.406Q939-787.188 939-750v375q0 39.125-27.113 65.562Q884.775-283 848-283H256ZM112-140q-36.775 0-63.888-27.112Q21-194.225 21-231v-400q0-19.775 13.56-32.388Q48.12-676 66.86-676 87-676 99.5-663.388 112-650.775 112-631v400h639q18.375 0 31.688 13.375Q796-204.249 796-185.509q0 18.741-13.312 32.125Q769.375-140 751-140H112Zm132-523q41.062 0 70.031-29.469Q343-721.938 343-762h-99v99Zm615 0v-99h-99q0 40 28.525 69.5T859-663ZM244-363h99q0-40.65-28.969-69.325Q285.062-461 244-461v98Zm516 0h99v-98q-42 0-70.5 28.675T760-363Z" />
                        </svg>
                        <span class="text-base font-medium">{{ __('Invoices') }}</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="w-full lg:flex-1">
            <div id="general" class="tab flex flex-col gap-4">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('General Info') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.patients.update', $data->id) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-amber-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-amber-300 focus-within:!text-x-black focus-within:bg-amber-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M170-103q-32 7-53-14.5T103-170l39-188 216 216-188 39Zm235-78L181-405l435-435q27-27 64.5-27t63.5 27l96 96q27 26 27 63.5T840-616L405-181Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Edit') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
                    <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4 border-x-shade">
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('First Name') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->first_name }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Last Name') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->last_name }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Gender') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ ucwords(__($data->gender) ?? '___') }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Birth Date') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->birth_date ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Nationality') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->nationality ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Identity') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->identity ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Insurance Provider') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->insurance_provider ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Insurance Number') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->insurance_number ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->email ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->phone ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-6">
                            <label class="text-x-black font-x-core text-sm">{{ __('Address') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->address ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('State') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->state ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('City') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->city ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px lg:col-span-2">
                            <label class="text-x-black font-x-core text-sm">{{ __('Zipcode') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-light border border-x-shade">
                                {{ $data->zipcode ?? '___' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="appointments" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Appointments List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.appointments.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="7" download="patient_{{ $data->id }}_appointments_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Date') }}</td>
                                <td>{{ __('Time') }}</td>
                                <td class="hidden">{{ __('Note') }}</td>
                                <td>{{ __('Status') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->appointments() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td class="hidden">{{ $row->note ?? '___' }}</td>
                                    <td>{{ ucwords(__($row->status)) }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'update' => route('views.appointments.update', $row->id),
                                            'delete' => route('actions.appointments.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="contacts" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Contacts List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.contacts.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="4" download="patient_{{ $data->id }}_contacts_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Full Name') }}</td>
                                <td>{{ __('Phone') }}</td>
                                <td>{{ __('Email') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->contacts() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ strtoupper($row->last_name) }} {{ ucfirst($row->first_name) }}
                                    </td>
                                    <td>{{ $row->phone ?? '___' }}</td>
                                    <td>{{ $row->email ?? '___' }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'update' => route('views.contacts.update', $row->id),
                                            'delete' => route('actions.contacts.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="records" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Records List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.records.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="4" download="patient_{{ $data->id }}_records_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Type') }}</td>
                                <td>{{ __('Content') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->records() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ ucwords(__($row->type)) }}</td>
                                    <td>{{ $row->content }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'update' => route('views.records.update', $row->id),
                                            'delete' => route('actions.records.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="entries" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Entries List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.entries.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="4" download="patient_{{ $data->id }}_entries_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Type') }}</td>
                                <td class="hidden">{{ __('Content') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->entries() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ ucwords(__($row->type)) }}</td>
                                    <td class="hidden">{{ $row->content }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'update' => route('views.entries.update', $row->id),
                                            'delete' => route('actions.entries.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="prescriptions" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Prescriptions List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.prescriptions.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="4"
                        download="patient_{{ $data->id }}_prescriptions_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Content') }}</td>
                                <td class="hidden">{{ __('Note') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->prescriptions() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ $row->items()->count() }} {{ __('Items') }}</td>
                                    <td class="hidden">{{ $row->note ?? '___' }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'view' => route('views.prescriptions.summary', $row->id),
                                            'update' => route('views.prescriptions.update', $row->id),
                                            'delete' => route('actions.prescriptions.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="documents" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Documents List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.documents.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="6" download="patient_{{ $data->id }}_documents_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Type') }}</td>
                                <td>{{ __('Name') }}</td>
                                <td>{{ __('Mime') }}</td>
                                <td>{{ __('Size') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->documents() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ ucwords(__($row->type)) }}</td>
                                    <td>
                                        <a href="{{ asset('storage/documents/' . $row->name) }}" download
                                            class="hover:underline focus-within:underline outline-none">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td>{{ $row->mime }}</td>
                                    <td>{{ Core::convert($row->size) }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'delete' => route('actions.documents.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="invoices" class="tab flex-col gap-4 hidden">
                <div class="w-full flex items-center justify-between gap-2">
                    <h1 class="font-x-core text-2xl">{{ __('Invoices List') }}</h1>
                    <div
                        class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                        <div class="container mx-auto lg:w-max p-4 lg:p-0">
                            <div
                                class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                                <button
                                    class="print flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('Print') }}</span>
                                </button>
                                <a href="{{ route('views.invoices.create', ['patient' => $data->id]) }}"
                                    class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                    <span class="hidden lg:block">{{ __('New') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <table x-table search filter remove="6" download="patient_{{ $data->id }}_invoices_list">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>{{ __('Content') }}</td>
                                <td>{{ __('Total') }}</td>
                                <td>{{ __('Payment') }}</td>
                                <td class="hidden">{{ __('Note') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>
                                    <div class="w-max mx-auto">{{ __('Actions') }}</div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->invoices() as $row)
                                <tr>
                                    <td>
                                        <span class="font-x-core text-sm">
                                            {{ $row->id }}
                                        </span>
                                    </td>
                                    <td>{{ $row->items()->count() }} {{ __('Items') }}</td>
                                    <td>{{ $row->items()->sum('cost') }} {{ Core::system()->currency }}</td>
                                    <td>{{ ucwords(__($data->payment)) }}</td>
                                    <td class="hidden">{{ $row->note ?? '___' }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>
                                        @include('shared.admin.action', [
                                            'view' => route('views.invoices.summary', $row->id),
                                            'update' => route('views.invoices.update', $row->id),
                                            'delete' => route('actions.invoices.delete', [
                                                'id' => $row->id,
                                                'origin' => 'same',
                                            ]),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section id="page" class="w-full hidden">
        <div class="flex flex-col">
            <h1 class="text-x-black font-x-core text-4xl text-center p-4">{{ __('Patient Summary') }}</h1>

            <div class="w-full flex flex-col gap-4 p-4">
                <h2 class="text-x-black font-x-core text-2xl">{{ __('General Info') }}</h2>
                <div class="w-full grid grid-rows-1 grid-cols-8 gap-6">
                    <div class="flex flex-col gap-1 col-span-2">
                        <label class="text-x-black font-x-core text-sm">#</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->id }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-6">
                        <label class="text-x-black font-x-core text-sm">{{ __('Full Name') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ strtoupper($data->last_name) }} {{ ucfirst($data->first_name) }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Gender') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ ucwords(__($data->gender) ?? '___') }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Birth Date') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->birth_date ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Nationality') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->nationality ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Identity') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->identity ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-4">
                        <label class="text-x-black font-x-core text-sm">{{ __('Insurance Provider') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->insurance_provider ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-4">
                        <label class="text-x-black font-x-core text-sm">{{ __('Insurance Number') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->insurance_number ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-4">
                        <label class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->email ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-4">
                        <label class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->phone ?? '___' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 col-span-8">
                        <label class="text-x-black font-x-core text-sm">{{ __('Address') }}</label>
                        <div class="text-x-black text-base w-full">
                            {{ $data->address ?? '___' }}, {{ $data->state ?? '___' }}, {{ $data->city ?? '___' }},
                            {{ $data->zipcode ?? '___' }}
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Appointments List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->appointments()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Date') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Time') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Status') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Created at') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->appointments() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td class="text-x-black text-base p-2">
                                    {{ $row->date }}
                                </td>
                                <td class="text-x-black text-base p-2">
                                    {{ $row->time }}
                                </td>
                                <td class="text-x-black text-base p-2">
                                    {{ ucwords(__($row->status)) }}
                                </td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->created_at }}</td>
                            </tr>
                            @if ($row->note)
                                <tr class="border-x-shade border-t">
                                    <td colspan="6" class="text-x-black text-base p-2 px-8">
                                        <div class="text-sm font-x-core mb-1">{{ __('Note') }}</div>
                                        <div>{{ $row->note }}</div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Contacts List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->contacts()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Full Name') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Phone') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Email') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->contacts() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td class="text-x-black text-base p-2">
                                    {{ strtoupper($row->last_name) }}
                                    {{ ucfirst($row->first_name) }}</td>
                                <td class="text-x-black text-base p-2">{{ $row->phone ?? '___' }}</td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->email ?? '___' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Records List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->records()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Type') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Content') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Created at') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->records() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td class="text-x-black text-base p-2">{{ ucwords(__($row->type)) }}</td>
                                <td class="text-x-black text-base p-2">{{ $row->content }}</td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Entries List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->entries()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Type') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Created at') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->entries() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td class="text-x-black text-base p-2">{{ ucwords(__($row->type)) }}</td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->created_at }}</td>
                            </tr>
                            <tr class="border-x-shade border-t">
                                <td colspan="4" class="text-x-black text-base p-2 px-8">
                                    <div class="text-sm font-x-core mb-1">{{ __('Content') }}</div>
                                    <div>{{ $row->content }}</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Prescriptions List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->prescriptions()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Content') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Created at') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->prescriptions() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td class="text-x-black text-base p-2">
                                    {{ $row->items()->count() }} {{ __('Items') }}
                                </td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->created_at }}</td>
                            </tr>
                            <tr class="border-x-shade border-t">
                                <td colspan="4">
                                    <div class="text-x-black text-sm font-x-core p-2 px-8">{{ __('Items') }}</div>
                                    <table class="w-full border-x-shade border-t">
                                        <thead>
                                            <tr>
                                                <td class="text-x-black text-sm font-x-core p-2 ps-8">#</td>
                                                <td class="text-x-black text-sm font-x-core p-2">
                                                    {{ __('Type') }}</td>
                                                <td class="text-x-black text-sm font-x-core p-2">
                                                    {{ __('Content') }}</td>
                                                <td class="text-x-black text-sm font-x-core p-2 pe-8">
                                                    {{ __('Note') }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($row->items() as $item)
                                                <tr class="border-x-shade border-t">
                                                    <td class="text-x-black text-base p-2 ps-8">
                                                        <span class="font-x-core text-sm">
                                                            {{ $item->id }}
                                                        </span>
                                                    </td>
                                                    <td class="text-x-black text-base p-2">
                                                        {{ ucwords(__($item->type)) }}
                                                    </td>
                                                    <td class="text-x-black text-base p-2">{{ $item->content }}</td>
                                                    <td class="text-x-black text-base p-2 pe-8">
                                                        {{ $item->note ?? '___' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @if ($row->note)
                                <tr class="border-x-shade border-t">
                                    <td colspan="4" class="text-x-black text-base p-2 px-8">
                                        <div class="text-sm font-x-core mb-1">{{ __('Note') }}</div>
                                        <div>{{ $row->note }}</div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h2 class="text-x-black font-x-core text-2xl p-4">{{ __('Invoices List') }}</h2>
            <div class="border-x-shade border-t border-b w-full">
                <table class="w-full">
                    @if ($data->invoices()->count())
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">#</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Total') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2">{{ __('Payment') }}</td>
                                <td class="text-x-black text-sm font-x-core p-2 pe-4">{{ __('Created at') }}</td>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($data->invoices() as $row)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-base p-2 ps-4">
                                    <span class="font-x-core text-sm">
                                        {{ $row->id }}
                                    </span>
                                </td>
                                <td>{{ $row->items()->sum('cost') }} {{ Core::system()->currency }}</td>
                                <td class="text-x-black text-base p-2">{{ ucwords(__($row->payment)) }}</td>
                                <td class="text-x-black text-base p-2 pe-4">{{ $row->created_at }}</td>
                            </tr>
                            <tr class="border-x-shade border-t">
                                <td colspan="5">
                                    <div class="text-x-black text-sm font-x-core p-2 px-8">{{ __('Items') }}</div>
                                    <table class="w-full border-x-shade border-t">
                                        <thead>
                                            <tr>
                                                <td class="text-x-black text-sm font-x-core p-2 ps-8">#</td>
                                                <td class="text-x-black text-sm font-x-core p-2">
                                                    {{ __('Content') }}</td>
                                                <td class="text-x-black text-sm font-x-core p-2 pe-8">
                                                    {{ __('Cost') }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($row->items() as $item)
                                                <tr class="border-x-shade border-t">
                                                    <td class="text-x-black text-base p-2 ps-8">
                                                        <span class="font-x-core text-sm">
                                                            {{ $item->id }}
                                                        </span>
                                                    </td>
                                                    <td class="text-x-black text-base p-2">{{ $item->content }}</td>
                                                    <td class="text-x-black text-base p-2 pe-8">
                                                        {{ $item->cost }} {{ Core::system()->currency }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @if ($row->note)
                                <tr class="border-x-shade border-t">
                                    <td colspan="5" class="text-x-black text-base p-2">
                                        <div class="text-sm font-x-core">{{ __('Note') }}</div>
                                        <div>{{ $row->note }}</div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td class="text-x-black p-4 text-xl font-x-core uppercase text-center">
                                    {{ __('No data found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        x.DataTable().Print("#page", ".print");;
        const links = [...document.querySelectorAll('.link')];
        const tabs = [...document.querySelectorAll('.tab')];

        function activeTab(hash) {
            links.forEach(link => {
                if (link.getAttribute('href') === hash) {
                    link.classList.add("bg-x-black-blur");
                } else {
                    link.classList.remove("bg-x-black-blur");
                }
            });

            tabs.forEach(tab => {
                if (tab.id === hash.slice(1)) {
                    tab.classList.remove("hidden");
                    tab.classList.add("flex");
                } else {
                    tab.classList.remove("flex");
                    tab.classList.add("hidden");
                }
            });
        }

        window.addEventListener("hashchange", function(event) {
            activeTab(window.location.hash);
        });
        if (!window.location.hash.trim()) window.location.hash = "#general";
        else activeTab(window.location.hash);
    </script>
@endsection
