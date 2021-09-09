<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>


    <?php

        $pathFile = './database/json/generate.json';
        $cur_data = file_get_contents($pathFile);
        $data = json_decode($cur_data, true);

        // foreach ($data as $key => $value) {
        //     echo $value['jumlah_data'];
        // }

        $kode = '0202';

        //$data adalah array datanya, $key adalah berupa index dari array, $value adalah isi dari array data
        foreach ($data as $key => $value) {
            if ($value['kode_rayon'] === $kode) {
                //$data[1]['jumlah_data']
                ++$data[$key]['jumlah_data'];
            }
        }
        // $array_data = [
        //     'kode_rayon' => '0202',
        //     'nama_rayon' => 'Rayon II',
        //     'jumlah_data' => 0,
        // ];

        // foreach ($data as $key => $value) {
        //     if ($value['kode_rayon'] !== $array_data['kode_rayon']) {
        //         $data[] = $array_data;
        //         $putData = json_encode($data, JSON_PRETTY_PRINT);
        //         if (file_put_contents($pathFile, $putData)) {
        //             echo 'sukses';
        //         }
        //     }
        // }

        $putData = json_encode($data, JSON_PRETTY_PRINT);
        if (file_put_contents($pathFile, $putData)) {
            echo 'sukses';
        }

    ?>

</body>

</html>