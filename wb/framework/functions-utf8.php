<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2008, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/*
 * A large part of this file is based on 'utf8.php' from the DokuWiki-project.
 * (http://www.splitbrain.org/projects/dokuwiki):
 **
 * UTF8 helper functions
 * @license    LGPL (http://www.gnu.org/copyleft/lesser.html)
 * @author     Andreas Gohr <andi@splitbrain.org>
 **
 * modified for use with Website Baker
 * from thorn, Jan. 2008
 */

// Functions we use in Website Baker:
//   entities_to_7bit()
//   entities_to_umlauts2()
//   umlauts_to_entities2()

if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

/*
 * check for mb_string support
 */
if(!defined('UTF8_MBSTRING')){
  if(function_exists('mb_substr') && !defined('UTF8_NOMBSTRING')){
    define('UTF8_MBSTRING',1);
  }else{
    define('UTF8_MBSTRING',0);
  }
}

if(UTF8_MBSTRING){ mb_internal_encoding('UTF-8'); }

require_once(WB_PATH.'/framework/charsets_table.php');

/*
 * Checks if a string contains 7bit ASCII only
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 */
function utf8_isASCII($str){
  for($i=0; $i<strlen($str); $i++){
    if(ord($str{$i}) >127) return false;
  }
  return true;
}

/*
 * Strips all highbyte chars
 *
 * Returns a pure ASCII7 string
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 */
function utf8_strip($str){
  $ascii = '';
  for($i=0; $i<strlen($str); $i++){
    if(ord($str{$i}) <128){
      $ascii .= $str{$i};
    }
  }
  return $ascii;
}

/*
 * Tries to detect if a string is in Unicode encoding
 *
 * @author <bmorel@ssi.fr>
 * @link   http://www.php.net/manual/en/function.utf8-encode.php
 */
function utf8_check($Str) {
 for ($i=0; $i<strlen($Str); $i++) {
  $b = ord($Str[$i]);
  if ($b < 0x80) continue; # 0bbbbbbb
  elseif (($b & 0xE0) == 0xC0) $n=1; # 110bbbbb
  elseif (($b & 0xF0) == 0xE0) $n=2; # 1110bbbb
  elseif (($b & 0xF8) == 0xF0) $n=3; # 11110bbb
  elseif (($b & 0xFC) == 0xF8) $n=4; # 111110bb
  elseif (($b & 0xFE) == 0xFC) $n=5; # 1111110b
  else return false; # Does not match any model
  for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
   if ((++$i == strlen($Str)) || ((ord($Str[$i]) & 0xC0) != 0x80))
   return false;
  }
 }
 return true;
}

/*
 * Unicode aware replacement for strlen()
 *
 * utf8_decode() converts characters that are not in ISO-8859-1
 * to '?', which, for the purpose of counting, is alright - It's
 * even faster than mb_strlen.
 *
 * @author <chernyshevsky at hotmail dot com>
 * @see    strlen()
 * @see    utf8_decode()
 */
function utf8_strlen($string){
  return strlen(utf8_decode($string));
}

/*
 * UTF-8 aware alternative to substr
 *
 * Return part of a string given character offset (and optionally length)
 *
 * @author Harry Fuecks <hfuecks@gmail.com>
 * @author Chris Smith <chris@jalakai.co.uk>
 * @param string
 * @param integer number of UTF-8 characters offset (from left)
 * @param integer (optional) length in UTF-8 characters from offset
 * @return mixed string or false if failure
 */
function utf8_substr($str, $offset, $length = null) {
    if(UTF8_MBSTRING){
        if( $length === null ){
            return mb_substr($str, $offset);
        }else{
            return mb_substr($str, $offset, $length);
        }
    }

    /*
     * Notes:
     *
     * no mb string support, so we'll use pcre regex's with 'u' flag
     * pcre only supports repetitions of less than 65536, in order to accept up to MAXINT values for
     * offset and length, we'll repeat a group of 65535 characters when needed (ok, up to MAXINT-65536)
     *
     * substr documentation states false can be returned in some cases (e.g. offset > string length)
     * mb_substr never returns false, it will return an empty string instead.
     *
     * calculating the number of characters in the string is a relatively expensive operation, so
     * we only carry it out when necessary. It isn't necessary for +ve offsets and no specified length
     */

    // cast parameters to appropriate types to avoid multiple notices/warnings
    $str = (string)$str;                          // generates E_NOTICE for PHP4 objects, but not PHP5 objects
    $offset = (int)$offset;
    if (!is_null($length)) $length = (int)$length;

    // handle trivial cases
    if ($length === 0) return '';
    if ($offset < 0 && $length < 0 && $length < $offset) return '';

    $offset_pattern = '';
    $length_pattern = '';

    // normalise -ve offsets (we could use a tail anchored pattern, but they are horribly slow!)
    if ($offset < 0) {
      $strlen = strlen(utf8_decode($str));        // see notes
      $offset = $strlen + $offset;
      if ($offset < 0) $offset = 0;
    }

    // establish a pattern for offset, a non-captured group equal in length to offset
    if ($offset > 0) {
      $Ox = (int)($offset/65535);
      $Oy = $offset%65535;

      if ($Ox) $offset_pattern = '(?:.{65535}){'.$Ox.'}';
      $offset_pattern = '^(?:'.$offset_pattern.'.{'.$Oy.'})';
    } else {
      $offset_pattern = '^';                      // offset == 0; just anchor the pattern
    }

    // establish a pattern for length
    if (is_null($length)) {
      $length_pattern = '(.*)$';                  // the rest of the string
    } else {

      if (!isset($strlen)) $strlen = strlen(utf8_decode($str));    // see notes
      if ($offset > $strlen) return '';           // another trivial case

      if ($length > 0) {

        $length = min($strlen-$offset, $length);  // reduce any length that would go passed the end of the string

        $Lx = (int)($length/65535);
        $Ly = $length%65535;

        // +ve length requires ... a captured group of length characters
        if ($Lx) $length_pattern = '(?:.{65535}){'.$Lx.'}';
        $length_pattern = '('.$length_pattern.'.{'.$Ly.'})';

      } else if ($length < 0) {

        if ($length < ($offset - $strlen)) return '';

        $Lx = (int)((-$length)/65535);
        $Ly = (-$length)%65535;

        // -ve length requires ... capture everything except a group of -length characters
        //                         anchored at the tail-end of the string
        if ($Lx) $length_pattern = '(?:.{65535}){'.$Lx.'}';
        $length_pattern = '(.*)(?:'.$length_pattern.'.{'.$Ly.'})$';
      }
    }

    if (!preg_match('#'.$offset_pattern.$length_pattern.'#us',$str,$match)) return '';
    return $match[1];
}

/*
 * Unicode aware replacement for substr_replace()
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    substr_replace()
 */
function utf8_substr_replace($string, $replacement, $start , $length=0 ){
  $ret = '';
  if($start>0) $ret .= utf8_substr($string, 0, $start);
  $ret .= $replacement;
  $ret .= utf8_substr($string, $start+$length);
  return $ret;
}

/*
 * Unicode aware replacement for ltrim()
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    ltrim()
 * @return string
 */
function utf8_ltrim($str,$charlist=''){
  if($charlist == '') return ltrim($str);

  //quote charlist for use in a characterclass
  $charlist = preg_replace('!([\\\\\\-\\]\\[/])!','\\\${1}',$charlist);

  return preg_replace('/^['.$charlist.']+/u','',$str);
}

/*
 * Unicode aware replacement for rtrim()
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    rtrim()
 * @return string
 */
function  utf8_rtrim($str,$charlist=''){
  if($charlist == '') return rtrim($str);

  //quote charlist for use in a characterclass
  $charlist = preg_replace('!([\\\\\\-\\]\\[/])!','\\\${1}',$charlist);

  return preg_replace('/['.$charlist.']+$/u','',$str);
}

/*
 * Unicode aware replacement for trim()
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    trim()
 * @return string
 */
function  utf8_trim($str,$charlist='') {
  if($charlist == '') return trim($str);

  return utf8_ltrim(utf8_rtrim($str,$charlist),$charlist);
}

/*
 * This is a unicode aware replacement for strtolower()
 *
 * Uses mb_string extension if available
 *
 * @author Leo Feyer <leo@typolight.org>
 * @see    strtolower()
 * @see    utf8_strtoupper()
 */
function utf8_strtolower($string){
  if(UTF8_MBSTRING) return mb_strtolower($string,'utf-8');

  global $UTF8_UPPER_TO_LOWER;
  return strtr($string,$UTF8_UPPER_TO_LOWER);
}

/*
 * This is a unicode aware replacement for strtoupper()
 *
 * Uses mb_string extension if available
 *
 * @author Leo Feyer <leo@typolight.org>
 * @see    strtoupper()
 * @see    utf8_strtoupper()
 */
function utf8_strtoupper($string){
  if(UTF8_MBSTRING) return mb_strtoupper($string,'utf-8');

  global $UTF8_LOWER_TO_UPPER;
  return strtr($string,$UTF8_LOWER_TO_UPPER);
}

/*
 * Romanize a non-latin string
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 */
function utf8_romanize($string){
  if(utf8_isASCII($string)) return $string; //nothing to do

  global $UTF8_ROMANIZATION;
  return strtr($string,$UTF8_ROMANIZATION);
}

/*
 * Removes special characters (nonalphanumeric) from a UTF-8 string
 *
 * This function adds the controlchars 0x00 to 0x19 to the array of
 * stripped chars (they are not included in $UTF8_SPECIAL_CHARS2)
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @param  string $string     The UTF8 string to strip of special chars
 * @param  string $repl       Replace special with this string
 * @param  string $additional Additional chars to strip (used in regexp char class)
 */
