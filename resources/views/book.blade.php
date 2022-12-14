@extends('adminlte::page')
@section('title', 'Home Page')
@section('content_header')
    <h1>Data Buku</h1>
@stop
@section('content')
<div class="container-fluid" id="page">
    <div class="card card-default">
        <div class="card-header">{{__('Pengelolaan Buku')}}</div>
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                Tambah Data <i class="fa fa-plus"></i>
            </button>
            <table id="table-data" class="table table-borderer">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Penerbit</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($books as $item => $book)
                        <tr id="table-row{{$book->id}}">
                            <td>{{$no++}}</td>
                            <td>{{$book->judul}}</td>
                            <td>{{$book->penulis}}</td>
                            <td>{{$book->tahun}}</td>
                            <td>{{$book->penerbit}}</td>
                            <td>
                                @if ($book->cover !== null)
                                    <img src="{{asset('storage/cover_buku/'.$book->cover)}}" width="100px"/>
                                @else
                                [Gambar tidak tersedia]
                                @endif
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
