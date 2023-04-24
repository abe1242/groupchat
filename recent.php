<?php
    include 'connect.php';
    
    $sql = <<<QUERY
        SELECT m.id, m.message, m.post_date, u.username, g.name AS groupname
        FROM messages m
        INNER JOIN users u ON m.user_id = u.id
        INNER JOIN groups g ON m.group_id = g.id
        ORDER BY m.post_date DESC
        LIMIT 5;
    QUERY;
    $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<h2>Recent messages</h2>
<div class="messages">
    <?php foreach ($result as $row): ?>
    <div class="message">
        <span><?= $row['message'] ?></span> |
        <span><?= $row['post_date'] ?></span> |
        <span><?= $row['username'] ?></span> |
        <span><?= $row['groupname'] ?></span>
    </div>
    <?php endforeach ?>
</div>