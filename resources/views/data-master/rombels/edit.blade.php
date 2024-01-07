{{-- resources/views/rombel/create.blade.php --}}

@extends('layout.apps')

@section('content')
    <div class="bg-white p-4 rounded grid gap-4">
                <div>
                    <h4 class="font-semibold text-3xl">Edit rombel</h4>
                </div>

                    <form action="{{ route('rombels.update', $rombel->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                                <div class="mb-3 grid items-center gap-3">
                                    <label for="rombel" class="font-semibold">Rombel</label>
                                    <input type="text" class="w-full p-2 bg-gray-100 border rounded-lg" id="rombel" name="rombel" value="{{ $rombel->rombel }}" required>
                                </div>

                                <div class="justify-end">
                                    <button type="submit" class="p-2 rounded-lg text-white" style="background-color: #98FF98;">Update Rombel</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
