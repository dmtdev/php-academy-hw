<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/27/17
 * Time: 19:50
 */
//TODO fix menu
?>
<div class="container mb-5">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand" href="index.php"><?= $config['company'] ?></a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($config['pages'] as $k => $v): ?>
                    <?php if ($v['show'] == true): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?page=<?= $k ?>">
                                <?= $v['title'] ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="nav-item active">
                    <span class="nav-link">{{login}}</span>
                </li>
                <li class="nav-item active">
                    <span class="nav-link">{{basket}}</span>
                </li>

            </ul>
        </div>
    </nav>
</div>