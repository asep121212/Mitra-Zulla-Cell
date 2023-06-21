@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Data Handphone</h2>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#addData">
                + Tambah Data
            </button>
        </div>
        <div class="col-sm-12 mt-4">
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama Handphone</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th>Banyak</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($handphones as $handphone)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if ($handphone->thumbnail !== null)
                            <img src="{{ asset('storage/handphone_images/thumbnail').$handphone->thumbnail }}"
                                class="img-thumbnail" width="40px" alt="{{ $handphone->name }}">
                            @else
                            <img src="handphone-images/default.png" class="img-thumbnail" width="40px"
                                alt="{{ $handphone->name }}">
                            @endif
                        </td>
                        <td>{{ $handphone->name }}</td>
                        <td>{{ $handphone->category_name }}</td>
                        <td>{{
                            ($handphone->raw == 0) ? 'Price' : ' BestSeller/ Normal'
                            }}</td>
                        <td>{{ $handphone->quantity }}</td>
                        <td>Rp. {{ number_format($handphone->price) }}</td>
                        <td>{{ $handphone->status }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editData{{$handphone->id}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteData{{$handphone->id}}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade modal-xl" id="addData" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="handphone/addHandphone" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center fw-bold">Foto handphone</p>
                            <p class="text-danger text-center">Maksimal Ukuran Foto 1024KB / 1MB dengan format .JPG
                                .JPEG .PNG</p>
                            <div class="form-group text-center">
                                <img src="handphone-images/default.png" alt="" id="gambar_load" class="img-thumbnail"
                                    style="max-width: 300px; max-height: 300px;">
                                <br>
                                <p class="fotoLabel">Preview Foto</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="file" name="handphone_banner"
                                        class="form-control @error('handphone_banner') is-invalid @enderror"
                                        id="preview_gambar" onchange="previewImg()" accept="image/*">
                                    @error('handphone_banner')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="handphone_name" class="form-label">Nama Handphone <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="handphone_name" name="handphone_name"
                                    class="form-control @error('handphone_name') is-invalid @enderror"
                                    placeholder="handphone">
                                @error('handphone_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <label for="category_id" class="form-label">Kategori <span
                                    class="text-danger">*</span></label>
                            <select id="category_id" class="form-select mb-3" name="category_id" aria-label="Kategori">
                                @foreach ($categories as $category)
                                @if($category->status == 1){
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                }
                                @endif
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="handphone_quantity" class="form-label">Banyak <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="handphone_quantity" name="handphone_quantity"
                                    class="form-control @error('handphone_quantity') is-invalid @enderror"
                                    placeholder="20">
                                @error('handphone_quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="handphone_price" class="form-label">Harga <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="handphone_price" name="handphone_price"
                                    class="form-control @error('handphone_price') is-invalid @enderror"
                                    placeholder="20000">
                                @error('handphone_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="handphone_description" class="form-label">Deskripsi Handphone <span
                                        class="text-danger">*</span></label>
                                <textarea id="handphone_description" name="handphone_description"
                                    class="form-control @error('handphone_description') is-invalid @enderror"
                                    rows="10"></textarea>
                                @error('handphone_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="handphone_status" class="form-label">Kondisi <span
                                        class="text-danger">*</span></label>
                                <select id="handphone_status" class="form-select " name="handphone_raw"
                                    aria-label="Default select example">
                                    <option value="4">Smartfren</option>
                                    <option value="3">Indosat</option>
                                    <option value="2">Axis</option>
                                    <option value="1">Telkomsel</option>
                                    <option value="0">Tri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="handphone_status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select id="handphone_status" class="form-select" name="handphone_status"
                                    aria-label="Default select example">
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($handphones as $handphone)
<div class="modal fade modal-xl" id="editData{{$handphone->id}}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="handphone/{{ $handphone->id }}/update" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center fw-bold">Foto Handphone</p>
                            <p class="text-danger text-center">Maksimal Ukuran Foto 1024KB / 1MB dengan format .JPG
                                .JPEG .PNG</p>
                            <div class="form-group text-center">
                                <!-- Tampilan Gambar -->
                                <input type="hidden" name="oldImage" value="{{$handphone->banner}}">
                                @if ($handphone->banner !== null)
                                <img src="{{ asset('storage/handphone_images').$handphone->banner }}" alt=""
                                    id="gambar_load{{$handphone->id}}" class="img-thumbnail"
                                    style="max-width: 300px; max-height: 300px;">
                                @else
                                <img src="handphone-images/default.png" class="img-thumbnail"
                                    id="gambar_load{{$handphone->id}}" style="max-width: 300px; max-height: 300px;"
                                    alt="{{ $handphone->name }}">
                                @endif

                                <br>
                                <label class="fotoLabel{{$handphone->id}}">Preview Foto</label>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="file" name="handphone"
                                        class="form-control @error('handphone') is-invalid @enderror"
                                        id="preview_gambar{{$handphone->id}}" accept="image/*"
                                        onchange="previewImgEdt{{$handphone->id}}()">
                                    @error('handphone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="handphone_name" class="form-label">Nama Handphone</label>
                                <input type="text" id="handphone_name" name="handphone_name" class="form-control"
                                    placeholder="Handphone" value="{{$handphone->name}}">
                            </div>
                            <label for="category_id" class="form-label">Kategori</label>
                            <select id="category_id" class="form-select mb-3" name="category_id" aria-label="Kategori">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $handphone->category_id) ?
                                    'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="handphone_quantity" class="form-label">Banyak</label>
                                <input type="number" id="handphone_quantity" name="handphone_quantity" class="form-control"
                                    placeholder="20" value="{{$handphone->quantity}}">
                            </div>
                            <div class="mb-3">
                                <label for="handphone_price" class="form-label">Harga</label>
                                <input type="number" id="handphone_price" name="handphone_price" class="form-control"
                                    placeholder="20000" value="{{$handphone->price}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="handphone_description" class="form-label">Deskripsi Handphone</label>
                                <textarea id="handphone_description" name="handphone_description" class="form-control"
                                    rows="10">{{$handphone->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="handphone_status" class="form-label">Jenis</label>
                                <select id="handphone_status" class="form-select" name="handphone_raw"
                                    aria-label="Default select example">
                                    <option value="4" {{ ($handphone->raw == 4) ? 'selected' : '' }}>Smartfren
                                    </option>
                                    <option value="3" {{ ($handphone->raw == 3) ? 'selected' : '' }}>Indosat
                                    </option>
                                    <option value="2" {{ ($handphone->raw == 2) ? 'selected' : '' }}>Tri 
                                    </option>
                                    <option value="1" {{ ($handphone->raw == 1) ? 'selected' : '' }}>Telkomsel 
                                    </option>
                                    <option value="0" {{ ($handphone->raw == 0) ? 'selected' : '' }}>Tri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="handphone_status" class="form-label">Status</label>
                                <select id="handphone_status" class="form-select" name="handphone_status"
                                    aria-label="Default select example">
                                    <option value="1" {{ ($handphone->status == 1) ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ ($handphone->status == 0) ? 'selected' : '' }}>Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Delete -->
@foreach ($handphones as $handphone)
<div class="modal fade modal-lg" id="deleteData{{$handphone->id}}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="handphone/{{ $handphone->id }}/destroy">
                <input type="hidden" name="oldImage" value="{{$handphone->banner}}">
                <div class="modal-body">
                    Anda Yakin ingin menghapus <b>{{ $handphone->name }}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('app-assets/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app-assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    // preview gambar
    function previewImg() {
        const foto = document.querySelector('#preview_gambar');
        // const fotoLabel = document.querySelector('.fotoLabel');
        const fotoLoad = document.querySelector('#gambar_load');

        // fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function (e) {
            fotoLoad.src = e.target.result;
        }
    }

    // preview gambar edit
    @foreach($handphones as $handphone)
        function previewImgEdt{{ $handphone -> id }}() {
            const foto{{ $handphone-> id}} = document.querySelector('#preview_gambar{{$handphone->id}}');
            // const fotoLabel{{ $handphone-> id}} = document.querySelector('.fotoLabel{{$handphone->id}}');
            const fotoLoad{{ $handphone-> id}}  = document.querySelector('#gambar_load{{$handphone->id}}');

            // fotoLabel{{ $handphone -> id }}.textContent = foto{{ $handphone -> id }}.files[0].name;

            const fileFoto{{ $handphone-> id}} = new FileReader();
            fileFoto{{ $handphone -> id }}.readAsDataURL(foto{{ $handphone-> id}}.files[0]);
            
            fileFoto{{ $handphone -> id }}.onload = function (e) {
                fotoLoad{{ $handphone -> id }}.src = e.target.result;
            }
        }
    @endforeach
</script>
@endsection

<style></style>