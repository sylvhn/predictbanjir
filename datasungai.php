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
                    <?php
                        include('koneksi.php');
                        $id_sungai = $_GET['id'];
                        $sungai = $_GET['nama'];
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Sungai <?=$sungai;?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Data Sungai</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="id_sungai" value="<?=$id_sungai;?>">
                                            <input type="number" name="curah" class="form-control form-control-user" placeholder="Curah Hujan (satuan mm/jam)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="waktu" class="form-control form-control-user" min="1" max="24" placeholder="Jumlah Jam (maks 24)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="tinggi1" class="form-control form-control-user" placeholder="Tinggi Sungai Normal Sebelum Hujan (satuan mm)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="tinggi2" class="form-control form-control-user" placeholder="Tinggi Sungai Setelah Hujan (satuan mm)">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Data Sungai</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Curah Hujan</th>
                                            <th>Waktu</th>
                                            <th>Tinggi Sungai Normal</th>
                                            <th>Tinggi Sungai Setelah Hujan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Curah Hujan</th>
                                            <th>Waktu</th>
                                            <th>Tinggi Sungai Normal</th>
                                            <th>Tinggi Sungai Setelah Hujan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        include "koneksi.php";
                                        $query="select * from data_sungai where id_sungai='$id_sungai'";
                                        $hasil=mysqli_query($koneksi,$query);
                                        $no = 0;
                                        while($tampil=mysqli_fetch_array($hasil)){ 
                                    ?>
                                        <tr>
                                            <td><?=$tampil['x1'];?> mm/jam</td>
                                            <td><?=$tampil['x2'];?> jam</td>
                                            <td><?=$tampil['x3'];?> mm</td>
                                            <td><?=$tampil['y'];?> mm</td>
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

                $x1            = $_POST['curah'];
                $x2          = $_POST['waktu'];
                $x3       = $_POST['tinggi1'];
                $y       = $_POST['tinggi2'];
                $id_sungai      = $_POST['id_sungai'];

                $x1y = $x1*$y;
                $x2y = $x2*$y;
                $x3y = $x3*$y;
                $x1x1 = $x1*$x1;
                $x1x2 = $x1*$x2;
                $x1x3 = $x1*$x3;
                $x2x2 = $x2*$x2;
                $x2x3 = $x2*$x3;
                $x3x3 = $x3*$x3;

                $submit             = $_POST['submit'];

                if($submit){

                    $query      = " INSERT INTO data_sungai VALUES('','$id_sungai','$y','$x1','$x2','$x3','$x1y','$x2y','$x3y','$x1x1','$x1x2','$x1x3','$x2x2','$x2x3','$x3x3')";

                    $hasil      = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

                    if($hasil){
                        
                        $query2 = mysqli_query($koneksi, "SELECT * FROM data_sungai WHERE id_sungai='$id_sungai'");
                        $query2 = mysqli_query($koneksi, 
                                                "SELECT 
                                                SUM(y) as y, SUM(x1) as x1, SUM(x2) as x2, SUM(x3) as x3,
                                                SUM(x1y) as x1y, SUM(x2y) as x2y, SUM(x3y) as x3y,
                                                SUM(x1x1) as x1x1, SUM(x1x2) as x1x2, SUM(x1x3) as x1x3,
                                                SUM(x2x2) as x2x2, SUM(x2x3) as x2x3, SUM(x3x3) as x3x3
                                                FROM data_sungai WHERE id_sungai='$id_sungai'");
                        $r = mysqli_fetch_array($query2);
                        $n = mysqli_num_rows($query2);

                        include('cek.php');
                        

                        $detA = determinan  ($n, $r['x1'], $r['x2'], $r['x3'],
                                            $r['x1'],$r['x1x1'],$r['x1x2'],$r['x1x3'],
                                            $r['x2'],$r['x2x1'],$r['x2x2'],$r['x2x3'],
                                            $r['x3'],$r['x3x1'],$r['x3x2'],$r['x3x3'],
                                            );
                        
                        $detA0 = determinan  ($r['y'], $r['x1'], $r['x2'], $r['x3'],
                                            $r['x1y'],$r['x1x1'],$r['x1x2'],$r['x1x3'],
                                            $r['x2y'],$r['x2x1'],$r['x2x2'],$r['x2x3'],
                                            $r['x3y'],$r['x3x1'],$r['x3x2'],$r['x3x3'],
                                            );

                        $detA1 = determinan  ($n, $r['y'], $r['x2'], $r['x3'],
                                            $r['x1'],$r['x1y'],$r['x1x2'],$r['x1x3'],
                                            $r['x2'],$r['x2y'],$r['x2x2'],$r['x2x3'],
                                            $r['x3'],$r['x3y'],$r['x3x2'],$r['x3x3'],
                                            );

                        $detA2 = determinan  ($n, $r['x1'], $r['y'], $r['x3'],
                                            $r['x1'],$r['x1x1'],$r['x1y'],$r['x1x3'],
                                            $r['x2'],$r['x2x1'],$r['x2y'],$r['x2x3'],
                                            $r['x3'],$r['x3x1'],$r['x3y'],$r['x3x3'],
                                            );

                        $detA3 = determinan  ($n, $r['x1'], $r['x2'], $r['y'],
                                            $r['x1'],$r['x1x1'],$r['x1x2'],$r['x1y'],
                                            $r['x2'],$r['x2x1'],$r['x2x2'],$r['x2y'],
                                            $r['x3'],$r['x3x1'],$r['x3x2'],$r['x3y'],
                                            );

                        $a = $detA0/$detA;
                        $b1 = $detA1/$detA;
                        $b2 = $detA2/$detA;
                        $b3 = $detA3/$detA;

                        $up = mysqli_query($koneksi,"UPDATE sungai SET a='$a', b1='$b1', b2='$b2', b3='$b3' WHERE id_sungai='$id_sungai'")or die (mysqli_error($koneksi));


                        echo "<script>alert('Berhasil Menambah');window.location.replace('datasungai.php?id=".$id_sungai."&&nama=".$sungai."');</script>";

                    }else{
                        echo "<script>alert('Gagal Menambah');</script>";
                    }
                }

            ?>

<?php include('footer.php'); ?>