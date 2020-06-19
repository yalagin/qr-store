@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            Image
        </h1>
   </section>
   <div class="content">
       @include('common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('images.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
