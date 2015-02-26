<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
	print_r(md5_file('./_backup/db_backup_LOCAL.sql'));
	echo '<br>';
	print_r(md5_file('./_backup/db_backup_LOCAL2.sql'));
	echo '<br>';
	
	define('READ_LEN', 4096);

if(files_identical('./_backup/db_backup_LOCAL.sql', './_backup/db_backup_LOCAL2.sql'))
    echo 'files identical';
else
    echo 'files not identical';

//   pass two file names
//   returns TRUE if files are the same, FALSE otherwise
function files_identical($fn1, $fn2) {
    if(filetype($fn1) !== filetype($fn2))
        return FALSE;

    if(filesize($fn1) !== filesize($fn2))
        return FALSE;

    if(!$fp1 = fopen($fn1, 'rb'))
        return FALSE;

    if(!$fp2 = fopen($fn2, 'rb')) {
        fclose($fp1);
        return FALSE;
    }

    $same = TRUE;
    while (!feof($fp1) and !feof($fp2))
        if(fread($fp1, READ_LEN) !== fread($fp2, READ_LEN)) {
            $same = FALSE;
            break;
        }

    if(feof($fp1) !== feof($fp2))
        $same = FALSE;

    fclose($fp1);
    fclose($fp2);

    return $same;
}
	
?>