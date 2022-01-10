
@can('edit_customers')
<a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
@endcan
@can('delete_customers')
<a class="btn btn-light text-danger btn-sm btn-delete"
   data-alert-title="{{ __('Delete Message', ['attribute' => $customer->namekh]) }}"
   data-confirm="{{ __('Confirm') }}"
   data-cancel="{{ __('Cancel') }}"
   title="{{ __('Delete') }}"
   href="{{ route('customers.destroy', $customer->id) }}">
    <i class="fas fa-trash"></i>
</a>
@endcan
