<?php
require_once './Category.php';
$cates = Category::all();

// echo "<pre>";
// var_dump($cates);
// die;

?>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
    </thead>
    <tbody>
    <?php foreach($cates as $c): ?>
        <tr>
            <td><?= $c->id ?></td>
            <td><?= $c->cate_name ?></td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>