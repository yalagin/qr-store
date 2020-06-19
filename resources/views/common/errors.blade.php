@if(!empty($errors))
    @if($errors->any())
        <ul role="alert" class="alert alert-danger" style="list-style-type: none">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
            >&times;</button>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
@endif
