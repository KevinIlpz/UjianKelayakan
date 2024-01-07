
@extends('layout.apps')

@section('content')
        <div class="bg-transparent p-4 rounded-lg grid gap-4" id="overview" role="tabpanel" aria-labelledby="overview">
            <h1 class="text-2xl lg:text-3xl font-semibold">
                <span style="border-bottom: 1px solid #B6BBC4;"><span>Tambah Siswa</span></span>
            </h1>
                <form action="{{ route('students.store') }}" method="POST">
                @csrf
                    <div class="mb-3 grid items-center gap-3 pb-5">
                        <label for="rombel_id" class="col-sm-2 col-form-label font-semibold">Rombel : </label>
                            <div class="w-full">
                                <select class="text-black w-full p-2 rounded-lg bg-gray-200" id="rombel_id" name="rombel_id" required>
                                    <option value="">Select Rombel</option>
                                    @foreach ($rombels as $rombel)
                                    <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <label for="rayon_id" class="col-sm-2 col-form-label font-semibold">Rayon : </label>
                            <div class="w-full">
                                <select class="text-black w-full p-2 rounded-lg bg-gray-200" id="rayon_id" name="rayon_id" required>
                                    <option value="">Select Rayon</option>
                                    @foreach ($rayons as $rayon)
                                    <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <label for="nis" class="col-sm-2 col-form-label font-semibold">NIS : </label>
                            <div class="w-full">
                                <input type="text" class="text-black w-full p-1 rounded-lg bg-gray-200" id="nis" name="nis">
                            </div>

                        <label for="name" class="col-sm-2 col-form-label font-semibold">Nama : </label>
                            <div class="w-full">
                                <input type="text" class="text-black w-full p-1 rounded-lg bg-gray-200" id="name" name="name">
                            </div>
                    </div>
                    <button type="submit" class="p-2 rounded-lg text-white" style="background-color: #98FF98;">Add Siswa</button>
                </form>
            </div>
        </div>
@endsection
