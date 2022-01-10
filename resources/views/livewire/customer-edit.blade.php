<div class="card">
    <div class="card-header">
        <i class="fa fa-plus"></i> {{ __('Create') }}
    </div>
    <form wire:submit.prevent="save" method="POST">
        @csrf
    <div class="card-body">
        <div class="row">
            <h4>{{ __('Customer Information') }}</h4>
        </div>
        @include('customers.inc.form')
    </div>
    <div class="card-footer">
        <button wire:click="clear()" class="btn btn-secondary"><i class="fa fa-times-circle"></i> {{ __('Cancel') }}</button>
        <button wire:loading.attr="disabled" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ __('Save') }}</button>
    </div>
    </form>
</div>

