@extends('layouts.layout-sidebar')

@section('web-content')
<!-- Untuk Jabatan Kaprog langsung di direct ke report-submission, tanpa masuk ke halaman ini-->
<div class="row res-text-center">
	@if(session()->get('nama_jabatan') != "Kaprog") <!--Jabatan = Kepsek, Ka. Keuangan, Staf APBD, Staf BOS -->
    
  		<div class="col-md">
			<a class="btn btn-primary btn-dashboard2 theme-document1" href="/submission/new-submission">
				<i class="fas fa-file-invoice-dollar icon-title"></i>
				@if (session()->get('nama_jabatan') == "Staf BOS")
					<span>New Dana BOS Submission</span>
					<p>new submssions for the use of Dana BOS</p>
				@elseif(session()->get('nama_jabatan') == "Staf APBD")
					<span>New Dana APBD Submission</span>
					<p>new submssions for the use of anggaran APBD</p>
				@else
					<span>New Submission</span>
					<p>new submssions for use of budget</p>
				@endif
				
				<div class="check-button">
					check <i class="fas fa-arrow-right icon-cek"></i>
				</div>
				
			</a>
		</div>
	@endif
	@if (session()->get('nama_jabatan') != "Kepala Sekolah" && session()->get('nama_jabatan') != "Kepala Keuangan")
		<div class="col-md">
			<a class="btn btn-primary btn-dashboard2 theme-document2" href="/inprogress-submission">
				<i class="fas fa-file-contract icon-title"></i>
				<span>In-progress Submission</span>
				<p>your In-progress submission</p>
				<div class="check-button">
					check <i class="fas fa-arrow-right icon-cek"></i>
				</div>
				
			</a>
		</div>
	@endif
	@if (session()->get('nama_jabatan') == "Kaprog")
		<div class="col-md">
			<a class="btn btn-primary btn-dashboard2 theme-2" href="/new-submission">
				<i class="fas fa-plus-square icon-title"></i>
				<span>Add Submission</span>
				<p>add new submssions for use of budget</p>
				<div class="check-button">
					check <i class="fas fa-arrow-right icon-cek"></i>
				</div>
				
			</a>
		</div>
	@endif
  		
		
	</div>
	
@endsection