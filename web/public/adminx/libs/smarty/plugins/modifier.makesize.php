<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty makesize modifier plugin
 * 
 * Type:     modifier<br>
 * Name:     makesize<br>
 * Purpose:  makesize
 * 
 * 
 * @author Bean
 * @param string $bytes       input string 
 * @return string
 */
function smarty_modifier_makesize($bytes)
{
    if (abs ( $bytes ) < 1000 * 1024)
			return number_format ( $bytes / 1024, 2 ) . " KB";
		if (abs ( $bytes ) < 1000 * 1048576)
			return number_format ( $bytes / 1048576, 2 ) . " MB";
		if (abs ( $bytes ) < 1000 * 1073741824)
			return number_format ( $bytes / 1073741824, 2 ) . " GB";
		return number_format ( $bytes / 1099511627776, 2 ) . " TB";
} 

?>