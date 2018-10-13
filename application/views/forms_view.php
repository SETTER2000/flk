<h1>Новая задача333</h1>

<hr>

<div class="row">
    <div class="col-md-12">

        <table>
            <?php

            if (empty($data)) {
                echo 'пустой массив';
            } else {
                foreach ($data as $row) {
                    echo '<tr><td>' . $row['user'] . '</td><td>' . $row['email'] . '</td><td>' . $row['description'] . '</td><td>' . $row['pic'] . '</td></tr>';
                }
            }

            ?>
        </table>
    </div>
</div>