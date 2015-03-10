<?php
$entriesFound = isset($entries);
if ($entriesFound === false) {
    trigger_error('views/list-entries-html.php needs $entries');
}

//create a <ul> element
$entriesHTML = "<ul id='blog-entries'>";

//loop through all $entries from the database
//remember each one row temporarily as $entry
//$entry will be StdClass object with entry_id, title and intro
while ($entry = $entries->fetchObject()) {
    $href = "index.php?page=blog&amp;id=$entry->entry_id";
    //create an <li> for each of the entries
    $entriesHTML .= "<li>
        <h2>$entry->title</h2>
        <div>$entry->intro
            <p><a href='$href'>Read more</a></p>
        </div>
    </li>";
}
//end of <ul>
$entriesHTML .= "</u>";
return $entriesHTML;