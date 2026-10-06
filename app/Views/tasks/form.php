<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
</head>
<body>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <p style="color:red;"><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php
$isEdit = isset($task) && $task !== null;

$action = $isEdit
    ? site_url('tasks/update/' . $task['id'])
    : site_url('tasks/create');
?>

<form method="post" action="<?= $action ?>">
    <?= csrf_field() ?>

    <label>Title</label><br>
    <input
        type="text"
        name="title"
        value="<?= old('title', $task['title'] ?? '') ?>"
    ><br><br>

    <label>Description</label><br>
    <textarea name="description"><?= old('description', $task['description'] ?? '') ?></textarea>
    <br><br>

    <label>Task Date</label><br>
    <input
        type="date"
        name="task_date"
        value="<?= old('task_date', $task['task_date'] ?? '') ?>"
    ><br><br>

    <button type="submit">
        <?= $isEdit ? 'Update Task' : 'Create Task' ?>
    </button>
</form>

<br>

<a href="<?= site_url('tasks') ?>">Back to Tasks</a>

</body>
</html>