@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Barang</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Barang</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('barang.create')}}" class="btn btn-sm btn-neutral">+ Tambah Barang</a>
            </div>
          </div>
        </div>
      </div>
   </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">List Barang</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No.</th>
                    <th scope="col" class="sort" data-sort="name">ID Barang</th>
                    <th scope="col" class="sort" data-sort="budget">Nama Barang</th>
                    <th scope="col" class="sort" data-sort="status">Jenis Barang</th>
                    <th scope="col" class="sort" data-sort="status">Harga</th>
                    <th scope="col" class="sort" data-sort="completion">Stock</th>
                    @if(Auth()->user()->role == 1)
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($barang as $b)
                  <tr>
                    <td>
                      <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->id_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->nama_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->jenis->jenis_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">Rp. {{$b->harga}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->stock}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)
                     <td class="text-left">
                        <a class="btn btn-sm btn-neutral" href="{{route('barang.edit',[$b->id])}}"><i class="fa fa-edit" style="color: green;" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-neutral" href="{{route('barang.destroy',[$b->id])}}"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      
    @include('layouts.footers.auth')
  </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush