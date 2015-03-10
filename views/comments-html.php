<?php
$coommentsFound = isset($allComments);
if ($coommentsFound === false) {
    trigger_error('views/comments-html.php needs $allComments');
}
$allCommentsHTML = "<ul id='comments'>";
//iterate through all rows returned from database
while ($commentData = $allComments->fetchObject()) {
    $allCommentsHTML .= "<li>
        $commentData->author wrote:
        <p>$commentData->txt</p>
    </li>";
}
$allCommentsHTML .= "</ul>";
return $allCommentsHTML;