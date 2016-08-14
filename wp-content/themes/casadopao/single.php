<?php 
if( get_post_type() == 'media_coverage' )
{
	get_template_part('single','media_coverage');
}
else if( get_post_type() == 'list_resources' )
{
	get_template_part('single','list_resources');
}
else if( get_post_type() == 'post' )
{
	get_template_part('single','post');
}
else
{
	get_template_part('single','post');
}

?>
