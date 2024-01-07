
@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <div class="justify-between">
        <h1 class="text-2xl lg:text-3xl font-semibold">
            <span style="border-bottom: 1px solid #B6BBC4;"><span>Data Rombel</span></span>
        </h1>
    </div>
    <div class="text-right">
        @if (Auth::user()->role == "admin")
        <a href="{{ route('rombels.create') }}" class="text-white p-2 rounded-lg" style="background-color: #98FF98;">
            Tambah Data
        </a>
        @endif
    </div>
    <div class="table-responsive mt-1 overflow-x-auto">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-center">
                        <th class="border-b border-gray-400 px-4 py-2">No.</th>
                        <th class="border-b border-gray-400 px-4 py-2">Rombel</th>
                        @if (Auth::user()->role == "admin")
                            <th class="border-b border-gray-400 px-4 py-2">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rombels as $rombel)
                        <tr>
                            <td class="border-gray-400 border-b px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border-gray-400 border-b px-4 py-2 text-center">{{ $rombel->rombel }}</td>
                            @if (Auth::user()->role == "admin")
                                <td class="border-gray-400 border-b px-4 py-2 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('rombels.edit', $rombel->id) }}" class="rounded-lg p-2 text-white flex items-center" style="background-color: #98FF98;">
                                            <i class="ri-edit-line"></i><p>Edit</p>
                                        </a>
                                        <form action="{{ route('rombels.destroy', $rombel->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-black rounded-lg p-2 text-white flex items-center" onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                                <i class="ri-delete-bin-fill"></i><p>Delete</p>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td class="border-gray-400 text-center" colspan="{{ Auth::user()->role == 'admin' ? '6' : '5' }}">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
