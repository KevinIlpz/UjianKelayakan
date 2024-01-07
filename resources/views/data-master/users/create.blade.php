

@extends('layout.apps')

@section('content')
        <div class="bg-transparent p-4 rounded-lg grid gap-4" id="overview" role="tabpanel" aria-labelledby="overview">
            <h1 class="text-2xl lg:text-3xl font-semibold">
                <span style="border-bottom: 1px solid #B6BBC4;"><span>Tambah User</span></span>
            </h1>
                <form action="{{ route('users.store') }}" method="POST">
                @csrf
                    <div class="mb-3 grid items-center gap-3 pb-5">
                        <label for="name" class="col-sm-2 col-form-label font-semibold">Nama : </label>
                            <div class="w-full">
                                <input type="text" class="text-black w-full p-1 rounded-lg bg-gray-200" id="name" name="name">
                            </div>

                        <label for="email" class="col-sm-2 col-form-label font-semibold">Email : </label>
                            <div class="w-full">
                                <input type="text" class="text-black w-full p-1 rounded-lg bg-gray-200" id="email" name="email">
                            </div>

                        <label for="role" class="col-sm-2 col-form-label font-semibold">Role : </label>
                            <div class="w-full">
                                <select class="text-black w-full p-2 rounded-lg bg-gray-200" id="role" name="role" required>
                                    <option value="">none</option>
                                    <option value="admin">Admin</option>
                                    <option value="ps">PS</option>
                                </select>
                            </div>
                    </div>
                    <button type="submit" class="p-2 rounded-lg text-white" style="background-color: #98FF98;">Add User</button>
                </form>
            </div>
        </div>
@endsection
