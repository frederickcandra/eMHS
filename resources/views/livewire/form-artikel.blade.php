<div>
    <form wire:submit.prevent="simpan">
        <div class="form-group">
            <label>Judul</label>
            <input wire:model="judul" class="form-control" placeholder="Masukkan Judul">
        </div>

        <div class="form-group">
            <textarea wire:model="deskripsi" cols="30" rows="10" class="form-control" placeholder ="Masukkan Deskripsi"></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
