<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <label for="sector">{{ __('Sector') }} <span class="text-danger">*</span></label>
                    <select wire:model.lazy="sector_id" name="sector_id" id="sector_id" class="form-control">
                        <option value="">--{{ __('Choose') }}--</option>
                        @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->namekh }}</option>
                        @endforeach
                    </select>
                    <x-form.error key="sector_id"/>
                </div>

                <div class="col">
                    <label for="fromdate">{{ __('From Date') }} <span class="text-danger">*</span></label>
                    <input wire:model.lazy="fromdate" type="date" name="fromdate" id="fromdate" class="form-control"/>
                    <x-form.error key="fromdate"/>
                </div>
                <div class="col">
                    <label for="todate">{{ __('To Date') }} <span class="text-danger">*</span></label>
                    <input wire:model.lazy="todate" type="date" name="todate" id="todate" class="form-control"/>
                    <x-form.error key="todate"/>
                </div>
                <div class="col">
                    <label for="Export"> &nbsp; </label>
                    <button wire:click="export()" class="form-control btn-info">Export Excel</button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <table class="table dt-responsive nowrap ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Letter Number') }}</th>
                        <th>{{ __('Customer Name') }}</th>
                        <th>{{ __('Brand Name') }}</th>
                        <th>{{ __('Gender') }}</th>
                        <th>{{ __('Business Type') }}</th>
                        <th>{{ __('Village') }}</th>
                        <th>{{ __('Commune') }}</th>
                        <th>{{ __('Service Type') }}</th>
                        <th>{{ __('Date out') }}</th>
                        <th>{{ __('Phone') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($query as $q)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $q->letter_number }}</td>
                        <td>{{ $q->namekh }}</td>
                        <td>{{ $q->brand_namekh }}</td>
                        <td>{{ $q->gender }}</td>
                        <td>{{ $q->business_type }}</td>
                        <td>{{ $q->village }}</td>
                        <td>{{ $q->commune }}</td>
                        <td>{{ $q->service_type }}</td>
                        <td>{{ $q->date_out }}</td>
                        <td>{{ $q->phone }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>

    </div>

</div>
