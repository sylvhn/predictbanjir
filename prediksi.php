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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Prediksi Sungai</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Prediksi</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            Nama Sungai <br>
                                            <select name="id_sungai" class="form-control">
                                            <?php
                                                $query="select * from sungai";
                                                $hasil=mysqli_query($koneksi,$query);
                                                while($tampil=mysqli_fetch_array($hasil)){ 
                                            ?>
                                                <option value="<?=$tampil['id_sungai'];?>"><?=$tampil['nama_sungai'];?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="curah" class="form-control" placeholder="Curah Hujan (satuan mm/jam)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="waktu" class="form-control" min="1" max="24" placeholder="Jumlah Jam (maks 24)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="tinggi" class="form-control" placeholder="Tinggi Sungai Normal Sebelum Hujan (satuan mm)">
                                        </div>
                                        
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                        
                                    </form>
                                                                    </div>
                            </div>

                        </div>

                        <?php

                        error_reporting(0); 
                        include "koneksi.php";

                        $id_sungai     = $_POST['id_sungai'];
                        $curah            = $_POST['curah'];
                        $waktu            = $_POST['waktu'];
                        $tinggi            = $_POST['tinggi'];

                        $submit             = $_POST['submit'];

                        if($submit){

                            $query = mysqli_query($koneksi, "SELECT * FROM sungai WHERE id_sungai='$id_sungai'");

                            $r = mysqli_fetch_array($query);

                            $prediksi = $r['a']+($r['b1']*$curah)+($r['b2']*$waktu)+($r['b3']*$tinggi);

                            
                        
                        ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> HASIL PREDIKSI</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            Ketinggian Air: <?=$prediksi?> mm</div>
                                            
                                            <?php 
                                            if($prediksi>$r['kedalaman']){
                                            ?>
                                            <div class="my-2"></div>
                                            <a href="#" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">BERPOTENSI BANJIR</span>
                                            </a>
                                            <?php
                                            }else{
                                            ?>
                                            <div class="my-2"></div>
                                            <a href="#" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">TIDAK BERPOTENSI BANJIR</span>
                                            </a>
                                            <?php
                                            } 
                                            ?>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<?php include('footer.php'); ?>