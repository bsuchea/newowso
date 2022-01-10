import helper from "../Core/Helper";


// Datatable Column Defs

var columnDefs = [{
    "targets": 7,
    "orderable": false
}, {
    "searchable": false,
    "targets": [0, 7]
}]; // Datatable Columns

var columns = [
    {
    data: 'date_out',
    name: 'date_out'
},{
    data: 'letter_number',
    name: 'letter_number'
}, {
    data: 'namekh',
    name: 'namekh'
}, {
    data: 'brand_namekh',
    name: 'brand_namekh'
}, {
    data: 'business_type',
    name: 'business_type'
}, {
    data: 'phone',
    name: 'phone'
}, {
    data: 'service_type',
    name: 'service_type'
}, {
    data: 'action',
    name: 'action',
    orderable: false
}];

class Service {
    constructor() {
        let dataTable = helper.ajaxDatatable("#index-dataTable", columnDefs, columns, []);
        helper.deleteRecord(dataTable);
    }
}

let user = new Service();