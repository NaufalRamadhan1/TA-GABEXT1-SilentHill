<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Customer</title>

    <!-- import fontawesome (CSS) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>" />
</head>
<body>
    <!-- buat menu/button -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Tambah</button>
        <button id="btn_refresh" class="btn-secondary" onclick="setRefresh()">Refresh</button>
        <ul class="nav__wrapper">
            <li class="nav__item"><a href="<?php echo base_url('Customer/sablon') ?>">Hasil Sablon</a></li>
          </ul>
    </nav>

    <!-- buat table data customer-->
    <table>
        <!-- buat judul tabel -->
        <thead>
            <tr>
                <th style="width : 10%;">Aksi</th>
                <th style="width : 5%;">No.</th>
                <th style="width : 10%;">Kode Pesanan</th>
                <th style="width : 55%;">Nama</th>
                <th style="width : 15%;">Telepon</th>
                <th style="width : 5%;">Konsumen</th>
            </tr>
        </thead>
        <!-- buat body tabel -->
        <tbody>

            <!-- proses looping data -->
            <?php
                // set nilai awal no
                $no = 1;

                // perulangan
                foreach($tampil->Customer as $result)
                // echo $result."<br>";
                {
            ?>

            <tr>
                <td style="text-align : center">
                    <nav class="area-aksi">
                        <!-- tombol edit -->
                        <button class="btn-edit" id="btn_edit" title="Edit Data" onclick="return gotoUpdate('<?php echo $result->kodepesanan_ctr;?>')">
                        <i class="fa-solid fa-pen"></i>
                        </button>
                        <!-- tombol delete -->
                        <button class="btn-delete" id="btn_delete" title="Delete Data" onclick="return gotoDelete('<?php echo $result->kodepesanan_ctr;?>','<?php echo $result->nama_ctr;?>')">
                        <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </nav>
                </td>
                <td style="text-align : center"><?php echo $no; ?></td>
                <td style="text-align : center"><?php echo $result->kodepesanan_ctr; ?></td>
                <td style="text-align : justify"><?php echo $result->nama_ctr; ?></td>
                <td style="text-align : center"><?php echo $result->telepon_ctr; ?></td>
                <td style="text-align : center"><?php echo $result->konsumen_ctr; ?></td>
            </tr>
            <?php
                    $no++;
                }
            ?>

        </tbody>
    </table>
    <!-- import fontawesome (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        let btn_tambah = document.getElementById("btn_tambah");

        btn_tambah.addEventListener('click', function(){
            // alert("Tambah Data")
            // manipulasi css (property & value)
            // btn_tambah.style.background = "#FFFFFF";
            // this.style.borderRadius = "20px";
            // this.style.fontSize = "30px";

            //manipulasi css (className)
            // this.className = "btn-secondary";

            // manipulasi css HTML
            // this.innerHTML = "<strong>Tambah</strong>";

            // this.innerText = "Tambah Data";
            
            // alihkan ke halaman.Controller
            location.href="<?php echo site_url("Customer/addCustomer");?>";
        })

        function setRefresh()
        {
            location.href="<?php echo base_url();?>"
    
        }

        // buat fungsi ke halaman edit
        function gotoUpdate(kodepesanan)
        {
            // encode js base64
            // let npmx = btoa(kodepesanan)
            // decoce js base64
            // let npmx = btoa(kodepesanan)

            location.href="<?php echo site_url("Customer/updateCustomer");?>" + '/' + kodepesanan;
        }

        // buat fungsi untuk hapus data
        function gotoDelete(kodepesanan,nama)
        {
            if(confirm("Data Customer "+kodepesanan+" "+nama+" Ingin Dihapus ?") === true)
            {
                // alert("Data Customer Berhasil Dihapus")
                setDelete(kodepesanan,nama);
            }
            // else
            // {
            //     alert("Kok ga Jadi ?");
            // }
        }

        function setDelete(kodepesanan,nama)
        {
            // buat variabel
            const data = {
                "kodepesanannya" : kodepesanan
                // "namanya" : nama,
                // "teleponnya" : telepon,
                // "konsumennya" : konsumen
            }
            // kirim data async dengan fetch
            fetch('<?php echo site_url("Customer/setDelete"); ?>',
            {
                method : "POST",
                headers : {
                    "Content-Type" : "application/json"
                },
                body : JSON.stringify(data)
            })
            .then((response)=>
            {
                return response.json()
            })
            .then(function(data)
            {
                // // jika nilai "err" = 0
                // if(data.err === 0)
                //     alert("Data Berhasil Dihapus")
                // // jika nilai "err" = 1
                // else
                //     alert("Data Gagal Dihapus !")
                alert(data.statusnya);

                // panggil fungsi setRefresh()
                setRefresh();
            })
        }
    </script>
</body>
</html>