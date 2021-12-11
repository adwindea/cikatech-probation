<div class="container">

    @if ($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">TITLE</th>
                <th scope="col">CONTENT</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>

        <tbody>
            <tr wire:ignore>
                <td>
                    <input type="text" name="title" wire:model="input.title" class="form-control" placeholder="Enter Title">
                </td>
                <td>
                    <input type="text" name="content" wire:model="input.content" class="form-control" placeholder="Enter Content">
                </td>
                <td>
                    <button wire:click="submit()" class="btn btn-success">Save</button>
                </td>
            </tr>
            @foreach ($contents as $index => $content)
                <tr wire::ignore.self>
                    <td>
                        <input type="text" wire:model.defer="contents.{{ $index }}.title" class="form-control">
                    </td>
                    <td>
                        <input type="text" wire:model.defer="contents.{{ $index }}.content" class="form-control">
                    </td>
                    <td>
                        <button type="button" wire:click="edit({{ $content['id'] }}, {{$index}})" class="btn btn-success btn-sm">Save</button>
                        <button wire:click="delete({{ $content['id'] }})" type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
