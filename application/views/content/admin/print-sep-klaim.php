<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;
    font-size: 1em;
}

th, th {
    text-align: center;
    padding: 8px;
    border: 1px solid black;
    font-size: 1em;
}

th {
    border: 1px solid black;
    font-size: 1em;
}

tr.isi td {
	border: 1px solid black;
    text-align: center;
}

tr.isi td.left {
    text-align: left;
}

.text-center {
    text-align: center;
}
</style>

</head>
<body>
    <center>

    <table style="border: 0px; width: 80%">
        <tr class="isi" style="height: 50px;">
            <td>Logo Askes</td>
            <td style="width: 50%">SURAT ELEGIBILITAS PESERTA ASURANSI <?php echo strtoupper($data_rs->nama); ?></td>
            <td style="text-align: left; padding-left: 10px">PRB.</td>
        </tr>
    </table>

    <table style="border: 0px; width: 80%; margin-top: 30px; margin-bottom: 30px">
        <tr>
            <td>No. SEP</td><td>:</td><td><?php echo $data->no_sep ?></td>
            <td>COB</td><td>:</td><td>( <?php echo $data->cob ?> )</td>
        </tr>
        <tr>
            <td>No. Kartu</td><td>:</td><td><?php echo $data->no_peserta ?></td>
            <td>Jenis Rawat</td><td>:</td><td><?php echo $data->jenis_rawat ?></td>
        </tr>
        <tr>
            <td>No. RM</td><td>:</td><td><?php echo $data->no_rm ?></td>
            <td>Kelas Rawat</td><td>:</td><td><?php echo $data->kelas_rawat ?></td>
        </tr>
        <tr>
            <td>Tgl. Lahir</td><td>:</td><td><?php echo date('d/m/Y', strtotime($data->tgl_lahir)) ?></td>
            <td>Penjamin</td><td>:</td><td><?php echo $data->jaminan ?></td>
        </tr>
        <tr>
            <td>No. Telepon</td><td>:</td><td><?php echo $data->no_telp ?></td>
        </tr>
        <tr>
            <td>Diagnosa Awal</td><td>:</td><td><?php echo $data->diagnosa_primer ?></td>
        </tr>
        <tr>
            <td>Catatan</td><td>:</td><td></td>
        </tr>

    </table>

    <table style="border: 0px; width: 80%">
        <tr class="isi" style="height: 50px">
            <td style="text-align: left; padding: 20px">
                *Saya menyetujui penjamin menggunakan informasi medis pasien jika diperlukan.<br/>
                SEP bukan sebagai bukti penjaminan peserta.
            </td>
            <td>
                Pasien/Keluarga Pasien<br/><br/>
                ______________
            </td>
        </tr>
    </table>
    
    
    <script type="text/javascript">
        print();
    </script>

</body>

</html>