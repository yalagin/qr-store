<!-- Set up your HTML -->
<div class="owl-carousel">
    @foreach($images as $image)
        <div class="mr-4" >
            <div>{{ $image->name }}</div>
            <img src="/{{ $image->image_url }}" alt="{{ $image->name }}">
            <div class="center">
                {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('images.show', [$image->id]) }}" class='btn btn-secondary btn-xs'>Show</a>
                    <a href="/{{ $image->image_url }}" class='btn btn-secondary btn-xs'>Show Image</a>
                    <a href="{{ route('images.edit', [$image->id]) }}" class='btn btn-secondary btn-xs'>Edit</a>
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endforeach
</div>


@section('styles')
    <style>
        .center{
            padding-left: 4rem;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
        });
    </script>
@endsection
