<script>
    $(function () {
        $(".dataTables_paginate").addClass("d-flex justify-content-between align-items-center flex-wrap");
        $(".pagination").addClass("d-flex flex-wrap py-2 mr-3");
        $(".paginate_button").addClass("btn  btn-sm border-0 btn-light mr-2 my-1");
        $(".paginate_button .active").addClass("btn-hover-primary active mr-2 my-1");
        $(".pagination:first-child").removeClass("btn-icon");

//hide original search and translate search form metronic to bundle !
        $('#dataTableBuilder_filter').hide();
        var info = $('#dataTableBuilder_info');
        var length = $('#dataTableBuilder_length');
        $('#page_title').after(info);
// info.after(length)
        length.css('padding-left', ' 1rem');
        var a = $('#kt_subheader_search_form');
        var b = $('#dataTableBuilder_filter').find('input');

        var val = b.val();
        a.val(val);
        a.on("input", function (e) {
            var val = $(this).val();
            val = val.replace(/[^\w]+/g, "");
            b.val(val).trigger("change").keydown().keypress().keyup();
        });


//buttons
        $('#csv-button').click(function () {
            $(".buttons-csv").click();
        });
        $('#pdf-button').click(function () {
            $(".buttons-pdf").click();
        });
        $('#excel-button').click(function () {
            $(".buttons-excel").click();
        })
        $('#print-button').click(function () {
            $(".buttons-print").click();
        })
        $('#reset-button').click(function () {
            $(".buttons-reset").click();
            a.val("");
        })
        $('#reload-button').click(function () {
            $(".buttons-reload").click();
        })
        $('#create-button').click(function () {
            $(".buttons-create").click();
        })

    });
</script>
{{--@section('styles')--}}
{{--    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}
