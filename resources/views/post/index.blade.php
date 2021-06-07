@extends('layout.app', ['title' => 'Data datakantins'])

@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="px-6 py-2 text-white text-center text-5xl">
        <h1>Data Kantin</h1>
    </div>
</div>
<div class="container mx-auto mt-10 mb-10">
    <div class="bg-white p-5 rounded shadow-sm">
        <div class="grid grid-cols-8 gap-4 mb-4">
            <div class="col-span-1 mt-2">
                <a href="{{ route('post.create') }}"
                    class="w-full bg-indigo-500 text-white p-3 rounded shadow-sm focus:outline-none hover:bg-indigo-700">TAMBAH
                    POST</a>
            </div>
            <div class="col-span-7">
                <form action="{{ route('post.index') }}" method="GET">
                    <input type="text" name="search"
                    class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white"
                    placeholder="ketik judul post dan enter">
                </form>
            </div>
        </div>
        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-indigo-500 w-full">
                    <th class="px-16 py-2">
                        <span class="text-white">ID</span>
                    </th>
                    <th class="px-16 py-2 text-left">
                        <span class="text-white">NAMA KANTIN</span>
                    </th>
                    <th class="px-16 py-2 text-left">
                        <span class="text-white">ALAMAT</span>
                    </th>
                    <th class="px-16 py-2 text-left">
                        <span class="text-white">KONTAK</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-white">AKSI</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse($datakantins as $post)
                    <tr class="bg-white border-2 border-gray-200">

                        <td class="px-16 py-2">
                            {{ $post->id }}
                        </td>
                        <td class="px-16 py-2">
                            {{ $post->namakantin }}
                        </td>
                        <td class="px-16 py-2">
                            {{ $post->alamat }}
                        </td>
                        <td class="px-16 py-2">
                            {{ $post->kontak }}
                        </td>
                        <td class="px-10 py-2 text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:border-indigo-700 text-xs focus:outline-none mr-2"><a href="{{ route('post.edit', $post->id) }}">EDIT</a></button>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:border-red-700 text-xs focus:outline-none"> HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                        Data Belum Tersedia!
                    </div>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $datakantins->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

@endsection