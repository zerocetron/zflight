<?php
namespace zit\io;

/**
 * PHP输入输出相关类
 * @package zit\io
 */
class IO{

	//php实时动态输出
	public static function obflush($str) {
		static $prestring;
		if(empty($prestring)) {
			ob_end_flush();//关闭缓存 
			$prestring = str_repeat(' ', 1024);
			echo $prestring;
		}
		echo $str,'<br />';
		flush();
	}


}
