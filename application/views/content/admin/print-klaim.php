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

    <h3 style="text-align: center; ">BERKAS KLAIM INDIVIDUAL PASIEN</h3>
    
    <table style="border: 0px; width: 80%">
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
        <tr>
            <td>Kode RS</td><td>:</td><td><?php echo $data_rs->kode; ?></td> 
            <td>Kelas RS</td><td>:</td><td><?php echo $data_rs->kelas; ?></td> 
        </tr>
        <tr>
            <td>Nama RS</td><td>:</td><td><?php echo $data_rs->nama; ?></td> 
            <td>Jenis Tarif</td><td>:</td><td><?php echo $data_rs->jenis_tarif; ?></td> 
        </tr>
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
    </table>

    <?php 

    $biday = new DateTime($data->tgl_lahir);
    $today = new DateTime();

    $diff  = $today->diff($biday);

     ?>

    <table style="border: 0px; width: 80%">
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>

        <tr>
            <td>No. Peserta</td><td>:</td><td><?php echo $data->no_peserta; ?></td> 
            <td>No. SEP</td><td>:</td><td><?php echo $data->no_sep; ?></td> 
        </tr>
        <tr>
            <td>No. RM</td><td>:</td><td><?php echo $data->no_rm; ?></td> 
            <td>Tanggal Masuk</td><td>:</td><td><?php echo $data->tgl_masuk; ?></td> 
        </tr>
        <tr>
            <td>No. RM</td><td>:</td><td><?php echo $data->no_rm; ?></td> 
            <td>Tanggal Masuk</td><td>:</td><td><?php echo $data->tgl_masuk; ?></td> 
        </tr>
        <tr>
            <td>Umur Tahun</td><td>:</td><td><?php echo $diff->y; ?> Tahun</td> 
            <td>Tanggal Keluar</td><td>:</td><td><?php echo $data->tgl_keluar; ?></td> 
        </tr>
        <tr>
            <td>Jenis Perawatan</td><td>:</td><td><?php echo $data->jenis_rawat; ?></td> 
        </tr>
        <tr>
            <td>Tanggal Lahir</td><td>:</td><td><?php echo $data->tgl_lahir; ?></td> 
            <td>Cara Pulang</td><td>:</td><td><?php echo $data->cara_pulang; ?></td> 
        </tr>
        <tr>
            <td>Jenis Kelamin</td><td>:</td><td><?php if($data->jk == 'l'){echo "Laki-laki";}else{echo "Perempuan";}; ?></td> 
            <td>LOS</td><td>:</td><td><?php echo $data->lama_dirawat; ?></td> 
        </tr>
        <tr>
            <td>Kelas Keperawatan</td><td>:</td><td><?php echo $data->kelas_rawat; ?></td> 
            <td>Berat Lahir</td><td>:</td><td><?php echo $data->berat_lahir; ?> Gram</td> 
        </tr>

        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
    </table>

    <?php 
    $d_primer = $this->db->where('id_data_diagnosa', $data->id_data_diagnosa_primer)->get_where('data_diagnosa')->row();
    $d_sekunder1 = $this->db->where('id_data_diagnosa', $data->id_data_diagnosa_sekunder1)->get_where('data_diagnosa')->row();
     ?>

    <table style="border: 0px; width: 80%">
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>

        <tr>
            <th style="border: 0px; text-align: left">Diagnosa</th><th style="border: 0px; text-align: left">ICD 10</th><th style="border: 0px; text-align: left">Deskripsi</th> 
        </tr>

        <tr>
            <td>Diagnosa Primer</td><td><?php if($data->id_data_diagnosa_primer != 0){echo $d_primer->kode;} ?></td><td><?php if($data->id_data_diagnosa_primer != 0){echo $d_primer->nama;} ?></td>
        </tr>
        <tr>
            <td>Diagnosa Sekunder 1</td><td><?php if($data->id_data_diagnosa_sekunder1 != 0){echo $d_sekunder1->kode;} ?></td><td><?php if($data->id_data_diagnosa_sekunder1 != 0){echo $d_sekunder1->nama;} ?></td>
        </tr>


        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
    </table>

    <?php 
    $t_primer = $this->db->where('id_data_tindakan', $data->id_data_tindakan_primer)->get_where('data_tindakan')->row();
    $t_sekunder1 = $this->db->where('id_data_tindakan', $data->id_data_tindakan_sekunder1)->get_where('data_tindakan')->row();
     ?>

    <table style="border: 0px; width: 80%">
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>

        <tr>
            <th style="border: 0px; text-align: left">Prosedur</th><th style="border: 0px; text-align: left">ICD 9CM</th><th style="border: 0px; text-align: left">Deskripsi</th> 
        </tr>

        <tr>
            <td>Prosedur Primer</td><td><?php if($data->id_data_tindakan_primer != 0){echo $t_primer->kode;} ?></td><td><?php if($data->id_data_tindakan_primer != 0){echo $t_primer->nama;} ?></td>
        </tr>
        <tr>
            <td>Prosedur Sekunder 1</td><td><?php if($data->id_data_tindakan_sekunder1 != 0){echo $t_sekunder1->kode;} ?></td><td><?php if($data->id_data_tindakan_sekunder1 != 0){echo $t_sekunder1->nama;} ?></td>
        </tr>


        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
    </table>

    <table style="border: 0px; width: 80%">
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>

        <tr>
            <td>ADL Sub Acute </td><td>:</td><td><?php echo $data->adl_score_sub_acute; ?></td>
            <td>ADL Chronic </td><td>:</td><td><?php echo $data->adl_score_chronic; ?></td>
        </tr>
        

        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
    </table>
    
    <script type="text/javascript">
        print();
    </script>

</body>

</html>