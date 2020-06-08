<div class="row">
    <!--begin::Row-->
    @foreach($categories as $categories)
        <!--begin::Col-->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end">
                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                             data-placement="left">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover py-5">
                                    <li class="navi-item">
                                        <a href="{{ route('categories.edit', [$categories->id]) }}" class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2-drop"></i>
                                                                    </span>
                                            <span class="navi-text">Edit</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                                        <a href="#" class="navi-link delete-related-category">
                                            <span class="navi-icon">
                                                <i class="flaticon2-list-3"></i>
                                            </span>
                                            <span class="navi-text" type="submit" >Delete</span>
                                        </a>
                                        {!! Form::close() !!}
                                    </li>

                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            @if ($categories->images->first())
                                <div class="symbol symbol-circle symbol-lg-75">
                                    <img src="/{{ $categories->images->first()->image_url}}" alt="image"/>
                                </div>
                            @else
                                <div class="symbol symbol-lg-75 symbol-circle symbol-primary ">
                                    <span class="symbol-label font-size-h3 font-weight-boldest">{{ substr($categories->name, 0, 2) }}</span>
                                </div>
                            @endif
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $categories->name }}</a>
                            <span class="text-muted font-weight-bold">Menu name (belongs to menu ...)</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->
                    <!--begin::Desc-->
                    <p class="mb-7"><td>{{ $categories->description }}</td>
                    </p>
                    <!--end::Desc-->
                    <!--begin::Info-->
                    <div class="mb-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Active:</span>
                            <a href="#" class="text-muted text-hover-primary">{{ $categories->active }}</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">Excluding discounts:</span>
                            <a href="#" class="text-muted text-hover-primary">{{ $categories->excluding_discounts }}</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Product remark:</span>
                            <span class="text-muted font-weight-bold">{{ $categories->product_remark }}</span>
                        </div>
                    </div>
                    <!--end::Info-->
                    <a href="{{ route('categories.show', [$categories->id]) }}" class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4">Show me {{ $categories->name }}</a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
            {{--<td>{{ $categories->name }}</td>
            <td>{{ $categories->description }}</td>
            <td>{{ $categories->active }}</td>
            <td>{{ $categories->excluding_discounts }}</td>
            <td>{{ $categories->product_remark }}</td>
            <td>
                {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('categories.show', [$categories->id]) }}" class='btn btn-secondary btn-xs'>Show</a>
                    <a href="{{ route('categories.edit', [$categories->id]) }}" class='btn btn-secondary btn-xs'>Edit</a>
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
@endforeach
</div>
<!--end::Row-->
@section('additional-scripts')

    <script>
        $(document).ready(function() {
            $( ".delete-related-category" ).click(function(e) {
                const element = $( this );
                swal.fire({
                    title: "Are you sure?",
                    text: "You won\"t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) {
                        element.closest("form").submit();
                    }
                });
            });
        });
    </script>
@endsection
