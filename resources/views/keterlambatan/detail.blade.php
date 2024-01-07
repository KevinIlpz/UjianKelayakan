@extends('layout.apps')

@section('content')
    <div class="p-2 grid items-center rounded-lg gap-3">
        <div class="card-body">
            <h1 class="text-2xl lg:text-3xl font-semibold pb-5">
                <span style="border-bottom: 1px solid #B6BBC4;"><span>Detail Data Keterlambatan</span></span>
            </h1>
            <div class="table-responsive mt-1 overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="text-center">
                            <th class="border-b border-gray-400 px-4 py-2">No.</th>
                            <th class="border-b border-gray-400 px-4 py-2">NIS</th>
                            <th class="border-b border-gray-400 px-4 py-2">Name</th>
                            <th class="border-b border-gray-400 px-4 py-2">Rombel</th>
                            <th class="border-b border-gray-400 px-4 py-2">Rayon</th>
                            <th class="border-b border-gray-400 px-4 py-2">Date & Time Late</th>
                            <th class="border-b border-gray-400 px-4 py-2">Information</th>
                            <th class="border-b border-gray-400 px-4 py-2">Bukti Keterlambatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($late as $index => $item)
                            <tr class="text-center">
                                <td class="border-b border-gray-400 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->student->nis }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->student->name }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->student->rombel->rombel ?? 'N/A' }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->student->rayon->rayon ?? 'N/A' }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->date_time_late }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">{{ $item->information }}</td>
                                <td class="border-b border-gray-400 px-4 py-2">
                                    <img src="{{ asset('images/' . $item->bukti) }}" alt="Bukti Keterlambatan" style="max-width:100%;">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
