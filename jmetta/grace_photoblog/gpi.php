<?php
/*
	Plugin Name: Get Post Image
	Plugin URI: http://www.andrewgrant.org/get-post-image
	Description: Display or return an images contained within posts
	Version: 1.0
	Author: Andrew Grant
	Author URI: http://www.andrewgrant.org/
	Author Email: mail@andrewgrant.org

	Copyright (c) 2007 Andrew Grant (http://www.andrewgrant.org)
	Post Image is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl.txt

	This is a plugin for Wordpress 2.0 and higher (http://wordpress.org).
	
	
	Functions
	-------------
	
	gpi_show_image($index, $default_image='', $img_class='post-image')
	
		Inserts an img tag with the specified image from the current post.
		
		$index 					- image to display [0 - (num_images-1)]
		$default_image	- image to use if the post has less than $index images
		$img_class			- css class to use for the image tag

	-
	
	gpi_get_image_count()
		
		Returns the number of images in the current post.
		
	-
		
	gpi_get_image($index, $default_image='', $as_tag=true, $img_class='post-image')
	
		Retrieves image info without displaying it.
		
		$index 					- image to display [0 - (num_images-1)]
		$default_image	- image to use if the post has less than $index images
		$as_tag					- return the post as an img tag (true/false)
		$img_class			- css class to use for the image tag
		
		If as_tag is false then info about the specified image is returned as an array.
		This can be accessed using keys as shown in Example 3. The available keys are
		
		'title' 	=> title string
		'url' 		=> url string
		'size' 		=> dimensions as a string for an img tag (e.g height="60" width="120")
		'width' 	=> width as an integer
		'height' 	=> height as an integer									
		'path' 		=> local path on the server
		'type' 		=> image type
	
	-	

	
	Example 1: Displaying the first post in an image
	-------------------------------------------------------
	
	[...]
	the_post(); 
	[...]
	
	gpi_show_image(0, "http://www.myserver.com/default.jpg", "post-image");
	
		
		
	Example 2: Displaying all posts in an image
	---------------------------------------------------
	
	[...]
	the_post(); 
	[...]
	
	$image_count = gpi_get_image_count()
	
	for ($i = 0; $i < $image_count; $i++)
	{
		gpi_show_image($i, "http://www.myserver.com/default.jpg", "post-image");
	}	
	
	
	Example 3: Getting an image from a post and displaying it manually
	------------------------------------------------------------------------
	
	[...]
	the_post(); 
	[...]
	
	$image = gpi_get_image(0, "http://www.myserver.com/default.jpg", false);
	
	echo '<img src="' . $image['url'] . '" ' . $image['size'] . ' title="' . $image['title'] . " />';	
		

*/



/******************************************************************************************

	gpi_get_image_count
	
	Returns the number of images contained in the current post
	
******************************************************************************************/
function gpi_get_image_count()
{
	global $post;
	
	if(!in_the_loop())
	{
		trigger_error("gpi_get_image_count can only be used within the post loop", E_USER_ERROR);
		return 0;
	}
	
	$image_list = gpi_internal_cache_imagelist($post);
	
	return count($image_list);
}
	
/******************************************************************************************

	gpi_get_image_count
	
	Returns the specified image from the current post, by default as an image
	tag string ready to display (e.g. <img src="fileurl" width="120". height="60" ... / >
	
	If no matching image is found the	default image is used instead. 
	
	if as_tag is false, an associative	array is returned that contains the image 
	info (see help at the top).
	
	$img_class may secify a CSS class to use in the tag. E.g. <img class="whatever" src="fileurl" ...>	
	
******************************************************************************************/
function gpi_get_image($index, $default_image='', $as_tag=true, $img_class='post-image') 
{
	global $post;
	
	if(!in_the_loop())
	{
		trigger_error("gpi_get_image can only be used within the post loop", E_USER_ERROR);
		return 0;
	}
	
	$info = gpi_internal_get_image_info($post, $index, $default_image);
		
	if($as_tag) 
	{		
		$image = '<img class="' . $img_class . '" src="' . $info['url'] . '" ' . $info['size'] . ' title="' . $info['title'] . '" alt="' . $info['title'] . '" />';
	} 
	else 
	{
		$image = $info;
	}
	
	return $image;
}

/******************************************************************************************

	gpi_show_image
	
	Shows the specified image from the current post. 
	
	If no matching image is found the	default image is used instead. 
		
	$img_class may secify a CSS class to use in the tag. E.g. <img class="whatever" src="fileurl" ...>	
	
******************************************************************************************/
function gpi_show_image($index, $default_image='', $img_class='post-image')
{
	if(!in_the_loop())
	{
		trigger_error("gpi_show_image can only be used within the post loop", E_USER_ERROR);
		return 0;
	}
	
	echo(gpi_get_image($index, $default_image, true, $img_class));
}



/*****************************************************************************************
**
**	Internal functions and data
**
*****************************************************************************************/



// index by post id to access an array of image url's in the specified post
$gpi_image_list_cache = array();



/******************************************************************************************

	gpi_internal_cache_imagelist
	
	Retrieves and caches a list of images from the specified post
	
******************************************************************************************/
function gpi_internal_cache_imagelist($post)
{
	global $gpi_image_list_cache;
	
	if (!isset($gpi_image_list_cache[$post->ID]))
	{			
		// find all images in the post
		$match_count = preg_match_all("/<img[^']*?src=\"([^']*?)\"[^']*?>/", $post->post_content, $match_array, PREG_PATTERN_ORDER);
				
		$gpi_image_list_cache[$post->ID] = $match_array[1];		
	}
		
	return $gpi_image_list_cache[$post->ID];	
}

/******************************************************************************************

	gpi_internal_cache_imagelist
	
	Returns the image info from the specified post. if no matching image is found then default
	image is used.
	
******************************************************************************************/
function gpi_internal_get_image_info($post, $index, $default_image='')
{
	$image_list = gpi_internal_cache_imagelist($post);	
		
	if ($index < count($image_list))
	{
		$img_url = $image_list[$index];
	}
	else
	{
		$img_url = $default_image;
	}
	
	// proper url
	$img_url = urldecode($img_url);
	
	// get the actual path on the server
	$img_path = ABSPATH . str_replace(get_settings('siteurl'), '', $img_url);
	
	// if it exists, get its properties
	if(file_exists($img_path)) 
	{
		$imagesize = @getimagesize($img_url);
	}
	else
	{	
		$imagesize=array();
	}
	
	// build the relevant info into an associative array
	$info = array('title' => $post->post_title,	// title string
							'url' => $img_url,							// url string
							'size' => $imagesize[3],				// dimensions as a string for an img tag (e.g height="60" width="120")
							'width' => $imagesize[0],				// width as an integer
							'height' => $imagesize[1],			// height as an integer									
							'path' => $img_path,						// local path on the server
							'type' => $imagesize[2]);				// image type
							
	return $info;
}


?>