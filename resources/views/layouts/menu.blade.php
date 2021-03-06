<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('images*') ? 'active' : '' }}">
    <a href="{{ route('images.index') }}"><i class="fa fa-edit"></i><span>Images</span></a>
</li>


<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('options*') ? 'active' : '' }}">
    <a href="{{ route('options.index') }}"><i class="fa fa-edit"></i><span>@lang('models/options.plural')</span></a>
</li>

<li class="{{ Request::is('vats*') ? 'active' : '' }}">
    <a href="{{ route('vats.index') }}"><i class="fa fa-edit"></i><span>@lang('models/vats.plural')</span></a>
</li>


<li class="{{ Request::is('currencies*') ? 'active' : '' }}">
    <a href="{{ route('currencies.index') }}"><i class="fa fa-edit"></i><span>@lang('models/currencies.plural')</span></a>
</li>

<li class="{{ Request::is('dateTimes*') ? 'active' : '' }}">
    <a href="{{ route('dateTimes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/date_times.plural')</span></a>
</li>

