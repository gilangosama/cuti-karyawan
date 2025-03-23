<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pengajuan Cuti</title>
</head>

<body>
    <p>Halo,</p>

    <p>Pengajuan cuti baru telah dibuat oleh: <strong>{{ $pengaju->name }}</strong></p>

    <p>Detail Cuti:</p>
    <ul>
        <li>Jenis Cuti: {{ $cuti->jenis }}</li>
        <li>Durasi: {{ $cuti->start }} - {{ $cuti->end }}</li>
        <li>Keterangan: {{ $cuti->description }}</li>
    </ul>

    <p>Approval:</p>
    <ul>
        @foreach ($approvals as $approval)
            <li>{{ $approval->approval }} - Status: {{ $approval->status }}</li>
        @endforeach
    </ul>

    <p>Terima kasih.</p>

</body>

</html>
