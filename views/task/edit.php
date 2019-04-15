<?php
if($_GET['id']){?>
    <main class="row">
        <div class="col">
            <h1>EDIT TASK</h1>
            <form action="/task/edit?id=<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <label for="text" class="col-form-label">Enter content of task</label>
                    <textarea name="text" id="text" rows="7" class="form-control"><?= $data['text']?></textarea>
                    <select class="custom-select form-control my-3" name="status">
                        <option value="0">Deleted</option>
                        <option value="1" selected>Done</option>
                    </select>
                    <button class="btn btn-success" name="save" value="1">Save</button>
                </div>
            </form>
        </div>
    </main>

<?}else{?>

<?}
?>