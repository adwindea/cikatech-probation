<div class="container">

    @if ($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card" style="width: 100%">
        <div class="card-header">
        Form Deposit
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Rekening Tujuan:</label>
                    <select wire:model="rekening_id" class="form-control">
                        <option value="">Pilih Rekening Tujuan</option>
                        @foreach ($rekenings as $rekening)
                            <option value="{{ $rekening['id'] }}">{{ $rekening['name'] }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label>Rekening Asal</label>
                <input wire:model="rekening_asal" type="text" class="form-control " placeholder="Rekening Asal">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input wire:model="amount" type="number" class="form-control " placeholder="Jumlah">
            </div>
            <div class="form-group">
                <label>Catatan: No Rekord / Referensi</label>
                <input wire:model="note" type="text" class="form-control " placeholder="Catatan">
            </div>
            <button wire:click="save" class="btn btn-success" style="width:100%; margin:0 !important">Submit</button>
        </div>
    </div>
</div>
