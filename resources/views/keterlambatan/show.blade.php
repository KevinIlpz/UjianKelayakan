@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <h1 class="text-2xl lg:text-3xl font-semibold">
        <span style="border-bottom: 1px solid #B6BBC4;"><span>Data Keterlambatan</span></span>
    </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-full md:col-span-2">
                <div class="card card-rounded overflow-x-auto">
                    <div class="card-body" x-data="{ activeTab: 'alldata' }">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <ul class="flex space-x-4 mb-4 md:mb-0">
                                <li>
                                    <a class="cursor-pointer px-4 py-2 text-sm md:text-md lg:text-md"
                                        id="alldata-tab" @click="activeTab = 'alldata'"
                                        :class="{ 'border-b-2 border-green-400': activeTab === 'alldata' }">Keseluruhan Data</a>
                                </li>
                                <li>
                                    <a class="cursor-pointer px-4 py-2 text-sm md:text-md lg:text-md" id="rekapdata-tab" @click="activeTab = 'rekapdata'"
                                        :class="{ 'border-b-2 border-green-400': activeTab === 'rekapdata' }">Rekapitulasi Data</a>
                                </li>
                            </ul>
                            @if (Auth::user()->role == "ps")
                            <div class="mb-4 md:mb-0">
                                <h4 class="font-semibold">Data Keterlambatan</h4>
                            </div>
                            @endif

                            @if (Auth::user()->role == "admin")
                            <div class="mb-4 md:mb-0">
                                <h4 class="font-semibold">Data Keterlambatan</h4>
                            </div>

                            <div class="flex space-x-2">
                                <a href="{{ route('lates.create') }}"
                                    class="p-2 md:p-3 lg:p-3 btn-lg text-white rounded-lg" style="background-color: #98FF98;">
                                    <p class="font-semibold text-sm md:text-md lg:text-md">Tambah data</p>
                                </a>
                                <a href="{{ route('lates.export') }}"
                                    class="p-2 md:p-3 lg:p-3 bg-black btn-lg text-white rounded-lg" id="exportDataBtn">
                                    <p class="font-semibold text-sm md:text-md lg:text-md">Ekspor Data Keterlambatan</p>
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="alldata" role="tabpanel" aria-labelledby="alldata-tab"
                                x-show="activeTab === 'alldata'" x-cloak>
                                <div class="table-responsive mt-1 overflow-x-auto">
                                    <div class="overflow-x-auto">
                                        <table class="w-full border-collapse">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="border-b border-gray-400 px-4 py-2">No.</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Nama</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Tanggal & Waktu</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Informasi</th>
                                                    @if (Auth::user()->role == "admin")
                                                        <th class="border-b border-gray-400 px-4 py-2">Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @forelse ($lates as $late)
                                                    <tr>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $i++ }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $late->name }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $late->date_time_late }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $late->information }}</td>
                                                        @if (Auth::user()->role == "admin")
                                                            <td class="border-b border-gray-400 px-4 py-2 text-center">
                                                                <div class="flex justify-center gap-2">
                                                                    <a href="{{ route('lates.edit', $late->id) }}" class="rounded-lg p-2 text-white flex items-center" style="background-color: #98FF98;">
                                                                        <i class="ri-edit-line"></i><p>Edit</p>
                                                                    </a>
                                                                    <form action="{{ route('lates.destroy', $late->id) }}" method="POST">
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
                                                        <td class="text-center" colspan="{{ Auth::user()->role == 'admin' ? '6' : '5' }}">No data available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="rekapdata" role="tabpanel" aria-labelledby="rekapdata-tab"
                                x-show="activeTab === 'rekapdata'" x-cloak>
                                <div class="table-responsive mt-1 overflow-x-auto">
                                    <div class="overflow-x-auto">
                                        <table class="w-full border-collapse">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="border-b border-gray-400 px-4 py-2">No.</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Nama</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Jumlah Keterlambatan</th>
                                                    <th class="border-b border-gray-400 px-4 py-2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rekapitulasi as $item)
                                                    <tr>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $item['name'] }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">{{ $item['jumlah_keterlambatan'] }}</td>
                                                        <td class="border-b border-gray-400 px-4 py-2 text-center">
                                                            <div class="flex justify-center gap-2">
                                                                <a href="{{ route('lates.detail', ['name' => $item['name']]) }}"
                                                                    class="rounded-lg p-2 text-white flex items-center" style="background-color: #98FF98;">
                                                                    <i class="fas fa-info"></i><p>Detail</p>
                                                                </a>
                                                                @if ($item['jumlah_keterlambatan'] >= 3)
                                                                <a href="{{ route('lates.cetak-surat', ['id' => $item['id']]) }}"
                                                                    class="bg-black rounded-lg p-2 text-white flex items-center">
                                                                    <i class="fas fa-file-alt"></i><p>Cetak Surat</p>
                                                                </a>
                                                            </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>

@endsection


{{-- @push('scripts')
    <script>
        document.getElementById('exportDataBtn').addEventListener('click', function () {
            // Add your export logic here
            alert('Exporting Data Keterlambatan...');
        });
    </script>
@endpush --}}
