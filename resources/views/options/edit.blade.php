@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            @lang('models/options.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($options, ['route' => ['options.update', $options->id], 'method' => 'patch']) !!}

                        @include('options.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
