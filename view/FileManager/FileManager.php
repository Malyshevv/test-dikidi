<div class="container mt20">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
	<h1>Файловый менеджер</h1>
    <p class="alert alert-info">
        Текущая директория - <img src="assets/img/floder.png" width="20"/>
        <?= $currentDir && $currentDir != '/' ? $currentDir : '/'; ?>
    </p>
	<ul class="list-group">
		<?php if ($currentDir && $currentDir != '/') : ?>
			<li class="list-group-item alert-success"><a href="?dir=<?= dirname($currentDir) ?>"> <img src="assets/img/arrow.webp" width="20"/> Назад</a></li>
		<?php endif; ?>
		<?php foreach ($folders as $folder): ?>
			<li class="list-group-item">
                <img src="assets/img/floder.png" width="20"/>
                <a href="?dir=<?= $folder['path'] ?>"><?= $folder['name'] ?></a>
            </li>
		<?php endforeach; ?>
		<?php foreach ($files as $file): ?>
			<li class="list-group-item">
                <img src="assets/img/photo.svg" width="20" />
                <a target="_blank" href="<?= 'storage'.$currentDir.'/'.$file?>"><b><?= $file ?></b> </a> /
                <a href="<?= 'storage'.$currentDir.'/'.$file?>" download>Скачать</a>
            </li>
		<?php endforeach; ?>
	</ul>
</div>