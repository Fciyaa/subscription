<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Barang</h3>
                    <a href="{{ route('barang.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Tambah Barang
                    </a>
                </div>

                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Kode</th>
                            <th class="border px-4 py-2">Nama Barang</th>
                            <th class="border px-4 py-2">Kategori</th>
                            <th class="border px-4 py-2">Stok</th>
                            <th class="border px-4 py-2">Harga Satuan</th>
                            <th class="border px-4 py-2 bg-green-100">Total Harga</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barang as $index => $item)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $barang->firstItem() + $index }}</td>
                                <td class="border px-4 py-2">{{ $item->kode_barang }}</td>
                                <td class="border px-4 py-2 text-left">{{ $item->nama_barang }}</td>
                                <td class="border px-4 py-2">{{ $item->kategori }}</td>
                                <td class="border px-4 py-2">{{ $item->stok }}</td>
                                <td class="border px-4 py-2 text-right">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2 text-right font-bold text-green-700">
                                        Rp {{ number_format($item->stok * $item->harga, 0, ',', '.') }}
                                    </td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('barang.edit', $item->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded text-sm">Edit</a>
                                        
                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded text-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="border px-4 py-2 text-center text-red-500">Data barang kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $barang->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>