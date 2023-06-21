@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Data Aksesoris</h2>
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
                        <th>Nama Aksesoris</th>
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
                    @foreach ($aksesoris as $aksesori)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if ($aksesori->thumbnail !== null)
                            <img src="{{ asset('storage/aksesori_images/thumbnail').$aksesori->thumbnail }}"
                                class="img-thumbnail" width="40px" alt="{{ $aksesori->name }}">
                            @else
                            <img src="aksesori-images/default.png" class="img-thumbnail" width="40px"
                                alt="{{ $aksesori->name }}">
                            @endif
                        </td>
                        <td>{{ $aksesori->name }}</td>
                        <td>{{ $aksesori->category_name }}</td>
                        <td>{{
                            ($aksesori->raw == 0) ? 'Price' : ' BestSeller/ Normal'
                            }}</td>
                        <td>{{ $aksesori->quantity }}</td>
                        <td>Rp. {{ number_format($aksesori->price) }}</td>
                        <td>{{ $aksesori->status }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editData{{$aksesori->id}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteData{{$aksesori->id}}">
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
            <form method="POST" action="aksesori/addAksesori" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center fw-bold">Foto aksesoris</p>
                            <p class="text-danger text-center">Maksimal Ukuran Foto 1024KB / 1MB dengan format .JPG
                                .JPEG .PNG</p>
                            <div class="form-group text-center">
                                <img src="aksesori-images/default.png" alt="" id="gambar_load" class="img-thumbnail"
                                    style="max-width: 300px; max-height: 300px;">
                                <br>
                                <p class="fotoLabel">Preview Foto</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="file" name="aksesori_banner"
                                        class="form-control @error('aksesori_banner') is-invalid @enderror"
                                        id="preview_gambar" onchange="previewImg()" accept="image/*">
                                    @error('aksesori_banner')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="aksesori_name" class="form-label">Nama aksesori <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="aksesori_name" name="aksesori_name"
                                    class="form-control @error('aksesori_name') is-invalid @enderror"
                                    placeholder="aksesori">
                                @error('aksesori_name')
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
                                <label for="aksesori_quantity" class="form-label">Banyak <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="aksesori_quantity" name="aksesori_quantity"
                                    class="form-control @error('aksesori_quantity') is-invalid @enderror"
                                    placeholder="20">
                                @error('aksesori_quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="aksesori_price" class="form-label">Harga <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="aksesori_price" name="aksesori_price"
                                    class="form-control @error('aksesori_price') is-invalid @enderror"
                                    placeholder="20000">
                                @error('aksesori_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="aksesori_description" class="form-label">Deskripsi Handphone <span
                                        class="text-danger">*</span></label>
                                <textarea id="aksesori_description" name="aksesori_description"
                                    class="form-control @error('aksesori_description') is-invalid @enderror"
                                    rows="10"></textarea>
                                @error('aksesori_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="aksesori_status" class="form-label">Kondisi <span
                                        class="text-danger">*</span></label>
                                <select id="aksesori_status" class="form-select " name="aksesori_raw"
                                    aria-label="Default select example">
                                    <option value="4">Smartfren</option>
                                    <option value="3">Indosat</option>
                                    <option value="2">Axis</option>
                                    <option value="1">Telkomsel</option>
                                    <option value="0">Tri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="aksesori_status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select id="aksesori_status" class="form-select" name="aksesori_status"
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
@foreach ($aksesoris as $aksesori)
<div class="modal fade modal-xl" id="editData{{$aksesori->id}}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="aksesori/{{ $aksesori->id }}/update" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center fw-bold">Foto aksesoris</p>
                            <p class="text-danger text-center">Maksimal Ukuran Foto 1024KB / 1MB dengan format .JPG
                                .JPEG .PNG</p>
                            <div class="form-group text-center">
                                <!-- Tampilan Gambar -->
                                <input type="hidden" name="oldImage" value="{{$aksesori->banner}}">
                                @if ($aksesori->banner !== null)
                                <img src="{{ asset('storage/aksesori_images').$aksesori->banner }}" alt=""
                                    id="gambar_load{{$aksesori->id}}" class="img-thumbnail"
                                    style="max-width: 300px; max-height: 300px;">
                                @else
                                <img src="aksesori-images/default.png" class="img-thumbnail"
                                    id="gambar_load{{$aksesori->id}}" style="max-width: 300px; max-height: 300px;"
                                    alt="{{ $aksesori->name }}">
                                @endif

                                <br>
                                <label class="fotoLabel{{$aksesori->id}}">Preview Foto</label>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="file" name="aksesori"
                                        class="form-control @error('aksesori') is-invalid @enderror"
                                        id="preview_gambar{{$aksesori->id}}" accept="image/*"
                                        onchange="previewImgEdt{{$aksesori->id}}()">
                                    @error('aksesori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="aksesori_name" class="form-label">Nama aksesoris</label>
                                <input type="text" id="aksesori_name" name="aksesori_name" class="form-control"
                                    placeholder="aksesoris" value="{{$aksesori->name}}">
                            </div>
                            <label for="category_id" class="form-label">Kategori</label>
                            <select id="category_id" class="form-select mb-3" name="category_id" aria-label="Kategori">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $aksesori->category_id) ?
                                    'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="aksesori_quantity" class="form-label">Banyak</label>
                                <input type="number" id="aksesori_quantity" name="aksesori_quantity" class="form-control"
                                    placeholder="20" value="{{$aksesori->quantity}}">
                            </div>
                            <div class="mb-3">
                                <label for="aksesori_price" class="form-label">Harga</label>
                                <input type="number" id="aksesori_price" name="aksesori_price" class="form-control"
                                    placeholder="20000" value="{{$aksesori->price}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="aksesori_description" class="form-label">Deskripsi Aksesoris</label>
                                <textarea id="aksesori_description" name="aksesori_description" class="form-control"
                                    rows="10">{{$aksesori->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="aksesori_status" class="form-label">Jenis</label>
                                <select id="aksesori_status" class="form-select" name="aksesori_raw"
                                    aria-label="Default select example">
                                    <option value="4" {{ ($aksesori->raw == 4) ? 'selected' : '' }}>Smartfren
                                    </option>
                                    <option value="3" {{ ($aksesori->raw == 3) ? 'selected' : '' }}>Indosat
                                    </option>
                                    <option value="2" {{ ($aksesori->raw == 2) ? 'selected' : '' }}>Tri 
                                    </option>
                                    <option value="1" {{ ($aksesori->raw == 1) ? 'selected' : '' }}>Telkomsel 
                                    </option>
                                    <option value="0" {{ ($aksesori->raw == 0) ? 'selected' : '' }}>Tri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="aksesori_status" class="form-label">Status</label>
                                <select id="aksesori_status" class="form-select" name="aksesori_status"
                                    aria-label="Default select example">
                                    <option value="1" {{ ($aksesori->status == 1) ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ ($aksesori->status == 0) ? 'selected' : '' }}>Non-Aktif</option>
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
@foreach ($aksesoris as $aksesori)
<div class="modal fade modal-lg" id="deleteData{{$aksesori->id}}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="aksesori/{{ $aksesori->id }}/destroy">
                <input type="hidden" name="oldImage" value="{{$aksesori->banner}}">
                <div class="modal-body">
                    Anda Yakin ingin menghapus <b>{{ $aksesori->name }}</b>
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
    @foreach($aksesoris as $aksesori)
        function previewImgEdt{{ $aksesori -> id }}() {
            const foto{{ $aksesori-> id}} = document.querySelector('#preview_gambar{{$aksesori->id}}');
            // const fotoLabel{{ $aksesori-> id}} = document.querySelector('.fotoLabel{{$aksesori->id}}');
            const fotoLoad{{ $aksesori-> id}}  = document.querySelector('#gambar_load{{$aksesori->id}}');

            // fotoLabel{{ $aksesori -> id }}.textContent = foto{{ $aksesori -> id }}.files[0].name;

            const fileFoto{{ $aksesori -> id}} = new FileReader();
            fileFoto{{ $aksesori -> id }}.readAsDataURL(foto{{ $aksesori-> id}}.files[0]);
            
            fileFoto{{ $aksesori -> id }}.onload = function (e) {
                fotoLoad{{ $aksesori -> id }}.src = e.target.result;
            }
        }
    @endforeach
</script>
@endsection

<style></style>