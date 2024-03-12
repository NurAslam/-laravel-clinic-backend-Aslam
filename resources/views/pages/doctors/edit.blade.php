@extends('layouts.app')

@section('title', 'Edit Doctor')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Advanced Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Doctor</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Doctor</h2>



            <div class="card">
                <form action="{{ route('doctors.update', $doctor) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Input Text</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name Doktor</label>
                            <input type="text" class="form-control @error('doctor_name')
                                is-invalid
                            @enderror" name="doctor_name" value="{{ $doctor->doctor_name }}">
                            @error('doctor_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @php
                        $specialists = [
                        'Bedah' => 'Bedah',
                        'Umum' => 'Umum',
                        'Bayi' => 'Bayi',
                        'Tumor' => 'Tumor',
                        ];
                        @endphp

                        <div class="form-group">
                            <label for="doctor_specialist">Doktor Specialist</label>
                            <select name="doctor_specialist" id="doctor_specialist" class="form-control @error('doctor_specialist') is-invalid @enderror">
                                <option value="">-- Pilih Spesialis --</option>
                                @if (isset($doctor)) <option value="$doctor-> doctor_specialist" selected>{{$doctor->doctor_specialist}}</option>
                                @endif
                                @foreach ($specialists as $specialist => $specialistName)
                                <option value="{{ $specialist }}" {{ old('doctor_specialist') === $specialist ? 'selected' : '' }}>{{ $specialistName }}</option>
                                @endforeach
                            </select>
                            @error('doctor_specialist')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('doctor_email')
                                is-invalid
                            @enderror" name="doctor_email" value="{{ $doctor->doctor_email }}">
                            @error('doctor_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" name="doctor_phone" value="{{ $doctor->doctor_phone }}">
                        </div>
                        <div class="form-group">
                            <label>SIP</label>
                            <input type="number" class="form-control @error('sip')
                                is-invalid
                            @enderror" name="sip" value="{{ $doctor->sip }}">
                            @error('sip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush