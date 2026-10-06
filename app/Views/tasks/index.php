<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<h1>Task List</h1>

<?php if (session()->getFlashdata('message')): ?>
    <p style="color:green;">
        <?= esc(session()->getFlashdata('message')) ?>
    </p>
<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>
    <p>
        Logged in as:
        <?= esc(session()->get('user_email')) ?>
    </p>

    <a href="<?= site_url('tasks/new') ?>">Add New Task</a> |
    <a href="<?= site_url('logout') ?>">Logout</a>
<?php else: ?>
    <a href="<?= site_url('login') ?>">Login to Manage Tasks</a>
<?php endif; ?>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Task Date</th>

        <?php if (session()->get('isLoggedIn')): ?>
            <th>Actions</th>
        <?php endif; ?>
    </tr>

    <?php if (empty($tasks)): ?>
        <tr>
            <td colspan="4">No active tasks found.</td>
        </tr>
    <?php endif; ?>

    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc($task['title']) ?></td>
            <td><?= esc($task['description']) ?></td>
            <td><?= esc($task['task_date']) ?></td>

            <?php if (session()->get('isLoggedIn')): ?>
                <td>
                    <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">
                        Edit
                    </a>

                    <form
                        method="post"
                        action="<?= site_url('tasks/delete/' . $task['id']) ?>"
                        style="display:inline;"
                    >
                        <?= csrf_field() ?>
                        <button type="submit"
                            onclick="return confirm('Archive this task?')">
                            Delete
                        </button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<a href="<?= site_url('/') ?>">Home</a>

</body>
</html>