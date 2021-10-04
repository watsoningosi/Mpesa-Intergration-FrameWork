<?php
include('./includes/header.php');
include('./includes/nav.php');

?>

<!-- Page Content -->
.
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Shop Name</h1>
            <div class="list-group">
                <a href="#" class="list-group-item active">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                <div class="card-body">
                    <h3 class="card-title">Product Name</h3>
                    <h4>$24.99</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit
                        fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur
                        praesentium animi perspiciatis molestias iure, ducimus!</p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <form action="MpesaProcessor.php" class="form" role="form" method="POST">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" name="fullname" id="" class="form-control" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="">Bought product</label>
                        <input type="text" name="product" id="" class="form-control" placeholder="bought product">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" id="" class="form-control" placeholder="enter the price">
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="tel" name="phone" id="phone" autocomplete="on" required type="number" class="form-control" placeholder="phone">
                    </div>
                    <div class="form-group col-lg-4">
                        <input type="submit" class="btn btn-success" name="pay" id="" value="Pay">
                    </div>

                </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
    </div>

</div>
<!-- /.container -->

<?php include('./includes/footer.php');