function utf8_stripspecials($string,$repl='',$additional=''){
  global $UTF8_SPECIAL_CHARS2;

  static $specials = null;
  if(is_null($specials)){
    $specials = preg_quote($UTF8_SPECIAL_CHARS2, '/');
  }

  return preg_replace('/['.$additional.'\x00-\x19'.$specials.']/u',$repl,$string);
}

/*
 * This is an Unicode aware replacement for strpos
 *
 * @author Leo Feyer <leo@typolight.org>
 * @see    strpos()
 * @param  string
 * @param  string
 * @param  integer
 * @return integer
 */
function utf8_strpos($haystack, $needle, $offset=0){
    $comp = 0;
    $length = null;

    while (is_null($length) || $length < $offset) {
        $pos = strpos($haystack, $needle, $offset + $comp);

        if ($pos === false)
            return false;

        $length = utf8_strlen(substr($haystack, 0, $pos));

        if ($length < $offset)
            $comp = $pos - $length;
    }

    return $length;
}

/*
 * Encodes UTF-8 characters to HTML entities
 *
 * @author Tom N Harris <tnharris@whoopdedo.org>
 * @author <vpribish at shopping dot com>
 * @link   http://www.php.net/manual/en/function.utf8-decode.php
 */
function utf8_tohtml ($str) {
    $ret = '';
    foreach (utf8_to_unicode($str) as $cp) {
        if ($cp < 0x80)
            $ret .= chr($cp);
        //elseif ($cp < 0x100)
        //    $ret .= "&#$cp;";
        else
            $ret .= "&#$cp;";
        //    $ret .= '&#x'.dechex($cp).';';
    }
    return $ret;
}

/*
 * Decodes HTML entities to UTF-8 characters
 *
 * Convert any &#..; entity to a codepoint,
 * The entities flag defaults to only decoding numeric entities.
 * Pass HTML_ENTITIES and named entities, including &amp; &lt; etc.
 * are handled as well. Avoids the problem that would occur if you
 * had to decode "&amp;#38;&#38;amp;#38;"
 *
 * unhtmlspecialchars(utf8_unhtml($s)) -> "&#38;&#38;"
 * utf8_unhtml(unhtmlspecialchars($s)) -> "&&amp#38;"
 * what it should be                   -> "&#38;&amp#38;"
 *
 * @author Tom N Harris <tnharris@whoopdedo.org>
 * @param  string  $str      UTF-8 encoded string
 * @param  boolean $entities Flag controlling decoding of named entities.
 * @return UTF-8 encoded string with numeric (and named) entities replaced.
 */
function utf8_unhtml($str, $entities=null) {
    static $decoder = null;
    if (is_null($decoder))
      $decoder = new utf8_entity_decoder();
    if (is_null($entities))
        return preg_replace_callback('/(&#([Xx])?([0-9A-Za-z]+);)/m',
                                     'utf8_decode_numeric', $str);
    else
        return preg_replace_callback('/&(#)?([Xx])?([0-9A-Za-z]+);/m',
                                     array(&$decoder, 'decode'), $str);
}
function utf8_decode_numeric($ent) {
    switch ($ent[2]) {
      case 'X':
      case 'x':
          $cp = hexdec($ent[3]);
          break;
      default:
          $cp = intval($ent[3]);
          break;
    }
    return unicode_to_utf8(array($cp));
}
class utf8_entity_decoder {
    var $table;
    function utf8_entity_decoder() {
        $table = get_html_translation_table(HTML_ENTITIES);
        $table = array_flip($table);
        $this->table = array_map(array(&$this,'makeutf8'), $table);
    }
    function makeutf8($c) {
        return unicode_to_utf8(array(ord($c)));
    }
    function decode($ent) {
        if ($ent[1] == '#') {
            return utf8_decode_numeric($ent);
        } elseif (array_key_exists($ent[0],$this->table)) {
            return $this->table[$ent[0]];
        } else {
            return $ent[0];
        }
    }
}

/*
 * Takes an UTF-8 string and returns an array of ints representing the
 * Unicode characters. Astral planes are supported ie. the ints in the
 * output can be > 0xFFFF. Occurrances of the BOM are ignored. Surrogates
 * are not allowed.
 *
 * If $strict is set to true the function returns false if the input
 * string isn't a valid UTF-8 octet sequence and raises a PHP error at
 * level E_USER_WARNING
 *
 * Note: this function has been modified slightly in this library to
 * trigger errors on encountering bad bytes
 *
 * @author <hsivonen@iki.fi>
 * @author Harry Fuecks <hfuecks@gmail.com>
 * @param  string  UTF-8 encoded string
 * @param  boolean Check for invalid sequences?
 * @return mixed array of unicode code points or false if UTF-8 invalid
 * @see    unicode_to_utf8
 * @link   http://hsivonen.iki.fi/php-utf8/
 * @link   http://sourceforge.net/projects/phputf8/
 */
