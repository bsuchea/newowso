<x-admin-layout :title="$title" active-route="{{$activeRoute ?? ''}}">
    <x-slot name="header">
        <x-admin-content-header :title="$title" :breadcrumb="$breadcrumb"/>
    </x-slot>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-th-list"></i> {{ __('Show All') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    @can('create_users')
                    <x-form.btn-create url="{{ route('customers.create') }}"/>
                    @endcan
                </div>
                <div class="col-lg-6 text-right">
                    @if($trash > 0)
                    <ul class="pl-0">
                        <li class="d-inline"><a href="{{ route('customers.index') }}" @if(empty(request('trash'))) class="text-gray-dark" @endif>  {{ __('All') }} @if($data) ({{ $data }}) @endif</a></li>
                        <li class="d-inline">|</li>
                        <li class="d-inline"><a href="?trash=true" @if(!empty(request('trash'))) class="text-gray-dark" @endif>{{ __('Trash') }} @if($trash) ({{ $trash }}) @endif</a></li>
                    </ul>
                    @endif
                </div>
            </div>
            <x-datatable url="{{ route('customers.dataTable', ['trash' => request('trash')]) }}" :thead="[
                __('Name'),
                __('Latin Name'),
                __('Gender'),
                __('DoB'),
                __('Phone'),
                __('National ID'),
                ''
            ]"/>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/customer.js') }}"></script>
    @endpush
</x-admin-layout>

