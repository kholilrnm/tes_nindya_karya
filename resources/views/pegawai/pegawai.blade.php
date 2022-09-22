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
                                <h1 class="display-4 mb-0">Menu Pegawai</h1>
                                <div class="text-muted">Tabel &amp; Ringkasan Pegawai </div>
                            </div>
                        </div>
                        <div class="card card-raised">
                            <div class="card-header bg-transparent px-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-4">
                                        <h2 class="card-title mb-0">Pegawai</h2>
                                        <div class="card-subtitle">Tabel data pegawai</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary" type="button" id="btn_modal_tambah">Tambah Pegawai<i class="trailing-icon material-icons">add</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <!-- Simple DataTables example-->
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>ID Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $row->nik }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->id_jabatan }}</td>
                                                <td>
                                                    @if($row->jenis_kelamin == '1')
                                                        Pria
                                                    @elseif($row->jenis_kelamin == '2')
                                                        Wanita
                                                    @else                                                        
                                                    
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('pegawai.destroy', $row->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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