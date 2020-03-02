<div class="container mt-5">
    <div class="card border-light shadow-lg text-white">
        <h1 class="card-header text-center bg-info">Upload multiple files</h1>
        <div class="card-body col-sm-12 col-lg-4 mr-auto ml-auto small text-dark">

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <div class="card p-2 col-sm-12">
                    <input type="file" name="files[]" multiple>
                </div>
                <button class="btn btn-info text-center" type="submit">
                    <i class="fas fa-angle-double-up"></i></span> Upload
                </button>
            </form>
        </div>
        <div class="card-footer text-center small bg-info">
            Copyright &copy 2020
        </div>
    </div>
</div>