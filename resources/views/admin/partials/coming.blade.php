  <div class="card">
    <div class="card-body">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>	
          <strong>{{ $message }}</strong>
      </div>
      @endif
        <form action="{{ route('dashboard-admin-store') }}" method="post">
          @csrf
          <div class="form-group">
              <label>Jenis Laporan</label>
              <select class="form-control" name="j_laporan">
                <option>Jenis Laporan</option>
                <option value="bulanan">Bulanan</option>
                <option value="triwulan">Triwulan</option>
                <option value="tahunan">Tahunan</option>
              </select>
            </div>
          <div class="form-group">
            <label>Nama</label>
            <select class="form-control" name="user_id">
             <option>Select Name</option>
              @foreach ($employee as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>  
              @endforeach
            </select>
          </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="id_jabatan">
                <option>Select Jabatan</option>
                @foreach($jabatan as $item1)
                <option value="{{ $item1->id }}">{{ $item1->nama_jabatan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Penilaian</label>
              <select class="form-control" name="penilaian">
                <option>Select Nilai</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>
            <div class="form-group">
              <label>Bonus Retensi</label>
              <input type="number" class="form-control" name="bonus_retensi" placeholder="Masukkan bonus retensi...">
            </div>
            <div class="row">
              <div class="col">
                <label>Upah Lembur</label>
                <input type="number" class="form-control" name="upah_lembur" placeholder="Masukkan upah lembur...">
              </div>
              <div class="col">
                <label>Jam Lembur Total</label>
                <input type="number" class="form-control" name="jam_lembur_total" placeholder="Masukkan jam lembur total...">
              </div>
            </div>
            <div class="form-group">
              <label>Gaji Pokok</label>
              <input type="number" class="form-control" name="gaji_pokok" placeholder="Masukkan gaji pokok...">
            </div>
            <div class="form-group">
              <label>Jasa Produksi</label>
              <input type="number" class="form-control" name="jasa_produksi" placeholder="Masukkan jasa produksi...">
            </div>
            <div class="form-group">
              <label>Triwulan</label>
              <input type="number" class="form-control" name="triwulan" placeholder="Masukkan Triwulan..">
            </div>
            <div class="form-group">
              <input type="submit" class="w-100 btn btn-primary" >
            </div>
          </form>
    </div>
</div>
