<x-admin-layout :title="$title" active-route="{{$activeRoute ?? ''}}">
    <x-slot name="header">
        <x-admin-content-header :title="$title" :breadcrumb="$breadcrumb"/>
    </x-slot>
    <div class="row">
        <div class="offset-lg-2 col-lg-8">
            <livewire:service-create />
        </div>
    </div>
</x-admin-layout>

