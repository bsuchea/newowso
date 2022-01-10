<div class="card">
    <div class="card-header">
        <i class="fa fa-edit"></i> {{ __('Edit') }}
    </div>
    <form wire:submit.prevent="save" method="POST">
        @csrf
    <div class="card-body">
        <div class="row">
            <h4>{{ __('Business Information') }}</h4>
        </div>
        <div class="row">
            <div class="col">
                <label for="date_in">{{ __('Date in') }} <span class="text-danger">*</span></label>
                <input wire:model="date_in" class="form-control" type="date" name="date_in" id="date_in">
                <x-form.error key="date_in"/>
            </div>
            <div class="col">
                <label for="date_out">{{ __('Date out') }} <span class="text-danger">*</span></label>
                <input wire:model="date_out" type="date" name="date_out" id="date_out" class="{{ $errors->has('date_out') ? 'form-control is-invalid' : 'form-control' }}">
                <x-form.error key="date_out"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="letter_number">{{ __('Letter Number') }} <span class="text-danger">*</span></label>
                <x-form.input name="letter_number"/>
                <x-form.error key="letter_number"/>
            </div>
            <div class="col">
                <label for="amount">{{ __('Amount') }} ({{ __('gauge') }})</label>
                <input wire:model="amount" type="number" name="amount" id="amount" class="{{ $errors->has('amount') ? 'form-control is-invalid' : 'form-control' }}">
                <x-form.error key="amount"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="sector">{{ __('Sector') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="sector_id" name="sector_id" id="sector_id" class="form-control" >
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="sector_id"/>
            </div>
            <div class="col">
                <label for="service_type">{{ __('Service Type') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="service_type_id" name="service_type_id" id="service_type_id" class="form-control" required>
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($service_types as $service_type)
                        <option value="{{ $service_type->id }}">{{ $service_type->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="service_type_id"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="brand_namekh">{{ __('Brand Name') }} <span class="text-danger">*</span></label>
                <x-form.input name="brand_namekh"/>
                <x-form.error key="brand_namekh"/>
            </div>
            <div class="col">
                <label for="brand_nameen">{{ __('Brand Name English') }}</label>
                <x-form.input name="brand_nameen"/>
                <x-form.error key="brand_nameen"/>
            </div>
            <div class="col">
                <label for="business_type">{{ __('Business Type') }}</label>
                <x-form.input name="business_type"/>
                <x-form.error key="business_type"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="phone">{{ __('Phone') }} </label>
                <x-form.input name="phone"/>
                <x-form.error key="phone"/>
            </div>
            <div class="col">
                <label for="commune">{{ __('Commune') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="commune_id" name="commune_id" id="commune_id" class="form-control">
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="service_type_id"/>
            </div>
            <div class="col">
                <label for="village">{{ __('Village') }} <span class="text-danger">*</span></label>
                <select wire:model.lazy="village_id" name="village_id" id="village_id" class="form-control" required>
                    <option value="">--{{ __('Choose') }}--</option>
                    @foreach($villages as $village)
                        <option value="{{ $village->id }}">{{ $village->namekh }}</option>
                    @endforeach
                </select>
                <x-form.error key="village_id"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="locate">{{ __('Location') }} </label>
                <x-form.input name="locate"/>
                <x-form.error key="locate"/>
            </div>
            <div class="col">
                <label for="home">{{ __('Home Number') }} </label>
                <x-form.input name="home"/>
                <x-form.error key="home"/>
            </div>
            <div class="col">
                <label for="group">{{ __('Group') }} </label>
                <x-form.input name="group"/>
                <x-form.error key="group"/>
            </div>
            <div class="col">
                <label for="street">{{ __('Street') }} </label>
                <x-form.input name="street"/>
                <x-form.error key="street"/>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>{{ __('Customer Information') }}</h4>
        </div>
        <div class="row">
            <div class="col">
                <label for="customer">{{ __('Customer') }} <span class="text-danger">*</span></label><br>
                <div class="form-check form-check-inline">
                  <input wire:model="customer_new" value="1" class="form-check-input" type="radio" name="customer_status" id="customer_status1">
                  <label class="form-check-label" for="customer_status1">
                      {{ __('New') }}
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input wire:model="customer_new" value="0" class="form-check-input" type="radio" name="customer_status" id="customer_status2" checked>
                  <label class="form-check-label" for="customer_status2">
                    {{ __('Old') }}
                  </label>
                </div>
            </div>

            {{-- for old customers--}}
            @if($customer_new==0)
            <div class="col">
                <label for="customer_id">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
                <input wire:model="search_customer" wire:keydown.backspace="$set('customer_id', 0)"
                   class="form-control"
                   type="search" placeholder="{{ __('Search') }}" >
                <x-form.error key="search_customer"/>
                @if(!$customer_id)
                <ul class="dropdown-menu ml-2 p-0" style="display:block; margin: 0 auto; width: 99%">
                    @foreach($cusdata as $dt)
                        <li class="autocomplete">
                            <a href="#" wire:click="selectCustomer({{ $dt->id }}, '{{ $dt->namekh }}')" >
                                <div class="d-flex">
                                    <div class="text-sm text-muted pt-2">
                                        <h6 class="mb-0">
                                            {{ $dt->namekh }} ( {{ $dt->gender }} )
                                        </h6>
                                        <p class="mb-0 "> ថ្ងៃខែឆ្នាំកំណើត៖{{ $dt->dob }}  </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endif
        </div>
        @if($customer_new==1)

        @include('customers.inc.form')

        @endif
    </div>
    <div class="card-footer">
        <button wire:click="clear()" class="btn btn-secondary"><i class="fa fa-times-circle"></i> {{ __('Cancel') }}</button>
        <button wire:loading.attr="disabled" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ __('Save') }}</button>
    </div>
    </form>
</div>

