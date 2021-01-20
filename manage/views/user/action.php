<?php
$_SESSION['image_default'] = $result['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>(User) <?= $title ?></title>
    <base href="http://127.0.0.1/dev_train_02/manage/" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Constant::RESOURCE_PATH ?>/views/resource/fontawsome/css/all.css"/>
    <link rel="stylesheet" href="<?= Constant::RESOURCE_PATH ?>/views/resource/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="user container">
    <div class="action">
        <div class="row">
            <h1 class="text-center text-danger width100">
                <span class="first-str"><?= $result['title'] ?></span>
            </h1>
        </div>

        <div class="row">
            <form action="<?= Constant::ROLE_USER ?>" method="post" class="width100" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtTitle">Title</label>
                    <input type="text" class="form-control" id="txtTitle" name="title" placeholder="Enter title"
                           value="<?php echo $result['title'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="txtDescription">Description</label>
                    <textarea class="form-control" id="txtDescription" name="description"
                              placeholder="Enter description" rows="3" disabled><?php echo $result['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <img id="customDisplay"
                         src="<?php echo $result['image'] === null ? Constant::IMAGE_PATH_NO_IMAGE : $result['image'] ?>"
                         alt="image <?php echo $result['id'] ?>" class="rounded mx-auto d-block image-custom">
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="button" class="btn btn-danger btn-custom" onclick="rollBack('<?= Constant::ROLE_USER ?>');">Back to home</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= Constant::RESOURCE_PATH ?>/views/resource/js/custom.js"></script>
</body>
</html>