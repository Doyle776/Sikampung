@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-white-800">Edit Data Penduduk</h1>
                </div>
            </div>

            <form action="/resident/{{ $resident->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        
                        <!-- NIK -->
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" pattern="\d{16}" 
                                   maxlength="16" inputmode="numeric" value="{{ $resident->nik }}" required>
                            <small class="text-muted">Masukkan 16 digit angka NIK</small>
                        </div>

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" maxlength="100" value="{{ $resident->name }}" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                        
                        <select name="gender" id="gender" class="form-control">
                        @foreach([
                            (object)[
                                "label" => "laki-laki",
                                "value" => "male"
                            ],
                            (object)[
                                "label" => "laki-laki",
                                "value" => "male"
                            ],
                        ] as $item )
                        <option value="{{ $item->value }}" @selected(old('gender')== $item->value) >{{ $item->label }}</option>
                            
                        @endforeach
                    </select>
                </div>
                    

                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ $resident->birth_date }}" required>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" id="birth_place" name="birth_place" class="form-control" maxlength="150" value="{{ $resident->birth_place }}" required>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="address" ">Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="3"  required>{{ $resident->address }}</textarea>
                        </div>

                        <!-- Agama -->
                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <input type="text" id="religion" name="religion" class="form-control" maxlength="25" value="{{ $resident->religion }}" required>
                        </div>

                        <!-- Status Pernikahan -->
                        <div class="form-group mb-3">
                            <label for="marital_status">Status Pernikahan</label>
                            <select id="marital_status" name="marital_status" class="form-control" required>
                                @foreach([
                            (object)[
                                "label" => "Belum Menikah",
                                "value" => "single"
                            ],
                            (object)[
                                "label" => "Menikah",
                                "value" => "married"
                            ],(object)[
                                "label" => "Cerai",
                                "value" => "divorce"
                            ],(object)[
                                "label" => "Duda / Janda",
                                "value" => "widowed"
                            ],
                        ] as $item )
                        <option value="{{ $item->value }}" @selected(old('gender')== $item->value) >{{ $item->label }}</option>
                            
                        @endforeach
                            </select>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" id="occupation" name="occupation" class="form-control" maxlength="100" value="{{ $resident->occupation }}">
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group mb-3">
                            <label for="phone">No. HP</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                   pattern="08\d{8,12}" maxlength="13" inputmode="numeric" 
                                   value="{{ $resident->phone }}" required>
                            <small class="text-muted">Masukkan nomor HP (08xxxxxxxxxx)</small>
                        </div>

                        <!-- Status Kependudukan -->
                        <div class="form-group mb-3">
                            <label for="status">Status Kependudukan</label>
                            <select id="status" name="status" class="form-control" value="{{ $resident->status }}"required>

                                @foreach([
                                    (object)[
                                        "label" => "Aktif",
                                        "value" => "active"
                                    ],
                                    (object)[
                                        "label" => "Pindah",
                                        "value" => "moved"
                                    ],(object)[
                                        "label" => "Meninggal",
                                        "value" => "deceased"
                                    ],
                                ] as $item )
                                <option value="{{ $item->value }}" @selected(old('gender')== $item->value) >{{ $item->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-footer d-flex justify-content-end" style="gap:10px">
                            <a href="{{ route('resident.index') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>

                    </div>
                </div>
            </form>     

@endsection
