
@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <div class="lg:flex lg:justify-between pb-5">
        <div id="tanggalHariIni" class="lg:order-2"></div>
        <h1 class="text-2xl lg:text-3xl font-semibold lg:order-1">
            <span style="border-bottom: 1px solid #B6BBC4; "><span>Welcome, <span style="color: #98FF98;">{{ Auth::user()->name }}</span></span></span>
        </h1>
    </div>

    <h1 class="text-xl lg:text-2xl font-semibold">Dashboard</h1>
    @if (Auth::user()->role == "admin")
        <!-- ... (Bagian admin) ... -->
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

            <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 md:gap-5 lg:gap-5 xl:gap-5 gap-1">
                <div class="bg-transparent border p-3 px-6 rounded-lg shadow-lg font-semibold text-lg w-full">
                    <div class="items-center">
                        <h1 class="mb-4">Administrator</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 448 512"><path fill="#1a202c" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <a href="" class="text-sm">{{$adminCount}}</a>
                    </div>
                </div>

                <div class="bg-transparent border p-3 px-6 rounded-lg shadow-lg font-semibold text-lg w-full mt-5 md:mt-0">
                    <div class="items-center">
                        <h1 class="mb-4">Pembimbing Siswa</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 448 512"><path fill="#1a202c" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <a href="" class="text-sm">{{$psCount}}</a>
                    </div>
                </div>
            </div>

            <div class="grid items-center bg-transparent border p-3 px-6 rounded-lg shadow-lg gap-5 font-semibold text-lg">
                <div class="col-span-1 items-center">
                    <h1>Rombel</h1>
                </div>
                <div class="col-span-1 flex items-center gap-2">
                    <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 384 512"><path fill="#1a202c" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                    <a href="{{ route('data.rombel.page') }}" class="text-sm">{{$rombels -> count()}}</a>
                </div>
            </div>

            <div class="grid items-center bg-transparent border p-3 px-6 rounded-lg shadow-lg gap-5 font-semibold text-lg">
                <div class="col-span-1 items-center">
                    <h1>Rayon</h1>
                </div>
                <div class="col-span-1 flex items-center gap-2">
                    <svg class="p-2 rounded-xl shadow-lg bg-gray-200" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 384 512"><path fill="#1a202c" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                    <a href="{{ route('data.rayon.page') }}" class="text-sm">{{$rayons -> count()}}</a>
                </div>
            </div>
        </div>
    @endif

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
