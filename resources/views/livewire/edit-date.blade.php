<div>
    <form wire:submit.prevent="save">

            <div class="card">
                <div class="card-body">
                    @foreach($sectors as $index => $sector)
                        <div class="row">
                            <div class="col-3">
                                <h6> {{ __($sector->namekh) }}</h6>
                            </div>
                            <div class="col-9">
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" wire:model="sectors.{{$index}}.lunar_date"
                                               class="{{ $errors->has('sectors.'.$index.'.lunar_date') ? 'form-control is-invalid' : 'form-control' }}">
                                        <x-form.error key="sectors.{{$index}}.lunar_date"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" wire:model="sectors.{{$index}}.date"
                                               class="{{ $errors->has('sectors.'.$index.'.date') ? 'form-control is-invalid' : 'form-control' }}">
                                        <x-form.error key="sectors.{{$index}}.date"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
                <div class="card-footer text-right">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ __('Save') }}</button>
                </div>
            </div>

    </form>
</div>


