<?php

/**
 * Parse a repeating HTML element into an array
 * 
 * @param url - An URL for an HTML-generated content
 * @param tag - The tag of the repeating element
 * @param attribute - The attribute, e.g. class,href, etc., of the repeating elements.
 * @param name - The name assigned to the attrbute for the repeating elements.
 * 
 * @return results - A dynamic array, unique to the repeating element.
 */
function html2array($url,$tag,$attribute,$name) {
    $results = array();
    $j=0;

    $contents = file_get_contents($url);
    $dom = new DOMDocument();
    @$dom->loadHTML($contents);
    $xpath = new DOMXPath($dom);

    $xpath_query = "//";

    if (!empty($tag)) {
        $xpath_query .= $tag; 
    }
    if (!empty($attribute) && empty($name)) {
        $xpath_query .= "[@".$attribute."]";
    } elseif (!empty($attribute) && !empty($name)) {
        $xpath_query .= "[@".$attribute."='".$name."']";
    }

    foreach($xpath->query($xpath_query) as $_tag) {
        $i=0;
        $result = array();
        foreach($_tag->childNodes as $childNode) {
            if (!empty(trim($childNode->nodeValue))) {
                $result[$i] = trim($childNode->nodeValue);
                $i++;    
            }
        }
        $results[$j++] = $result;
    }

    return $results;
}
?>