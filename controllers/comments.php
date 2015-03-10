<?php
include_once "models/Comment_Table.class.php";
//create a new object, pass it a PDO database connection object
$commentTable  = new Comment_Table($db);
$newCommentSubmitted = isset($_POST['new-comment']);
if ($newCommentSubmitted) {
    //wichEntry = $_POST['entry-id'];
    $whichEntry = $entryId;
    $user = $_POST['user-name'];
    $comment = $_POST['new-comment'];
    $commentTable->saveComment($whichEntry, $user, $comment);
}


$comments = include_once "views/comment-form-html.php";
$allComments = $commentTable->getAllById($entryId);
$comments .= include_once "views/comments-html.php";

return $comments;