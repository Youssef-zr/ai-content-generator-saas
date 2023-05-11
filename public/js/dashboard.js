$(() => {
    $('[data-toggle="tooltip"]').not(".subscriptions").tooltip({
        placement: "left",
    });

    $(".subscriptions").tooltip({
        placement: "top",
    });

    let copyButtonTrans = "Copy";
    let csvButtonTrans = "CSV";
    let excelButtonTrans = "Excel";
    let pdfButtonTrans = "PDF";
    let printButtonTrans = "Print";
    let colvisButtonTrans = "Columns";
    let selectAllButtonTrans = "Select All";
    let selectNoneButtonTrans = "Desellect All";

    let languages = {
        en: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json",
    };
    $(".table").DataTable({
        language: {
            url: languages["en"],
        },
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
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
        pageLength: 10,
        dom: 'lBfrtip<"actions">',
        buttons: [
            {
                extend: "selectAll",
                className: "btn-primary btn-disabled",
                text: selectAllButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
                action: function (e, dt) {
                    e.preventDefault();
                    dt.rows().deselect();
                    dt.rows({ search: "applied" }).select();
                },
            },
            {
                extend: "selectNone",
                className: "btn-primary",
                text: selectNoneButtonTrans,
                exportOptions: {
                    columns: ":visible",
                },
            },
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
            {
                text: "Delete all",
                className: "btn-danger delete-all",
            },
        ],
    });

    $.fn.dataTable.ext.classes.sPageButton = "";

    // other features
    // open modal remove
    let formDelete = $(".form-remove-item");
    $(".open-modal-remove").on("click", function () {
        let $url = $(this).data("url");
        formDelete.attr("action", $url);
    });

    // confirm delete
    $(".confirm-delete").click(function () {
        formDelete.submit();
    });

    // start custom input file
    $(".inputfile").each(function () {
        var $input = $(this),
            $label = $input.next("label"),
            labelVal = $label.html();
        $input.on("change", function (e) {
            let $that = $(this);
            var fileName = "";

            if (this.files && this.files.length > 1)
                fileName = (
                    this.getAttribute("data-multiple-caption") || ""
                ).replace("{count}", this.files.length);
            else if (e.target.value)
                fileName = e.target.value.split("\\").pop();

            if (fileName) $label.find("span").html(fileName);
            else $label.html(labelVal);

            // change image preview
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    // let preview = $($(this).data('preview'));
                    let preview = $that.attr("data-preview");
                    $(preview).attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Firefox bug fix
        $input
            .on("focus", function () {
                $input.addClass("has-focus");
            })
            .on("blur", function () {
                $input.removeClass("has-focus");
            });
    });
    // end custom input file
});
