<?php
include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);
//$entries is the PDOStatement returned from getAllEntries
$entries = $entryTable->getAllEntries();
//fetch data from the first row as a StdClass object
//$oneEntry = $entries->fetchObject();
//print the object
//$test = print_r($oneEntry, true);

$isEntryClicked = isset($_GET['id']);
if ($isEntryClicked) {
    $entryId = $_GET['id'];
    $entryData = $entryTable->getEntry($entryId);
    $blogOutput = include_once "views/entry-html.php";
    $blogOutput .= include_once "controllers/comments.php";
} else {
    //list all entries
    $entries = $entryTable->getAllEntries();
    $blogOutput = include_once "views/list-entries-html.php";
}

return $blogOutput;
//return the printed object to index to see it in browser
//return "<pre>$test</pre>";