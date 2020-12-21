@extends('layouts.layout-report')

@section('sub-content')
    <div class="content">
		<div class="back">
			<a href="/report"><i class="fa fa-arrow-left" title="Back to Report"></i></a>
		</div>
		<div class="header_report">
			<h4>Laporan Transaksi</h4>
		</div> <br>
		<!-- Row Start-->
		<div class="row">
			<div class="col-lg-6 col-xs-6">
				<div class="small-box bg-primary">
					<div class="inner">
						<h2>{{ $masuk?? '' }}</h2> <!--GET COUNT JUMLAH PADA TABEL, JENIS: PEMASUKAN-->
						<p>Pemasukan</p>
					</div>
					<div class="ikon">
						<i class="fas fa-file-download"></i>
					</div>
					<a href="#tabel-transaksi" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-6 col-xs-6">
				<div class="small-box bg-danger">
					<div class="inner">
						<h2>{{ $keluar?? '' }}</h2> <!--GET COUNT JUMLAH PADA TABEL, JENIS: PENGELUARAN-->
						<p>Pengeluaran</p>
					</div>
					<div class="ikon">
						<i class="fas fa-file-upload"></i>
					</div>
					<a href="#tabel-transaksi" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- Row End-->

		<!--Tabel Transaksi Start-->
		<div class="box1 box-info" id="tabel-transaksi">
			<div class="box-header with-border">
				<h3 class="box-title">Tabel Transaksi</h3>
			</div>
			<div class="box-info">
				<div class="table-responsive">
					<table class="table no-margin"> <!-- GET DARI DATABASE -->
						<thead>
							<tr>
								<th>Jenis Dana</th>
								<th>Jumlah</th>
								<th>Jenis</th>
								<th>Pengaju</th>
								<th>Tanggal Transaksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($report->all() as $r)
								<tr>
									<td>{{ $r->id_dana }}</td>
									<td>{{ $r->jumlah }}</td>
									<td>{{ $r->jenis }}</td>
									<td>{{ $r->id_pengaju}}</td>
									<td>{{ $r->updated_at }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--Tabel Transaksi End-->

	</div>
@endsection