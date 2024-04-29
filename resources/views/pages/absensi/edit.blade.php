@extends('layouts.app')

@section('title', 'Edit Attendance')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Attendance</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Edit Attendance</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Attendance</h2>
            <p class="section-lead">
                Perbarui informasi tentang Absensi karyawan.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('attendances.update', $attendance->id) }}">
                            @csrf
                            @method('PUT')
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
                                        <p>{{ $attendance->date }}</p>
                                    </div>
                                    {{-- <div class="form-group col-md-6 col-12">
                                        <label>Reason</label>
                                        <p>{{ $permission->reason }}</p>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Bukti Dukung</label>
                                        <p>
                                            @if ($permission->image)
                                            <img src="{{ asset('storage/permission/' . $permission->image) }}"
                                                alt="Bukti Dukung" style="max-width: 100%; height: auto;">
                                            @else
                                            Tidak ada bukti dukung
                                            @endif
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status</label>
                                        <select name="status" class="form-control" style="height: 40px;">
                                            <option value="pending" @if ($permission->status == 'pending') selected
                                                @endif>
                                                Pending
                                            </option>
                                            <option value="approved" @if ($permission->status == 'approved') selected
                                                @endif>
                                                Approved
                                            </option>
                                            <option value="rejected" @if ($permission->status == 'rejected') selected
                                                @endif>
                                                Rejected
                                            </option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
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