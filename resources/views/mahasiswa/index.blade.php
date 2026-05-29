    <!doctype html>
    <html lang="id">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Daftar Mahasiswa</title>
    @if(app()->environment('local'))
        @vite('resources/css/app.css')
    @else
        @vite('resources/css/app.css')
    @endif
    </head>
    <body class="bg-gray-50 text-gray-800 antialiased">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900">Daftar Mahasiswa</h1>
            <p class="mt-1 text-sm text-gray-500">Kelola data mahasiswa — tampil, tambah, edit, dan hapus.</p>
        </div>

        <div class="flex items-center gap-3">
            <form method="GET" action="{{ url('/mahasiswa') }}" class="flex items-center gap-2">
            <label for="q" class="sr-only">Cari</label>
            <input id="q" name="q" value="{{ request('q') }}" placeholder="Cari nama, NIM, jurusan..."
                class="px-3 py-2 rounded-md border border-gray-200 bg-white text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400" />
            </form>

            <a href="{{ url('/mahasiswa/create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Mahasiswa
            </a>
        </div>
        </header>

        <main>
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            @if($data->isEmpty())
            <div class="p-8 text-center">
                <p class="text-gray-500">Belum ada data mahasiswa. Gunakan tombol <strong>Tambah Mahasiswa</strong> untuk menambah data.</p>
                <div class="mt-6">
                <a href="{{ url('/mahasiswa/create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-md border border-indigo-100 hover:bg-indigo-100">
                    + Tambah Mahasiswa
                </a>
                </div>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50">
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($data as $mhs)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $mhs->nama }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $mhs->email ?? '' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $mhs->nim }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $mhs->jurusan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ url('/mahasiswa/'.$mhs->id.'/edit') }}" class="text-indigo-600 hover:text-indigo-800 mr-3">Edit</a>

                        <form action="{{ url('/mahasiswa/'.$mhs->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus mahasiswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-white flex items-center justify-end">
                @if(method_exists($data, 'links'))
                {{ $data->withQueryString()->links() }}
                @endif
            </div>
            @endif
        </div>
        </main>
    </div>

    @vite('resources/js/app.js')
    </body>
    </html>