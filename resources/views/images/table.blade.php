<div class="table-responsive">
    <table class="table" id="images-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Image Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <td>{{ $image->name }}</td>
            <td>{{ $image->image_url }}</td>
                <td>
                    {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('images.show', [$image->id]) }}" class='btn btn-default btn-xs'><img src="media/svg/icons/Design/Circle.svg"/></a>
                        <a href="{{ route('images.edit', [$image->id]) }}" class='btn btn-default btn-xs'><img src="media/svg/icons/Design/Edit.svg"/></a>
                        {!! Form::button('<img src="media/svg/icons/General/Trash.svg"/>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
