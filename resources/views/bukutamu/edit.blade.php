@extends('layouts.admin')

@section('main-content')
<div class="container">
	<h2>Edit Data Tamu</h2>
	@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form action="{{ route('bukutamu.update', $guest->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="visit_datetime">Date and Time of Visit:</label>
			<input type="datetime-local" name="visit_datetime" id="visit_datetime" class="form-control" value="{{ \Carbon\Carbon::parse($guest->visit_datetime)->format('Y-m-d\TH:i') }}" required>
		</div>
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $guest->name }}" required>
		</div>
		<div class="form-group">
			<label for="mobile_no">Mobile No:</label>
			<input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{ $guest->mobile_no }}" required>
		</div>
		<div class="form-group">
			<label for="institutions">Institutions:</label>
			<input type="text" name="institutions" id="institutions" class="form-control" value="{{ $guest->institutions }}" required>
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" class="form-control" value="{{ $guest->address }}" required>
		</div>
		<div class="form-group">
			<label for="necessity">Necessity:</label>
			<input type="text" name="necessity" id="necessity" class="form-control" value="{{ $guest->necessity }}" required>
		</div>
		<div class="form-group">
			<label for="photo">Photo:</label>
			<input type="file" name="photo" id="photo" class="form-control">
			@if($guest->photo)
			<img src="{{ Storage::url($guest->photo) }}" alt="{{ $guest->name }}" width="100">
			@endif
		</div>
		<div class="form-group">
			<label for="signature_image">Signature Image:</label>
			<input type="file" name="signature_image" id="signature_image" class="form-control">
			@if($guest->signature)
			<img src="{{ Storage::url($guest->signature) }}" alt="Signature" width="100">
			@endif
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection
