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
                                <h1 class="display-4 mb-0">Menu Stock</h1>
                                <div class="text-muted">Tabel &amp; Ringkasan Stock </div>
                            </div>
                        </div>
                        <div class="card card-raised">
                            <div class="card-header bg-transparent px-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-4">
                                        <h2 class="card-title mb-0">Stock Barang</h2>
                                        <div class="card-subtitle">Tabel data stock barang</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        {{-- <button class="btn btn-primary" type="button" id="btn_modal_tambah">Tambah Pesanan<i class="trailing-icon material-icons">add</i></button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <!-- Simple DataTables example-->
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Status Stock Saat Ini</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>
                                                    @if($row->qty > 0)
                                                        <span class="badge bg-success">Tersedia</span>
                                                    @else 
                                                        <span class="badge bg-danger">Habis Perlu Ditambahkan !</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
              



@include('templates.footer')