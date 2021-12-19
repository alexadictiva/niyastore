<section class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="index.php">TIENDA</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <?php $sql = mysqli_query($con, "SELECT id,categoryName  FROM category LIMIT 6");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <li class="nav-item ">
                            <a class="nav-link " href="category.php?cid=<?php echo $row['id']; ?>"> <?php echo $row['categoryName']; ?></a>

                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
</section>