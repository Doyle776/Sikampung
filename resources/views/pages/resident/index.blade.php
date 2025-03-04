@extends('layouts.app')

@section('content')
    {{-- Card Container --}}
    

   {{-- Page heading --}}
<div class="row">
    <div class="col-md-12">
        
        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-white-800">Data Penduduk</h1>
                    <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn btn-light shadow-sm"><i
                            class="fas fa-up fa-sm text-black-50"></i> Tambah</a>
                </div>
             
                {{-- Flasher --}}
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            



            </div>
        
                        <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Pernikahan</th>
                                <th>Pekerjaan</th>
                                <th>No. HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (count($residents)< 1)
                            <tbody>
                                <tr>
                                    <td colspan="12">
                                            <p class="pt-3 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        
                            
                        @else
                        <tbody>
                            @foreach ($residents as $item)
                                                        
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birth_date }}</td>
                                    <td>{{ $item->birth_place }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->marital_status }}</td>
                                    <td>{{ $item->occupation }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="d-flex inline">
                                            <a href="{{ route('resident.edit', $item->id) }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                            <i class="fas fa-pen">
                                            </i></a>

                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            
                                            
                                            
                                                                                 
                                       
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                                @include('pages.resident.confirmation-delete')
                            @endforeach
                            </tbody>
                        </table>
                    @endif  

@endsection