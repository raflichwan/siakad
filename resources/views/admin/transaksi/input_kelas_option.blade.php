<div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
    <div class="col-sm-9" id="LoadDataKelas">
        <!-- <input type="text" name="kelas" id="kelas" class="form-control"> -->
        <select name="kelas_id" id="kelas_id" class="form-control">
            <option>Pilih Kelas Santri</option>
            @foreach($kelas as $value)
            <option value="{{ $value->id }}">{{$value->keterangan}}</option>
            @endforeach
        </select>
    </div>
</div>