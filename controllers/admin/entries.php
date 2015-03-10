<?php
include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);
//get a PDOStatement object to get access to all entries
$allEntries = $entryTable->getAllEntries();

$entriesAsHTML = include_once "views/admin/entries-html.php";
return $entriesAsHTML;
//test that you can get the first row as a StdClass object
//$oneEntry = $allEntries->fetchObject();
//prepare test output
//$testOutput = print_r($oneEntry, true);
//return test output to front controller, to admin.php
return "<pre>$testOutput</pre>";