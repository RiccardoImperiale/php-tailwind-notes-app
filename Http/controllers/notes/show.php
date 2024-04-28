<?php
// shows a specific note

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === currentUserId($db));

view('notes/show.view.php', [
    'heading' => 'Notes',
    'note' => $note
]);
