@extends('adminlte::page')
@section('title', 'Home Page')
@section('content_header')
    <h1>Data Buku</h1>
@stop
@section('content')
<div class="container-fluid" id="page">
    <div class="card card-default">
        <div class="card-header" id="page-buku">{{__('Pengelolaan Buku')}}</div>
        <div class="card-body">
            <a href="{{route('admin.books.trash')}}"target="_blank" class="btn btn-warning">
            <i class="fa fa-trash"></i>
                Recycle</a>
            <div class="btn-group" role="group"aria-label="Basic example">
                <a href="{{ route('admin.books.restore_all') }}"class="btn btn-success" target="_blank"><i class="fa fa-save"></i> Restore all</a>
                <a href="{{ route('admin.books.delete_all') }}"class="btn btn-danger" target="_blank"><i class="fa fa-trash"></i> delete all</a>
            </div>
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
                                    <img src="{{asset('public/storage/cover_buku/'.$book->cover)}}" width="80px"/>
                                @else
                                [Gambar tidak tersedia]
                                @endif
                            </td>
							<td>
								<a href="restore/{{$book->id }}" class="btn btn-success btn-sm">Restore</a>
								<a href="delete/{{$book->id }}" class="btn btn-danger btn-sm">delete</a>
							</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
