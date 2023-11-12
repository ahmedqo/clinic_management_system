@extends('shared.admin.base')
@section('title', __('Documents List'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Documents List') }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <a href="{{ route('views.documents.create') }}"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
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
            <table x-table search filter remove="7" download="documents_list">
                <thead>
                    <tr>
                        <td>{{ __('Patient Name') }}</td>
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
                    @foreach ($data as $row)
                        <tr>
                            <td>
                                {{ strtoupper($row->patient()->last_name) }} {{ ucfirst($row->patient()->first_name) }}
                            </td>
                            <td>{{ ucwords(__($row->type)) }}</td>
                            <td>
                                <a href="{{ asset('storage/documents/' . $row->name) }}" download
                                    class="hover:underline focus-within:underline outline-none">
                                    {{ $row->origin }}
                                </a>
                            </td>
                            <td>{{ $row->mime }}</td>
                            <td>{{ Core::convert($row->size) }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                @include('shared.admin.action', [
                                    'view' => route('views.documents.summary', $row->id),
                                    'delete' => route('actions.documents.delete', $row->id),
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        x.DataTable();
    </script>
@endsection
