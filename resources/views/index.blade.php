
@extends('layout.apps')

@section('content')
    @if (Auth::user()->role == "ps")
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
            <div class="grid items-center bg-transparent border p-3 px-6 rounded-lg shadow-lg gap-5 font-semibold text-lg">
                <div class="col-span-1 items-center">
                    <h1>Peserta Didik</h1>
                </div>
                <div class="col-span-1 flex items-center gap-2">
                    <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 448 512"><path fill="#1a202c" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <a href="{{ route('data.siswa.page') }}" class="text-sm">{{$students -> count()}}</a>
                </div>
            </div>
            <div class="grid items-center bg-transparent border p-3 px-6 rounded-lg shadow-lg gap-5 font-semibold text-lg">
                <div class="col-span-1 items-center">
                    <h1>Keterlambatan Peserta Didik</h1>
                </div>
                <div class="col-span-1 flex items-center gap-2">
                    <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 448 512"><path fill="#1a202c" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <a href="" class="text-sm">{{$latesCount }}</a>
                </div>
            </div>
        </div>
    @endif

    <script>
        function getFormattedDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            const formattedDate = today.toLocaleDateString('en-US', options);

            const [weekday, month, day, year] = formattedDate.split(' ');

            const customLayout = `${weekday} ${day} ${month} ${year}`;

            return customLayout;
        }

        document.getElementById('tanggalHariIni').textContent = getFormattedDate();
    </script>
</div>
@endsection
