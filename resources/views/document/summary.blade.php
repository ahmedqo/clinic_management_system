@extends('shared.admin.base')
@section('title', __('Document Summary'))

@section('content')
    <div class="flex flex-col gap-4">
        <div id="wrap" class="w-full flex flex-col gap-4">
            <div class="w-full flex flex-wrap gap-1 lg:gap-4 items-center">
                @if ($data->mime == 'application/octet-stream')
                    <div id="names" class="w-max flex gap-[2px] rounded-x-core overflow-hidden">
                        <button title="{{ __('Zoom And Pan') }}" data-type="Tool" data-name="ZoomAndPan"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m160-579-90 90q-10 11.333-23.727 10.167Q32.545-480 24.5-489q-9.5-10.091-10-22.545Q14-524 25-534l89-90H62q-13 0-22.5-9.221t-9.5-23Q30-670 39.233-679q9.234-9 22.767-9h116q20.45 0 33.225 13.188Q224-661.625 224-643v116q0 13.533-9.083 23.267Q205.833-494 192.5-494q-14.5 0-23.5-9t-9-24v-52Zm223-221h52q11.233 0 21.617 9.817Q467-780.367 467-768q0 13.533-9.75 22.767Q447.5-736 435-736H319q-21 0-33.5-13.188Q273-762.375 273-781v-117q0-12.367 8.721-22.183 8.721-9.817 22.5-9.817t23.279 9.817Q337-910.367 337-898v52l90-90q9.727-8 23.364-8.5Q464-945 473.5-935.384q9.5 9.617 9.5 22.853 0 13.237-10 22.531l-90 90ZM550-15q-24.294 0-45.147-9-20.853-9-38.06-25.036L254.941-267.287Q252-269 251-276q-1-7 1-12l-1 2q16-26 45.5-36t59.5 0l83 24v-339q0-15.35 11.658-26.675Q462.316-675 478.158-675T505-663.675Q516-652.35 516-637v297h67v-161.35q0-17.1 10.965-28.375Q604.93-541 620.772-541q15.842 0 27.035 11.613Q659-517.775 659-502v162h66v-121.821q0-15.312 11.577-27.246Q748.154-501 763.877-501t26.923 11.708q11.2 11.709 11.2 27.625V-340h67v-42q0-15.775 10.884-27.388Q890.768-421 906.491-421q15.723 0 27.116 11.612Q945-397.775 945-382v198q0 70.988-48.713 119.994Q847.575-15 777-15H550Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Window Level') }}" data-type="Tool" data-name="WindowLevel"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M190-99q-37.175 0-64.088-26.912Q99-152.825 99-190v-580q0-37.588 26.912-64.794Q152.825-862 190-862h580q37.588 0 64.794 27.206Q862-807.588 862-770v580q0 37.175-27.206 64.088Q807.588-99 770-99H190Zm0-91h580v-580L190-190Zm386-134h-58q-13 0-21.5-8.487t-8.5-21.466q0-12.98 8.5-21.514Q505-384 518-384h58v-58q0-13 8.487-21.5t21.466-8.5q12.98 0 21.514 8.5Q636-455 636-442v58h58q13 0 21.5 8.487t8.5 21.466q0 12.98-8.5 21.514Q707-324 694-324h-58v58q0 13-8.487 21.5t-21.466 8.5q-12.98 0-21.514-8.5Q576-253 576-266v-58ZM405-632q13 0 21.5-8.685 8.5-8.684 8.5-21.966 0-13.282-8.5-21.816Q418-693 405-693H253q-13 0-21.5 8.487t-8.5 21.466q0 12.98 8.5 22.014Q240-632 253-632h152Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Opacity') }}" data-type="Tool" data-name="Opacity"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M479.605-99q-141.124 0-241.364-96.975Q138-292.949 138-433.742q0-72.642 26.936-134.139Q191.872-629.378 241-675l191-189q9-10 22.25-15.5t26-5.5q12.75 0 25.75 5.5t22 15.5l191 189q49.192 45.254 76.596 106.818Q823-506.618 823-433.898q0 140.949-101.136 237.923Q620.728-99 479.605-99ZM233-401h497q7-65.172-14.692-118.742-21.691-53.569-49.364-79.393L480-782 293.726-598.866Q266-573 245-519.672 224-466.345 233-401Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-max flex gap-[2px]">
                        <div class="w-max relative">
                            <button id="draw_trigger" x-toggle targets="#draw"
                                properties="opacity-0, pointer-events-none, translate-y-[40px]"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rounded-s-x-core">
                                <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M185-99q-21 0-33.5-12.5T139-145v-41q0-19 7-35t20-31l586-584q11-12 24-19t27-7q14 0 28 7t26 19l21 19q11 9 17.5 24t6.5 28q0 14-6 28t-18 25L293-126q-15 13-31 20t-35 7h-42Zm558-575 91-90-30-30-89 91 28 29ZM539-99q81 0 142.5-37T743-244q0-40-29.5-74T622-372l-54 54q51 13 79 34t28 40q0 33-39.5 55T539-167q-14 0-24 9.5T505-134q0 15 10 25t24 10ZM246-418l58-57q-72-16-104.5-31T167-538q0-13 20-28.5t89-37.5q85-26 115-56.5t30-76.5q0-56-42.5-90.5T266-862q-46 0-80.5 15.5T133-809q-10 11-9 24.5t14 22.5q9 8 23.5 7.5T185-766q15-15 33-21t48-6q45 0 66 17t21 39q0 21-18.5 36T250-667q-100 34-125.5 64T99-538q0 42 33 73t114 47Z" />
                                </svg>
                            </button>
                            <div id="draw"
                                class="bg-x-black-blur p-2 lg:p-0 flex flex-col justify-end backdrop-blur-sm lg:bg-transparent lg:backdrop-blur-none fixed inset-0 lg:inset-auto lg:w-[300px] lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-full lg:mt-2 lg:transition-all lg:duration-300 z-50 opacity-0 pointer-events-none translate-y-[40px] ">
                                <div
                                    class="shadow-sm lg:shadow-x-drop bg-x-white rounded-md flex flex-col lg:rounded-x-core max-h-[70vh] overflow-hidden border border-x-shade lg:max-h-[300px]">
                                    <div class="border-x-shade flex flex-col border-b p-2 gap-2">
                                        <label
                                            class="text-x-black text-base text-center font-black leading-[1]">{{ __('Shapes') }}</label>
                                    </div>
                                    <ul class="flex flex-wrap flex-1 p-2">
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Livewire" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M354.5-57q-13.5 0-24.48-8.125T314-89L214-435H102q-18.75 0-31.875-13.175Q57-461.351 57-480.175 57-499 70.125-512.5 83.25-526 102-526h144q15.921 0 26.934 9.125Q283.947-507.75 290-494l56 194 124-569q2-15 14.25-25.5T511-905q14.5 0 26.75 10T553-870l83 379 58-176q4.059-13.75 15.088-22.875Q720.118-699 737.059-699q11.941 0 23.441 8.5Q772-682 778-670l53 144h28q18.75 0 32.375 13.675Q905-498.649 905-479.825 905-461 891.375-448T859-435h-53q-13.849 0-25.424-8.5Q769-452 763-465l-21-61-67 232q-5.889 15.63-16.833 23.815Q647.222-262 632.111-263 615-262 602.5-271T588-297l-76-337L395-91q-4.25 16.387-14.625 25.823Q370-55.742 354.5-57Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Livewire') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Arrow" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M92-239q-14-13-14.5-32T92-304l220-218q25.934-27 62.967-27T440-522l103 101 204-206h-73q-20.75 0-33.375-13.175-12.625-13.176-12.625-33Q628-692 640.625-705T674-718h182q19.75 0 32.875 13.125T902-673v183q0 19-12.272 32.5t-32.5 13.5Q838-444 824.5-457.5T811-490v-71L606-357q-27.934 27-65.467 27T478-357L375-457 157-239q-14 14-33.5 14T92-239Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Arrow') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Ruler" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M163.12-230q-37.17 0-64.145-27.199Q72-284.399 72-321.977v-315.908q0-37.215 26.909-64.665Q125.817-730 162.987-730H796.88q37.17 0 64.145 27.381Q888-675.239 888-638.023v315.908q0 37.577-26.909 64.846Q834.183-230 797.013-230H163.12Zm-.12-92h634v-316H683v129.04q0 12.047-8.65 20.504Q665.699-480 653.825-480q-11.45 0-19.637-8.456Q626-496.913 626-508.96V-638H509v129.04q0 12.047-8.65 20.504Q491.699-480 479.825-480q-11.45 0-19.637-8.456Q452-496.913 452-508.96V-638H335v129.04q0 12.047-8.65 20.504Q317.699-480 305.825-480q-11.45 0-19.637-8.456Q278-496.913 278-508.96V-638H163v316Zm143-158Zm174 0Zm174 0Zm-174 0Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Ruler') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Protractor" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M444-485 322.917-152.801Q323-153 319-145l-27.976 25.8Q280-110 266.1-113.643 252.2-117.286 251-133l-5-35.731q0 1 1-10.269l126-344q14 16 32.5 25.5T444-485Zm36.235-18q-55.735 0-95.485-39.644T345-638.208q0-46.232 27-83.012t69-47.18V-821q0-15.925 11.553-27.463Q464.105-860 480.053-860 496-860 508-848.463q12 11.538 12 27.463v52.6q41 10.4 68 47.18t27 83.012q0 55.92-39.515 95.564Q535.971-503 480.235-503Zm-.112-80q22.427 0 38.652-16.348T535-638.123q0-22.427-16.348-39.152T479.877-694q-22.427 0-38.652 16.63T425-637.895q0 22.42 16.348 38.657Q457.696-583 480.123-583ZM514-484q20-3 39-12.5t33-25.5l127.044 343.134q1.956 4.304-.044 10.178l-4.4 35.938q-1.04 15.179-14.82 18.964Q680-110 669.732-118.85L642-145q-5-4-5-8L514-484Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Protractor') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Rectangle" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M679-82v-108H281q-36.413 0-63.706-26.913Q190-243.825 190-281v-398H82q-19.775 0-32.388-13.358Q37-705.716 37-724.158 37-744 49.612-757 62.225-770 82-770h108v-108q0-19.775 13.358-32.388Q216.716-923 235.158-923 255-923 268-910.388q13 12.613 13 32.388v597h597q20.2 0 33.1 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q898.2-190 878-190H770v108q0 19.35-13.375 32.675Q743.249-36 724.509-36q-20.141 0-32.825-13.325Q679-62.65 679-82Zm0-259v-338H341v-91h338q37.175 0 64.088 26.912Q770-716.175 770-679v338h-91Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Rectangle') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Roi" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M318-105q-24.586 0-45.08-11.375T238-150L72-435q-14-22.131-14-45.066Q58-503 72-526l166-284q14.426-22.25 34.92-34.125T318-856h326q23.034 0 43.304 11.875Q707.574-832.25 723-810l166 284q13 23.557 13 46.492 0 22.934-13 44.508L723-150q-15.426 22.25-35.696 33.625Q667.034-105 644-105H318Zm-2.333-91H645l163-284-162.664-285H316L152-480l163.667 284ZM480-480Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Polygon') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Circle" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M479.679-59q-86.319 0-163.646-32.604-77.328-32.603-134.577-89.852-57.249-57.249-89.852-134.57Q59-393.346 59-479.862q0-87.41 32.662-164.275 32.663-76.865 90.203-134.412 57.54-57.547 134.411-90.499Q393.147-902 479.336-902q87.55 0 164.885 32.858 77.334 32.858 134.56 90.257 57.225 57.399 90.222 134.514Q902-567.257 902-479.458q0 86.734-32.952 163.382-32.952 76.648-90.499 134.2-57.547 57.551-134.421 90.214Q567.255-59 479.679-59Zm.092-91q136.742 0 233.485-96.387Q810-342.773 810-479.771q0-136.742-96.515-233.485Q616.971-810 479.729-810q-136.242 0-232.985 96.515Q150-616.971 150-479.729q0 136.242 96.387 232.985Q342.773-150 479.771-150ZM480-480Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Circle') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="FreeHand" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M573-101q-57 0-95.5-41.5T439-251q0-50 26.5-88t62.5-62q36-24 74-36.5t64-13.5q-3-48-22-69.5T589-542q-40 0-74 23t-90 102q-57 81-101.5 113T230-272q-50 0-89.5-32.5T101-417q0-29 20.5-74T193-616q38-51 50-74.5t12-43.5q0-11-6.5-17.5T230-758q-6 0-16 3t-20 12q-20 11-36.5 10.5T130-745q-14-11-14-30.5t14-32.5q23-20 49.5-31t55.5-11q47 0 78 33t31 77q0 45-19 83t-64 103q-45 68-57.5 92.5T191-411q0 27 15.5 35.5T239-367q24 0 48-22.5t71-85.5q67-88 120-123.5T597-634q63 0 108.5 45.5T757-454h58q20 0 32.5 12.5T860-410q0 20-12.5 33T815-364h-58q-11 176-78 219.5T573-101Zm3-93q21 0 52-30.5T667-359q-38 4-87.5 31T530-241q0 22 11.5 34.5T576-194Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('FreeHand') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-max relative">
                            <button id="color_trigger" x-toggle targets="#color"
                                properties="opacity-0, pointer-events-none, translate-y-[40px]"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rounded-e-x-core">
                                <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M481-59q-86.719 0-162.86-33Q242-125 183.5-183q-58.5-58-91-134.653Q60-394.305 60-480.669 60-569 93.392-645.839q33.392-76.838 91.929-133.736 58.536-56.899 136.717-89.662Q400.218-902 487.93-902q82.916 0 157.796 28.01 74.881 28.01 131.577 78Q834-746 868-676.8q34 69.2 34 147.8 0 112-62 184.5T665-272h-61q-18 0-29.5 13.179-11.5 13.178-11.5 29.392Q563-211 573.5-201.5t10.5 31.133Q584-136 551.2-97.5 518.4-59 481-59ZM257-455q20 0 34.5-14.523 14.5-14.524 14.5-34.5Q306-524 291.267-538.5 276.533-553 257.5-553q-20.5 0-34.5 14.523-14 14.524-14 34.5Q209-484 223-469.5q14 14.5 34 14.5Zm121-163q21 0 35.5-14t14.5-34.5q0-21.5-14.5-35T379-715q-21 0-34.5 13.733Q331-687.533 331-667.5q0 21.5 13.733 35.5 13.734 14 33.267 14Zm204.5 0q20.5 0 35-14t14.5-34.5q0-21.5-14.733-35Q602.533-715 583.5-715q-21.5 0-35 13.733Q535-687.533 535-667.5q0 21.5 13.5 35.5t34 14Zm124 163q20.5 0 35-14.523 14.5-14.524 14.5-34.5Q756-524 741.5-538.5 727-553 707-553q-21 0-34.5 14.523-13.5 14.524-13.5 34.5Q659-484 672.733-469.5 686.467-455 706.5-455Z" />
                                </svg>
                            </button>
                            <div id="color"
                                class="bg-x-black-blur p-2 lg:p-0 flex flex-col justify-end backdrop-blur-sm lg:bg-transparent lg:backdrop-blur-none fixed inset-0 lg:inset-auto lg:w-[300px] lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-full lg:mt-2 lg:transition-all lg:duration-300 z-50 opacity-0 pointer-events-none translate-y-[40px] ">
                                <div
                                    class="shadow-sm lg:shadow-x-drop bg-x-white rounded-md flex flex-col lg:rounded-x-core max-h-[70vh] overflow-hidden border border-x-shade lg:max-h-[300px]">
                                    <div class="border-x-shade flex flex-col border-b p-2 gap-2">
                                        <label
                                            class="text-x-black text-base text-center font-black leading-[1]">{{ __('Colors') }}</label>
                                    </div>
                                    <ul class="flex flex-wrap flex-1 p-2 gap-2 overflow-y-auto">
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(127, 29, 29)"
                                                style="background: rgb(127, 29, 29)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(153, 27, 27)"
                                                style="background: rgb(153, 27, 27)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(185, 28, 28)"
                                                style="background: rgb(185, 28, 28)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(220, 38, 38)"
                                                style="background: rgb(220, 38, 38)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(239, 68, 68)"
                                                style="background: rgb(239, 68, 68)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(248, 113, 113)"
                                                style="background: rgb(248, 113, 113)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(124, 45, 18)"
                                                style="background: rgb(124, 45, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(154, 52, 18)"
                                                style="background: rgb(154, 52, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(194, 65, 12)"
                                                style="background: rgb(194, 65, 12)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(234, 88, 12)"
                                                style="background: rgb(234, 88, 12)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(249, 115, 22)"
                                                style="background: rgb(249, 115, 22)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(251, 146, 60)"
                                                style="background: rgb(251, 146, 60)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(113, 63, 18)"
                                                style="background: rgb(113, 63, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(133, 77, 14)"
                                                style="background: rgb(133, 77, 14)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(161, 98, 7)"
                                                style="background: rgb(161, 98, 7)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(202, 138, 4)"
                                                style="background: rgb(202, 138, 4)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(234, 179, 8)"
                                                style="background: rgb(234, 179, 8)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(250, 204, 21)"
                                                style="background: rgb(250, 204, 21)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(54, 83, 20)"
                                                style="background: rgb(54, 83, 20)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(63, 98, 18)"
                                                style="background: rgb(63, 98, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(77, 124, 15)"
                                                style="background: rgb(77, 124, 15)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(101, 163, 13)"
                                                style="background: rgb(101, 163, 13)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/2] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(132, 204, 22)"
                                                style="background: rgb(132, 204, 22)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(163, 230, 53)"
                                                style="background: rgb(163, 230, 53)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 78, 59)"
                                                style="background: rgb(6, 78, 59)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 95, 70)"
                                                style="background: rgb(6, 95, 70)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(4, 120, 87)"
                                                style="background: rgb(4, 120, 87)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(5, 150, 105)"
                                                style="background: rgb(5, 150, 105)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(16, 185, 129)"
                                                style="background: rgb(16, 185, 129)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(52, 211, 153)"
                                                style="background: rgb(52, 211, 153)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(19, 78, 74)"
                                                style="background: rgb(19, 78, 74)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(17, 94, 89)"
                                                style="background: rgb(17, 94, 89)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(15, 118, 110)"
                                                style="background: rgb(15, 118, 110)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(13, 148, 136)"
                                                style="background: rgb(13, 148, 136)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(20, 184, 166)"
                                                style="background: rgb(20, 184, 166)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(45, 212, 191)"
                                                style="background: rgb(45, 212, 191)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(22, 78, 99)"
                                                style="background: rgb(22, 78, 99)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(21, 94, 117)"
                                                style="background: rgb(21, 94, 117)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(14, 116, 144)"
                                                style="background: rgb(14, 116, 144)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(8, 145, 178)"
                                                style="background: rgb(8, 145, 178)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 182, 212)"
                                                style="background: rgb(6, 182, 212)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(34, 211, 238)"
                                                style="background: rgb(34, 211, 238)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(12, 74, 110)"
                                                style="background: rgb(12, 74, 110)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(7, 89, 133)"
                                                style="background: rgb(7, 89, 133)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(3, 105, 161)"
                                                style="background: rgb(3, 105, 161)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(2, 132, 199)"
                                                style="background: rgb(2, 132, 199)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(14, 165, 233)"
                                                style="background: rgb(14, 165, 233)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(56, 189, 248)"
                                                style="background: rgb(56, 189, 248)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/1] lg:aspect-square block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-max flex gap-[2px] lg:ms-auto rounded-x-core overflow-hidden">
                        <button title="{{ __('Undo') }}" data-exec="Undo"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rtl:-scale-x-100">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M314-179q-18.6 0-31.8-13.2T269-224q0-20 13.2-33t31.8-13h269q62.462 0 104.731-43.429Q730-356.857 730-419q0-60-42.269-104.5T583-568H313l68 68q12 14.578 12 32.789Q393-449 380-436q-13 14-31.356 14-18.355 0-32.644-14L171-580q-5.909-6.167-9.955-14.794Q157-603.422 157-612.711q0-9.289 4.045-18.239Q165.091-639.9 171-645l146-146q12.8-12 31.4-12.5 18.6-.5 32.6 13.929 13 13.428 12.5 31.477Q393-740.044 381-726l-68 67h269q99.479 0 169.739 70Q822-519 822-419.5 822-319 751.739-249 681.479-179 582-179H314Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Reset') }}" data-exec="Reset"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M400-109q-114-26-188-117t-74-212q0-68 27.5-129T245-671q10-15 30-14.5t35 13.5q11 12 11.5 29.5T308-611q-37 34-58 78.5T229-438q0 87 52.5 153.5T417-200q15 5 25.5 18t10.5 28q0 25-17 37.5t-36 7.5Zm164 0q-21 7-37.5-7T510-153q0-13 10-27.5t26-19.5q83-18 134.5-84.5T732-438q0-100-68-172t-168-78h-23l42 42q8 10 8 25t-8 24q-10 9-25.5 9t-24.5-9L355-706q-6-6-10-14.5t-4-17.5q0-10 4-18t10-14l110-112q9-8 24.5-7.5T515-882q7 10 7 26t-7 24l-53 52h24q140 0 239 100.5T824-438q0 120-74 212T564-109Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Redo') }}" data-exec="Redo"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rtl:-scale-x-100">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M648-568H377q-62.231 0-104.615 44Q230-480 230-419q0 62 42.385 105.5Q314.769-270 377-270h269q18.6 0 32.3 13 13.7 13 13.7 32.5T678.3-192q-13.7 13-32.3 13H378.155Q278-179 208.5-248.5T139-419q0-99 69.644-169.5T378-659h270l-68-67q-13-14.044-13.5-32.022Q566-776 580-790q12.8-14 31.4-13.5Q630-803 644-791l145 146q6 5 10.5 13.909T804-613q0 9.545-4.5 18.273Q795-586 789-580L644-436q-14.289 14-32.644 14Q593-422 580-436.5q-13-12.5-13-30.478T580-500l68-68Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-max flex gap-[2px] rounded-x-core overflow-hidden">
                        <button title="{{ __('Full Screen') }}" data-exec="Full"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M190-190h97q20.175 0 33.588 12.991Q334-164.018 334-144.509 334-124 320.588-111.5 307.175-99 287-99H145q-20.75 0-33.375-12.625T99-145v-142q0-20.175 12.86-33.588Q124.719-334 144.93-334q19.21 0 32.14 13.412Q190-307.175 190-287v97Zm581 0v-97q0-20.175 12.658-33.588Q796.316-334 816.14-334q18.825 0 32.342 13.412Q862-307.175 862-287v142q0 20.75-13.175 33.375T816-99H674.38q-21.68 0-34.53-12.86Q627-124.719 627-144.93q0-19.21 13.125-32.14T674-190h97ZM190-771v97q0 21.3-12.991 34.15-12.991 12.85-32.5 12.85Q124-627 111.5-640.125T99-674.38V-816q0-19.65 12.625-32.825Q124.25-862 145-862h142q20.175 0 33.588 13.468Q334-835.064 334-815.807q0 19.832-13.412 32.32Q307.175-771 287-771h-97Zm581 0h-97q-21.3 0-34.15-12.658Q627-796.316 627-816.14q0-18.825 13.125-32.342Q653.25-862 674.38-862H816q19.65 0 32.825 13.175Q862-835.65 862-816v141.62q0 21.68-13.468 34.53Q835.064-627 815.807-627q-19.832 0-32.32-13.125Q771-653.25 771-674v-97Z" />
                                <path class="hidden"
                                    d="M242-242h-98q-18.9 0-31.95-13.358T99-287.14q0-19.825 12.625-33.342Q124.25-334 145-334h143q18.25 0 32.125 13.875T334-288v144q0 18.9-13.468 31.95T287.307-99q-19.332 0-32.319-12.625Q242-124.25 242-145v-97Zm478 0v98q0 18.9-12.991 31.95T673.509-99Q653-99 640-111.625T627-145v-143q0-18.25 13.325-32.125T674.38-334H816q18.775 0 32.387 13.468Q862-307.064 862-287.307q0 19.332-13.613 32.319Q834.775-242 816-242h-96ZM242-720v-96q0-18.775 13.358-32.387Q268.716-862 287.14-862q19.825 0 33.342 13.613Q334-834.775 334-816v141.62q0 20.73-13.875 34.055T288-627H144q-18.9 0-31.95-13.56Q99-654.119 99-673.43q0-20.71 12.625-33.64T145-720h97Zm478 0h96q18.775 0 32.387 12.991Q862-694.018 862-673.509T848.387-640Q834.775-627 816-627H674.38q-20.73 0-34.055-13.325T627-674.38V-816q0-18.775 13.56-32.387Q654.119-862 673.43-862q20.71 0 33.64 13.613Q720-834.775 720-816v96Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Download') }}" data-exec="Download"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M480.256-342q-8.399 0-17.849-3.773Q452.957-349.545 447-356L288-516q-14-12.364-13.708-31.208.291-18.844 14.317-32.363Q301.4-593.154 321-592.577 340.6-592 354-579l81 81v-278q0-19.65 12.86-32.825Q460.719-822 480.36-822 500-822 513-808.825T526-776v278l82-81q12.667-13 30.748-13.657 18.082-.657 32.411 12.577Q684-567 684-547.682q0 19.318-13 33.682L513-356q-5.81 6.455-15.221 10.227Q488.368-342 480.256-342ZM230-139q-37.175 0-64.087-26.913Q139-192.825 139-230v-98q0-18.375 12.86-31.688Q164.719-373 184.36-373 204-373 217-359.688q13 13.313 13 31.688v98h500v-98q0-18.375 13.56-31.688Q757.119-373 775.772-373q20.053 0 33.14 13.312Q822-346.375 822-328v98q0 37.175-27.206 64.087Q767.588-139 730-139H230Z" />
                            </svg>
                        </button>
                    </div>
                @else
                    <div id="names" class="w-max flex gap-[2px] rounded-x-core overflow-hidden">
                        <button title="{{ __('Scroll') }}" data-type="Tool" data-name="ZoomAndPan"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m160-579-90 90q-10 11.333-23.727 10.167Q32.545-480 24.5-489q-9.5-10.091-10-22.545Q14-524 25-534l89-90H62q-13 0-22.5-9.221t-9.5-23Q30-670 39.233-679q9.234-9 22.767-9h116q20.45 0 33.225 13.188Q224-661.625 224-643v116q0 13.533-9.083 23.267Q205.833-494 192.5-494q-14.5 0-23.5-9t-9-24v-52Zm223-221h52q11.233 0 21.617 9.817Q467-780.367 467-768q0 13.533-9.75 22.767Q447.5-736 435-736H319q-21 0-33.5-13.188Q273-762.375 273-781v-117q0-12.367 8.721-22.183 8.721-9.817 22.5-9.817t23.279 9.817Q337-910.367 337-898v52l90-90q9.727-8 23.364-8.5Q464-945 473.5-935.384q9.5 9.617 9.5 22.853 0 13.237-10 22.531l-90 90ZM550-15q-24.294 0-45.147-9-20.853-9-38.06-25.036L254.941-267.287Q252-269 251-276q-1-7 1-12l-1 2q16-26 45.5-36t59.5 0l83 24v-339q0-15.35 11.658-26.675Q462.316-675 478.158-675T505-663.675Q516-652.35 516-637v297h67v-161.35q0-17.1 10.965-28.375Q604.93-541 620.772-541q15.842 0 27.035 11.613Q659-517.775 659-502v162h66v-121.821q0-15.312 11.577-27.246Q748.154-501 763.877-501t26.923 11.708q11.2 11.709 11.2 27.625V-340h67v-42q0-15.775 10.884-27.388Q890.768-421 906.491-421q15.723 0 27.116 11.612Q945-397.775 945-382v198q0 70.988-48.713 119.994Q847.575-15 777-15H550Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Magnifier') }}" data-type="Tool" data-name="Magnifier"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l237 235q13 13.556 13 33.256 0 19.7-13 33.244-14.333 13.5-33.244 13.5-18.912 0-32.756-14L526.472-364Q496-341.077 457.541-328.038 419.082-315 373.438-315Zm-1.997-91q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Brightness') }}" data-type="Filter" data-name="Brightness"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M344.163-139H230q-37.75 0-64.375-26.625T139-230v-113.587L67-416q-14-14-20.5-29.814-6.5-15.813-6.5-34Q40-498 46.5-514T67-544l72-72.413V-730q0-37.75 26.625-64.875T230-822h113.587L416-894q13-13 30-19.5t35.197-6.5q18.197 0 34.521 7.196Q532.042-905.609 545-893l71 71h114q37.75 0 64.875 27.125T822-730v113.587L894-544q13 13 19.5 29.314 6.5 16.313 6.5 34.5 0 18.186-6.5 34.686T894-416l-72 72.413V-230q0 37.75-27.125 64.375T730-139H616l-71 70q-13.958 15.13-29.782 21.065Q499.394-42 481.197-42q-18.197 0-34.16-5.935Q431.073-53.87 417-69l-72.837-70ZM481-298q77 0 130-53.053t53-130Q664-558 610.963-611 557.925-664 481-664v366Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Contrast') }}" data-type="Filter" data-name="Contrast"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M190-99q-37.175 0-64.088-26.912Q99-152.825 99-190v-580q0-37.588 26.912-64.794Q152.825-862 190-862h580q37.588 0 64.794 27.206Q862-807.588 862-770v580q0 37.175-27.206 64.088Q807.588-99 770-99H190Zm0-91h580v-580L190-190Zm386-134h-58q-13 0-21.5-8.487t-8.5-21.466q0-12.98 8.5-21.514Q505-384 518-384h58v-58q0-13 8.487-21.5t21.466-8.5q12.98 0 21.514 8.5Q636-455 636-442v58h58q13 0 21.5 8.487t8.5 21.466q0 12.98-8.5 21.514Q707-324 694-324h-58v58q0 13-8.487 21.5t-21.466 8.5q-12.98 0-21.514-8.5Q576-253 576-266v-58ZM405-632q13 0 21.5-8.685 8.5-8.684 8.5-21.966 0-13.282-8.5-21.816Q418-693 405-693H253q-13 0-21.5 8.487t-8.5 21.466q0 12.98 8.5 22.014Q240-632 253-632h152Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Grayscale') }}" data-type="Filter" data-name="Grayscale"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M770-99H190q-37.175 0-64.088-26.912Q99-152.825 99-190v-580q0-37.588 26.912-64.794Q152.825-862 190-862h580q37.588 0 64.794 27.206Q862-807.588 862-770v580q0 37.175-27.206 64.088Q807.588-99 770-99Zm-580-91h290v-332l290 332v-580H480v248L190-190Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Hue Rotate') }}" data-type="Filter" data-name="Hue"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M479.77-98q-141.12 0-241.445-96.286Q138-290.572 138-431.216q0-69.867 27.5-133.825Q193-629 242-675l192-190q9.071-10.118 22.214-15.059Q469.357-885 482-885t25.786 4.941Q520.929-875.118 530-865l192 190q49.064 45.613 75.032 109.805Q823-501.002 823-431.489q0 140.758-100.97 237.123Q621.06-98 479.77-98Zm2.23-91v-594L303-606q-35 36-54.5 79.317Q229-483.366 229-431q0 103.822 74.708 172.911Q378.417-189 482-189Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Saturate') }}" data-type="Filter" data-name="Saturate"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M350.793-49q-123.222 0-212.507-89.312Q49-227.625 49-350.591q0-123.38 89.312-212.895Q227.625-653 350.591-653q123.38 0 212.895 89.493Q653-474.014 653-350.793q0 123.222-89.493 212.507Q474.014-49 350.793-49Zm-.106-92Q437-141 499.5-202.687q62.5-61.688 62.5-148Q562-437 499.729-499.5 437.457-562 351.106-562 264-562 202.5-499.729 141-437.457 141-351.106 141-264 202.687-202.5q61.688 61.5 148 61.5ZM679-315q1-4.828 1.5-17.126.5-12.299.5-19.022 0-134.318-97.9-232.085T350.731-681q-6.731 0-18.381 1T316-679q22-97 105-164.5T609.93-911q122.413 0 211.741 89.579Q911-731.843 911-608.545 911-503 844-421q-67 82-165 106Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Sepia') }}" data-type="Filter" data-name="Sepia"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M209.5-84q-71.962 0-122.231-50.269Q37-184.538 37-257q0-72.462 50.269-122.231Q137.538-429 209.5-429q71.962 0 122.731 49.769Q383-329.462 383-257q0 72.462-50.769 122.731Q281.462-84 209.5-84Zm542 0q-71.963 0-122.231-50.269Q579-184.538 579-257q0-72.462 50.269-122.231Q679.537-429 751.5-429t122.231 49.769Q924-329.462 924-257q0 72.462-50.269 122.731Q823.463-84 751.5-84ZM481-355q-29.474 0-49.237-18.763T412-423.5q0-29.974 19.763-49.237T481-492q29.474 0 49.237 19.263T550-423.5q0 30.974-19.763 49.737T481-355Zm.159-211q-72.621 0-122.39-50.269Q309-666.537 309-738.5t49.609-122.731Q408.219-912 480.841-912t122.89 50.769Q654-810.463 654-738.5t-50.109 122.231Q553.781-566 481.159-566Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-max flex gap-[2px]">
                        <div class="w-max relative">
                            <button id="draw_trigger" x-toggle targets="#draw"
                                properties="opacity-0, pointer-events-none, translate-y-[40px]"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rounded-s-x-core">
                                <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M185-99q-21 0-33.5-12.5T139-145v-41q0-19 7-35t20-31l586-584q11-12 24-19t27-7q14 0 28 7t26 19l21 19q11 9 17.5 24t6.5 28q0 14-6 28t-18 25L293-126q-15 13-31 20t-35 7h-42Zm558-575 91-90-30-30-89 91 28 29ZM539-99q81 0 142.5-37T743-244q0-40-29.5-74T622-372l-54 54q51 13 79 34t28 40q0 33-39.5 55T539-167q-14 0-24 9.5T505-134q0 15 10 25t24 10ZM246-418l58-57q-72-16-104.5-31T167-538q0-13 20-28.5t89-37.5q85-26 115-56.5t30-76.5q0-56-42.5-90.5T266-862q-46 0-80.5 15.5T133-809q-10 11-9 24.5t14 22.5q9 8 23.5 7.5T185-766q15-15 33-21t48-6q45 0 66 17t21 39q0 21-18.5 36T250-667q-100 34-125.5 64T99-538q0 42 33 73t114 47Z" />
                                </svg>
                            </button>
                            <div id="draw"
                                class="bg-x-black-blur p-2 lg:p-0 flex flex-col justify-end backdrop-blur-sm lg:bg-transparent lg:backdrop-blur-none fixed inset-0 lg:inset-auto lg:w-[300px] lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-full lg:mt-2 lg:transition-all lg:duration-300 z-50 opacity-0 pointer-events-none translate-y-[40px] ">
                                <div
                                    class="shadow-sm lg:shadow-x-drop bg-x-white rounded-md flex flex-col lg:rounded-x-core max-h-[70vh] overflow-hidden border border-x-shade lg:max-h-[300px]">
                                    <div class="border-x-shade flex flex-col border-b p-2 gap-2">
                                        <label
                                            class="text-x-black text-base text-center font-black leading-[1]">{{ __('Shapes') }}</label>
                                    </div>
                                    <ul class="flex flex-wrap flex-1 p-2">
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Text" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="m181-341-43 110q-5 13-17.389 21T96-202q-26.76 0-40.38-20.5Q42-243 51-270l195-457q4-13 16.969-21.5 12.97-8.5 29.267-8.5h42.224q15.041 0 28.005 8.6Q375.429-739.8 380-726l188 455q8 26-5.886 47.5-13.885 21.5-39.802 21.5-17.684 0-30.892-8.567Q478.212-219.133 473-236l-40-105H181Zm27-71h200l-96.581-254H307l-99 254Zm520-29h-90q-17.025 0-28.512-11.46Q598-463.92 598-479.947q0-16.028 11.488-28.04Q620.975-520 638-520h90v-90q0-17.175 11.36-28.588Q750.719-650 768.36-650 786-650 797-638.588q11 11.413 11 28.588v90h91q15.45 0 27.225 11.752Q938-496.495 938-480.035 938-464 926.225-452.5T899-441h-91v91q0 16.75-11.188 27.875T768.509-311q-18.141 0-29.325-11.812Q728-334.625 728-351v-90Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Text') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Line" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M93-232q-13-14-13-34.287T93-300l222-223q27-27 64.5-27t64.5 27l95 94 266-298q13-15 32-16t32 11q13.667 13.667 13.833 32.833Q883-680 873-668L606-365q-27 28-66 30.5T473-362l-93-90-219 220q-14.426 13-34.713 13T93-232Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Line') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Arrow" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M92-239q-14-13-14.5-32T92-304l220-218q25.934-27 62.967-27T440-522l103 101 204-206h-73q-20.75 0-33.375-13.175-12.625-13.176-12.625-33Q628-692 640.625-705T674-718h182q19.75 0 32.875 13.125T902-673v183q0 19-12.272 32.5t-32.5 13.5Q838-444 824.5-457.5T811-490v-71L606-357q-27.934 27-65.467 27T478-357L375-457 157-239q-14 14-33.5 14T92-239Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Arrow') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Ruler" href="javascript:void(0)"
                                                class="w-full flex flex-wrap flex-col gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M163.12-230q-37.17 0-64.145-27.199Q72-284.399 72-321.977v-315.908q0-37.215 26.909-64.665Q125.817-730 162.987-730H796.88q37.17 0 64.145 27.381Q888-675.239 888-638.023v315.908q0 37.577-26.909 64.846Q834.183-230 797.013-230H163.12Zm-.12-92h634v-316H683v129.04q0 12.047-8.65 20.504Q665.699-480 653.825-480q-11.45 0-19.637-8.456Q626-496.913 626-508.96V-638H509v129.04q0 12.047-8.65 20.504Q491.699-480 479.825-480q-11.45 0-19.637-8.456Q452-496.913 452-508.96V-638H335v129.04q0 12.047-8.65 20.504Q317.699-480 305.825-480q-11.45 0-19.637-8.456Q278-496.913 278-508.96V-638H163v316Zm143-158Zm174 0Zm174 0Zm-174 0Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Ruler') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Rectangle" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M679-82v-108H281q-36.413 0-63.706-26.913Q190-243.825 190-281v-398H82q-19.775 0-32.388-13.358Q37-705.716 37-724.158 37-744 49.612-757 62.225-770 82-770h108v-108q0-19.775 13.358-32.388Q216.716-923 235.158-923 255-923 268-910.388q13 12.613 13 32.388v597h597q20.2 0 33.1 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q898.2-190 878-190H770v108q0 19.35-13.375 32.675Q743.249-36 724.509-36q-20.141 0-32.825-13.325Q679-62.65 679-82Zm0-259v-338H341v-91h338q37.175 0 64.088 26.912Q770-716.175 770-679v338h-91Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Rectangle') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Polygon" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M318-105q-24.586 0-45.08-11.375T238-150L72-435q-14-22.131-14-45.066Q58-503 72-526l166-284q14.426-22.25 34.92-34.125T318-856h326q23.034 0 43.304 11.875Q707.574-832.25 723-810l166 284q13 23.557 13 46.492 0 22.934-13 44.508L723-150q-15.426 22.25-35.696 33.625Q667.034-105 644-105H318Zm-2.333-91H645l163-284-162.664-285H316L152-480l163.667 284ZM480-480Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Polygon') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Circle" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M479.679-59q-86.319 0-163.646-32.604-77.328-32.603-134.577-89.852-57.249-57.249-89.852-134.57Q59-393.346 59-479.862q0-87.41 32.662-164.275 32.663-76.865 90.203-134.412 57.54-57.547 134.411-90.499Q393.147-902 479.336-902q87.55 0 164.885 32.858 77.334 32.858 134.56 90.257 57.225 57.399 90.222 134.514Q902-567.257 902-479.458q0 86.734-32.952 163.382-32.952 76.648-90.499 134.2-57.547 57.551-134.421 90.214Q567.255-59 479.679-59Zm.092-91q136.742 0 233.485-96.387Q810-342.773 810-479.771q0-136.742-96.515-233.485Q616.971-810 479.729-810q-136.242 0-232.985 96.515Q150-616.971 150-479.729q0 136.242 96.387 232.985Q342.773-150 479.771-150ZM480-480Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('Circle') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/3)]">
                                            <a data-exec="Draw" data-draw="Free" href="javascript:void(0)"
                                                class="w-full flex flex-col flex-wrap gap-2 items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor"
                                                    viewBox="0 -960 960 960">
                                                    <path
                                                        d="M573-101q-57 0-95.5-41.5T439-251q0-50 26.5-88t62.5-62q36-24 74-36.5t64-13.5q-3-48-22-69.5T589-542q-40 0-74 23t-90 102q-57 81-101.5 113T230-272q-50 0-89.5-32.5T101-417q0-29 20.5-74T193-616q38-51 50-74.5t12-43.5q0-11-6.5-17.5T230-758q-6 0-16 3t-20 12q-20 11-36.5 10.5T130-745q-14-11-14-30.5t14-32.5q23-20 49.5-31t55.5-11q47 0 78 33t31 77q0 45-19 83t-64 103q-45 68-57.5 92.5T191-411q0 27 15.5 35.5T239-367q24 0 48-22.5t71-85.5q67-88 120-123.5T597-634q63 0 108.5 45.5T757-454h58q20 0 32.5 12.5T860-410q0 20-12.5 33T815-364h-58q-11 176-78 219.5T573-101Zm3-93q21 0 52-30.5T667-359q-38 4-87.5 31T530-241q0 22 11.5 34.5T576-194Z" />
                                                </svg>
                                                <span
                                                    class="pointer-events-none text-sm font-medium">{{ __('FreeHand') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-max relative">
                            <button id="size_trigger" x-toggle targets="#size"
                                properties="opacity-0, pointer-events-none, translate-y-[40px]"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                                <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M125-104q-12.6 0-21.3-9.5Q95-123 95-136t9.2-22q9.2-9 21.8-9h709q13 0 22 9t9 22q0 13-9.5 22.5T834-104H125Zm17-111q-19.475 0-33.238-13.868Q95-242.737 95-262.868 95-282 108.762-295.5 122.525-309 142-309h677q18.35 0 32.675 13.868 14.325 13.869 14.325 33Q866-242 851.675-228.5 837.35-215 819-215H142Zm-1-143q-19.35 0-32.675-12.655Q95-383.309 95-404.103v-10.103q0-18.394 13.325-31.594Q121.65-459 141-459h679q18.225 0 32.112 13.355Q866-432.291 866-413.897v10.103Q866-383 852.112-370.5 838.225-358 820-358H141Zm0-150q-19.35 0-32.675-12.625Q95-533.25 95-553.614v-257.772q0-19.364 13.325-31.989T141-856h679q18.225 0 32.112 12.625Q866-830.75 866-811.386v257.772q0 20.364-13.888 32.989Q838.225-508 820-508H141Z" />
                                </svg>
                            </button>
                            <div id="size"
                                class="bg-x-black-blur p-2 lg:p-0 flex flex-col justify-end backdrop-blur-sm lg:bg-transparent lg:backdrop-blur-none fixed inset-0 lg:inset-auto lg:w-[300px] lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-full lg:mt-2 lg:transition-all lg:duration-300 z-50 opacity-0 pointer-events-none translate-y-[40px] ">
                                <div
                                    class="shadow-sm lg:shadow-x-drop bg-x-white rounded-md flex flex-col lg:rounded-x-core max-h-[70vh] overflow-hidden border border-x-shade lg:max-h-[300px]">
                                    <div class="border-x-shade flex flex-col border-b p-2 gap-2">
                                        <label
                                            class="text-x-black text-base text-center font-black leading-[1]">{{ __('Sizes') }}</label>
                                    </div>
                                    <ul class="flex flex-wrap flex-1 p-2">
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="1" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[1px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="2" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[2px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="3" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[3px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="4" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[4px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="5" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[5px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="6" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[6px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="7" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[7px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="8" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[8px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="9" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[9px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="10" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[10px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="12" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[12px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="14" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[14px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="16" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[16px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="18" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[18px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="20" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[20px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="w-[calc(100%/4)]">
                                            <a data-exec="Size" data-size="24" href="javascript:void(0)"
                                                class="h-[46px] w-full flex flex-wrap items-center p-2 rounded-md justify-center outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur">
                                                <div class="w-full rounded-full h-[24px] bg-x-black pointer-events-none">
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-max relative">
                            <button id="color_trigger" x-toggle targets="#color"
                                properties="opacity-0, pointer-events-none, translate-y-[40px]"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rounded-e-x-core">
                                <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M481-59q-86.719 0-162.86-33Q242-125 183.5-183q-58.5-58-91-134.653Q60-394.305 60-480.669 60-569 93.392-645.839q33.392-76.838 91.929-133.736 58.536-56.899 136.717-89.662Q400.218-902 487.93-902q82.916 0 157.796 28.01 74.881 28.01 131.577 78Q834-746 868-676.8q34 69.2 34 147.8 0 112-62 184.5T665-272h-61q-18 0-29.5 13.179-11.5 13.178-11.5 29.392Q563-211 573.5-201.5t10.5 31.133Q584-136 551.2-97.5 518.4-59 481-59ZM257-455q20 0 34.5-14.523 14.5-14.524 14.5-34.5Q306-524 291.267-538.5 276.533-553 257.5-553q-20.5 0-34.5 14.523-14 14.524-14 34.5Q209-484 223-469.5q14 14.5 34 14.5Zm121-163q21 0 35.5-14t14.5-34.5q0-21.5-14.5-35T379-715q-21 0-34.5 13.733Q331-687.533 331-667.5q0 21.5 13.733 35.5 13.734 14 33.267 14Zm204.5 0q20.5 0 35-14t14.5-34.5q0-21.5-14.733-35Q602.533-715 583.5-715q-21.5 0-35 13.733Q535-687.533 535-667.5q0 21.5 13.5 35.5t34 14Zm124 163q20.5 0 35-14.523 14.5-14.524 14.5-34.5Q756-524 741.5-538.5 727-553 707-553q-21 0-34.5 14.523-13.5 14.524-13.5 34.5Q659-484 672.733-469.5 686.467-455 706.5-455Z" />
                                </svg>
                            </button>
                            <div id="color"
                                class="bg-x-black-blur p-2 lg:p-0 flex flex-col justify-end backdrop-blur-sm lg:bg-transparent lg:backdrop-blur-none fixed inset-0 lg:inset-auto lg:w-[300px] lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-full lg:mt-2 lg:transition-all lg:duration-300 z-50 opacity-0 pointer-events-none translate-y-[40px] ">
                                <div
                                    class="shadow-sm lg:shadow-x-drop bg-x-white rounded-md flex flex-col lg:rounded-x-core max-h-[70vh] overflow-hidden border border-x-shade lg:max-h-[300px]">
                                    <div class="border-x-shade flex flex-col border-b p-2 gap-2">
                                        <label
                                            class="text-x-black text-base text-center font-black leading-[1]">{{ __('Colors') }}</label>
                                    </div>
                                    <ul class="flex flex-wrap flex-1 p-2 gap-2 overflow-y-auto">
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(127, 29, 29)"
                                                style="background: rgb(127, 29, 29)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(153, 27, 27)"
                                                style="background: rgb(153, 27, 27)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(185, 28, 28)"
                                                style="background: rgb(185, 28, 28)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(220, 38, 38)"
                                                style="background: rgb(220, 38, 38)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(239, 68, 68)"
                                                style="background: rgb(239, 68, 68)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(248, 113, 113)"
                                                style="background: rgb(248, 113, 113)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(124, 45, 18)"
                                                style="background: rgb(124, 45, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(154, 52, 18)"
                                                style="background: rgb(154, 52, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(194, 65, 12)"
                                                style="background: rgb(194, 65, 12)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(234, 88, 12)"
                                                style="background: rgb(234, 88, 12)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(249, 115, 22)"
                                                style="background: rgb(249, 115, 22)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(251, 146, 60)"
                                                style="background: rgb(251, 146, 60)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(113, 63, 18)"
                                                style="background: rgb(113, 63, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(133, 77, 14)"
                                                style="background: rgb(133, 77, 14)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(161, 98, 7)"
                                                style="background: rgb(161, 98, 7)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(202, 138, 4)"
                                                style="background: rgb(202, 138, 4)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(234, 179, 8)"
                                                style="background: rgb(234, 179, 8)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(250, 204, 21)"
                                                style="background: rgb(250, 204, 21)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(54, 83, 20)"
                                                style="background: rgb(54, 83, 20)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(63, 98, 18)"
                                                style="background: rgb(63, 98, 18)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(77, 124, 15)"
                                                style="background: rgb(77, 124, 15)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(101, 163, 13)"
                                                style="background: rgb(101, 163, 13)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(132, 204, 22)"
                                                style="background: rgb(132, 204, 22)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(163, 230, 53)"
                                                style="background: rgb(163, 230, 53)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 78, 59)"
                                                style="background: rgb(6, 78, 59)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 95, 70)"
                                                style="background: rgb(6, 95, 70)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(4, 120, 87)"
                                                style="background: rgb(4, 120, 87)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(5, 150, 105)"
                                                style="background: rgb(5, 150, 105)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(16, 185, 129)"
                                                style="background: rgb(16, 185, 129)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(52, 211, 153)"
                                                style="background: rgb(52, 211, 153)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(19, 78, 74)"
                                                style="background: rgb(19, 78, 74)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(17, 94, 89)"
                                                style="background: rgb(17, 94, 89)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(15, 118, 110)"
                                                style="background: rgb(15, 118, 110)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(13, 148, 136)"
                                                style="background: rgb(13, 148, 136)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(20, 184, 166)"
                                                style="background: rgb(20, 184, 166)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(45, 212, 191)"
                                                style="background: rgb(45, 212, 191)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(22, 78, 99)"
                                                style="background: rgb(22, 78, 99)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(21, 94, 117)"
                                                style="background: rgb(21, 94, 117)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(14, 116, 144)"
                                                style="background: rgb(14, 116, 144)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(8, 145, 178)"
                                                style="background: rgb(8, 145, 178)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(6, 182, 212)"
                                                style="background: rgb(6, 182, 212)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(34, 211, 238)"
                                                style="background: rgb(34, 211, 238)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(12, 74, 110)"
                                                style="background: rgb(12, 74, 110)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(7, 89, 133)"
                                                style="background: rgb(7, 89, 133)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(3, 105, 161)"
                                                style="background: rgb(3, 105, 161)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(2, 132, 199)"
                                                style="background: rgb(2, 132, 199)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(14, 165, 233)"
                                                style="background: rgb(14, 165, 233)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                        <li class="w-[calc((100%-(0.5rem*5))/6)]">
                                            <a data-exec="Color" data-color="rgb(56, 189, 248)"
                                                style="background: rgb(56, 189, 248)" href="javascript:void(0)"
                                                class="w-full rounded-md aspect-[4/3] block outline-offset-1 hover:outline-4 focus-within:outline hover:outline-x-black focus-within:outline-x-black">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-max flex gap-[2px] lg:ms-auto rounded-x-core overflow-hidden">
                        <button title="{{ __('Undo') }}" data-exec="Undo"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rtl:-scale-x-100">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M314-179q-18.6 0-31.8-13.2T269-224q0-20 13.2-33t31.8-13h269q62.462 0 104.731-43.429Q730-356.857 730-419q0-60-42.269-104.5T583-568H313l68 68q12 14.578 12 32.789Q393-449 380-436q-13 14-31.356 14-18.355 0-32.644-14L171-580q-5.909-6.167-9.955-14.794Q157-603.422 157-612.711q0-9.289 4.045-18.239Q165.091-639.9 171-645l146-146q12.8-12 31.4-12.5 18.6-.5 32.6 13.929 13 13.428 12.5 31.477Q393-740.044 381-726l-68 67h269q99.479 0 169.739 70Q822-519 822-419.5 822-319 751.739-249 681.479-179 582-179H314Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Reset') }}" data-exec="Reset"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M400-109q-114-26-188-117t-74-212q0-68 27.5-129T245-671q10-15 30-14.5t35 13.5q11 12 11.5 29.5T308-611q-37 34-58 78.5T229-438q0 87 52.5 153.5T417-200q15 5 25.5 18t10.5 28q0 25-17 37.5t-36 7.5Zm164 0q-21 7-37.5-7T510-153q0-13 10-27.5t26-19.5q83-18 134.5-84.5T732-438q0-100-68-172t-168-78h-23l42 42q8 10 8 25t-8 24q-10 9-25.5 9t-24.5-9L355-706q-6-6-10-14.5t-4-17.5q0-10 4-18t10-14l110-112q9-8 24.5-7.5T515-882q7 10 7 26t-7 24l-53 52h24q140 0 239 100.5T824-438q0 120-74 212T564-109Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Redo') }}" data-exec="Redo"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent rtl:-scale-x-100">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M648-568H377q-62.231 0-104.615 44Q230-480 230-419q0 62 42.385 105.5Q314.769-270 377-270h269q18.6 0 32.3 13 13.7 13 13.7 32.5T678.3-192q-13.7 13-32.3 13H378.155Q278-179 208.5-248.5T139-419q0-99 69.644-169.5T378-659h270l-68-67q-13-14.044-13.5-32.022Q566-776 580-790q12.8-14 31.4-13.5Q630-803 644-791l145 146q6 5 10.5 13.909T804-613q0 9.545-4.5 18.273Q795-586 789-580L644-436q-14.289 14-32.644 14Q593-422 580-436.5q-13-12.5-13-30.478T580-500l68-68Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-max flex gap-[2px] rounded-x-core overflow-hidden">
                        <button title="{{ __('Full Screen') }}" data-exec="Full"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M190-190h97q20.175 0 33.588 12.991Q334-164.018 334-144.509 334-124 320.588-111.5 307.175-99 287-99H145q-20.75 0-33.375-12.625T99-145v-142q0-20.175 12.86-33.588Q124.719-334 144.93-334q19.21 0 32.14 13.412Q190-307.175 190-287v97Zm581 0v-97q0-20.175 12.658-33.588Q796.316-334 816.14-334q18.825 0 32.342 13.412Q862-307.175 862-287v142q0 20.75-13.175 33.375T816-99H674.38q-21.68 0-34.53-12.86Q627-124.719 627-144.93q0-19.21 13.125-32.14T674-190h97ZM190-771v97q0 21.3-12.991 34.15-12.991 12.85-32.5 12.85Q124-627 111.5-640.125T99-674.38V-816q0-19.65 12.625-32.825Q124.25-862 145-862h142q20.175 0 33.588 13.468Q334-835.064 334-815.807q0 19.832-13.412 32.32Q307.175-771 287-771h-97Zm581 0h-97q-21.3 0-34.15-12.658Q627-796.316 627-816.14q0-18.825 13.125-32.342Q653.25-862 674.38-862H816q19.65 0 32.825 13.175Q862-835.65 862-816v141.62q0 21.68-13.468 34.53Q835.064-627 815.807-627q-19.832 0-32.32-13.125Q771-653.25 771-674v-97Z" />
                                <path class="hidden"
                                    d="M242-242h-98q-18.9 0-31.95-13.358T99-287.14q0-19.825 12.625-33.342Q124.25-334 145-334h143q18.25 0 32.125 13.875T334-288v144q0 18.9-13.468 31.95T287.307-99q-19.332 0-32.319-12.625Q242-124.25 242-145v-97Zm478 0v98q0 18.9-12.991 31.95T673.509-99Q653-99 640-111.625T627-145v-143q0-18.25 13.325-32.125T674.38-334H816q18.775 0 32.387 13.468Q862-307.064 862-287.307q0 19.332-13.613 32.319Q834.775-242 816-242h-96ZM242-720v-96q0-18.775 13.358-32.387Q268.716-862 287.14-862q19.825 0 33.342 13.613Q334-834.775 334-816v141.62q0 20.73-13.875 34.055T288-627H144q-18.9 0-31.95-13.56Q99-654.119 99-673.43q0-20.71 12.625-33.64T145-720h97Zm478 0h96q18.775 0 32.387 12.991Q862-694.018 862-673.509T848.387-640Q834.775-627 816-627H674.38q-20.73 0-34.055-13.325T627-674.38V-816q0-18.775 13.56-32.387Q654.119-862 673.43-862q20.71 0 33.64 13.613Q720-834.775 720-816v96Z" />
                            </svg>
                        </button>
                        <button title="{{ __('Download') }}" data-exec="Download"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-x-prime text-x-white relative p-2 lg:px-4 h-[36px] lg:h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent">
                            <svg class="block w-4 h-4 lg:w-5 lg:h-5 pointer-events-none" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M480.256-342q-8.399 0-17.849-3.773Q452.957-349.545 447-356L288-516q-14-12.364-13.708-31.208.291-18.844 14.317-32.363Q301.4-593.154 321-592.577 340.6-592 354-579l81 81v-278q0-19.65 12.86-32.825Q460.719-822 480.36-822 500-822 513-808.825T526-776v278l82-81q12.667-13 30.748-13.657 18.082-.657 32.411 12.577Q684-567 684-547.682q0 19.318-13 33.682L513-356q-5.81 6.455-15.221 10.227Q488.368-342 480.256-342ZM230-139q-37.175 0-64.087-26.913Q139-192.825 139-230v-98q0-18.375 12.86-31.688Q164.719-373 184.36-373 204-373 217-359.688q13 13.313 13 31.688v98h500v-98q0-18.375 13.56-31.688Q757.119-373 775.772-373q20.053 0 33.14 13.312Q822-346.375 822-328v98q0 37.175-27.206 64.087Q767.588-139 730-139H230Z" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="w-full aspect-square lg:aspect-[13.5/6] bg-x-white rounded-x-core shadow-x-core overflow-hidden">
                <div id="graph" class="w-full h-full relative"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var COLOR = "#000000";
        const DOC = document.documentElement;
        const DOWNLOAD = document.createElement("a");
        const CANVAS = document.createElement("canvas");
        const CONTEXT = CANVAS.getContext("2d");
        const color = document.querySelector("#color");
        const draw = document.querySelector("#draw");
        const wrap = document.querySelector("#wrap");
        const execs = document.querySelectorAll("[data-exec]");
        const names = document.querySelectorAll("[data-name]");
        const btns = document.querySelectorAll("#names button");
        DOWNLOAD.download = "";

        function fullscreen(e) {
            e.querySelectorAll("path").forEach(c => c.classList.toggle("hidden"));
            const type = wrap.classList.contains("fixed") ? "remove" : "add";
            ["bg-gray-100", "fixed", "inset-0", "z-[100]", "p-4"].forEach(c => {
                wrap.classList[type](c);
            });

            if (type === "add") {
                wrap.children[1].classList.add("flex-[1]");
                wrap.children[1].classList.remove("aspect-square", "lg:aspect-[13.5/6]");
            } else {
                wrap.children[1].classList.remove("flex-[1]");
                wrap.children[1].classList.add("aspect-square", "lg:aspect-[13.5/6]");
            }

            if (app.onResize) app.onResize();
            if (app.resizeView) app.resizeView();
        }

        function downlaod() {
            CONTEXT.clearRect(0, 0, CANVAS.width, CANVAS.height);
            CANVAS.height = wrap.clientHeight;
            CANVAS.width = wrap.clientWidth;
            const canvases = document.querySelectorAll("#graph canvas");
            if (canvases.length) {
                canvases.forEach(canvas => {
                      const factor = Math.min(
          CANVAS.width / canvas.width,
          CANVAS.height / canvas.height
        );

        CONTEXT.drawImage(
          canvas,
          CANVAS.width / 2 - (canvas.width * factor) / 2,
          CANVAS.height / 2 - (canvas.height * factor) / 2,
          canvas.width * factor,
          canvas.height * factor
        );
                });
            }

            DOWNLOAD.href = CANVAS.toDataURL("image/png");
            DOWNLOAD.click();
        }

        btns.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                btns.forEach((_btn) => {
                    _btn.classList.remove("!bg-x-acent");
                });
                btn.classList.add("!bg-x-acent");
            });
        });

        window.addEventListener("resize", () => {
            if (app.onResize) app.onResize();
            if (app.resizeView) app.resizeView();
        });

        [color, draw].forEach(el => {
            el.addEventListener("click", (e) => {
                if (e.target === el && !el.classList.contains("pointer-events-none")) {
                    el.previousElementSibling.click();
                }
            });
        });

        [color.children[0], draw.children[0]].forEach(el => {
            el.addEventListener("click", (e) => {
                e.stopPropagation();
            });
        });

        window.addEventListener("click", (e) => {
            if (!color.parentElement.contains(e.target) && !color.classList.contains("pointer-events-none")) {
                document.querySelector("#color_trigger").click();
            }
            if (!draw.parentElement.contains(e.target) && !draw.classList.contains("pointer-events-none")) {
                document.querySelector("#draw_trigger").click();
            }
        });
    </script>
    @if ($data->mime == 'application/octet-stream')
        <script src="{{ asset('js/viewer.js') }}"></script>
        <script>
            const actions = {
                Full: fullscreen,
                Download: downlaod,
                Undo: () => {
                    app.undo();
                },
                Reset: () => {
                    app.resetDisplay();
                },
                Redo: () => {
                    app.redo();
                },
                Draw: (e) => {
                    if (e.dataset.draw === "Livewire") {
                        app.setTool("Livewire");
                    } else {
                        app.setTool("Draw");
                        app.setToolFeatures({
                            shapeName: e.dataset.draw,
                            shapeColour: COLOR,
                        });
                    }
                    document.querySelector("#draw_trigger").click();
                },
                Color: (e) => {
                    COLOR = e.dataset.color;
                    app.setToolFeatures({
                        shapeColour: COLOR,
                    });
                    document.querySelector("#color_trigger").click();
                },
            };

            const app = new dwv.App();
            app.init({
                dataViewConfigs: {
                    "*": [{
                        divId: "graph",
                    }, ],
                },
                tools: {
                    WindowLevel: {},
                    ZoomAndPan: {},
                    Livewire: {},
                    Opacity: {},
                    Scroll: {},
                    Draw: {
                        options: ["Arrow", "Ruler", "Protractor", "Rectangle", "Roi", "Ellipse", "Circle", "FreeHand"],
                    },
                },
            });

            app.loadURLs([
                "{{ asset('storage/documents/' . $data->name) }}"
            ]);
        </script>
    @else
        <script>
            var SIZE = 1;
            const size = document.querySelector("#size");
            size.addEventListener("click", (e) => {
                if (e.target === size && !size.classList.contains("pointer-events-none")) {
                    size.previousElementSibling.click();
                }
            });

            size.children[0].addEventListener("click", (e) => {
                e.stopPropagation();
            });

            window.addEventListener("click", (e) => {
                if (!size.parentElement.contains(e.target) && !size.classList.contains("pointer-events-none")) {
                    document.querySelector("#size_trigger").click();
                }
            });
            const actions = {
                Full: fullscreen,
                Download: downlaod,
                Undo: () => {
                    app.undo();
                },
                Reset: () => {
                    app.resetView();
                },
                Redo: () => {
                    app.redo();
                },
                Draw: (e) => {
                    app.drawShape(e.dataset.draw);
                    document.querySelector("#draw_trigger").click();
                },
                Color: (e) => {
                    COLOR = e.dataset.color;
                    app.setTheme({
                        color: COLOR
                    });
                    document.querySelector("#color_trigger").click();
                },
                Size: (e) => {
                    SIZE = +e.dataset.size;
                    app.setTheme({
                        stroke: SIZE
                    });
                    document.querySelector("#size_trigger").click();
                },
            };

            const app = new Board("graph");
            app.loadUrl("{{ asset('storage/documents/' . $data->name) }}");
        </script>
    @endif
    <script>
        names.forEach((name) => {
            name.addEventListener("click", (e) => {
                e.preventDefault();
                const name = e.target.dataset.name;
                const type = e.target.dataset.type;
                app["set" + type](name);
            });
        });

        execs.forEach((exec) => {
            exec.addEventListener("click", (e) => {
                e.preventDefault();
                const type = e.target.dataset.exec;
                actions[type](e.target);
            });
        });
    </script>
@endsection
