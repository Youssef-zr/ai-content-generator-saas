$(() => {
    window._token = $('meta[name="csrf-token"]').attr("content");

    $(".buttons-select-all", function () {
        $rows = $(".row-item");
        for (const $index in $rows) {
            if (Object.hasOwnProperty.call($rows, $index)) {
                const element = $rows[$index];
                if (element) {
                    $(element).prop("checked", true);
                }
            }
        }
    });

    $(".buttons-select-none", function () {
        $rows = $(".row-item");
        for (const $index in $rows) {
            if (Object.hasOwnProperty.call($rows, $index)) {
                const element = $rows[$index];
                $(element).prop("checked", false);
            }
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
    let copyButtonTrans = "Copy";
    let csvButtonTrans = "CSV";
    let excelButtonTrans = "Excel";
    let pdfButtonTrans = "PDF";
    let printButtonTrans = "Print";
    let colvisButtonTrans = "Columns";

    let languages = {
        en: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json",
    };
    $(".table").DataTable({
        language: {
            url: languages["en"],
        },
        columnDefs: [
            {
                orderable: false,
                className: "select-checkbox",
                targets: 0,
            },
            {
                orderable: false,
                searchable: false,
                targets: -1,
            },
        ],
        select: {
            style: "multi+shift",
            selector: "td:first-child",
        },
        order: [],
        scrollX: true,
        pageLength: 100,
        dom: 'lBfrtip<"actions">',
        buttons: [
            // {
            //     extend: "selectAll",
            //     className: "btn-primary",
            //     text: selectAllButtonTrans,
            //     exportOptions: {
            //         columns: ":visible",
            //     },
            //     action: function (e, dt) {
            //         e.preventDefault();
            //         dt.rows().deselect();
            //         dt.rows({ search: "applied" }).select();
            //     },
            // },
            // {
            //     extend: "selectNone",
            //     className: "btn-primary",
            //     text: selectNoneButtonTrans,
            //     exportOptions: {
            //         columns: ":visible",
            //     },
            // },
            {
                extend: "copy",
                className: "btn-default",
                text: copyButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "csv",
                className: "btn-default",
                text: csvButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "excel",
                className: "btn-default",
                text: excelButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "pdf",
                className: "btn-default",
                text: pdfButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "print",
                className: "btn-default",
                text: printButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "colvis",
                className: "btn-default",
                text: colvisButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
        ],
    });

    $.fn.dataTable.ext.classes.sPageButton = "";

    // other features
    // open modal remove
    var _url = "";
    $(".open-modal-remove").on("click", function () {
        _url = $(this).data("url");
    });
    
    // confim delete
    $(".confirm-delete").click(function () {
        let form = $(this).data("form");
        let $form = $("." + form);

        $form.attr("url", _url);
        $form.submit();
    });
});
