@extends('layouts.layout-sidebar')

@section('web-content')

	@if(session()->get("nama_jabatan") == "Admin") <!-- Jabatan = Admin-->
		
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card count-stat" style="background-color: rgb(3, 184, 3)">
					<div class="icon-stat" style="background-color: rgb(3, 184, 3)">
						<i class="fas fa-user-check"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{ $conline }}</h5>
						<p class="card-text" style="color: white">Online Users</p>
					</div>
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="card count-stat" style="background-color: rgb(199, 3, 3)">
					<div class="icon-stat" style="background-color: rgb(199, 3, 3);">
						<i class="fas fa-user-times"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{ $coffline }}</h5>
						<p class="card-text" style="color: white">Offline Users</p>
					</div>
				</div>
			  </div>
		</div>
		<div class="row justify-content-center" style="padding-top: 0px;">
			<div class="col-md-6">
				<div class="box1 box-head-color-b">
					<div class="box-header with-border">
						<h5 class="title">User List</h5>
					</div>
					<div class="box-info">
						<div class="table-responsive">
							<table class="table">
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th>Last Seen</th>
							</tr>
							@foreach ($allData as $a)
							<tr>
								<td>{{$a->nama}}</td>
								@if ($a->status == "online")
									<td style="color: rgb(3, 184, 3)">{{ $a->status }}</td>
								@else
									<td style="color: rgb(199, 3, 3)">{{ $a->status }}</td>
								@endif 
								
								<td>{{ $a->last_seen }}</td>
							</tr>
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	
	@endif

	@if(session()->get('nama_jabatan') == "Kepala Sekolah" || session()->get('nama_jabatan') == "Kepala Keuangan" || session()->get('nama_jabatan') == "Staf APBD" || session()->get('nama_jabatan') == "Staf BOS") 
	<!--Jabatan = Kepsek, Ka. Keuangan, Staf APBD, Staf BOS-->
		
        @php
			$bos = number_format($danaBOS,2,",",".");
			$apbd = number_format($danaAPBD,2,",",".");
			$mark = '';
			if(session()->get('nama_jabatan') == "Staf APBD"){
				$mark = "( APBD )";
			}elseif (session()->get('nama_jabatan') == "Staf BOS") {
				$mark = "( BOS )";
			}
		@endphp
        @if(session()->get('nama_jabatan') == "Kepala Sekolah" || session()->get('nama_jabatan') == "Kepala Keuangan") <!--Jabatan = Kepsek, Ka. Keuangan-->
        <div class="row" style="padding-bottom: 10px;">
			<div class="col-md-6">
				<div class="card money-stat gradient-1">
					<div class="card-body desc-stat">
						<div class="vertical-center text-center">
							<h5 class="card-title">Rp. {{ $bos}}</h5>
							<p class="card-text">Dana BOS</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card money-stat gradient-2">
					<div class="card-body desc-stat">
						<div class="vertical-center text-center">
							<h5 class="card-title">Rp. {{ $apbd}}</h5>
							<p class="card-text">Anggaran APBD</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
        @endif

        @if(session()->get('nama_jabatan') == "Staf BOS") <!--Jabatan = Staf BOS-->
        <div class="row justify-content-center" style="padding-bottom: 10px;">
			<div class="col-md-8">
				<div class="card money-stat gradient-1">
					<div class="card-body desc-stat">
						<div class="vertical-center text-center">
							<h5 class="card-title">Rp. {{ $bos}}</h5>
							<p class="card-text">Dana BOS</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        @endif

        @if(session()->get('nama_jabatan') == "Staf APBD") <!--Jabatan = Staf APBD-->
        <div class="row justify-content-center" style="padding-bottom: 10px;">
			<div class="col-md-8">
				<div class="card money-stat gradient-2">
					<div class="card-body desc-stat">
						<div class="vertical-center text-center">
							<h5 class="card-title">Rp. {{ $apbd}}</h5>
							<p class="card-text">Anggaran APBD</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        @endif
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card count-stat" style="background-color: var(--yellow)">
					<div class="icon-stat" style="background-color: var(--yellow)">
						<i class="fas fa-file-import"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{$dashboardsubmission}}</h5>
						<p class="card-text" style="color: white;">New Submissions {{ $mark }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card count-stat" style="background-color: rgb(3, 184, 3)">
					<div class="icon-stat" style="background-color: rgb(3, 184, 3)">
						<i class="fas fa-file-import"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{$reportS}}</h5>
						<p class="card-text" style="color: white">Completed Submissions {{ $mark }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card count-stat" style="background-color: rgb(106, 1, 177)">
					<div class="icon-stat" style="background-color: rgb(106, 1, 177)">
						<i class="fas fa-file-invoice-dollar"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{$reportT}}</h5>
						<p class="card-text" style="color: white">Transactions {{ $mark }}</p>
					</div>
				</div>
			</div>
		</div>
		
    @endif

    @if(session()->get('nama_jabatan') == "Kaprog") <!--Jabatan = Kaprog-->
		
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card count-stat" style="background-color: var(--yellow)">
					<div class="icon-stat" style="background-color: var(--yellow)">
						<i class="fas fa-file-import"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{$submissionNC}}</h5>
						<p class="card-text" style="color: white">Submissions in-progress</p>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card count-stat" style="background-color: rgb(3, 184, 3)">
					<div class="icon-stat" style="background-color: rgb(3, 184, 3)">
						<i class="fas fa-file-import"></i>
					</div>
					<div class="card-body desc-stat">
						<h5 class="card-title">{{$submissionC}}</h5>
						<p class="card-text" style="color: white">Completed Submissions</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="col-md-4">
				<a class="btn btn-primary theme-2 btn-dashboard" href="/submission/addsubmission" style="background-color: #00A5CF">
					<i class="fas fa-plus-circle mr-2"></i>
					Add New Submission
				</a>
			</div>
		</div>
    @endif
    
@endsection