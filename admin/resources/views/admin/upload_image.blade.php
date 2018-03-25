@extends('admin.layouts.csgo')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create Page</li>
      </ol>
    

   {!! Form::open(['route' => 'UploadImage','files'=>true]) !!}
	   

		<div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Title" aria-label="Title" id="title" name="title" aria-describedby="basic-addon2">
		  {{ $errors->first('title') }}
		</div>

		

		<div class="input-group mb-3">
		  <textarea  class="form-control" placeholder="Description" aria-label="Description" id="description" name="description" aria-describedby="basic-addon2"></textarea>
		   {{ $errors->first('description') }}
		</div>

		<div class="input-group mb-3">
		 	 {!! Form::file('image', array('class' => 'form-control')) !!}
		   {{ $errors->first('image') }}
		</div>
		
		<div class="input-group mb-3">
		{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
		</div>
	

	{!! Form::close() !!}

@endsection
