<h1>Categories</h1>
<ul>
<?php foreach ($categories as $c):?> 
    <li><a href="<?= route('categories.show', ['id'=>$c['id']]) ?>"><?=$c['name']?></a></li>
<?php endforeach;?>
</ul>