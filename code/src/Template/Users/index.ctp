
<h1>All users</h1>
<p><?= $this->Html->link('Add User', ['action' => 'add']) ?></p>
<p><?= $this->Html->link('logout', ['action' => 'logout']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>username</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $user->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$user->id)])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>