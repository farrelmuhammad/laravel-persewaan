@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Nama Perusahaan</label>
      <input type="text" class="form-control" name="company" id="name" placeholder="PT. Perusahaan">
    </div>
    <div class="form-group">
        <label for="price">Nama Client</label>
        <input type="text" class="form-control" name="client" id="price" placeholder="Bambang">
      </div>
      <div class="form-group">
        <label for="stock">Pembayaran</label>
        <input type="text" class="form-control" name="pembayaran" id="stock" value="Besarnya biaya sewa tersebut sebesar Rp. 3.140.000,- (Tiga juta seratus empat puluh ribu rupiah), diluar PPN. Pembayaran dilakukan dalam 4 kali termin setiap 3 bulan sebesar Rp 785.000 (Tujuh ratus delapan puluh lima ribu lima rupiah) diluar PPN dengan cara ditransfer ke rekening bank atau dibayar tunai.">
      </div>
    <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
    <a href="{{URL::previous()}}" class="btn btn-secondary btn-md btn-block">Back</a>
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
