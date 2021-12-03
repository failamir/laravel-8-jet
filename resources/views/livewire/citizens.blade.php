<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data WARGA
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
           

            <button wire:click="create()" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Tambah Data</button>
            @if($isModal)
                @include('livewire.modal');
            @endif
          
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">No HP</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($citizens as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->nama }}</td>
                            <td class="border px-4 py-2">{{ $row->email }}</td>
                            <td class="border px-4 py-2">{{ $row->NIK }}</td>
                            <td class="border px-4 py-2">{{ $row->nomor_hp }}</td>
                            <td class="border px-4 py-2">
                                @if($row->status == 1) {{ 'menikah'}}@endif
                                @if($row->status == 0) {{ 'belum menikah'}}@endif
                            </td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $row->id }})" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                <button wire:click="delete({{ $row->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
