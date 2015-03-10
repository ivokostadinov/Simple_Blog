<?php

//include class definition and create an object
include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);

//was editor form submitted?
$editorSubmitted = isset($_POST['action']);
if ($editorSubmitted) {
    $buttonClicked = $_POST['action'];
    //was save button clicked
    $save = ($buttonClicked === 'save');
    $id = $_POST['id'];
    //id id = 0 the editor was empty
    //so user tries to save a new entry
    $insertNewEntry = ($save and $id === '0');
    //$insertNewEntry = ($buttonClicked === 'save');
    $deleteEntry = ($buttonClicked === 'delete');
    //if $insertNewEntry is false you know that entry_id was NOT 0
    //That happens when an existing entry was displayed in editor
    //in other words: user tries to save an existing entry
    $updateEntry = ($save and $insertNewEntry === false);
    //get title and entry data from editor form
    $title = $_POST['title'];
    $entry = $_POST['entry'];


    if($insertNewEntry) {
        //introduce a variable to hold the id of a saved entry
        $savedEntryId = $entryTable->saveEntry($title, $entry);
    } else if ($updateEntry) {
        $entryTable->updateEntry($id, $title, $entry);

        //in case an entry was updated
        //overwrite the variable with the id of the updated entry
        $savedEntryId = $id;
    } else if ($deleteEntry) {
        $entryTable->deleteEntry($id);
    }
}

//introduce a new variable: get entry id from URL
$entryRequested = isset($_GET['id']);
//create a new if-statement
if ($entryRequested) {
    $id = $_GET['id'];
    //load model of existing entry
    $entryData = $entryTable->getEntry($id);
    $entryData->entry_id = $id;
    //show no message when entry is loaded initially
    $entryData->message = "";
    $entryData->leg = "Edit Entry";
}

$entrySaved = isset($savedEntryId);
if ($entrySaved) {
    $entryData = $entryTable->getEntry($savedEntryId);
    //display a confirmation message
    $entryData->message = "Entry was saved";
    $entryData->leg = "Edit Entry";
}
//load relevant view
$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;