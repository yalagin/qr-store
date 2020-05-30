<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Active</th>
        <th>Excluding Discounts</th>
        <th>Product Remark</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $categories)
            <tr>
                <td>{{ $categories->name }}</td>
            <td>{{ $categories->description }}</td>
            <td>{{ $categories->active }}</td>
            <td>{{ $categories->excluding_discounts }}</td>
            <td>{{ $categories->product_remark }}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categories.show', [$categories->id]) }}" class='btn btn-default btn-xs'><img src="media/svg/icons/Design/Circle.svg"/></a>
                        <a href="{{ route('categories.edit', [$categories->id]) }}" class='btn btn-default btn-xs'><img src="media/svg/icons/Design/Edit.svg"/></a>
                        {!! Form::button('<img src="media/svg/icons/General/Trash.svg"/>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
