<!-- Modal Update Profil-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Pengiriman</h5>
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
                <input type="hidden" name="current_image" value="{{ $userDetails->images}}">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>
