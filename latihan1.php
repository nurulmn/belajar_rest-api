<?php

$mahasiswa = [
    [
        "nama" => "Nurul Masya Nabila",
        "nim" => "2217020016",
        "email" => "nmasyanabila@gmail.com"
    ],
    [
        "nama" => "Nurul Masya Nabila",
        "nim" => "2217020016",
        "email" => "nmasyanabila@gmail.com"
    ]
];

header('Content-Type: application/json');
echo json_encode($mahasiswa);

?>
