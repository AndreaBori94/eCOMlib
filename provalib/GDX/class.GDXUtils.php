<?php
class Utils
{
	public static function replace_until($target, array $list, $str)
	{
		foreach ( $list as $type )
		{
			$target = str_replace ( $type, $str, $target );
		}
		return $target;
	}
}