<div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">NIS / NIK</label>
    <div class="col-sm-9" id="LoadDataNIS">
        <select name="no_identitas" id="no_identitas" class="form-control">
            <option>Pilih Jenis Nik</option>
            @foreach($pelanggar as $value)
            <option value="{{$value->no_identitas}}">{{$value->nama}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">KeteranganPelanggaran</label>
    <div class="col-sm-9" id="LoadDataPelanggaran">
        <select name="pelanggaran_master_id" id="pelanggaran_master_id" class="form-control">
            <option>Pilih Jenis Pelanggaran</option>
            @foreach($masterPelanggaran as $value)
            <option value="{{ $value->id }}">{{$value->keterangan}} - {{$value->poin}} Poin</option>
            @endforeach
        </select>
    </div>
    <input class="d-none" type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>">


</div>