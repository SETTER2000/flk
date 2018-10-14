<h1>Портфолио</h1>
<hr>

<div class="alert alert-info" role="alert">Все проекты в следующей таблице являются вымышленными...</div>
<table class="table table-responsive">
<thead>
<tr><th>Год</th><th>Проект</th><th>Описание</th></tr>
</thead>
    <tbody>
<?php

	foreach($data as $row)
	{
		echo '<tr><td>'.$row['Year'].'</td><td>'.$row['Site'].'</td><td>'.$row['Description'].'</td></tr>';
	}
	
?>
    </tbody>
</table>
