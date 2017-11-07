<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/27/17
 * Time: 19:50
 */
?>
<div class="container mb-5">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand" href="index.php"><?= $config['company'] ?></a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($config['pages'] as $k => $v): ?>
                    <?php switch ($v['show']): case 'forall': ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?page=<?= $k ?>">
                                <?= $v['title'] ?>
                            </a>
                        </li>
                        <?php break; ?>
                    <?php case 'forauth': ?>
                        <?php if (isset($_SESSION['auth']['state']) && $_SESSION['auth']['state']): ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?page=<?= $k ?>">
                                    <?= $v['title'] ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php break; ?>
                    <?php case 'fornotauth': ?>
                        <?php if (!isset($_SESSION['auth']['state']) || !$_SESSION['auth']['state']): ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?page=<?= $k ?>">
                                    <?= $v['title'] ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php break; ?>
                    <?php default: ?>
                    <?php endswitch; ?>
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