<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Peserta Didik</title>
</head>
<body>
<h3 align="center">Daftar Peserta Didik Kelas {{ ($kelas === 'Semua')? '10-12': $kelas }}</h3>
<table width="100%" border="1px" cellpadding="5px" cellspacing="0" style="font-size: 10px;font-family: Arial,serif;">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>NIPD</th>
        <th>Rombel</th>
        <th>Angkatan</th>
        <th>JK</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Nomor HP</th>
        <th>Email</th>
    </tr>
    @foreach($peserta_didik as $pd)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $pd->nama }}</td>
            <td>{{ $pd->nipd }}</td>
            <td>{{ str_replace('-', ' ', $pd->kode_rombel) }}</td>
            <td align="center">{{ $pd->tahun_masuk }}</td>
            <td align="center">{{ $pd->jenis_kelamin }}</td>
            <td>{{ $pd->tempat_lahir }}, {{ date('d-m-Y', strtotime($pd->tanggal_lahir)) }}</td>
            <td>{{ $pd->hp }}</td>
            <td>{{ $pd->email }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>