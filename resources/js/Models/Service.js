import helper from "../Core/Helper";


// Datatable Column Defs

var columnDefs = [{
    "targets": 3,
    "orderable": false
}, {
    "searchable": false,
    "targets": [0, 3]
}]; // Datatable Columns

var columns = [ {
    data: 'namekh',
    name: 'namekh'
}, {
    data: 'brand_namekh',
    name: 'brand_namekh'
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
