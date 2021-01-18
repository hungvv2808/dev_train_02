<?php
    if (isset($_POST['upload'])) {
        echo '<pre>'.print_r($_FILES['image']).'</pre>';
        $imagePath = time() . '_' . $_FILES['image']['name'];
        $target = getcwd().'/target/'.$imagePath;
        $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo $target.'<br/>';
        var_dump($upload);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../manage/views/resource/fontawsome/css/all.css"/>
    <link rel="stylesheet" href="../manage/views/resource/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../manage/views/resource/js/custom.js"></script>
</head>
<body>
<div class="admin container">
    <div class="row">
        <h1 class="text-center text-danger width100"><?= $title. ($type === Constant::TYPE_ADD ? ' new' : ' "<span class="first-str">'.$result['title'].'</span>"') ?></h1>
    </div>

    <div class="row">
        <form id="post-form" action="<?php echo $urlRedirect ?>" method="post" class="width100" enctype="multipart/form-data">
            <div class="form-group none">
                <label for="txtId">ID</label>
                <input type="hidden" class="form-control" id="txtId" name="id" placeholder="Enter id" value="<?php echo $result['id'] ?>">
            </div>
            <div class="form-group">
                <label for="txtTitle">Title</label>
                <input type="text" class="form-control" id="txtTitle" name="title" placeholder="Enter title" value="<?php echo $result['title'] ?>">
            </div>
            <div class="form-group">
                <label for="txtDescription">Description</label>
                <textarea class="form-control" id="txtDescription" name="description" placeholder="Enter description" rows="3"><?php echo $result['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="fileUpload">Image</label>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image" value="<?php echo $result['image'] === null ? Constant::IMAGE_PATH_NO_IMAGE : $result['image'] ?>" <?php echo $type === Constant::TYPE_SHOW ? 'disabled' : '' ?>>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-success" name="upload" onclick="onUpload();">Upload</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <img src="<?php echo $result['image'] === null ? Constant::IMAGE_PATH_NO_IMAGE : $result['image'] ?>" alt="image <?php echo $result['id'] ?>" class="rounded mx-auto d-block">
            </div>
            <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control" name="status">
                    <option value="0" <?php echo $result['status'] === '0' ? 'selected' : '' ?>>Enable</option>
                    <option value="1" <?php echo $result['status'] === '1' ? 'selected' : '' ?>>Disable</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6 text-right <?php echo $type === Constant::TYPE_SHOW ? 'none' : '' ?>">
                    <button type="submit" class="btn btn-primary btn-custom" name="save" onclick="onSave();">Save</button>
                </div>
                <div class="col-lg-6 text-left">
                    <button type="button" class="btn btn-danger btn-custom" onclick="rollBack();">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    (function () {
        $('.custom-file-label').text("<?php echo $result['image'] ?>");
    })();
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function onUpload() {
        var currentUrl = 'index.php?controller=posts&action=' + <?= $type ?> + '&id=' + <?= $result['id'] ?>;
        $('#post-form').attr('action', currentUrl);
    }
    function onSave() {
        $('#post-form').attr('action', 'index.php');
    }
</script>
</body>
</html>