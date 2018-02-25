@extends('admin.layouts.csgo')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Page</li>
      </ol>
  

   {!! Form::open(['route' => 'editPage']) !!}
	    <div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Name" aria-label="Name" id="name" value="{{ $page->name }}" name="name" aria-describedby="basic-addon2">
		  {{ $errors->first('name') }}
		</div>

		<div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Title" aria-label="Title" value="{{ $page->title }}" id="title" name="title" aria-describedby="basic-addon2">
		  {{ $errors->first('title') }}
		</div>

		<div class="input-group mb-3">
		  <input type="text" class="form-control" placeholder="Meta Title" aria-label="Meta Title" id="metaTitle" value="{{ $page->metaTitle }}" name="metaTitle" aria-describedby="basic-addon2">
		   {{ $errors->first('metaTitle') }}
		</div>

		<div class="input-group mb-3">
		  <textarea  class="form-control" placeholder="Meta Description"  aria-label="Meta Description" id="metaDescription" name="metaDescription" aria-describedby="basic-addon2"> {{ $page->metaDescription }} </textarea>
		   {{ $errors->first('metaDescription') }}
		</div>

		<div class="input-group mb-3">
		  <textarea  class="form-control" placeholder="Content" value="" aria-label="Content" id="content" name="content" aria-describedby="basic-addon2">{{ $page->content }}</textarea>
		   {{ $errors->first('content') }}

		   <input type="hidden" name="page_id" id="page_id" value="{{ $page->page_id }}" />
		</div>

		<div class="input-group mb-3">
		{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
		</div>
	

	{!! Form::close() !!}

@endsection
