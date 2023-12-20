<?php

// open the article on read only
$article = fopen("article.txt", 'r');

if ($article !== false) {
    // treatment on each row of the article
    $count = 0;
    while (!feof($article)) {
        
        $row = fgets($article);
        // set each word of the row on an array
        $row_array = str_word_count($row, 1,"#[^àáâãäåæÀÁÂÃÄÅÆßçÇèéêëÈÉÊËìíîïÌÍÎÏñÑòóôõöÒÓÔÕÖšŠùúûüÙÚÛÜýÝžŽ]#");// don't split word if accent
        // check that the row isn't blank
        if (!empty($row_array) && count($row_array) > 0) {
            // get a random word from the word array
            $random_word = $row_array[random_int(0,(count($row_array)-1))];
            // display it 
            $random_word = noAccent($random_word);
            // unuseful because str_word_count don't render this
            // $random_word = preg_replace("#\n|\t|\r#","",$random_word); 
            if ($random_word !== ''){
                echo $random_word . "<br>";
            }
        }
    }
    // close the file
    fclose($article);
}
/**
 * Remove accent in a string
 *
 * @param [string] $in
 * @return string
 */
function noAccent($in){
    return str_replace(
        ['à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'ß', 'ç', 'Ç', 'è', 'é', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ñ', 'Ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'š', 'Š', 'ù', 'ú', 'û', 'ü', 'Ù', 'Ú', 'Û', 'Ü', 'ý', 'Ý', 'ž', 'Ž'],
        ['a', 'a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'n', 'N', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 's', 'S', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'Y', 'z', 'Z'],
        $in
    );
}
