<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php include '../template/library.php';?>
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
                    <option selected>Enable</option>
                    <option>Disable</option>
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