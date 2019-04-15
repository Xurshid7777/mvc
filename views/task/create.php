<?php
?>
<main class="row">
    <div class="col">
        <h1></h1>
        <form action="/task/create" enctype="multipart/form-data" method="post">
            <div class="form-group col-10 offset-1">
                <label for="name" class="col-form-label">Enter your name</label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="email" class="col-form-label">Enter email</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="text" class="col-form-label">Enter content of task</label>
                <textarea name="text" id="text" rows="7" class="form-control mb-3"></textarea>
                <button class="btn btn-success">Create</button>
                <button class="btn btn-warning" type="reset">Reset</button>
                <a href="/" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        <h2>Preview of task:</h2>
        <div class="row task-item py-3 mb-3">
            
            <div class="col">
                <div class="row">
                    <div class="col-auto"><h5>Author: <b id="name-pre"></b></h5></div>
                    <div class="col"><h5>Contact: <a href="#" id="email-pre"></a></h5></div>
                </div>
                <p id="text-pre">Example text</p>
            </div>
        </div>
    </div>
</main>
