@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-hover table-checkable dataTable no-footer collapsed']) !!}
{{--dropdown--}}
@push('page_toolbar_right')
    <!--begin::Dropdown-->
    <div class="dropdown dropdown-inline mr-2">
        <button type="button" class="btn btn-light-primary font-weight-bold py-2 px-5 ml-2 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                <svg xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none"
                       fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path
                            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                            fill="#000000" opacity="0.3"/>
                        <path
                            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                            fill="#000000"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>Export
        </button>
        <!--begin::Dropdown Menu-->
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <!--begin::Navigation-->
            <ul class="navi flex-column navi-hover py-2">
                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an
                    option:
                </li>
                <li class="navi-item" id="print-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-print"></i>
                        </span>
                        <span class="navi-text">Print</span>
                    </a>
                </li>
                <li class="navi-item" id="excel-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-file-excel-o"></i>
                        </span>
                        <span class="navi-text">Excel</span>
                    </a>
                </li>
                <li class="navi-item" id="csv-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-file-text-o"></i>
                        </span>
                        <span class="navi-text">CSV</span>
                    </a>
                </li>
                <li class="navi-item" id="pdf-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-file-pdf-o"></i>
                        </span>
                        <span class="navi-text">PDF</span>
                    </a>
                </li>

                <li class="navi-item" id="reload-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-undo-alt"></i>
                        </span>
                        <span class="navi-text">Reload</span>
                    </a>
                </li>

                <li class="navi-item" id="reset-button">
                    <a href="#" class="navi-link">
                        <span class="navi-icon">
                            <i class="la la-undo"></i>
                        </span>
                        <span class="navi-text">Reset</span>
                    </a>
                </li>
            </ul>
            <!--end::Navigation-->
        </div>
        <!--end::Dropdown Menu-->
    </div>
    <!--end::Dropdown-->


    <div class="input-group input-group-sm input-group-solid " style="max-width: 175px">
        <input type="search" class="form-control" id="kt_subheader_search_form" placeholder="Search..."
               aria-controls="dataTableBuilder">
        <div class="input-group-append">
                <span class="input-group-text">
                    <span class="svg-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path
                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path
                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                    fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                </span>
        </div>
    </div>
@endpush
@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
        @include('datatables_helper')
@endpush
