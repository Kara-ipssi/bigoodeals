$(function () {
    'use strict';
    if ($("#sample-data-table").length) {
        $("#sample-data-table").DataTable({
        	   language: {url:"//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"},
        });
     
    }

    if ($("#json-sample-data-table").length) {
        $("#json-sample-data-table").DataTable({
            "ajax": "../../../assets/js/TABLE_DATA.json",
            language: {url:"//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"},
            "columns": [{
                    "data": "name"
                },
                {
                    "data": "position"
                },
                {
                    "data": "office"
                },
                {
                    "data": "extn"
                },
                {
                    "data": "start_date"
                },
                {
                    "data": "salary"
                }
            ]
        });
    }

    if ($("#complex-header-table").length) {
        $("#complex-header-table").DataTable({
        	   "language": {url:"//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"},
            stateSave: true
        });
    }

    if ($("#horizontal-scroll-table").length) {
        $("#horizontal-scroll-table").DataTable({
        	   language: {url:"//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"},
            stateSave: true,
            "scrollY": "50vh",
            "scrollX": true,
            "scrollCollapse": true,
        });
    }
});