function utf8_to_unicode($str,$strict=false) {
    $mState = 0;     // cached expected number of octets after the current octet
                     // until the beginning of the next UTF8 character sequence
    $mUcs4  = 0;     // cached Unicode character
    $mBytes = 1;     // cached expected number of octets in the current sequence

    $out = array();

    $len = strlen($str);

    for($i = 0; $i < $len; $i++) {

        $in = ord($str{$i});

        if ( $mState == 0) {

            // When mState is zero we expect either a US-ASCII character or a
            // multi-octet sequence.
            if (0 == (0x80 & ($in))) {
                // US-ASCII, pass straight through.
                $out[] = $in;
                $mBytes = 1;

            } else if (0xC0 == (0xE0 & ($in))) {
                // First octet of 2 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x1F) << 6;
                $mState = 1;
                $mBytes = 2;

            } else if (0xE0 == (0xF0 & ($in))) {
                // First octet of 3 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x0F) << 12;
                $mState = 2;
                $mBytes = 3;

            } else if (0xF0 == (0xF8 & ($in))) {
                // First octet of 4 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x07) << 18;
                $mState = 3;
                $mBytes = 4;

            } else if (0xF8 == (0xFC & ($in))) {
                /* First octet of 5 octet sequence.
                 *
                 * This is illegal because the encoded codepoint must be either
                 * (a) not the shortest form or
                 * (b) outside the Unicode range of 0-0x10FFFF.
                 * Rather than trying to resynchronize, we will carry on until the end
                 * of the sequence and let the later error handling code catch it.
                 */
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x03) << 24;
                $mState = 4;
                $mBytes = 5;

            } else if (0xFC == (0xFE & ($in))) {
                // First octet of 6 octet sequence, see comments for 5 octet sequence.
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 1) << 30;
                $mState = 5;
                $mBytes = 6;

            } elseif($strict) {
                /* Current octet is neither in the US-ASCII range nor a legal first
                 * octet of a multi-octet sequence.
                 */
                trigger_error(
                        'utf8_to_unicode: Illegal sequence identifier '.
                            'in UTF-8 at byte '.$i,
                        E_USER_WARNING
                    );
                return false;

            }

        } else {

            // When mState is non-zero, we expect a continuation of the multi-octet
            // sequence
            if (0x80 == (0xC0 & ($in))) {

                // Legal continuation.
                $shift = ($mState - 1) * 6;
                $tmp = $in;
                $tmp = ($tmp & 0x0000003F) << $shift;
                $mUcs4 |= $tmp;

                /*
                 * End of the multi-octet sequence. mUcs4 now contains the final
                 * Unicode codepoint to be output
                 */
                if (0 == --$mState) {

                    /*
                     * Check for illegal sequences and codepoints.
                     */
                    // From Unicode 3.1, non-shortest form is illegal
                    if (((2 == $mBytes) && ($mUcs4 < 0x0080)) ||
                        ((3 == $mBytes) && ($mUcs4 < 0x0800)) ||
                        ((4 == $mBytes) && ($mUcs4 < 0x10000)) ||
                        (4 < $mBytes) ||
                        // From Unicode 3.2, surrogate characters are illegal
                        (($mUcs4 & 0xFFFFF800) == 0xD800) ||
                        // Codepoints outside the Unicode range are illegal
                        ($mUcs4 > 0x10FFFF)) {

                        if($strict){
                            trigger_error(
                                    'utf8_to_unicode: Illegal sequence or codepoint '.
                                        'in UTF-8 at byte '.$i,
                                    E_USER_WARNING
                                );

                            return false;
                        }

                    }

                    if (0xFEFF != $mUcs4) {
                        // BOM is legal but we don't want to output it
                        $out[] = $mUcs4;
                    }

                    //initialize UTF8 cache
                    $mState = 0;
                    $mUcs4  = 0;
                    $mBytes = 1;
                }

            } elseif($strict) {
                /*
                 *((0xC0 & (*in) != 0x80) && (mState != 0))
                 * Incomplete multi-octet sequence.
                 */
                trigger_error(
                        'utf8_to_unicode: Incomplete multi-octet '.
                        '   sequence in UTF-8 at byte '.$i,
                        E_USER_WARNING
                    );

                return false;
            }
        }
    }
    return $out;
}

/*
 * Takes an array of ints representing the Unicode characters and returns
 * a UTF-8 string. Astral planes are supported ie. the ints in the
 * input can be > 0xFFFF. Occurrances of the BOM are ignored. Surrogates
 * are not allowed.
 *
 * If $strict is set to true the function returns false if the input
 * array contains ints that represent surrogates or are outside the
 * Unicode range and raises a PHP error at level E_USER_WARNING
 *
 * Note: this function has been modified slightly in this library to use
 * output buffering to concatenate the UTF-8 string (faster) as well as
 * reference the array by it's keys
 *
 * @param  array of unicode code points representing a string
 * @param  boolean Check for invalid sequences?
 * @return mixed UTF-8 string or false if array contains invalid code points
 * @author <hsivonen@iki.fi>
 * @author Harry Fuecks <hfuecks@gmail.com>
 * @see    utf8_to_unicode
 * @link   http://hsivonen.iki.fi/php-utf8/
 * @link   http://sourceforge.net/projects/phputf8/
 */
