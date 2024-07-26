<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Jabatan</th>
            <th>Perusahaan</th>
            <th>Kehadiran</th>
            <th>Konfirmasi Kehadiran</th>
            <th>Pengganti</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->no_telp }}</td>
                <td>{{ $user->position }}</td>
                <td>{{ $user->perusahaan }}</td>
                <td>{{ $user->kehadiran }}</td>
                <td>{{ $user->konfirmasi_kehadiran??"belum dikonfirmasi"}}</td>
                <td>{{ $user->subtitute??'-' }}</td>
            </tr>
        @empty
            <tr>
                <td>Belum ada tamu undangan</td>
            </tr>
        @endforelse
    </tbody>
</table>
