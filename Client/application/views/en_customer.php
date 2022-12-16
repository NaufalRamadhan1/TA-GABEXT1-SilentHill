<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Customer</title>

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>" />
</head>
<body>
    <!-- buat menu/button -->
    <nav class="area-menu">
        <button id="btn_lihat" class="btn-primary">Lihat</button>
        <button id="btn_refresh" class="btn-secondary" onclick="setRefresh()">Refresh</button>
    </nav>

    <!-- buat area untuk entry data -->
    <main class="area-grid">
        <section class="item-label1">
            <label id="lbl_kodepesanan" for="txt_kodepesanan">
                Kode Pesanan :
            </label>
        </section>
        <section class="item-input1">
            <input type="text" id="txt_kodepesanan" class="text-input" maxLength="9">
        </section>
        <section class="item-error1">
            <p id="err_kodepesanan" class="error-info">
                Kode Pesanan Belum Diisi !
            </p>
        </section>

        <section class="item-label2">
            <label id="lbl_nama" for="txt_nama">
                Nama :
            </label>
        </section>
        <section class="item-input2">
            <input type="text" id="txt_nama" class="text-input" maxLength="50">
        </section>
        <section class="item-error2">
            <p id="err_nama" class="error-info">
                Nama Belum Diisi !
            </p>
        </section>

        <section class="item-label3">
            <label id="lbl_telepon" for="txt_telepon">
                Telepon :
            </label>
        </section>
        <section class="item-input3">
            <input type="text" id="txt_telepon" class="text-input" maxLength="15">
        </section>
        <section class="item-error3">
            <p id="err_telepon" class="error-info">
                Telepon Belum Diisi !
            </p>
        </section>
        
        <section class="item-label4">
            <label id="lbl_konsumen" for="cbo_konsumen">
                Konsumen :
            </label>
        </section>
        <section class="item-input4">
            <select id="cbo_konsumen" class="select-input">
                <option value="-">Pilih Konsumen</option>
                <option value="Agen">Agen</option>
                <option value="Distributor">Distributor</option>
                <option value="Pengecer">Pengecer</option>
            </select>
        </section>
        <section class="item-error4">
            <p id="err_konsumen" class="error-info">
                Konsumen Belum Diisi !
            </p>
        </section>
    </main>
    <!-- buat menu/button save -->
    <nav class="area-menu">
        <button id="btn_simpan" class="btn-primary">Simpan</button>
    </nav>
    
     <!-- import file script.js -->
     <script src="<?= base_url("ext/script.js") ?>"></script>

    <script>
        // inisialisasi object
        let btn_lihat = document.getElementById("btn_lihat");
        let btn_simpan = document.getElementById("btn_simpan");

        // buat event untuk "btn_lihat"
        btn_lihat.addEventListener('click', function(){
            // alihkan ke halaman utama
            location.href="<?php echo base_url();?>"
        })

        // buat fungsi untuk refresh
        function setRefresh()
        {
            // mereload halaman
            location.href="<?php echo site_url("Customer/addCustomer");?>";
        }

        // buat event untuk "btn_simpan"
        btn_simpan.addEventListener('click', function(){
            // inisialisasi object
            let lbl_kodepesanan = document.getElementById("lbl_kodepesanan");
            let txt_kodepesanan = document.getElementById("txt_kodepesanan");
            let err_kodepesanan = document.getElementById("err_kodepesanan");

            let lbl_nama = document.getElementById("lbl_nama");
            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");

            let lbl_telepon = document.getElementById("lbl_telepon");
            let txt_telepon = document.getElementById("txt_telepon");
            let err_telepon = document.getElementById("err_telepon");

            let lbl_konsumen = document.getElementById("lbl_konsumen");
            let cbo_konsumen = document.getElementById("cbo_konsumen");
            let err_konsumen = document.getElementById("err_konsumen");

            // jika kodepesanan tidak diisi
            if(txt_kodepesanan.value === "")
            {
                err_kodepesanan.style.display = "unset";
                lbl_kodepesanan.style.color = "#f00";
                txt_kodepesanan.style.borderColor = "#f00";
                err_kodepesanan.innerHTML = "NPM Harus Diisi !";
            }
            // jika kodepesanan diisi
            else
            {
                err_kodepesanan.style.display = "none";
                lbl_kodepesanan.style.color = "unset";
                txt_kodepesanan.style.borderColor = "unset";
                err_kodepesanan.innerHTML = "";
            }

            
            // jika nama tidak diisi
            const nama = (txt_nama.value === "") ?
            [
                err_nama.style.display = "unset",
                lbl_nama.style.color = "#f00",
                txt_nama.style.borderColor = "#f00",
                err_nama.innerHTML = "Nama Harus Diisi !",
            ]
            :
            // jika nama diisi
            [
                err_nama.style.display = "none",
                lbl_nama.style.color = "unset",
                txt_nama.style.borderColor = "unset",
                err_nama.innerHTML = "",
            ]


            // jika telepon tidak diisi
            const telepon = (txt_telepon.value === "") ?
            [               
                err_telepon.style.display = "unset",
                lbl_telepon.style.color = "#f00",
                txt_telepon.style.borderColor = "#f00",
                err_telepon.innerHTML = "Telepon Harus Diisi !",
            ]
            :
            // jika telepon diisi
            [            
                err_telepon.style.display = "none",
                lbl_telepon.style.color = "unset",
                txt_telepon.style.borderColor = "unset",
                err_telepon.innerHTML = "",
            ]

            // jika konsumen dipilih
            const konsumen = (cbo_konsumen.value === "-") ?
            [
                err_konsumen.style.display = "unset",
                lbl_konsumen.style.color = "#f00",
                cbo_konsumen.style.borderColor = "#f00",
                err_konsumen.innerHTML = "Konsumen Harus Dipilih !",
                cbo_konsumen.style.color = "#f00",
            ]
            :
            // jika konsumen tidak dipilih
            [
                err_konsumen.style.display = "none",
                lbl_konsumen.style.color = "unset",
                cbo_konsumen.style.borderColor = "unset",
                err_konsumen.innerHTML = "",
                cbo_konsumen.style.color = "unset",
            ]

            // jika semua data sudah diisi
            if(err_kodepesanan.innerHTML === "" && nama[3] === "" && telepon[3] === "" && konsumen[3] === "" )
            {
                // panggil function setSave
                setSave(txt_kodepesanan.value,txt_nama.value,txt_telepon.value,cbo_konsumen.value)

            }
        })

        const setSave = (kodepesanan,nama,telepon,konsumen) => {
            // buat variabel untuk form
            let form = new FormData();

            // isi/tambah nilai untuk form
            form.append("kodepesanannya",kodepesanan);
            form.append("namanya",nama);
            form.append("teleponnya",telepon);
            form.append("konsumennya",konsumen);

            // proses kirim data ke controller
            fetch('<?php echo site_url("Customer/setSave"); ?>', {
                method: "POST",
                body : form
            })
            .then((response) => response.json())
            .then((result) => alert(result.statusnya))
            .catch((error) => alert("Data Gagal Dikirim !!"))
        }
    </script>
</body>
</html>