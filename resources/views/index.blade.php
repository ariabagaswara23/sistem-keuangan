@extends('layouts.layout1')

@section('content')
	<!-- Konten Login -->
	<div class="container-fluid bg-login p-0" style="height: 100%;">
		{{-- Black Overlay --}}
		<div class="overlay">
			
		</div>
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle">
					<div class="login-box">
						<div class="row">
						<div class="col-md-12 login-form">
							<form action="/checking" method="POST">
								@csrf
								<img src="img/icon/stm.png" alt="" class="icon"><br>	
								<h3 class="login-title"><b style="color: #00A5CF">Sistem Keuangan Online</b> <br>Login</h3>
								<div class="form-group text-left mb-5">
									<input type="text" onkeypress="return hanyaAngka(event)" class="form-control input-login @error('nip') is-invalid @enderror" placeholder="NIP" name="nip" autocomplete="off">
								</div>
								<div class="form-group text-left">
									<input type="password" class="form-control input-login mb-2 @error('password') is-invalid @enderror" placeholder="Password" name="password">
								</div>
								<div class="form-check text-left pl-0">
									<input type="checkbox" class="input-checkbox" name="remember_me">
									<label class="form-check-label">Remember me</label>
								</div>
								@if (count($errors) > 0)
									<div class="alert alert-danger">
										
										<ul class="login-error">
											@foreach ($errors->all() as $error)
											<li class="alert-login" style="color: var(--black)">{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@if ($message = Session::get('pesan'))
									<div class="alert alert-danger alert-dismissible fade show text-center alert-error" role="alert">
										<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										<p class="alert-login" style="margin-bottom: 0; color: black">{{ $message }}</p>
									</div>
									@error('password')
										<div class="alert alert-danger alert-dismissible fade show text-center alert-error" role="alert">
											{{ $message }}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									@enderror
									@error('nip')
										<div class="alert alert-danger alert-dismissible fade show text-center alert-error" role="alert">
											{{ $message }}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									@enderror
								@endif
								<div class="btn-submit mt-4">
									<button type="submit" class="btn btn-primary btn-login" value="Login">Log In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</div>
@endsection