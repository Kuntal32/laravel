@extends('admin.layouts.csgo')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create Page</li>
      </ol>
    

   {!! Form::open(['route' => 'CreatePage']) !!}
	    <div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Name" aria-label="Name" id="name" name="name" aria-describedby="basic-addon2">
		  {{ $errors->first('name') }}
		</div>

		<div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Title" aria-label="Title" id="title" name="title" aria-describedby="basic-addon2">
		  {{ $errors->first('title') }}
		</div>

		<div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Meta Title" aria-label="Meta Title" id="metaTitle" name="metaTitle" aria-describedby="basic-addon2">
		   {{ $errors->first('metaTitle') }}
		</div>

		<div class="input-group mb-3">
		  <textarea  class="form-control" placeholder="Meta Description" aria-label="Meta Description" id="metaDescription" name="metaDescription" aria-describedby="basic-addon2"></textarea>
		   {{ $errors->first('metaDescription') }}
		</div>

		<div class="input-group mb-3">
		  <textarea  class="form-control" placeholder="Content" aria-label="Content" id="content" name="content" aria-describedby="basic-addon2"></textarea>
		   {{ $errors->first('content') }}
		</div>

		<div class="input-group mb-3">
		{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
		</div>
	

	{!! Form::close() !!}

@endsection
