<?php $now = Carbon\Carbon::now();?>
@foreach ($renumerasi as $item)
    @if ($item->user_id  == Auth::user()->id)
    <div class="card">
        <div class="card-body">
                <div class="form-group">

                <?php $year_count = Carbon\Carbon::parse($item->user->created_at)->diffInYears($now); ?>

                <h6>Data Tanggal : {{ $item->created_at->format('d M Y') }}</h6>
                @if($item->created_at->format('M') === 'Mar' && $item->j_laporan === 'triwulan')
                <h6>Laporan : {{ $item->j_laporan}} Q1 {{ $item->created_at->format('Y') }}</h6>
                @elseif($item->created_at->format('M') === 'Jun' && $item->j_laporan === 'triwulan')
                <h6>Laporan : {{ $item->j_laporan}} Q2 {{ $item->created_at->format('Y') }}</h6>
                @elseif($item->created_at->format('M') === 'Sep' && $item->j_laporan === 'triwulan')
                <h6>Laporan : {{ $item->j_laporan}} Q3 {{ $item->created_at->format('Y') }}</h6>
                @elseif($item->created_at->format('M') === 'Des' && $item->j_laporan === 'triwulan')
                <h6>Laporan : {{ $item->j_laporan}} Q4 {{ $item->created_at->format('Y') }}</h6>
                @elseif($item->j_laporan === 'tahunan')
                <h6>Laporan : {{ $item->j_laporan}} {{ $item->created_at->format('Y') }}</h6>
                @else
                <h6>Laporan : {{ $item->j_laporan}} {{ $item->created_at->format('M Y') }}</h6>
                @endif
                <label>Nama</label>
                <textarea class="form-control"  placeholder="{{ $item->user->name }}" readonly></textarea>
                </div>
                <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control"  placeholder="{{ $item->user->alamat }}" readonly></textarea>
                </div>
                <div class="form-group">
                <label>No Induk Pegawai</label>
                <input class="form-control" placeholder="{{ $item->user->noinduk }}" readonly>
                </div>
                <div class="form-group">
                <label>Tempat Bertugas</label>
                <textarea class="form-control" placeholder="{{ $item->user->tbertugas }}" readonly></textarea>
                </div>
                <div class="form-group">
                @foreach($jabatan as $item1)
                @if($item->id_jabatan == $item1->id)
                <label>Jabatan</label>
                <input class="form-control" placeholder="{{ $item1->nama_jabatan }}" readonly>
                </div>
                @endif
                @endforeach
                <div class="form-group">
                <label>Penilaian</label>
                <input class="form-control" placeholder="{{ $item->penilaian }}" readonly>
                </div>
                <div class="form-group">
                <label>Bonus Retensi</label>
                <input class="form-control" name="bonus_retensi" placeholder="{{ number_format($item->bonus_retensi) }}" readonly>
                </div>
                <div class="row">
                    
                <div class="col">
                    @if ($year_count <=30)
                    <label>Upah Lembur</label>
                    <input class="form-control" name="upah_lembur" placeholder="{{ number_format((($year_count * 2/100) * $item->bonus_retensi) + $item->upah_lembur) }}" readonly>
                    @else
                    <label>Upah Lembur</label>
                    <input class="form-control" name="upah_lembur" placeholder="{{ number_format($item->upah_lembur) }}" readonly>
                    @endif
                </div>

                <div class="col">
                    <label>Jam Lembur Total</label>
                    <input class="form-control" name="jam_lembur_total" placeholder="{{ $item->jam_lembur_total }} Hour" readonly>
                </div>
                </div>
                <div class="form-group">
                    @if ($year_count <=30)
                    <label>Gaji Pokok</label>
                    <input class="form-control" name="gaji_pokok" placeholder="{{ number_format((($year_count * 2/100) * $item->bonus_retensi) + $item->gaji_pokok) }}" readonly>
                    @else
                    <label>Gaji Pokok</label>
                    <input class="form-control" name="gaji_pokok" placeholder="{{ number_format($item->gaji_pokok) }}" readonly>
                    @endif
                </div>

                <div class="form-group">
                    @if ($item->penilaian == "A")
                    <label>Jasa Produksi</label>
                    <input class="form-control" name="jasa_produksi" placeholder="{{ number_format(120/100 * $item->jasa_produksi) }}" readonly>
                    @elseif($item->penilaian == "B")
                    <label>Jasa Produksi</label>
                    <input class="form-control" name="jasa_produksi" placeholder="{{ number_format(110/100 * $item->jasa_produksi) }}" readonly>
                    @elseif($item->penilaian == "C")
                    <label>Jasa Produksi</label>
                    <input class="form-control" name="jasa_produksi" placeholder="{{ number_format(100/100 * $item->jasa_produksi) }}" readonly>
                    @elseif($item->penilaian == "D")
                    <label>Jasa Produksi</label>
                    <input class="form-control" name="jasa_produksi" placeholder= "{{number_format( 90/100 * $item->jasa_produksi) }}" readonly>
                    @endif
                </div>
                <div class="form-group">
                    @if ($item->penilaian == "A")
                    <label>Triwulan</label>
                    <input class="form-control" name="triwulan" placeholder="{{ number_format(120/100 * $item->triwulan) }}" readonly>
                    @elseif($item->penilaian == "B")
                    <label>Triwulan</label>
                    <input class="form-control" name="triwulan" placeholder="{{ number_format(110/100 * $item->triwulan) }}" readonly>
                    @elseif($item->penilaian == "C")
                    <label>Triwulan</label>
                    <input class="form-control" name="triwulan" placeholder="{{ number_format(100/100 * $item->triwulan) }}" readonly>
                    @elseif($item->penilaian == "D")
                    <label>Triwulan</label>
                    <input class="form-control" name="triwulan" placeholder="{{ number_format(900/100 * $item->triwulan) }}" readonly>
                    @endif
                </div>
                <div class="form-group">
                    {{-- if penilaian A --}}
                    @if ($item->penilaian == "A")
                        @if ($year_count <=30)
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format(((($year_count * 2/100) * $item->bonus_retensi) + $item->upah_lembur) + ((($year_count * 2/100) * $item->bonus_retensi) + $item->gaji_pokok) + 120/100 * $item->jasa_produksi + 120/100 * $item->triwulan)}}" readonly>
                        @else
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format($item->upah_lembur + $item->gaji_pokok + $item->jasa_produksi + $item->triwulan) }}" readonly>
                        @endif
                    {{-- endif penilaian A --}}

                    {{-- if penilaian B --}}
                    @elseif($item->penilaian == "B")
                        @if ($year_count <=30)
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format(((($year_count * 2/100) * $item->bonus_retensi) + $item->upah_lembur) + ((($year_count * 2/100) * $item->bonus_retensi) + $item->gaji_pokok) + 110/100 * $item->jasa_produksi + 110/100 * $item->triwulan)}}" readonly>
                        @else
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format($item->upah_lembur + $item->gaji_pokok + $item->jasa_produksi + $item->triwulan) }}" readonly>
                        @endif
                    {{-- endif penilaian B --}}

                    {{-- if penilaian C --}}
                    @elseif($item->penilaian == "C")
                        @if ($year_count <=30)
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format(((($year_count * 2/100) * $item->bonus_retensi) + $item->upah_lembur) + ((($year_count * 2/100) * $item->bonus_retensi) + $item->gaji_pokok) + 100/100 * $item->jasa_produksi + 100/100 * $item->triwulan)}}" readonly>
                        @else
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format($item->upah_lembur + $item->gaji_pokok + $item->jasa_produksi + $item->triwulan) }}" readonly>
                        @endif
                    {{-- endif penilaian C --}}

                    {{-- if penilaian D --}}
                    @elseif($item->penilaian == "D")
                        @if ($year_count <=30)
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format(((($year_count * 2/100) * $item->bonus_retensi) + $item->upah_lembur) + ((($year_count * 2/100) * $item->bonus_retensi) + $item->gaji_pokok) + 90/100 * $item->jasa_produksi + 90/100 * $item->triwulan)}}" readonly>
                        @else
                            <label>Grand Total</label>
                            <input class="form-control" name="triwulan" placeholder="{{ number_format($item->upah_lembur + $item->gaji_pokok + $item->jasa_produksi + $item->triwulan) }}" readonly>
                        @endif
                    {{-- endif penilaian D --}}
                    @endif
                </div>
                {{-- @else
                <p class="lead">
                    Maaf, Data belum dimasukkan.
                </p> --}}
        </div>
    </div>
    @endif
@endforeach
