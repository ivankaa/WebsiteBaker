<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2007, Ryan Djurovich

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
Character Conversion file
Some special translations
*/
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

//for Xinha, (htmlarea)
$string_conv=array(
	"Š"=>"&Scaron;","š"=>"&scaron;","Œ"=>"&OElig;","œ"=>"&oelig;","Ÿ"=>"&Yuml;",
	">"=>"&gt;","<"=>"&lt;",
	"„"=>"&bdquo;","•"=>"&bull;","ˆ"=>"&circ;","&#925;"=>"&Nu;","&#957;"=>"&nu;",
	"&#931;"=>"&Sigma;","&#933;"=>"&Upsilon;","&#965;"=>"&upsilon;",
	"&#918;"=>"&Zeta;","&#950;"=>"&zeta;","&#958;"=>"&xi;","&#914;"=>"&Beta;","&#946;"=>"&beta;",
	"&#8734;"=>"&infin;","&#8596;"=>"&harr;","&#8260;"=>"&frasl;","&#919;"=>"&Eta;","&#951;"=>"&eta;",
	"&#935;"=>"&Chi;","&#8745;"=>"&cap;","&and;"=>"&#8743;","&#913;"=>"&Alpha;","&#945;"=>"&alpha;",
	"&#8776;"=>"&asymp;","™"=>"&trade;","˜"=>"&tilde;","&#8804;"=>"&le;",
	"&#916;"=>"&Delta;","&#948;"=>"&delta;","€"=>"&euro;","ƒ"=>"&fnof;",
	"&#915;"=>"&Gamma;","&#947;"=>"&gamma;","&#8805;"=>"&ge;","&#9829;"=>"&hearts;",
	"…"=>"&hellip;","&#8747;"=>"&int;","&#921;"=>"&Iota;","&#953;"=>"&iota;",
	"&#922;"=>"&Kappa;","&#954;"=>"&kappa;","&#923;"=>"&Lambda;","&#955;"=>"&lambda;",
	"&#8592;"=>"&larr;","“"=>"&ldquo;","&#9674;"=>"&loz;",
	"‹"=>"&lsaquo;","‘"=>"&lsquo;","—"=>"&mdash;","&#8800;"=>"&ne;",
	"&#8722;"=>"&minus;","&#924;"=>"&Mu;","&#956;"=>"&mu;","–"=>"&ndash;",
	"&#8254;"=>"&oline;","&#937;"=>"&Omega;","&#969;"=>"&omega;","&#959;"=>"&omicron;",
	"&#934;"=>"&Phi;","&#966;"=>"&phi;","&#928;"=>"&Pi;","&#960;"=>"&pi;","&#8706;"=>"&part;",
	"‰"=>"&permil;","&#8243;"=>"&Prime;","&#8242;"=>"&prime;","&#8719;"=>"&prod;",
	"&#936;"=>"&Psi;","&#8730;"=>"&radic;","&#8658;"=>"&rArr;","&#8594;"=>"&rarr;",
	"”"=>"&rdquo;","&#929;"=>"&Rho;","&#961;"=>"&rho;",
	"›"=>"&rsaquo;","’"=>"&rsquo;","‚"=>"&sbquo;",
	"&#963;"=>"&sigma;","&#962;"=>"&sigmaf;","&#9824;"=>"&spades;","&#8721;"=>"&sum;",
	"&#932;"=>"&Tau;","&#964;"=>"&tau;","&#920;"=>"&Theta;","&#952;"=>"&theta;",
	"&#8593;"=>"&uarr;","&#926;"=>"&Xi;"
);

//for fckeditor, (tiny_mce)
$string_entities_conv=array(
	"&#140;"=>"&OElig;","&#156;"=>"&oelig;","&#138;"=>"&Scaron;","&#154;"=>"&scaron;",
	"&#159;"=>"&Yuml;",
	"&#152;"=>"&tilde;","&upsih;"=>"&#978;","&#149;"=>"&bull;","&#153;"=>"&trade;",
	"&#132;"=>"&bdquo;","&#136;"=>"&circ;","&#128;"=>"&euro;","&#131;"=>"&fnof;",
	"&#133;"=>"&hellip;","&lang;"=>"&#9001;","&lceil;"=>"&#8968;","&#147;"=>"&ldquo;",
	"&lfloor;"=>"&#8970;","&#150;"=>"&ndash;","&#151;"=>"&mdash;",
	"&#139;"=>"&lsaquo;","&#145;"=>"&lsquo;","&rfloor;"=>"&#8971;","&#148;"=>"&rdquo;",
	"&rceil;"=>"&#8969;","&rang;"=>"&#9002;","&piv;"=>"&#982;","&#137;"=>"&permil;",
	"&#155;"=>"&rsaquo;","&#146;"=>"&rsquo;","&#130;"=>"&sbquo;","&thetasym;"=>"&#977"
);

?>