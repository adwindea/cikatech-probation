<div class="container">
    @if ($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="mb-2">
        <span class="font-weight-bold">Deposit : </span>
        <input type="text" wire:model="progress_count" size="1" class="text-center bg-success text-white" disabled="">
    </div>

    @if ($progresses)
        @foreach ($progresses as $progress)
            <div class="alert alert-success" role="alert">
                <div class="row">
                    <div class="col-md-4">{{ date('Y-m-d H:i:s', strtotime($progress['created_at'])) }}</div>
                    <div class="col-md-4 text-center">Deposit dari : {{ $progress['rekening_asal'] }}</div>
                    <div class="col-md-4 text-right">Jumlah : {{ number_format($progress['amount'], 0, '', '') }}</div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4" style="background: #f5ff36">
                    <p style="position: relative;top: 8px;" class="text-center">Deposit in progress</p>
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Rekening Tujuan</th>
                        <th>Rekening Asal</th>
                        <th>Jumlah</th>
                        <th>Catatan: Nomor Rekord / Referensi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($progresses)
                        @foreach ($progresses as $index => $progress)
                            <tr class="text-center">
                                <td>{{ $index+1 }}</td>
                                <td>{{ $progress['rekening']['name'] }}</td>
                                <td>{{ $progress['rekening_asal'] }}</td>
                                <td>{{ $progress['amount'] }}</td>
                                <td>{{ $progress['note'] }}</td>
                                <td>
                                    <button wire:click.defer="approve({{ $progress['id'] }})" title="approve deposit" class="btn btn-info btn-sm"><i class="fas fa-check"></i></button>
                                    <button wire:click="delete({{ $progress['id'] }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4" style="background: #8deab3">
                    <p style="position: relative;top: 8px;" class="text-center">Deposit Approved</p>
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Rekening Tujuan</th>
                        <th>Rekening Asal</th>
                        <th>Jumlah</th>
                        <th>Catatan: Nomor Rekord / Referensi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($approves)
                        @foreach ($approves as $index => $approve)
                            <tr class="text-center">
                                <td>{{ $index+1 }}</td>
                                <td>{{ $approve['rekening']['name'] }}</td>
                                <td>{{ $approve['rekening_asal'] }}</td>
                                <td>{{ $approve['amount'] }}</td>
                                <td>{{ $approve['note'] }}</td>
                                <td>
                                    <button wire:click.defer="reload({{ $approve['id'] }})" title="cancel deposit" class="btn btn-info btn-sm"><i class="fas fa-redo-alt"></i></button>
                                    <button wire:click="delete({{ $approve['id'] }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
