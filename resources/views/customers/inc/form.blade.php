<div class="row">
            <div class="col">
                <label for="customer_namekh">{{ __('Name') }} </label>
                <x-form.input name="customer_namekh"/>
                <x-form.error key="customer_namekh"/>
            </div>

            <div class="col">
                <label for="customer_nameen">{{ __('Latin Name') }} </label>
                <x-form.input name="customer_nameen"/>
                <x-form.error key="customer_nameen"/>
            </div>

            <div class="col">
                <label for="gender">{{ __('Gender') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="gender" name="gender" id="gender" class="form-control">
                    <option value="">--{{ __('Choose') }}--</option>
                    <option value="ប្រុស"> {{ __('Male') }}​ </option>
                    <option value="ស្រី"> {{ __('Female') }}​ </option>
                </select>
                <x-form.error key="gender"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="dob">{{ __('DoB') }} <span class="text-danger">*</span></label>
                <input wire:model.lazy="dob" type="date" name="dob" id="dob" class="form-control" />
                <x-form.error key="dob"/>
            </div>
            <div class="col">
                <label for="national_id">{{ __('National ID') }} </label>
                <x-form.input name="national_id"/>
                <x-form.error key="national_id"/>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label for="customer_province">{{ __('Province') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="customer_province" name="customer_province" id="customer_province" class="form-control">
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($customer_provinces as $customer_province)
                        <option value="{{ $customer_province->id }}">{{ $customer_province->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="customer_province"/>
            </div>
            <div class="col">
                <label for="customer_district">{{ __('District') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="customer_district" name="customer_district" id="customer_district" class="form-control">
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($customer_districts as $customer_district)
                        <option value="{{ $customer_district->id }}">{{ $customer_district->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="customer_villag"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="customer_commune">{{ __('Commune') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="customer_commune" name="customer_commune" id="customer_commune" class="form-control">
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($customer_communes as $customer_commune)
                        <option value="{{ $customer_commune->id }}">{{ $customer_commune->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="customer_commune"/>
            </div>
            <div class="col">
                <label for="customer_village">{{ __('Village') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="customer_village" name="customer_village" id="customer_village" class="{{ $errors->has('customer_village') ? 'form-control is-invalid' : 'form-control' }}">
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($customer_villages as $customer_village)
                        <option value="{{ $customer_village->id }}">{{ $customer_village->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="customer_village"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="home">{{ __('Home Number') }} </label>
                <x-form.input name="customer_home"/>
                <x-form.error key="customer_home"/>
            </div>
            <div class="col">
                <label for="group">{{ __('Group') }} </label>
                <x-form.input name="customer_group"/>
                <x-form.error key="customer_group"/>
            </div>
            <div class="col">
                <label for="street">{{ __('Street') }} </label>
                <x-form.input name="customer_street"/>
                <x-form.error key="customer_street"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="customer_phone">{{ __('Phone') }} </label>
                <x-form.input name="customer_phone"/>
                <x-form.error key="customer_phone"/>
            </div>

            <div class="col">
                <label for="customer_email">{{ __('Email') }} </label>
                <x-form.input name="customer_email"/>
                <x-form.error key="customer_email"/>
            </div>
        </div>
