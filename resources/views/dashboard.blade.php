<x-admin-layout :title="$title" :spin-logo="true" active-route="{{$activeRoute ?? ''}}">
    <x-slot name="header">
        <x-admin-content-header :title="$title" :breadcrumb="$breadcrumb"/>
    </x-slot>
    <x-form.flash-top-header/>

    <div class="row g-4">
        <div class="col-7">
            <livewire:options />
        </div>
        <div class="col-5">

        </div>
    </div>

</x-admin-layout>

