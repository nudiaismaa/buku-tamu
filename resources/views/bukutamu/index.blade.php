@extends('layouts.admin')

@section('main-content')
<div class="container">
	<h2>Data Tamu</h2>
	@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	<a href="{{ route('bukutamu.export') }}" class="btn btn-primary mb-3">Eksport Data ke XLSX</a>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Date and Time of Visit</th>
				<th>Name</th>
				<th>Mobile No</th>
				<th>Institutions</th>
				<th>Address</th>
				<th>Necessity</th>
				<th>Photo</th>
				<th>Signature</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($guests as $index => $guest)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $guest->visit_datetime }}</td>
				<td>{{ $guest->name }}</td>
				<td>{{ $guest->mobile_no }}</td>
				<td>{{ $guest->institutions }}</td>
				<td>{{ $guest->address }}</td>
				<td>{{ $guest->necessity }}</td>
				<td><img src="{{ Storage::url($guest->photo) }}" alt="{{ $guest->name }}" width="100"></td>
				<td><img src="{{ Storage::url($guest->signature) }}" alt="Signature of {{ $guest->name }}" width="100"></td>
				<td>
					<a href="{{ route('bukutamu.edit', $guest->id) }}" class="btn btn-warning">Edit</a>
					<form action="{{ route('bukutamu.destroy', $guest->id) }}" method="POST" style="display:inline-block;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
