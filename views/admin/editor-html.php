<?php

//check if required data is available
$entryDataFound = isset($entryData);
if ($entryDataFound === false) {
    //default values for an empty editor
    $entryData = new stdClass();
    $entryData->entry_id = 0;
    $entryData->title = "";
    $entryData->entry_text = "";
    //notice $entryData->message is blank when the editor is empty
    $entryData->message = "";
    $entryData->leg = "New Entry";
}


/*return "
<form method='post' action='admin.php?page=editor' class='submission' id='editor'>
    <input type='hidden' name='id' value='$entryData->entry_id' />
    <fieldset class='entry-submission'>
        <p>New Entry Submission</p>
        <!--<label>Title</label>-->
        <p class='submission-input'>
            <input type='text' name='title' placeholder='Title...' maxlength='150' value='$entryData->title' required autofocus />
        </p>
        <p id='title-warning'></p>
        <!--<label>Entry</label>-->
        <p class='submission-input'>
        <textarea maxlength='200' name='entry' placeholder='Entry text...'>$entryData->entry_text</textarea>
        </p>
        <p class='submission-submit'>
            <input type='submit' name='action' value='Save' />
            <input type='submit' name='action' value='Delete'/>
            <p id='editor-message'>$entryData->message</p>
        </p>
    </fieldset>
</form>
";*/

return "
<form method='post' action='admin.php?page=editor' id='editor'>
<input type='hidden' name='id' value='$entryData->entry_id'/>
<fieldset>
<legend>$entryData->leg</legend>
<label>Title</label>
<input type='text' name='title' maxlength='150' value='$entryData->title' />
<label>Entry</label>
<textarea name='entry'>$entryData->entry_text</textarea>
<fieldset id='editor-buttons'>
<input type='submit' name='action' value='save' />
<input type='submit' name='action' value='delete' />
<p id='editor-message'>$entryData->message</p>
</fieldset>
</fieldset>
</form>";