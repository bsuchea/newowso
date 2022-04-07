@can('show_services')
<a href="{{ route('services.print.lic', $service->id) }}" target="_blank" class="btn btn-sm"><i class="fa fa-print"></i></a>
@endcan
@can('edit_services')
<a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
@endcan
@can('delete_services')
<a class="btn btn-light text-danger btn-sm btn-delete"
   data-alert-title="{{ __('Delete Message', ['attribute' => $service->brand_namekh]) }}"
   data-confirm="{{ __('Confirm') }}"
   data-cancel="{{ __('Cancel') }}"
   title="{{ __('Delete') }}"
   href="{{ route('services.destroy', $service->service_id) }}">
    <i class="fas fa-trash"></i>
</a>
@endcan
