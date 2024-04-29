@extends('layouts.app')

@section('title', 'Attendance Detail')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Attendance Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Attendance Detail</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Attendance Detail</h2>
            <p class="section-lead">
                Informasi tentang detail Absen karyawan.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama Karyawan</label>
                                    <p>{{ $attendance->user->name }}</p>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Telpon Karyawan</label>
                                    <p>{{ $attendance->user->phone }}</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Position</label>
                                    <p>{{ $attendance->user->position }}</p>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Department</label>
                                    <p>{{ $attendance->user->departement }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Date Attendance</label>
                                    <p>{{ $attendance->date_Attendance }}</p>
                                </div>
                                {{-- <div class="form-group col-md-6 col-12">
                                    <label>Reason</label>
                                    <p>{{ $Attendance->reason }}</p>
                                </div> --}}
                            </div>
                            {{-- <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Bukti Dukung</label>
                                    @if ($Attendance->image)
                                    <!-- Jika image tersedia, tampilkan gambar -->
                                    <div>
                                        <img src="{{ asset('storage/attendance/' . $Attendance->image) }}"
                                            alt="Bukti Dukung" class="img-thumbnail mb-3" style="max-width: 200px;">
                                    </div>
                                    @else
                                    <!-- Jika image kosong, tampilkan teks -->
                                    <p>Tidak ada bukti dukung</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Status</label>
                                    <p>
                                        @if ($Attendance->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif ($Attendance->status == 'approved')
                                        <span class="badge badge-success">Approve</span>
                                        @else
                                        <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </p>
                                </div>

                            </div> --}}
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-primary">Edit
                                Attendance For Approve</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->
@endpush