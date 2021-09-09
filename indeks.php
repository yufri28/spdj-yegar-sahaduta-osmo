<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input data</title>
    <!-- <link rel="stylesheet" href="Style.css"> -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/jquery/jquery.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <style>
    .btn-simpan {
        color: white;
        border-radius: 0.3em;
        padding: 10px;
        border: none;
        background-color: #2876b6;
    }

    .btn-simpan:hover {
        color: rgb(204, 204, 199);
        background: linear-gradient(rgba(0, 0, 0, 0.5), #2876b6);
    }

    .btn-Batal {
        color: white;
        border-radius: 0.3em;
        padding: 10px;
        border: none;
    }

    .btn-Batal:hover {
        color: rgb(204, 204, 199);
    }

    .judul-input {
        color: #2876b6;
    }

    #select-option {
        font-style: italic;
    }

    #celendar4 {
        border: 1px solid rgb(80, 76, 76);
        background-color: #c7cacc;
        max-width: fit-content;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row bg-light">
            <div class="col">
                <form action="konfirmasi-input.html">
                    <div class="container-form-input">
                        <div class="kiri col-md-12">
                            <p class="font-weight-bold mt-5 judul-input">DATA DIRI</p>
                            <hr>
                            <div class="form-row">
                                <div class="mb-3 col-sm-6">
                                    <label for="validationServer01">Nomor Induk Kartu Jemaat</label>
                                    <input type="text" disabled placeholder="Nomor Induk Kartu Jemaat"
                                        class="form-control form-control-sm" id="validationServer01" required>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Tidak dapat mengubah Nomor
                                            Induk Kartu Jemaat.</i></p>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="validationServer01">Nomor Induk Jemaat</label>
                                    <input type="text" placeholder="Nomor Induk Jemaat"
                                        class="form-control form-control-sm" disabled id="validationServer01" required>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Tidak dapat mengubah nomor
                                            induk jemaat.</i></p>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="mb-3 col-sm-7">
                                    <label for="validationServer01">Nama Lengkap</label>
                                    <input type="text" placeholder="Nama lengkap" class="form-control form-control-sm"
                                        id="validationServer01" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="validationServer01">Tempat Lahir</label>
                                    <input type="text" placeholder="Tempat Lahir" class="form-control form-control-sm"
                                        id="validationServer01" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="validationServer01">Tanggal Lahir <small><i>(Harap Perhatikan Format
                                                Tanggal)</i></small></label>
                                    <div class="input-group" id="datetimepicker">
                                        <input type="date" class="form-control form-control-sm" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-celendar"></span>
                                        </span>
                                    </div>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Format tanggal diawali
                                            dengan bulan/tanggal/tahun.</i></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-form-label col-md-12">Jenis Kelamin</label>
                                <div class="form-group ml-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            value="Laki - laki" checked>
                                        <label class="form-check-label" for="gridRadios1">Laki - laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                            value="Perempuan">
                                        <label class="form-check-label" for="gridRadios2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputState" class="col-form-label">Pendidikan Terakhir</label>
                                    <select id="inputState" class="form-select form-select-sm" required>
                                        <option value="" id="select-option"> -- Pilih --</option>
                                        <option value="Tidak sekolah">Tidak sekolah</option>
                                        <option value="TK">TK</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Strata 1">Strata 1</option>
                                        <option value="Strata 2">Strata 2</option>
                                        <option value="Strata 3">Strata 3</option>
                                    </select>
                                </div>
                                <p style="font-size: smaller;" class="col-sm-8 mt-lg-n3 text-secondary"><i>Pendidikan
                                        terakhir berdasarkan ijazah terakhir yang didapat.</i></p>
                            </div>
                            <p class="mt-4 font-weight-bold judul-input">BAPTISAN</p>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputState" class="col-form-label">Status Baptis</label>
                                    <select id="inputState-Baptis" required onchange="baptis()"
                                        class="form-select form-select-sm">
                                        <option value="" id="select-option">-- Pilih --</option>
                                        <option value="Belum Baptis">Belum Baptis</option>
                                        <option value="Baptis">Sudah Baptis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="validationServer01">Tempat baptis</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input placeholder="Tempat baptis" id="input-TempatBaptis" type="text"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="validationServer01">Tanggal baptis <small><i>(Harap Perhatikan Format
                                                Tanggal)</i></small></label>
                                    <div class="input-group" id="datetimepicker">
                                        <input type="date" id="input-TanggalBaptis"
                                            class="form-control form-control-sm">
                                    </div>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Format tanggal diawali
                                            dengan bulan/tanggal/tahun.</i></p>
                                </div>
                            </div>
                            <p class="mt-4 font-weight-bold judul-input">SIDI</p>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputState" class="col-form-label">Status Sidi</label>
                                    <select id="inputState-Sidi" required onchange="sidi()"
                                        class="form-select form-select-sm">
                                        <option value="" id="select-option">-- Pilih --</option>
                                        <option value="Belum sidi">Belum sidi</option>
                                        <option value="Sidi">Sidi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="validationServer01">Tempat sidi</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input placeholder="Tempat sidi" id="input-TempatSidi" type="text"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="validationServer01">Tanggal sidi <small><i>(Harap Perhatikan Format
                                                Tanggal)</i></small></label>
                                    <div class="input-group" id="datetimepicker">
                                        <input type="date" id="input-TanggalSidi"
                                            class="glyphicon form-control form-control-sm">
                                    </div>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Format tanggal diawali
                                            dengan bulan/tanggal/tahun.</i></p>
                                </div>
                            </div>
                            <p class="mt-4 font-weight-bold judul-input">PERKAWINAN</p>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputState" class="col-form-label">Status Perkawinan</label>
                                    <select id="inputState-nikah" required onchange="nikah()"
                                        class="form-control form-control-sm">
                                        <option value="" id="select-option">-- Pilih --</option>
                                        <option value="Belum Nikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="validationServer01">Tempat nikah</label>
                                    <div class="input-group" id="tempat-nikah">
                                        <input placeholder="Tempat nikah" type="text" id="input-nikah"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="validationServer01">Tanggal nikah <small><i>(Harap Perhatikan Format
                                                Tanggal)</i></small></label>
                                    <div class="input-group" id="datetimepicker">
                                        <input type="date" id="datetimepicker-nikah" placeholder="Tanggal nikah"
                                            class="form-control form-control-sm">
                                    </div>
                                    <p style="font-size: smaller;" class="text-secondary"><i>Format tanggal diawali
                                            dengan bulan/tanggal/tahun.</i></p>
                                </div>
                            </div>
                            <div class="form-row mb-3 ml-1">
                                <button class="btn-simpan mb-3" type="submit">Simpan</button>
                                <button class="btn-Batal btn-danger mb-3 ml-1" type="button">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
        function baptis() {
            // baptis
            const stBaptis = document.getElementById("inputState-Baptis");
            const inputBaptis = document.getElementById("input-TempatBaptis");
            var dateTimePickerBaptis = document.getElementById("input-TanggalBaptis");

            if (stBaptis.value === "Belum Baptis" || stBaptis === "Pilih") {
                dateTimePickerBaptis.value = "00/00/0000";
                dateTimePickerBaptis.disabled = true;
                inputBaptis.value = "-- Kosong --";
                inputBaptis.disabled = true;
            } else if (stBaptis.value === "Baptis") {
                dateTimePickerBaptis.value = "";
                dateTimePickerBaptis.disabled = false;
                dateTimePickerBaptis.required = true;
                inputBaptis.value = "";
                inputBaptis.required = true;
                inputBaptis.disabled = false;
            } else {
                dateTimePickerBaptis.value = "00/00/0000";
                dateTimePickerBaptis.disabled = true;
                inputBaptis.value = "-- Kosong --";
                inputBaptis.disabled = true;
            }

        }

        function sidi() {
            // sidi
            const stSidi = document.getElementById("inputState-Sidi");
            const inputSidi = document.getElementById("input-TempatSidi");
            var dateTimePickerSidi = document.getElementById("input-TanggalSidi");

            if (stSidi.value === "Belum Sidi" || stSidi === "Pilih") {
                dateTimePickerSidi.value = "00/00/0000";
                dateTimePickerSidi.disabled = true;
                inputSidi.value = "-- Kosong --";
                inputSidi.disabled = true;
            } else if (stSidi.value === "Sidi") {
                dateTimePickerSidi.value = "";
                dateTimePickerSidi.disabled = false;
                dateTimePickerSidi.required = true;
                inputSidi.value = "";
                inputSidi.required = true;
                inputSidi.disabled = false;
            } else {
                dateTimePickerSidi.value = "00/00/0000";
                dateTimePickerSidi.disabled = true;
                inputSidi.value = "-- Kosong --";
                inputSidi.disabled = true;
            }
        }

        function nikah() {

            // nikah
            const stNikah = document.getElementById("inputState-nikah");
            const inputNikah = document.getElementById("input-nikah");
            var dateTimePickerNikah = document.getElementById("datetimepicker-nikah");

            if (stNikah.value === "Belum Nikah" || stNikah === "Pilih") {
                dateTimePickerNikah.value = "00/00/0000";
                dateTimePickerNikah.disabled = true;
                inputNikah.value = "-- Kosong --";
                inputNikah.disabled = true;
            } else if (stNikah.value === "Menikah") {
                dateTimePickerNikah.value = "";
                dateTimePickerNikah.disabled = false;
                dateTimePickerNikah.required = true;
                inputNikah.value = "";
                inputNikah.required = true;
                inputNikah.disabled = false;
            } else {
                dateTimePickerNikah.value = "00/00/0000";
                dateTimePickerNikah.disabled = true;
                inputNikah.value = "-- Kosong --";
                inputNikah.disabled = true;
            }
        }
        </script>
</body>

</html>