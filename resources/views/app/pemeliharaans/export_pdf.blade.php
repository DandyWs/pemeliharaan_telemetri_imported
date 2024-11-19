<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/style/style.css">
    <title>Lampiran Laporan Pemeliharaan Telemetri</title>
</head>
<body>
    {{-- <style type="text/css">
       table{
        margin-top: 0%;
        margin-bottom: 10%;
        border-collapse: collapse;
        width: 100%;
       }
       table tr td, table tr th{
        border: 1px solid black;
        padding: 8px;
        font-size: 9pt;
       }
       .title {
        margin-top : 50px;
       }
    </style>
     <center>
        <h4 class="title">LAPORAN PEMELIHARAAN PERALATAN</h4>
        <h4 class="sub-title">TELEMETRI WQMS GSM </h4><br><br>
    </center>
    <div class="container mt-2">
        <div class="row justify-content-center align-items-center">
            <div class="card">
        
                <div class="card-body">
            
                        <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pemeliharaan</th>
                                <th>Waktu Mulai</th>
                                <th>Periode</th>
                                <th>Cuaca</th>
                                <th>No Alat Ukur</th>
                                <th>No GSM</th>
                                <th>User</th>
                                <th>Lokasi Stasiun</th>
                                <th>Jenis Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemeliharaans as $pemeliharaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemeliharaan->tanggal }}</td>
                                <td>{{ $pemeliharaan->waktu }}</td>
                                <td>{{ $pemeliharaan->periode }}</td>
                                <td>{{ $pemeliharaan->cuaca }}</td>
                                <td>{{ $pemeliharaan->no_alatUkur }}</td>
                                <td>{{ $pemeliharaan->no_GSM }}</td>
                                <td>{{ optional($pemeliharaan->user)->name }}</td>
                                <td>{{ optional($pemeliharaan->alatTelemetri)->lokasiStasiun }}</td>
                                {{-- <td>{{ optional($pemeliharaan->alatTelemetri->jenisAlat)->namajenis }}</td> --}}
                            {{-- </tr> --}}
                            {{-- @endforeach --}}
                        {{-- </tbody> --}}
                    {{-- </table> --}}
                {{-- </div> --}}
            {{-- </div>  --}}
        {{-- </div> --}}
    {{-- </div> --}}

    <div style="position:absolute;top:750.108215px;left:82.290550px">
        <nobr>
            <table height="69.265137px" width="315.217987px" bordercolor="black" border="2">
                <tr>
                    <td height = "11.673584" width="122.751160" rowspan="1" colspan="2"></td>
                    <td height = "11.673584" width="113.662338" rowspan="1" colspan="2"></td>
                </tr>
                <tr>
                    <td height = "11.673462" width="62.551025" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="60.200134" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="60.230087" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="53.432251" rowspan="1" colspan="1"></td>
                </tr>
                <tr>
                    <td height = "28.601807" width="62.551025" rowspan="1" colspan="1"></td>
                    <td height = "28.601807" width="60.200134" rowspan="1" colspan="1"></td>
                    <td height = "28.601807" width="60.230087" rowspan="1" colspan="1"></td>
                    <td height = "28.601807" width="53.432251" rowspan="1" colspan="1"></td>
                </tr>
            </table>
        </nobr>
    </div>
    <div style="position:absolute;top:750.108215px;left:413.064026px">
        <nobr>
            <table height="69.418457px" width="315.220764px" bordercolor="black" border="2">
                <tr>
                    <td height = "11.673584" width="122.754150" rowspan="1" colspan="2"></td>
                    <td height = "11.673584" width="113.661407" rowspan="1" colspan="2"></td>
                </tr>
                <tr>
                    <td height = "11.673462" width="62.553040" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="60.201111" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="60.227112" rowspan="1" colspan="1"></td>
                    <td height = "11.673462" width="53.434296" rowspan="1" colspan="1"></td>
                </tr>
                <tr>
                    <td height = "28.716797" width="62.553040" rowspan="1" colspan="1"></td>
                    <td height = "28.716797" width="60.201111" rowspan="1" colspan="1"></td>
                    <td height = "28.716797" width="60.227112" rowspan="1" colspan="1"></td>
                    <td height = "28.716797" width="53.434296" rowspan="1" colspan="1"></td>
                </tr>
            </table>
        </nobr>
    </div>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
        <span style="position:absolute;top:1016.807739px;left:630.129639px">
        <nobr>Halaman 1/1 </nobr>
        </span>
        </span>
    </p>
    <div style="position:absolute;top:1009.471558px;left:703.565247px">
        <nobr><img height="22.000000" width="24.000000" src ="bgimg/bg00001.jpg"/></nobr>
    </div>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-weight:bold;color:#000000;">
            <span style="position:absolute;top:78.652100px;left:493.668518px">
                <nobr>Lampiran 9, Dok No. QI/DTI/02 </nobr>
            </span>
            <span style="position:absolute;top:90.816811px;left:493.201874px">
                <nobr>Formulir No.QI/DTI/02-9, Status “R8” </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-weight:bold;color:#000000;">
            <span style="position:absolute;top:123.478844px;left:216.248154px">
                <nobr>LAPORAN PEMELIHARAAN DAN KALIBRASI INTERNAL </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-weight:bold;color:#000000;">
            <span style="position:absolute;top:145.918045px;left:247.359268px">
                <nobr>PERALATAN TELEMETRI *( AWLR / ARR ) GSM </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:168.085281px;left:93.364471px">
                <nobr>Nama Stasiun Telemetri : ____________ Tanggal : ____________ </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:190.498611px;left:93.364471px">
                <nobr>Periode Pemeliharaan : ____________ Jam : BS_______| AS_______ </nobr>
            </span>
            <span style="position:absolute;top:212.911942px;left:93.364471px">
                <nobr>Pelaksana Pemeliharaan : ____________ No. Alat Ukur : ____________ </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:235.325272px;left:93.364471px">
                <nobr>Cuaca : ____________ No. GSM : ____________ </nobr>
            </span>
        </span>
    </p>
    <div style="position:absolute;top:254.578049px;left:74.977936px">
        <nobr>
            <table height="576.778198px" width="661.706848px" bordercolor="black" border="2">
                <tr>
                    <td height = "78.824280" width="248.083069" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:3.627441px;left:10.919820px">
                                    <nobr>a. Modem </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:33.511883px;left:33.630779px">
                                    <nobr>Indikator Led </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:63.435139px;left:33.630779px">
                                    <nobr>SIM Card Aktif </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                    <td height = "78.824280" width="248.197083" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:3.627441px;left:343.842438px">
                                    <nobr>f. Smart Battery Charger </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:33.511799px;left:359.864502px">
                                    <nobr>Pemeriksaan Kondisi Alat </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:63.435139px;left:359.864502px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td height = "78.797363" width="248.083069" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:108.728676px;left:10.919841px">
                                    <nobr>b. * ( Data Logger / Microcontroler ) </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:138.613113px;left:33.630798px">
                                    <nobr>Indikator Led </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:168.497559px;left:33.163807px">
                                    <nobr>Test SMS Manual dan Seting RTC </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                    <td height = "78.797363" width="248.197083" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:108.728760px;left:342.442444px">
                                    <nobr>g. Antena GSM </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:138.613113px;left:361.109039px">
                                    <nobr>Pemeriksaan Kondisi Alat </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:168.497559px;left:361.109039px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td height = "90.023743" width="248.083069" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:213.791061px;left:10.919841px">
                                    <nobr>c. AC-DC Converter </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:243.675461px;left:33.630798px">
                                    <nobr>Pemeriksaan Kondisi Alat </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:273.585815px;left:33.630798px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                    <td height = "90.023743" width="248.197083" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:213.791061px;left:340.575775px">
                                    <nobr>h. Baterai / Aki </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:243.675461px;left:358.309082px">
                                    <nobr>Pemeriksaan Level Air Aki </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:273.585815px;left:358.309082px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="font-family:Times New Roman;">
                                    <span style="position:absolute;top:300.627533px;left:358.309082px">
                                        <nobr>Tegangan : ……………... Volt </nobr>
                                    </span>
                                </span>
                            </p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td height = "78.795410" width="248.083069" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:333.821564px;left:10.919841px">
                                    <nobr>d. DC-DC Converter </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:363.705963px;left:33.630798px">
                                    <nobr>Pemeriksaan Kondisi Alat </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:393.434784px;left:33.630798px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                    <td height = "78.795410" width="248.197083" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:333.821625px;left:341.664612px">
                                    <nobr>i. Sambungan PLN </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:363.705994px;left:358.309082px">
                                    <nobr>Pemeriksaan Kondisi Alat </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:393.434814px;left:358.309082px">
                                    <nobr>Pemeriksaan Sambungan Kabel </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td height = "106.142883" width="248.083069" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:438.922913px;left:10.919841px">
                                    <nobr>e. Setting Tipping Bucket </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:468.807404px;left:34.253174px">
                                    <nobr>Penunjukan Data Setting di Display (LCD) </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:499.158630px;left:41.097614px">
                                    <nobr>Sebelum Kalibrasi Sesudah Kalibrasi </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:514.723511px;left:26.164286px">
                                    <nobr>Simulasi Display Simulasi Display </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                    <td height = "106.142883" width="248.197083" rowspan="1" colspan="1">
                        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
                            <p>
                                <span style="position:absolute;top:438.922913px;left:341.664642px">
                                    <nobr>j. Setting Sensor Water Level </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:468.807404px;left:358.309082px">
                                    <nobr>Penunjukan Data Setting di Display (LCD) </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:499.158630px;left:371.868378px">
                                    <nobr>Sebelum Kalibrasi Sesudah Kalibrasi </nobr>
                                </span>
                            </p>
                            <p>
                                <span style="position:absolute;top:514.723511px;left:362.042419px">
                                    <nobr>Aktual Display Aktual Display </nobr>
                                </span>
                            </p>
                        </span>
                    </td>
                </tr>
            </table>
        </nobr>
    </div>
    <p>
        <span style="font-family:Nimbus Roman;font-size:8.754052px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:834.590271px;left:99.279457px">
                <nobr>BS : Before Setting | AS : After Setting | * : Coret yang tidak perlu | : Centang yang diperiksa </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Times New Roman;font-size:11.672070px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:863.560242px;left:93.364449px">
                <nobr>Keterangan : ……………………………………………………………………………………… </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:902.095215px;left:169.423782px">
                <nobr>Mengetahui, Dibuat oleh </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Nimbus Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:916.881714px;left:145.318771px">
                <nobr>Ka. Tim Kalibrasi Divisi Pelaksana Kalibrasi </nobr>
            </span>
        </span>
    </p>
    <p>
        <span style="font-family:Times New Roman;font-size:9.687818px;font-style:normal;font-weight:normal;color:#000000;">
            <span style="position:absolute;top:988.750000px;left:138.940674px">
                <nobr>…………………………... ……………………….. </nobr>
            </span>
        </span>
    </p>
    <div style="position:absolute;top:832.043152px;left:423.956207px">
        <nobr>
            <img height="14.000000" width="14.000000" src ="bgimg/bg00002.jpg"/>
        </nobr>
    </div>
</body>
<script src="resources/js/vue.min.js"></script>
</html>
