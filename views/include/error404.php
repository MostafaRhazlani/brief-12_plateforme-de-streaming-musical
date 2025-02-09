<div class="wrapper">
    <div class="vh-100">
        <div class="container">
            <div class="row align-items-center align-self-center vh-100">
                <div class="col-sm-12 text-center">
                    <img src="/public/images/error/06.png" class="img-fluid w-50">
                    <h2 class="mb-0 mt-4 ">Oops! This Page is Not Found.</h2>
                    <p class="mt-2 mb-4">The requested page dose not exist.</p>
                    <?php if(isset($_SESSION['user'])) : ?>
                        <?php if($_SESSION['user']['role'] == 'Admin') { ?>
                            <a class="btn btn-primary" href="?page=admin/dashboard">Back to Home</a>
                        <?php } else if ($_SESSION['user']['role'] == 'Artist') {  ?>
                            <a class="btn btn-primary" href="?page=artist/dashboard">Back to Home</a>
                        <?php } else { ?>
                            <a class="btn btn-primary" href="?page=home ">Back to Home</a>
                        <?php } ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>