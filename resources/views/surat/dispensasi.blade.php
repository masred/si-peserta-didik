@extends('layouts.kop-surat')
@section('title', 'Surat Izin Meninggalkan Pelajaran')
@section('content')
    <div style="text-align: center;">
        <h3 style="margin-top: 20px">SURAT IZIN</h3>
        <h3 style="margin-bottom: 20px">MENINGGALKAN PELAJARAN</h3>
    </div>
    <p>Yang bertanda tangan dibawah ini Kepala SMK Negeri 3 Tasikmalaya, dengan  ini mengizinkan :</p>
    <table style="margin: 20px;font-size: 12px" cellpadding="5px" cellspacing="0" border="1px" align="center" width="100%">
        <tr>
            <th><p>Nama</p></th>
            <th><p>Kelas</p></th>
        </tr>
        @foreach($pd_dispen as $p)
            <tr>
                <td align="center"><p>{{ strtoupper($p['nama']) }}</p></td>
                <td align="center"><p>{{ $p['kelas'] }}</p></td>
            </tr>
        @endforeach
    </table>
    <p style="margin-bottom: 10px">Untuk meninggalkan pelajaran mulai jam ke {{ $jam_ke }} sampai dengan jam ke {{ $sampai_jam_ke }} dengan alasan {{ $surat->alasan_dibuat }}.</p>
    <p style="margin-bottom: 10px">Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

    <div class="left" style="float: right; margin: 80px 50px 0 0">
        <p>Tasikmalaya, {{ \Carbon\Carbon::parse($surat->tanggal)->isoFormat('D MMMM Y') }}</p>
        <br>
    </div>
    <table width="100%" style="margin-top: 40px" align="center">
        <tr>
            <td align="center">
                <p>Mengizinkan</p>
                <p>Guru Mapel/BK/Wali Kelas</p>
                <p style="margin-top: 60px">{{ $guru_mapel }}</p>
                <p>NIP {{ $nip_guru_mapel }}</p>
            </td>
            <td align="center">
                <p>a.n. Kepala Sekolah</p>
                <p>Guru/petugas Piket</p>
                <p style="margin-top: 60px">{{ $petugas_piket }}</p>
                <p>NIP {{ $nip_petugas_piket }}</p>
            </td>
        </tr>
    </table>
@endsection
