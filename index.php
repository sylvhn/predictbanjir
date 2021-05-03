<?php include('header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"></nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Sungai</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Sungai</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Sungai">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lokasi" class="form-control form-control-user" placeholder="Lokasi Sungai">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="kedalaman" class="form-control form-control-user" placeholder="Kedalaman Sungai (satuan milimeter)">
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                        
                                    </form>
                                </div>
                            </div>

                        </div>

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Sungai</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Sungai</th>
                                            <th>Lokasi Sungai</th>
                                            <th>Kedalaman</th>
                                            <th>Data Sungai</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Sungai</th>
                                            <th>Lokasi Sungai</th>
                                            <th>Kedalaman</th>
                                            <th>Data Sungai</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        include "koneksi.php";
                                        $query="select * from sungai";
                                        $hasil=mysqli_query($koneksi,$query);
                                        $no = 0;
                                        while($tampil=mysqli_fetch_array($hasil)){ 
                                    ?>
                                        <tr>
                                            <td><?=$tampil['nama_sungai'];?></td>
                                            <td><?=$tampil['lokasi'];?></td>
                                            <td><?=$tampil['kedalaman'];?></td>
                                            <td><a href="datasungai.php?id=<?=$tampil['id_sungai'];?>&&nama=<?=$tampil['nama_sungai'];?>">Data Sungai</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php

                error_reporting(0); 
                include "koneksi.php";

                $nama            = $_POST['nama'];
                $lokasi          = $_POST['lokasi'];
                $kedalaman       = $_POST['kedalaman'];
                $submit             = $_POST['submit'];

                if($submit){

                    $query      = " INSERT INTO sungai(nama_sungai,lokasi,kedalaman) VALUES('$nama','$lokasi','$kedalaman')";

                    $hasil      = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

                    if($hasil){
                        echo "<script>alert('Berhasil Menambah');window.location.replace('index.php');</script>";
                    }else{
                        echo "<script>alert('Gagal Menambah');</script>";
                    }
                }

            ?>

<?php include('footer.php'); ?>