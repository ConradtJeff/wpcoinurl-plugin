<?php
/**
 * Plugin Name: coinurl-wordpress
 * Plugin URI: *
 * Description: Plugin to allow for implementation of the coinurl api
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Jeffrey Conradt
 * Author URI: http://theothertechs.com
 * License: A "Slug" license name e.g. GPL2
 */
 /********************************LEGAL********************************
/*  Copyright 2014  Jeffrey Conradt  (email : jeff.conradt@theothertechs.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function getCoinUrl($id)
{
	$url = get_permalink( $id );
    $uuid = "533a9f9784dca620138330";
    $url = rawurlencode($url);

	$result = file_get_contents("https://coinurl.com/api.php?uuid={$uuid}&url={$url}");
	
	if($result == 'error')
        return false;
    else
        return $result;
}

add_filter( 'get_shortlink', 'getCoinUrl', 10, 3 );



