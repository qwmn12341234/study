<?php
header('Content-Type:text/html;charset=utf-8');
$str1 = "高大上(PLG)and (5个/包)as(黄色)";
$pattern1 = "#\(((?:(?!\)).)+?/.*?)\)#";
preg_match($pattern1,$str1,$matches);
var_dump($matches);

//(?<=exp)是以exp开头的字符串, 但不包含本身.
//(?=exp)就匹配惟exp结尾的字符串, 但不包含本身.

//(?<=\()    也就是以括号开头,  但不包含括号.
    
 //   (?=\)) 就是以括号结尾
    
 //   \S 匹配任何非空白字符。等价于[^ \f\n\r\t\v]。
 //   +表示至少有一个字符.
    
 //   (?<=\()\S+(?=\))  就是匹配以 (开头, )结尾的括号里面最少有一个非空白字符的串, 但不包括开头的(和结尾的)