<?php
/* 
----------------------------------------------------------------------------------------------
PHP (Util library)
Name: Doccument.php
---------------------------------------------------------------------------------------------- 
Create by: Jaraspong Chokchaisiri (Soft. Engineer & Web Developer)
Create Date: 19 November 2012
-------------------------------------------------- --------------------------------------------
Require File : 
----------------------------------------------------------------------------------------------
*/
class Document{
	/**
	 * Array of linked scripts
	 *
	 * @var     array
	 * @access  private
	 */
	var $_scripts = array();

	/**
	 * Array of scripts placed in the header
	 *
	 * @var     array
	 * @access  private
	 */
	var $_script = array();

	/**
	 * Output HTML
	 *
	 * @var     string 
	 * @access  private
	 */
	var $strHtml = '';

	/**
	 * Array of linked style sheets
	 *
	 * @var     array
	 * @access  private
	 */
	var $_styleSheets = array();

	/**
	 * Adds a linked stylesheet to the page
	 *
	 * @param   string  $url    URL to the linked style sheet
	 * @param   string  $type   Mime encoding type
	 * @param   string  $media  Media type that this stylesheet applies to
	 * @access  public
	 */
	function addStyleSheet($url, $type = 'text/css', $media = null, $attribs = array()) {
		$this->_styleSheets[$url]['mime']		= $type;
		$this->_styleSheets[$url]['media']		= $media;
		$this->_styleSheets[$url]['attribs']            = $attribs;
	}

	/**
	 * Adds a linked script to the page
	 *
	 * @param   string  $url	URL to the linked script
	 * @param   string  $type	Type of script. Defaults to 'text/javascript'
	 * @access  public
	 */
	function addScript($url, $type="text/javascript") {
		$this->_scripts[$url] = $type;
	}
	
        /**
	 * Adds a script to the page
	 *
	 * @access  public
	 * @param   string  $content    Script
	 * @param   string  $type       Scripting mime (defaults to 'text/javascript')
	 * @return  void
	 */
	function addScriptDeclaration($content, $type = 'text/javascript') {
		if (!isset($this->_script[strtolower($type)])) {
			$this->_script[strtolower($type)] = $content;
		} else {
			$this->_script[strtolower($type)] .= chr(13).$content;
		}
	}
        
	/**
	 * Render scripts to the page
	 *
	 * @access   public
	 * @return   void
	 */
	function render(){

		$_tab = "\11";
		$_lineEnd = "\15\12";
		$tagEnd = "/>";

		if(!empty($this->_styleSheets)){
			// Generate stylesheet links
			foreach ($this->_styleSheets as $strSrc => $strAttr) {
				$strHtml .= '<link rel="stylesheet" href="'.$strSrc.'" type="'.$strAttr['mime'].'"';
				if (!is_null($strAttr['media'])){
					$strHtml .= ' media="'.$strAttr['media'].'" ';
				}

				$strHtml .= $tagEnd.$_lineEnd;
			}
		}
		
		if(!empty($this->_scripts)){
			// Generate script file links		
			foreach ($this->_scripts as $strSrc => $strType) {
				$strHtml .= $_tab.'<script type="'.$strType.'" src="'.$strSrc.'"></script>'.$_lineEnd ;
			}
		}

		if(!empty($this->_script)){
			// Generate script declarations
			foreach ($this->_script as $type => $content) {
				$strHtml .= $_tab.'<script type="'.$type.'">'.$_lineEnd;
				$strHtml .= $content.$_lineEnd;
				$strHtml .= $_tab.'</script>'.$_lineEnd;
			}
		}
		//render output to header
		echo $strHtml;
	}
}