import helper from "../Core/Helper";


// Datatable Column Defs

var columnDefs = [{
    "targets": 6,
    "orderable": false
}, {
    "searchable": false,
    "targets": 6
}]; // Datatable Columns

var columns = [ {
    data: 'namekh',
    name: 'namekh'
}, {
    data: 'nameen',
    name: 'nameen'
}, {
    data: 'gender',
    name: 'gender'
}, {
    data: 'dob',
    name: 'dob'
}, {
    data: 'phone',
    name: 'phone'
}, {
    data: 'national_id',
    name: 'national_id'
}, {
    data: 'action',
    name: 'action',
    orderable: false
}];

/**
 * Class User
 */

/**
 * Class User
 */
class Customer {
    constructor() {
        let dataTable = helper.ajaxDatatable("#index-dataTable", columnDefs, columns, []);
        helper.deleteRecord(dataTable);
    }
}

let user = new Customer();
