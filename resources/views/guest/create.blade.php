@extends('layouts.auth')

@section('main-content')
<div class="container guest-create">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('{{ asset('img/bukutamu.png') }}'); background-size: cover;"></div>

						<div class="col-lg-6">
							<div class="p-5">
								<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4"><strong>Buku Tamu</strong></h1>
								</div>
								<hr>
								@if ($errors->any())
								<div class="alert alert-danger border-left-danger" role="alert">
									<ul class="pl-4 my-2">
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif

								@if(session('success'))
								<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="successModalLabel">Success</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												{{ session('success') }}
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" id="redirectToWelcome">OK</button>
											</div>
										</div>
									</div>
								</div>
								<script>
									document.addEventListener('DOMContentLoaded', function () {
										var successModal = new bootstrap.Modal(document.getElementById('successModal'));
										successModal.show();

										document.getElementById('redirectToWelcome').addEventListener('click', function () {
											window.location.href = "{{ url('/') }}";
										});
									});
								</script>
								@endif

								<form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" class="user">
									@csrf
									<div class="form-group">
										<input type="datetime-local" name="visit_datetime" id="visit_datetime" class="form-control form-control-user" placeholder="Date and Time of Visit" required>
									</div>
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control form-control-user" placeholder="Nama Lengkap" required>
									</div>
									<div class="form-group">
										<input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-user" placeholder="Nomor HP" required>
									</div>
									<div class="form-group">
										<input type="text" name="institutions" id="institutions" class="form-control form-control-user" placeholder="Institusi" required>
									</div>
									<div class="form-group">
										<input type="text" name="address" id="address" class="form-control form-control-user" placeholder="Alamat" required>
									</div>
									<div class="form-group">
										<input type="text" name="necessity" id="necessity" class="form-control form-control-user" placeholder="Keperluan" required>
									</div>
									<div class="form-group">
										<label for="photo">Foto:</label>
										<div>
											<video id="video" width="320" height="240" autoplay></video>
											<button type="button" class="btn btn-primary mt-2" id="snap">Memotret</button>
											<canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
											<input type="hidden" name="photo" id="photo">
										</div>
									</div>
									<div class="form-group">
										<label for="signature">Tanda Tangan:</label>
										<div>
											<canvas id="signature-pad" class="signature-pad" width="320" height="240" style="border: 1px solid #000;"></canvas>
											<button type="button" class="btn btn-primary mt-2" id="clear-signature">Hapus</button>
											<input type="hidden" name="signature" id="signature">
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block"><strong>Simpan</strong></button>
									<hr>
								</form>

								<div class="text-center">
									<a class="small" href="/">Kembali ke Beranda</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="{{ asset('signature_pad-gh-pages/css/signature-pad.css') }}">
<script src="{{ asset('signature_pad-gh-pages/js/signature_pad.js') }}"></script>
<script>
	document.addEventListener('DOMContentLoaded', (event) => {
        // Initialize signature pad
		var canvas = document.getElementById('signature-pad');
		var signaturePad = new SignaturePad(canvas);

        // Clear signature pad
		document.getElementById('clear-signature').addEventListener('click', function () {
			signaturePad.clear();
		});

        // Access the camera
		var video = document.getElementById('video');
		var canvas = document.getElementById('canvas');
		var context = canvas.getContext('2d');
		var photoInput = document.getElementById('photo');

		if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
			navigator.mediaDevices.getUserMedia({ video: true })
			.then(function (stream) {
				video.srcObject = stream;
				video.play();
			})
			.catch(function (err) {
				console.log("An error occurred: " + err);
			});
		} else {
			console.log("getUserMedia not supported");
		}

        // Take photo
		document.getElementById('snap').addEventListener('click', function () {
			context.drawImage(video, 0, 0, 320, 240);
			var dataURL = canvas.toDataURL('image/png');
			photoInput.value = dataURL;
			canvas.style.display = 'block';
		});

        // Set current date and time to the input field
		var now = new Date();
		var year = now.getFullYear();
		var month = (now.getMonth() + 1).toString().padStart(2, '0');
		var day = now.getDate().toString().padStart(2, '0');
		var hour = now.getHours().toString().padStart(2, '0');
		var minute = now.getMinutes().toString().padStart(2, '0');
		var dateTime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
		document.getElementById('visit_datetime').value = dateTime;

        // Submit form
		function submitForm() {
			document.getElementById('signature').value = signaturePad.toDataURL();
			return true;
		}

		window.submitForm = submitForm;
	});
</script>
@endsection
