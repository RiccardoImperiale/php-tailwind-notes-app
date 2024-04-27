<?php

view('/session/create.view.php', [
    'errors' => $_SESSION['errors'] ?? []
]);
