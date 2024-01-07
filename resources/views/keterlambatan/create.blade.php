@extends('layout.apps')

@section('content')
<div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
        <div class="row">
            <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <div class="col-span-full">
                    <div class="card card-rounded bg-transparent shadow-md p-6">
                        <h1 class="text-2xl lg:text-3xl font-semibold pb-5">
                            <span style="border-bottom: 1px solid #B6BBC4;"><span>Tambah Data Keterlambatan</span></span>
                        </h1>
                        <form action="{{ route('lates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Nama Siswa</label>
                                <select class="text-black mt-1 p-2 w-full border rounded-md bg-gray-200" id="name" name="name" required>
                                    <option value="" disabled selected>Select Nama Siswa</option>
                                    @foreach($siswas as $siswa)
                                        <option value="{{ $siswa->name }}">{{ $siswa->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="date_time_late" class="block text-sm font-medium text-gray-600">Waktu Keterlambatan</label>
                                <input type="datetime-local" class="text-black mt-1 p-2 w-full border rounded-md bg-gray-200" id="date_time_late" name="date_time_late" required>
                            </div>

                            <div class="mb-4">
                                <label for="information" class="block text-sm font-medium text-gray-600">Informasi Keterlambatan</label>
                                <textarea class="text-black mt-1 p-2 w-full border rounded-md bg-gray-200 bg-gray-200" id="information" name="information" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="bukti" class="block text-sm font-medium text-gray-600">Bukti Keterlambatan</label>
                                <input type="file" class="custom-file-input text-black mt-1 p-2 w-full border rounded-md bg-gray-200" id="bukti" name="bukti" required accept="image/*">
                            </div>

                            <button type="submit" class="text-white px-4 py-2 rounded-md"  style="background-color: #98FF98;">
                                Tambah Data Keterlambatan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-file-input {
        width: 100%;
        overflow: hidden;
    }

    .custom-file-input::file-selector-button {
        background-color: transparent;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        color: #0766AD;
        font-weight: 600;
    }
</style>
@endsection
