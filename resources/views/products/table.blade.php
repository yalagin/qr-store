<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Main Description</th>
                <th>Additional Description</th>
                <th>Minor Description</th>
                <th>Main Product</th>
                <th>Price</th>
                <th>Vat Code</th>
                <th>Active</th>
                <th>Sold Out</th>
                <th>Ean</th>
                <th>Is Receipt</th>
                <th>Is Kitchen</th>
                <th>Is Sticker</th>
                <th>Is Deal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $products)
            <tr>
                <td>
                    @if(!$products->images->isEmpty() )
                        <img src="/{{ $products->images->first()->image_url }}"  alt="image" style="max-width: 120px"/>
                    @else
                    -/-
                    @endif
                </td>
                <td>{{ $products->name }}</td>
                <td>{{ $products->main_description }}</td>
                <td>{{ $products->additional_description }}</td>
                <td>{{ $products->minor_description }}</td>
                <td>{{ $products->main_product }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->vat_code }}</td>
                <td>{{ $products->active }}</td>
                <td>{{ $products->sold_out }}</td>
                <td>{{ $products->ean }}</td>
                <td>{{ $products->is_receipt }}</td>
                <td>{{ $products->is_kitchen }}</td>
                <td>{{ $products->is_sticker }}</td>
                <td>{{ $products->is_deal }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$products->id]) }}" class='btn btn-secondary btn-xs'>Show</a>
                        <a href="{{ route('products.edit', [$products->id]) }}" class='btn btn-secondary btn-xs'>Edit</a>
                        {!! Form::button('Delete product from database', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
