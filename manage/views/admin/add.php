<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
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
        <h1 class="text-center text-danger width100">Add content</h1>
    </div>

    <div class="row">
        <form method="post" class="width100">
            <div class="form-group">
                <label for="txtTitle">Title</label>
                <input type="text" class="form-control" id="txtTitle" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="txtDescription">Description</label>
                <input type="text" class="form-control" id="txtDescription" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="fileUpload">Image</label>
                <input type="file" class="form-control-file" id="fileUpload">
            </div>
            <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control">
                    <option value="0" selected>Enable</option>
                    <option value="1" >Disable</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6 text-right">
                    <button type="submit" class="btn btn-primary btn-custom">Save</button>
                </div>
                <div class="col-lg-6 text-left">
                    <button type="button" class="btn btn-danger btn-custom" onclick="rollBack();">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>