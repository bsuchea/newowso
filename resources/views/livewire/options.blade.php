<div>
    <form wire:submit.prevent="save">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <h6> {{ __('District') }} </h6>
                    </div>
                    <div class="col-9">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="pro">{{ __('Province') }}</label>
                                <select wire:model.lazy="pro" name="pro" class="form-control">
                                    <option value="">--{{ __('Choose') }}--</option>
                                    @foreach($provinces as $province)
                                        <option
                                            value="{{ $province->id }}">{{ $province->namekh }}</option>
                                    @endforeach
                                </select>
                                <x-form.error key="pro"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="dis">{{ __('District') }}</label>
                                <select wire:model.lazy="dis" name="dis" class="form-control">
                                    <option value="">--{{ __('Choose') }}--</option>
                                    @foreach($districts as $district)
                                        <option
                                            value="{{ $district->id }}">{{ $district->namekh }}</option>
                                    @endforeach
                                </select>
                                <x-form.error key="dis"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary"><i
                        class="fa fa-check-circle"></i> {{ __('Save') }}</button>
            </div>
        </div>

    </form>
</div>
