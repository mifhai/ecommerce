<div class="col-md-3">
    <div class="media">
        @if (empty($userDetails->images))
            <img src="http://placehold.it/50x50" class="mr-3" alt="{{ $userDetails->name }}">
        @else
            <img src=" {{ asset('images/user/'.$userDetails->images) }} " class="mr-3" alt="{{ $userDetails->name }}" width="20%">
        @endif
        <div class="media-body">
          <a href="{{ url('/account') }}"><h5 class="mt-0">Hi, {{ $userDetails->name }} </h5></a>
          <a href="" data-toggle="modal" data-target="#exampleModal"><p><i class="fas fa-pen"></i> Ubah Profil</p></a>
        </div>
    </div>
    <ul class="list-group list-group-flush mt-3">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-user"></i>
                <span>Akun Saya</span>
            </a>
            <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    <a class="collapse-item" href=" {{ route('update.password') }} ">Update Password</a>
                </div>
            </div>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-bell"></i>
                <span>Pesanan Saya</span>
            </a>
            <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    <a href=" {{ url('history-order') }} " class="collapse-item">History Order</a>
                </div>
                <div class="bg-white collapse-inner rounded">
                    <a href=" {{ url('history-order-midtrans') }} " class="collapse-item">History Order Midtrans</a>
                </div>
            </div>
        </li>
        <a href=""><li class="list-group-item"><i class="far fa-bell"></i>&nbsp; Notifikasi</li></a>
    </ul>
</div>

<!-- Modal Update Profil-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action=" {{ url('/account/'.$userDetails->id) }} " method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp" value="{{ $userDetails->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ $userDetails->email }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>No HP/Telp</label>
                        <input type="text" name="phone" class="form-control" aria-describedby="emailHelp" value="{{ $userDetails->phone }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>No KTP</label>
                        <input type="text" name="ktp" class="form-control" aria-describedby="emailHelp" value="{{ $userDetails->ktp }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Provinsi</label>
                        <select name="province_origin" class="form-control" required>
                            <option value="">--Provinsi--</option>
                            @foreach ($provinsi as $prov => $value)
                            <option value="{{ $prov }}"> {{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Kota/Kabupaten Tujuan</label>
                        <select name="city_origin" class="form-control" required>
                            <option value="">--Kota/Kabupaten--</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Kecamatan</label>
                        <select name="district_origin" class="form-control" required>
                            <option value="">--Kecamatan--</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control" aria-describedby="emailHelp" value="{{ $userDetails->kode_pos }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" id="" class="form-control" cols="30" rows="10" required>{{ $userDetails->alamat_lengkap }}</textarea>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" name="image">
                    <input type="hidden" name="current_image" value="{{ $userDetails->images}}">
                    @if(!empty($userDetails->images))
                        <img class="mt-3" src="{{ asset('/images/user/'.$userDetails->images)}}" alt="{{ $userDetails->name }}" width="20%"><br>
                    @endif
                    <span class="help-block">Size : 100 x 100 px | Min 1MB</span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>


