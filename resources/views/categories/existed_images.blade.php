@if ($categories ?? false && $categories->images ?? false)
    @foreach ($categories->images as $image)
        <div class="dropzone dropzone-multi">
            <div class="dropzone-items ">
                <div class="dropzone-item " style="">
                    <div class="dropzone-file">
                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                            <span data-dz-name="">{{$image->name}}</span>
                            <span data-dz-name="">{{$image->image_url}}</span>
                        </div>
                        <img size="" src="/{{$image->image_url}}" width="120" height="120" />
                        <div class="dropzone-error" data-dz-errormessage=""></div>
                    </div>
                    <div class="dropzone-progress">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                 aria-valuenow="0" data-dz-uploadprogress=""></div>
                        </div>
                    </div>
                    <div class="dropzone-toolbar">
                <span class="dropzone-delete delete-related-image" id="image_delete_{{$image->id}}" data-image-id="{{$image->id}}"  >
                    <i class="flaticon2-cross"></i>
                </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@section('additional-scripts')
    <script>
        $( ".delete-related-image" ).click(function(e) {
             const element = $( this );
            swal.fire({
                title: "Are you sure?",
                text: "You won\"t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    const id = element.data("imageId");
                    element.closest(".dropzone-items").remove();
                    $.ajax({
                        url: uploadUrl + "/" + id,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                )
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
