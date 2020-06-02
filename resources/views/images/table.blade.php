<div class="table-responsive">
    <table class="table" id="images-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Image Url</th>
        <th>Categories Id</th>
        <th>Products Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <td>{{ $image->name }}</td>
            <td>{{ $image->image_url }}</td>
            <td>{{ $image->categories_id }}</td>
            <td>{{ $image->products_id }}</td>
                <td>
                    {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('images.show', [$image->id]) }}" class='btn btn-secondary btn-xs'>Show</a>
                        <a href="{{ route('images.edit', [$image->id]) }}" class='btn btn-secondary btn-xs'>Edit</a>
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
