@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-white-800">Tambah Data Penduduk</h1>
                </div>
            </div>

            <form action="{{ route('resident.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        
                        <!-- NIK -->
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" pattern="\d{16}" 
                                   maxlength="16" inputmode="numeric" required>
                            <small class="text-muted">Masukkan 16 digit angka NIK</small>
                        </div>

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" maxlength="100" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>

                        
                        </div>


                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" id="birth_place" name="birth_place" class="form-control" maxlength="150" required>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- Agama -->
                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <input type="text" id="religion" name="religion" class="form-control" maxlength="25" required>
                        </div>

                        <!-- Status Pernikahan -->
                        <div class="form-group mb-3">
                            <label for="marital_status">Status Pernikahan</label>
                            <select id="marital_status" name="marital_status" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="single">Belum Menikah</option>
                                <option value="married">Menikah</option>
                                <option value="divorce">Cerai</option>
                                <option value="widowed">Duda/Janda</option>
                            </select>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" id="occupation" name="occupation" class="form-control" maxlength="100">
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group mb-3">
                            <label for="phone">No. HP</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                   pattern="08\d{8,12}" maxlength="13" inputmode="numeric" required>
                            <small class="text-muted">Masukkan nomor HP (08xxxxxxxxxx)</small>
                        </div>

                        <!-- Status Kependudukan -->
                        <div class="form-group mb-3">
                            <label for="status">Status Kependudukan</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="active">Aktif</option>
                                <option value="moved">Pindah</option>
                                <option value="deceased">Meninggal</option>
                            </select>
                        </div>

                        <div class="card-footer d-flex justify-content-end" style="gap:10px">
                            <a href="{{ route('resident.index') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </div>
            </form>     

@endsection
