/***********************************************
* Different CSS depending on OS (mac/pc)- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var csstype="external" //Specify type of CSS to use. "Inline" or "external"

var mac_css='body{font-size: 14pt; }' //if "inline", specify mac css here
var pc_css='body{font-size: 12pt; }' //if "inline", specify PC/default css here

var mac_externalcss='css/mac.css' //if "external", specify Mac css file here
var pc_externalcss='css/windows.css'   //if "external", specify PC/default css file here

///////No need to edit beyond here////////////

var mactest=navigator.userAgent.indexOf("Mac")!=-1
if (csstype=="inline"){
    document.write('<style type="text/css">');
    if (mactest)
        document.write(mac_css)
    else
        document.write(pc_css);
        document.write('</style>');
}
else if (csstype=="external") {
	document.write('<link rel="stylesheet" type="text/css" href="'+ (mactest? mac_externalcss : pc_externalcss) +'">')
}
