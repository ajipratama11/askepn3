<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .printbreak {
            page-break-before: always;
        }
    </style>
</head>

<body onload="window.print();">

    <h2 style="text-align: center;">Diagnosa dan Rencana Keperawatan</h2>
    <table>
        <tr>
            <th class="col-1">No Rekam Medik</th>
            <th class="col-1">Nama Pasien</th>
            <th class="col-1">Umur</th>
            <th class="col-1">Jenis Kelamin</th>
            <th class="col-1">Ruang</th>
        </tr>
        <tr>
            <td>{{$pasien->id}}</td>
            <td>{{$pasien->nama_pasien}}</td>
            <td>{{$pasien->tanggal_lahir}}</td>
            <td>{{$pasien->jenis_kelamin}}</td>
            <td>{{$pengkajian->ruang}}</td>
        </tr>

    </table>
    <br>
    <table>
        <tr>
            <th class="col-1">Tanggal</th>
            <th class="col-1">No. Diagnosa</th>
            <th class="col-1">Diagnosa</th>
            <th class="col-1">NOC</th>
            <th class="col-1">NIC</th>
            <th class="col-1">Paraf</th>
        </tr>
        <tr>
            <td style=" vertical-align:top">{{$pengkajian->tanggal}}</td>
            <td style=" vertical-align:top">{{$diagnosa->id}}</td>
            <td style=" vertical-align:top">
                {{$diagnosa->nama_diagnosa}}
                <br>
                Definisi :
                <br>
                {{$diagnosa->definisi_diagnosa}}
            </td>
            <td style=" vertical-align:top">Setelah dilakukan tindakan
                perawatan selama {{$dbnoc->hari}} X 24 Jam,
                masalah ketidakseimbangan nutrisi
                dari kebutuhan tubuh {{$evaluasi->analisis}},
                Dengan kriteria :
                <br>
                @foreach(explode(',', $dbnoc->noc) as $info)
                <label class="custom-control-label">
                    - {{$dbnoc->identi($info)}}</label>
                <br>
                @endforeach
            </td>
            <td style=" vertical-align:top" style=" vertical-align:top">
                @foreach(explode(',', $dbnic->nic) as $info)
                <label class="custom-control-label">
                    - {{$dbnic->identi($info)}}</label>
                <br>
                @endforeach
            </td>

            <td style=" vertical-align:top">{{$pengkajian->perawat->name}}</td>
        </tr>

    </table>



    <div class="printbreak">
        <h2 style="text-align: center;">Pengkajian Keperawatan</h2>

        <table>
            <tr>
                <td style="border:none; width:30px">A. Tanggal Pengajian</td>
                <td style="border:none; width:200px">: {{$pengkajian->tanggal}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">B. Jam Pengajian</td>
                <td style="border:none; width:200px">: {{$time}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">C. No. RM</td>
                <td style="border:none; width:200px">: {{$pasien->id}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">D. Identitas Pasien</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; 1. Nama</td>
                <td style="border:none; width:200px">: {{$pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; 2. Umur</td>
                <td style="border:none; width:200px">: {{$pasien->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; 3. Jenis Kelamin</td>
                <td style="border:none; width:200px">: {{$pasien->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; 4. Agama</td>
                <td style="border:none; width:200px">: {{$pasien->agama}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; 5. Alamat</td>
                <td style="border:none; width:200px">: {{$pasien->alamat}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">E. Riwayat Kesehatan</td>
            </tr>
            <tr>
                <td style="border:none; width:70px">&emsp; 1. Keluhan Utama</td>
                <td style="border:none; width:100px">: {{$pengkajian->keluhan}}</td>
            </tr>
            <tr>
                <td style="border:none; width:110px">&emsp; 2. Riwayat Penyakit Sekarang</td>
                <td style="border:none; ">: {{$pengkajian->riwayat_penyakit_sekarang}}</td>
            </tr>
            <tr>
                <td style="border:none; width:50px">&emsp; 1. Riwayat Penyakit Terdahulu</td>
                <td style="border:none; ">: {{$pengkajian->riwayat_penyakit_terdahulu}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">F. Tanda Vital</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; Tekanan Darah</td>
                <td style="border:none; width:200px">: {{$pengkajian->tensi_darah}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; Suhu</td>
                <td style="border:none; width:200px">: {{$pengkajian->suhu}}</td>
            </tr>
            <tr>
                <td style="border:none; width:30px">&emsp; Nadi</td>
                <td style="border:none; width:200px">: {{$pengkajian->nadi}}</td>
            </tr>
    </div>
    </table>
    <table>
        <tr>
            <td style="border:none; width:200px"></td>
            <td style="border:none; width:50px; text-align:center;">Perawat</td>
        </tr>
        <tr>
            <td style="border:none; width:200px"></td>
            <td style="border:none; width:50px"></td>
        </tr>
        <tr>
            <td style="border:none; width:200px"></td>
            <td style="border:none; width:50px"></td>
        </tr>
        <tr>
            <td style="border:none; width:200px"></td>
            <td style="border:none; width:50px"></td>
        </tr>
        <tr>
            <td style="border:none; width:30px"></td>
            <td style="border:none; width:50px; text-align:center;">{{$pengkajian->perawat->name}}</td>
        </tr>
    </table>




    <div class="printbreak">
        <h2 style="text-align: center;">Catatan Perkembangan</h2>
        <table>
            <tr>
                <th>No Rekam Medik</th>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Ruang</th>
            </tr>
            <tr>
                <td>{{$pasien->id}}</td>
                <td>{{$pasien->nama_pasien}}</td>
                <td>{{$pasien->tanggal_lahir}}</td>
                <td>{{$pasien->jenis_kelamin}}</td>
                <td>{{$pengkajian->ruang}}</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>No Diagnosa</th>
                <th>Implementasi</th>
                <th>Keterangan</th>
                <th>Paraf</th>
            </tr>
            @foreach ($implementasi as $implementasi)
            <tr>
                <td>{{$implementasi->tanggal}}</td>
                <td>{{$diagnosa->id}}</td>
                <td>{{$implementasi->identi($implementasi->nic)}}</td>
                <td>{{$implementasi->keterangan}}</td>
                <td>{{$pengkajian->perawat->name}}</td>
            </tr>
            @endforeach
            </tr>
        </table>
    </div>


    <div class="printbreak">
        <h2 style="text-align: center;">Evaluasi</h2>
        <table>
            <tr>
                <th>No Rekam Medik</th>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Ruang</th>
            </tr>
            <tr>
                <td>{{$pasien->id}}</td>
                <td>{{$pasien->nama_pasien}}</td>
                <td>{{$pasien->tanggal_lahir}}</td>
                <td>{{$pasien->jenis_kelamin}}</td>
                <td>{{$pengkajian->ruang}}</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Evaluasi</th>
                <th>Paraf</th>
            </tr>

            <tr>
                <td>{{$date}}</td>
                <td>
                    <table>
                        <tr>
                            <td style="border:none; width:10px">Subjektif</td>
                            <td style="border:none; ">: {{$evaluasi->data_subjektif}}</td>
                        </tr>
                        <tr>
                            <td style="border:none; width:10px">Objektif</td>
                            <td style="border:none; ">: {{$evaluasi->data_objektif}}</td>
                        </tr>
                        <tr>
                            <td style="border:none; width:10px">Assessment</td>
                            <td style="border:none; ">: Masalah {{$evaluasi->analisis}}</td>
                        </tr>
                        <tr>
                            <td style="border:none; width:10px">Planning</td>
                            <td style="border:none; ">: {{$evaluasi->planing}}</td>
                        </tr>
                    </table>

                </td>
                <td>{{$pengkajian->perawat->name}}</td>
            </tr>

            </tr>
        </table>
    </div>

</body>

</html>