function unicode_to_utf8($arr,$strict=false) {
    if (!is_array($arr)) return '';
    ob_start();

    foreach (array_keys($arr) as $k) {

        # ASCII range (including control chars)
        if ( ($arr[$k] >= 0) && ($arr[$k] <= 0x007f) ) {

            echo chr($arr[$k]);

        # 2 byte sequence
        } else if ($arr[$k] <= 0x07ff) {

            echo chr(0xc0 | ($arr[$k] >> 6));
            echo chr(0x80 | ($arr[$k] & 0x003f));

        # Byte order mark (skip)
        } else if($arr[$k] == 0xFEFF) {

            // nop -- zap the BOM

        # Test for illegal surrogates
        } else if ($arr[$k] >= 0xD800 && $arr[$k] <= 0xDFFF) {

            // found a surrogate
            if($strict){
                trigger_error(
                    'unicode_to_utf8: Illegal surrogate '.
                        'at index: '.$k.', value: '.$arr[$k],
                    E_USER_WARNING
                    );
                return false;
            }

        # 3 byte sequence
        } else if ($arr[$k] <= 0xffff) {

            echo chr(0xe0 | ($arr[$k] >> 12));
            echo chr(0x80 | (($arr[$k] >> 6) & 0x003f));
            echo chr(0x80 | ($arr[$k] & 0x003f));

        # 4 byte sequence
        } else if ($arr[$k] <= 0x10ffff) {

            echo chr(0xf0 | ($arr[$k] >> 18));
            echo chr(0x80 | (($arr[$k] >> 12) & 0x3f));
            echo chr(0x80 | (($arr[$k] >> 6) & 0x3f));
            echo chr(0x80 | ($arr[$k] & 0x3f));

        } elseif($strict) {

            trigger_error(
                'unicode_to_utf8: Codepoint out of Unicode range '.
                    'at index: '.$k.', value: '.$arr[$k],
                E_USER_WARNING
                );

            // out of range
            return false;
        }
    }

    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

/*
 * Replace bad bytes with an alternative character
 *
 * ASCII character is recommended for replacement char
 *
 * PCRE Pattern to locate bad bytes in a UTF-8 string
 * Comes from W3 FAQ: Multilingual Forms
 * Note: modified to include full ASCII range including control chars
 *
 * @author Harry Fuecks <hfuecks@gmail.com>
 * @see http://www.w3.org/International/questions/qa-forms-utf-8
 * @param string to search
 * @param string to replace bad bytes with (defaults to '?') - use ASCII
 * @return string
 */
function utf8_bad_replace($str, $replace = '') {
    $UTF8_BAD =
     '([\x00-\x7F]'.                          # ASCII (including control chars)
     '|[\xC2-\xDF][\x80-\xBF]'.               # non-overlong 2-byte
     '|\xE0[\xA0-\xBF][\x80-\xBF]'.           # excluding overlongs
     '|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}'.    # straight 3-byte
     '|\xED[\x80-\x9F][\x80-\xBF]'.           # excluding surrogates
     '|\xF0[\x90-\xBF][\x80-\xBF]{2}'.        # planes 1-3
     '|[\xF1-\xF3][\x80-\xBF]{3}'.            # planes 4-15
     '|\xF4[\x80-\x8F][\x80-\xBF]{2}'.        # plane 16
     '|(.{1}))';                              # invalid byte
    ob_start();
    while (preg_match('/'.$UTF8_BAD.'/S', $str, $matches)) {
        if ( !isset($matches[2])) {
            echo $matches[0];
        } else {
            echo $replace;
        }
        $str = substr($str,strlen($matches[0]));
    }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

/*
 * URL-Encode a filename to allow unicodecharacters
 *
 * Slashes are not encoded
 *
 * When the second parameter is true the string will
 * be encoded only if non ASCII characters are detected -
 * This makes it safe to run it multiple times on the
 * same string (default is true)
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    urlencode
 */
function utf8_encodeFN($file,$safe=true){
  if($safe && preg_match('#^[a-zA-Z0-9/_\-.%]+$#',$file)){
    return $file;
  }
  $file = urlencode($file);
  $file = str_replace('%2F','/',$file);
  return $file;
}

/*
 * URL-Decode a filename
 *
 * This is just a wrapper around urldecode
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @see    urldecode
 */
function utf8_decodeFN($file){
  $file = urldecode($file);
  return $file;
}

/*
 * Moved some functions from framework/functions.php to here - thorn
 */

/*
 * Decode HTML entities to UTF-8 characters
 * 
 * Will replace all numeric and named entities, except
 * &gt; &lt; &apos; &quot; &#39; &nbsp;
 * 
 * @param  string UTF-8 or ASCII encoded string
 * @return string UTF-8 encoded string with numeric and named entities replaced.
 */
function utf8_entities_to_umlauts($str) {
	global $named_to_numbered_entities;
	// we have to prevent "&#39;" from beeing decoded
	$str = str_replace("&#39;", "&_#39;", $str);
	$str = strtr($str, $named_to_numbered_entities);
	$str = utf8_unhtml($str);
	$str = str_replace("&_#39;", "&#39;", $str);

	return($str);
}

/*
 * Encode UTF-8 characters to HTML entities
 *
 * Will replace all UTF-8 encoded characters to numeric/named entities
 *
 * @param  string UTF-8 encoded string
 * @param  bool Replace numbered by named entities
 * @return string ASCII encoded string with all UTF-8 characters replaced by numeric/named entities
 */
function utf8_umlauts_to_entities($str, $named_entities=true) {
	global $numbered_to_named_entities;
	$str = utf8_tohtml($str);
	if($named_entities)
		$str = strtr($str, $numbered_to_named_entities);
	return($str);
}

/*
 * Converts from various charsets to UTF-8
 *
 * Will convert a string from various charsets to UTF-8.
 * HTML-entities will be converted, too.
 * In case of error the returned string is unchanged, and a message is emitted.
 * Supported charsets are:
 * direct: iso_8859_1 iso_8859_2 iso_8859_3 iso_8859_4 iso_8859_5
 *         iso_8859_6 iso_8859_7 iso_8859_8 iso_8859_9 iso_8859_10 iso_8859_11
 * mb_convert_encoding: all wb charsets (except those from 'direct'); but not GB2312
 * iconv:  all wb charsets (except those from 'direct')
 *
 * @param  string  A string in supported encoding
 * @param  string  The charset to convert from, defaults to DEFAULT_CHARSET
 * @return string  A string in UTF-8-encoding, with all entities decoded, too.
 *                 String is unchanged in case of error.
 */
function charset_to_utf8($str, $charset_in=DEFAULT_CHARSET) {
	global $iso_8859_2_to_utf8, $iso_8859_3_to_utf8, $iso_8859_4_to_utf8, $iso_8859_5_to_utf8, $iso_8859_6_to_utf8, $iso_8859_7_to_utf8, $iso_8859_8_to_utf8, $iso_8859_9_to_utf8, $iso_8859_10_to_utf8, $iso_8859_11_to_utf8;
	$charset_in = strtoupper($charset_in);
	if ($charset_in == "") { $charset_in = 'UTF-8'; }
	$wrong_ISO8859 = false;
	$converted = false;

	if((!function_exists('iconv') && !UTF8_MBSTRING && ($charset_in=='big5' || $charset_in=='iso-2022-jp' || $charset_in=='iso-2022-kr')) || (!function_exists('iconv') && $charset_in=='gb2312')) {
		// Nothing we can do here :-(
		// Charset is one of those obscure ISO-2022... or BIG5, GB2312 or something
		// and we can't use mb_convert_encoding() or iconv();
		// Emit an error-message.
		trigger_error("Can't convert from $charset_in without mb_convert_encoding() or iconv(). Use UTF-8 instead.", E_USER_WARNING);
		return($str);
	}

	// check if we have UTF-8 or a plain ASCII string
	if($charset_in == 'UTF-8' || utf8_isASCII($str)) {
		// we have utf-8. Just replace HTML-entities and return
		if(preg_match('/&[#0-9a-zA-Z]+;/',$str))
			return(utf8_entities_to_umlauts($str));
		else // nothing to do
			return($str);
	}
	
	// Convert $str to utf8
	if(substr($charset_in,0,8) == 'ISO-8859') {
		switch($charset_in) {
			case 'ISO-8859-1': $str=utf8_encode($str); break;
			case 'ISO-8859-2': $str=strtr($str, $iso_8859_2_to_utf8); break;
			case 'ISO-8859-3': $str=strtr($str, $iso_8859_3_to_utf8); break;
			case 'ISO-8859-4': $str=strtr($str, $iso_8859_4_to_utf8); break;
			case 'ISO-8859-5': $str=strtr($str, $iso_8859_5_to_utf8); break;
			case 'ISO-8859-6': $str=strtr($str, $iso_8859_6_to_utf8); break;
			case 'ISO-8859-7': $str=strtr($str, $iso_8859_7_to_utf8); break;
			case 'ISO-8859-8': $str=strtr($str, $iso_8859_8_to_utf8); break;
			case 'ISO-8859-9': $str=strtr($str, $iso_8859_9_to_utf8); break;
			case 'ISO-8859-10': $str=strtr($str, $iso_8859_10_to_utf8); break;
			case 'ISO-8859-11': $str=strtr($str, $iso_8859_11_to_utf8); break;
			default: $wrong_ISO8859 = true;
		}
		if(!$wrong_ISO8859)
			$converted = true;
	}
	if(!$converted && UTF8_MBSTRING && $charset_in != 'GB2312') {
		// $charset is neither UTF-8 nor a known ISO-8859...
		// Try mb_convert_encoding() - but there's no GB2312 encoding in php's mb_* functions
		$str = mb_convert_encoding($str, 'UTF-8', $charset_in);
		$converted = true;
	} elseif(!$converted) { // Try iconv
		if(function_exists('iconv')) {
			$str = iconv($charset_in, 'UTF-8', $str);
			$converted = true;
		}
	}
	if($converted) {
		// we have utf-8, now replace HTML-entities and return
		if(preg_match('/&[#0-9a-zA-Z]+;/',$str))
			$str = utf8_entities_to_umlauts($str);
		// just to be sure, replace bad characters
		$str = utf8_bad_replace($str, '?');
		return($str);
	}
	
	// Nothing we can do here :-(
	// Charset is one of those obscure ISO-2022... or BIG5, GB2312 or something
	// and we can't use mb_convert_encoding() or iconv();
	// Emit an error-message.
	trigger_error("Can't convert from $charset_in without mb_convert_encoding() or iconv(). Use UTF-8 instead.", E_USER_WARNING);
	
	return $str;
}

/*
 * Converts from UTF-8 to various charsets
 *
 * Will convert a string from UTF-8 to various charsets.
 * HTML-entities will be converted, too.
 * In case of error the returned string is unchanged, and a message is emitted.
 * Supported charsets are:
 * direct: iso_8859_1 iso_8859_2 iso_8859_3 iso_8859_4 iso_8859_5
 *         iso_8859_6 iso_8859_7 iso_8859_8 iso_8859_9 iso_8859_10 iso_8859_11
 * mb_convert_encoding: all wb charsets (except those from 'direct'); but not GB2312
 * iconv:  all wb charsets (except those from 'direct')
 *
 * @param  string  An UTF-8 encoded string
 * @param  string  The charset to convert to, defaults to DEFAULT_CHARSET
 * @return string  A string in a supported encoding, with all entities decoded, too.
 *                 String is unchanged in case of error.
 */
function utf8_to_charset($str, $charset_out=DEFAULT_CHARSET) {
	global $utf8_to_iso_8859_2, $utf8_to_iso_8859_3, $utf8_to_iso_8859_4, $utf8_to_iso_8859_5, $utf8_to_iso_8859_6, $utf8_to_iso_8859_7, $utf8_to_iso_8859_8, $utf8_to_iso_8859_9, $utf8_to_iso_8859_10, $utf8_to_iso_8859_11;
	$charset_out = strtoupper($charset_out);
	$wrong_ISO8859 = false;
	$converted = false;

	if((!function_exists('iconv') && !UTF8_MBSTRING && ($charset_out=='big5' || $charset_out=='iso-2022-jp' || $charset_out=='iso-2022-kr')) || (!function_exists('iconv') && $charset_out=='gb2312')) {
		// Nothing we can do here :-(
		// Charset is one of those obscure ISO-2022... or BIG5, GB2312 or something
		// and we can't use mb_convert_encoding() or iconv();
		// Emit an error-message.
		trigger_error("Can't convert into $charset_out without mb_convert_encoding() or iconv(). Use UTF-8 instead.", E_USER_WARNING);
		return($str);
	}
	
	// replace HTML-entities first
	if(preg_match('/&[#0-9a-zA-Z]+;/',$str))
		$str = utf8_entities_to_umlauts($str);
	
	// check if we need to convert
	if($charset_out == 'UTF-8' || utf8_isASCII($str)) {
		// Nothing to do. Just return
			return($str);
	}
	
	// Convert $str to $charset_out
	if(substr($charset_out,0,8) == 'ISO-8859') {
		switch($charset_out) {
			case 'ISO-8859-1': $str=utf8_decode($str); break;
			case 'ISO-8859-2': $str=strtr($str, $utf8_to_iso_8859_2); break;
			case 'ISO-8859-3': $str=strtr($str, $utf8_to_iso_8859_3); break;
			case 'ISO-8859-4': $str=strtr($str, $utf8_to_iso_8859_4); break;
			case 'ISO-8859-5': $str=strtr($str, $utf8_to_iso_8859_5); break;
			case 'ISO-8859-6': $str=strtr($str, $utf8_to_iso_8859_6); break;
			case 'ISO-8859-7': $str=strtr($str, $utf8_to_iso_8859_7); break;
			case 'ISO-8859-8': $str=strtr($str, $utf8_to_iso_8859_8); break;
			case 'ISO-8859-9': $str=strtr($str, $utf8_to_iso_8859_9); break;
			case 'ISO-8859-10': $str=strtr($str, $utf8_to_iso_8859_10); break;
			case 'ISO-8859-11': $str=strtr($str, $utf8_to_iso_8859_11); break;
			default: $wrong_ISO8859 = true;
		}
		if(!$wrong_ISO8859)
			$converted = true;
	}
	if(!$converted && UTF8_MBSTRING && $charset_out != 'GB2312') {
		// $charset is neither UTF-8 nor a known ISO-8859...
		// Try mb_convert_encoding() - but there's no GB2312 encoding in php's mb_* functions
		$str = mb_convert_encoding($str, $charset_out, 'UTF-8');
		$converted = true;
	} elseif(!$converted) { // Try iconv
		if(function_exists('iconv')) {
			$str = iconv('UTF-8', $charset_out, $str);
			$converted = true;
		}
	}
	if($converted) {
		return($str);
	}
	
	// Nothing we can do here :-(
	// Charset is one of those obscure ISO-2022... or BIG5, GB2312 or something
	// and we can't use mb_convert_encoding() or iconv();
	// Emit an error-message.
	trigger_error("Can't convert into $charset_out without mb_convert_encoding() or iconv(). Use UTF-8 instead.", E_USER_WARNING);
	
	return $str;
}

/*
 * convert Filenames to ASCII
 *
 * Convert all non-ASCII characters and all HTML-entities to their plain 7bit equivalents
 * Characters without an equivalent will be converted to hex-values.
 * The name entities_to_7bit() is somewhat misleading, but kept for compatibility-reasons.
 *
 * @param  string  Filename to convert (all encodings from charset_to_utf8() are allowed)
 * @return string  ASCII encoded string, to use as filename in wb's page_filename() and media_filename
 */
function entities_to_7bit($str) {
	// convert to UTF-8
	$str = charset_to_utf8($str);
	if(!utf8_check($str))
		return($str);
	// replace some specials
	$str = utf8_stripspecials($str, '_');
	// translate non-ASCII characters to ASCII
	$str = utf8_romanize($str);
	// missed some? - Many UTF-8-chars can't be romanized
	// convert to HTML-entities, and replace entites by hex-numbers
	$str = utf8_umlauts_to_entities($str, false);
	$str = str_replace('&#39;', '&apos;', $str);
	$str = preg_replace('/&#([0-9]+);/e', "dechex('$1')",  $str);
	// maybe there are some &gt; &lt; &apos; &quot; &amp; &nbsp; left, replace them too
	$entities = array('&gt;'=>'_','&lt;'=>'_','&apos;'=>'_','&quot;'=>'_','&amp;'=>'_','&nbsp;'=>' ');
	$str = strtr($str, $entities);
	
	return($str);
}

/*
 * Convert a string from mixed html-entities/umlauts to pure $charset_out-umlauts
 * 
 * Will replace all numeric and named entities except
 * &gt; &lt; &apos; &quot; &#39; &nbsp;
 * In case of error the returned string is unchanged, and a message is emitted.
 * Supported charsets are:
 * direct: iso_8859_1 iso_8859_2 iso_8859_3 iso_8859_4 iso_8859_5
 *         iso_8859_6 iso_8859_7 iso_8859_8 iso_8859_9 iso_8859_10 iso_8859_11
 * mb_convert_encoding: all wb charsets (except those from 'direct'); but not GB2312
 * iconv:  all wb charsets (except those from 'direct')
 * 
 * @param  string  A string in DEFAULT_CHARSET encoding
 * @return string  A string in $charset_out encoding with numeric and named entities replaced.
 *         The string is unchanged in case of error. 
 */
function entities_to_umlauts2($string, $charset_out=DEFAULT_CHARSET) {
	$string = charset_to_utf8($string, DEFAULT_CHARSET);
	//if(utf8_check($string)) // this is to much time-consuming
		$string = utf8_to_charset($string, $charset_out);
	return ($string);
}

/*
 * Convert a string from mixed html-entities/umlauts to pure ASCII with HTML-entities
 * 
 * Will convert a string in $charset_in encoding to a pure ASCII string with HTML-entities.
 * In case of error the returned string is unchanged, and a message is emitted.
 * Supported charsets are:
 * direct: iso_8859_1 iso_8859_2 iso_8859_3 iso_8859_4 iso_8859_5
 *         iso_8859_6 iso_8859_7 iso_8859_8 iso_8859_9 iso_8859_10 iso_8859_11
 * mb_convert_encoding: all wb charsets (except those from 'direct'); but not GB2312
 * iconv:  all wb charsets (except those from 'direct')
 * 
 * @param  string  A string in $charset_in encoding
 * @return string  A string in ASCII encoding with numeric and named entities.
 *         The string is unchanged in case of error. 
 */
function umlauts_to_entities2($string, $charset_in=DEFAULT_CHARSET) {
	$string = charset_to_utf8($string, $charset_in);
	//if(utf8_check($string)) // this is to much time-consuming
		$string = utf8_umlauts_to_entities($string);
	return($string);
}

?>