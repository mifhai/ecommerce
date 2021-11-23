@extends('backend.layout.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    label p{
        font-size: small;
        font-family: "open sans", sans-serif;
        color: #9e9e9e;
        margin-top: 5px;
    }

    .row{
        margin-left: 0;
    }

    label b{
        background: #eeeeee;
        padding: 2px 10px 2px 10px;
        border-radius: 16px;
        font-size: 10px;
    }
    .custom-checkbox label{
        font-size: small;
        font-family: "open sans", sans-serif;
        color: #9e9e9e;
        margin-top: 5px;
        padding-top: 3px;
    }
    .btn-simpan{
        float: right;
        margin-bottom: 10%;
        width: 20%;
    }
</style>
@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product') }}">Product</a></li>
        </ol>
    </div>
    @if( Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center><strong>{!! session('flash_message_error') !!}</strong></center>
    </div>
    @endif
    @if( Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <center><strong>{!! session('flash_message_success') !!}</strong></center>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Form Basic -->
    <form enctype="multipart/form-data" method="post" action="{{ url('/admin_edit_product/'.$product->id) }}" class="mb-5">
        {{ csrf_field() }}

        {{-- informasi product --}}
        <div class="card mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Produk</h6>
            </div>
            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Product <b>Wajib</b> </label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" id="inputEmail3" value=" {{ $product->name_product }} " placeholder="Masukkan Nama Product" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar Utama <b>Wajib</b> <br>
                    <p>Size : 300 x 300 px</p></label>
                    <div class="col-sm-9">
                        <input type="file" class="file" name="image"  value=" {{ old('image') }} ">
                        <input type="hidden" name="current_image" value="{{ $product->image}}">
                        @if(!empty($product->image))
                            <img class="mt-3" src="{{ asset ('/images/backend_images/products/large/'.$product->image) }}" alt="{{ $product->name_product }}" style="width:50px;"><br>
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar Pendukung <b>Opsional</b><br>
                    <p>Masukkan Beberapa Gambar Pendukung <br> Size : 300 x 300 px</p></label>
                    <div class="col-sm-9">
                        <input type="file" multiple class="file" name="images[]"  value=" {{ old('images') }} " data-max-file-count="2" >
                        @foreach ($image_attr as $item)
                            <input type="hidden" multiple class="file" name="current_image1[]" value="{{ $item->image}}">
                            @if(!empty($item->image))
                                <img class="mt-3" src="{{ asset ('/images/backend_images/products/small/'.$item->image) }}" alt="test" style="width:50px;"><br>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Attribute Product --}}
        <div class="card mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                <h6 class="m-0 font-weight-bold text-primary">Attribute Produk</h6>
            </div>
                <div class="form-row col-md-12 mt-3 mb-3">
                    <div class="form-group col-md-6" style="padding-left: 15px;">
                        <label>Brands <b>Wajib</b></label>
                        <select class="form-control" name="brands" required>
                            <option value=" {{ $brands->brand_name }} ">{{ $brands->brand_name }}</option>
                            @foreach ($brandsall as $brand)
                                <option value=" {{ $brand->brand_name }} "> {{ $brand->brand_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Category <b>Wajib</b></label>
                        <select class="form-control" name="category" required>
                            <option value=" {{ $categories->name }} ">{{ $categories->name }}</option>
                            @foreach ($categoriesall as $cat)
                                <option value=" {{ $cat->name }} "> {{ $cat->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row col-md-12 mt-3 mb-3">
                    <div class="form-group col-md-4" style="padding-left: 15px;">
                        <label>Processor <b>Wajib</b></label>
                        <select class="form-control" name="processor" required>
                            <option value=" {{ $processors->name }} ">{{ $processors->name }}</option>
                            @foreach ($processorsall as $pro)
                                <option value=" {{ $pro->name }} "> {{ $pro->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Storage <b>Wajib</b></label>
                        <select class="form-control" name="disk" required>
                            <option value=" {{ $disks->name }} ">{{ $disks->name }}</option>
                            @foreach ($disksall as $disk)
                                <option value=" {{ $disk->name }} "> {{ $disk->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Ukuran Layar <b>Wajib</b></label>
                        <select class="form-control" name="layar" required>
                            <option value=" {{ $layars->name }} ">{{ $layars->name }}</option>
                            @foreach ($layarsall as $layar)
                                <option value=" {{ $layar->name }} "> {{ $layar->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        {{-- Product Description --}}
        <div class="card mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                <h6 class="m-0 font-weight-bold text-primary">Description Produk</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Product <b>Wajib</b>
                        <p>Cantumkan deskripsi product lengkap sesuai produk, seperti keunggulan, spesifikasi, material, ukuran, masa berlaku, dan lainnya.
                        </p>
                    </label>
                    <div class="col-sm-9">
                        <textarea id="my-editor" name="description" class="form-control" required>{!! $product->short_desc !!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Overview Product <b>Wajib</b>
                        <p>Cantumkan Overview product lengkap sesuai produk, seperti keunggulan, spesifikasi, material, ukuran, masa berlaku, dan lainnya.
                        </p>
                    </label>
                    <div class="col-sm-9">
                        <textarea id="my-editor1" name="overview" class="form-control" required>{!! $product->description !!}</textarea>
                    </div>
                </div>
            </div>
        </div>


        {{-- Harga Product --}}
        <div class="card mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                <h6 class="m-0 font-weight-bold text-primary">Harga Produk</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Product <b>Wajib</b> </label>
                    <div class="col-sm-9">
                        <input type="text" name="harga" class="form-control"  value=" {{ $product->price }} "  placeholder="Masukkan Harga Product" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Promo Product <b>Opsional</b>
                        <p>Note*: <br> Ini Adalah Harga Yang akan tertera di website (Harga Pembelian)</p>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_promo" class="form-control"  value=" {{ $product->diskon }} "  placeholder="Masukkan Harga Promo Product">
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengelolaan Product --}}
        <div class="card mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                <h6 class="m-0 font-weight-bold text-primary">Pengelolaan Produk</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Stok Product <b>Wajib</b> </label>
                    <div class="col-sm-9">
                        <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Product" value=" {{ $product->stok }} " required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">SKU Product <b>Wajib</b> </label>
                    <div class="col-sm-9">
                        <input type="text" min="0" name="sku"  value=" {{ $product->sku }} "  class="form-control" placeholder="Masukkan SKU Product" required>
                    </div>
                </div>

                <div class="row input-group">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Berat Product <b>Wajib</b> </label>
                        <input type="text" name="berat" class="form-control"  value=" {{ $product->berat }} "  style="margin-left: 15px;" placeholder="Masukan Berat Product" value="100" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">@gram</span>
                        </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status <b>Wajib</b> </label>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox  mt-2">
                        <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" @if($product->status=='1') checked @endif value="1" required>
                        <label class="custom-control-label" for="customCheck1">Aktifkan Status ini jika Product ingin dipublish</label>
                      </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Recommended <b>Opsional</b> </label>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox  mt-2">
                        <input type="checkbox" name="recomended" class="custom-control-input" id="customCheck2" @if($product->recomended =='1') checked @endif value="1">
                        <label class="custom-control-label" for="customCheck2">Aktifkan Recomended ini jika Product untuk Rekomendasi</label>
                      </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">PreOrder <b>Opsional</b> </label>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" name="preorder" class="custom-control-input" id="customCheck3" @if($product->preorder =='1') checked @endif value="1">
                        <label class="custom-control-label" for="customCheck3">Aktifkan Preorder ini jika membutuhkan waktu proses lebih lama</label>
                      </div>
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success btn-simpan" >Simpan</button>
    </form>
</div>
@endsection

@section('script')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>
<script>
    CKEDITOR.replace('my-editor1', options);
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

@endsection

