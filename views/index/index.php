<h1>Таск</h1>
<p>
<div class="float col-md-6">
    <form action="/task/index" class="input-group">
        <div class="input-group-prepend">
            <label class="input-group-text" for="sort">Sort by:</label>
            <div class="input-group-text">DESC &nbsp;
                <input type="checkbox" name="sorttype" id="sorttype" <?= (isset($_GET['sorttype'])=='on') ? 'checked' : '' ?>>
            </div>
        </div>
        <select class="custom-select" id="sort" name="sort">
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="status">Status</option>
            <option value="created">Date</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">sort</button>
        </div>
    </form>
</div>
</div>
<br/>
<table width="100%" border="1">
    <tr><td>Названия</td><td>Описание</td><td>Статус</td></tr>
    <?php

    foreach($data as $row)
    {
        echo '<tr><td>'.$row['name'].'</td><td>'.$row['text'].'</td><td>';
        switch ($row['status']) {
            case '1':
                echo"Aktiv";
                break;
            default:
                echo"Deaktiv";
                break;
        }
        if(isset($_COOKIE['username'])):
            echo "<a href='/task/edit?id={$row['id']}'> Edit</a>";
        endif;
        echo  '</td></tr>';
    }

    ?>
</table>
</p>
<div class="row">
    <div class="col pt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                if(isset($_GET['sort']) && isset($_GET['sorttype'])){
                    for ($i=1; $i<=$pages; $i++) {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index?page=$i&sort={$_GET['sort']}&sorttype={$_GET['sorttype']}\">$i</a></li>";
                    }
                }else{
                    for ($i=1; $i<=$pages; $i++) {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index?page=$i\">$i</a></li>";
                    }
                }

                ?>
            </ul>
        </nav>
    </div>
</div>
</div>