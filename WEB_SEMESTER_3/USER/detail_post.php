<?php 

    require_once "assets/includes/header.php";
    
    if(isset($_GET['posting']))
    {

        $id_posting = $_GET['posting'];
        
        //Membuat query
        $query = "select * from posting inner join user on posting.ID_USER = user.ID_USER where posting.ID_POSTING = $id_posting";

        $result = mysqli_query($conn,$query);

    }else
    {
        header("Location: blog.php?accessdenied=true");
    }

    //Mengubah tanggal format 2019-12-30 menjadi 2019 Desember 30
    function convertTanggal($value)
    {
        $rawFirst = explode('-',$value);

        switch($rawFirst[1])
        {
            case 1 :
                return $rawFirst[2]." Januari ".$rawFirst[0];
            break;

            case 2 :
                return $rawFirst[2]." Februari ".$rawFirst[0];
            break;

            case 3 :
                return $rawFirst[2]." Maret ".$rawFirst[0];
            break;

            case 4 :
                return $rawFirst[2]." April ".$rawFirst[0];
            break;

            case 5 :
                return $rawFirst[2]." Mei ".$rawFirst[0];
            break;

            case 6 :
                return $rawFirst[2]." Juni ".$rawFirst[0];
            break;

            case 7 :
                return $rawFirst[2]." Juli ".$rawFirst[0];
            break;

            case 8 :
                return $rawFirst[2]." Agustus ".$rawFirst[0];
            break;

            case 9 :
                return $rawFirst[2]." September ".$rawFirst[0];
            break;

            case 10 :
                return $rawFirst[2]." Oktober ".$rawFirst[0];
            break;

            case 11 :
                return $rawFirst[2]." November ".$rawFirst[0];
            break;

            case 12 :
                return $rawFirst[2]." Desember ".$rawFirst[0];
            break;

        }

    }

?>


    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <!-- First Column Start -->
            <div class="col-lg-8">
                <?php
                
                    //Mengecek apakah ada postingan yang sesuai
                    if(mysqli_num_rows($result) > 0)
                    {
                        
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                                <!-- Title -->
                                <h1 class="mt-4"> <?php echo $row['JUDUL_POSTING'];?> </h1>
                                <!-- Author -->
                                <p class="lead">
                                    By
                                    <a href="#" class="text-decoration-none"> <?php echo $row['NAMA_USER'];?> </a>
                                </p>
                                <hr>
                                <p> Posted on <?php echo convertTanggal($row['TANGGAL_POSTING']);?> </p>
                                <hr>
                                <!-- Preview Image -->
                                <img src="assets/images/ebook-binomo.png" alt="preview_image_posting" class="img-fluid rounded my-2">
                                <!-- The News Start -->
                                <?php
                                    ?>
                                    <p class="text-justify p-2">
                                        <?php 
                                            echo nl2br($row['ISI_POSTING']);
                                        ?>
                                    </p>                                    
                                    <?php
                                ?>
                                <!-- The News End -->
                            <?php
                        }

                    }else
                    {
                        ?>
                            <div class="row justify-content-center my-4">
                                <h1 class="col-lg-12 text-center my-4">Mohon maaf, konten yang anda akses tidak tersedia</h1>
                                <p class="col-lg-8 text-center my-4">Silahkan kembali menggunakan <a href="catalog.php">link</a> berikut ini</p>
                            </div>
                        <?php
                    }                
                ?>   
            </div>
            <!-- First Column End -->
            <!-- Second Column Start -->
            <div class="col-lg-4">
                 <!-- Search Widget -->
                 <div class="card my-4">
                    <h5 class="card-header"> Search </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for ...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary"> Go! </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Category Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Category </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Bisnis </a>
                                    </li>
                                    <li>
                                        <a href=""> Komputer </a>
                                    </li>
                                    <li>
                                        <a href=""> Gadget </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Laptop </a>
                                    </li>
                                    <li>
                                        <a href=""> Keyboard </a>
                                    </li>
                                    <li>
                                        <a href=""> Graphic Card</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Sidebar Widget </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your e-mail ...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary"> Subscribe </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Column End --> 
        </div>
        <!-- Row End --> 
    </div>


<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_blog.js"></script>
<?php require_once "assets/includes/footer_close.php"?>