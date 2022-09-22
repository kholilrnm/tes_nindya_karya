@include('templates.header')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <body class="nav-fixed bg-light">

        @include('templates.navbar')
        
        @include('templates.sidebar')

            <div id="layoutDrawer_content">
                
                <!-- Main page content-->
                <main>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <b>*&nbsp;</b>{{ session('message') }} ✅
                        </div>
                    @endif
                    <!-- Main dashboard content-->
                    <div class="container-xl p-5">
                        <div class="row justify-content-between align-items-center mb-5">
                            <div class="col flex-shrink-0 mb-5 mb-md-0">
                                <h1 class="display-4 mb-0">Menu Order</h1>
                                <div class="text-muted">Tabel &amp; Ringkasan Pemesan</div>
                            </div>
                        </div>
                        <div class="card card-raised">
                            <div class="card-header bg-transparent px-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-4">
                                        <h2 class="card-title mb-0">Orders</h2>
                                        <div class="card-subtitle">Tabel data pesanan</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary" type="button" id="btn_modal_tambah">Tambah Pesanan<i class="trailing-icon material-icons">add</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <!-- Simple DataTables example-->
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transaksi Kode</th>
                                            <th>Nama Pemesan</th>
                                            <th>Total Transaksi</th>
                                            <th>Total Transaksi Dengan Pajak 11%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data_pembayaran as $row)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $row['transaksi_kode'] }}</td>
                                                <td>{{ $row['nama'] }}</td>
                                                <td>Rp.{{ $row['total_transaksi'] }}</td>
                                                <td>Rp.{{ $row['total_transaksi_pajak'] }}</td>
                                            </tr>

                                                <th></th>
                                                <th>ID Item</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Total Harga Barang</th>

                                                @if ($row['detail'] != null) 
                                                    @foreach ($row['detail'] as $index => $item)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $row['detail'][$index]['id_item'] }}</td>
                                                        <td>{{ $row['detail'][$index]['nama'] }}</td>
                                                        <td>{{ $row['detail'][$index]['jumlah_barang'] }}</td>
                                                        <td>{{ $row['detail'][$index]['total_harga'] }}</td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td>kosong</td>
                                                </tr>
                                                @endif
                                            
                                        @empty
                                            <tr>
                                                <td>Tidak ada adata</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
              


<!-- Modal-->
<div class="modal fade" id="modal_order_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Tambah Pesanan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ url('tambahPesanan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama_pemesan" required>
                </div>
                <div class="form-group"><br>
                    <button class="btn btn-text-success btn-sm" id="tambahBarangAppend">Tambah Barang<i class="trailing-icon material-icons">add</i></button>
                </div>
                <div id="inputTambah"></div>
                {{-- <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <label for="message-text" class="col-form-label">Nama Barang</label>
                        <select class="form-control" name="id_barang[]" required>
                            @foreach ($data_barang as $rows)
                            <option value="{{$rows->id_item}}">{{$rows->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <label for="message-text" class="col-form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah_barang" required>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-text-primary" type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '#btn_modal_tambah', function() {   
        var number = 0;
    $('#tambahBarangAppend').click(function(event){
        event.preventDefault();

        html = `<div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <label for="message-text" class="col-form-label">Nama Barang</label>
                        <select class="form-control" name="id_barang[`+number+`]" required>
                            @foreach ($data_barang as $rows)
                            <option value="{{$rows->id_item}}">{{$rows->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <label for="message-text" class="col-form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah_barang[`+number+`]" required>
                    </div>
                </div>`;
        $('#inputTambah').append(html);
        number = number + 1;
    }); 


    $('#modal_order_tambah').modal('show');

});
</script>





@include('templates.footer')