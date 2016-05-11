RTE {
	classes {
		file {
			name = Datei
		}
		folder {
			name = Ordner
		}
		folder-open {
			name = Ordner geoeffnet
		}
		file-code {
			name = Datei (Code)
		}
		file-image {
			name = Datei (Bild)
		}
		file-pdf {
			name = Datei (Pdf)
		}
		file-text {
			name = Datei (Text)
		}	
		filelist-level-1
		{
			name = Dateiliste (Ebene 1)
		}
		filelist-level-2
		{
			name = Dateiliste (Ebene 2)
		}
		filelist-level-3
		{
			name = Dateiliste (Ebene 3)
		}
		filelist-level-4
		{
			name = Dateiliste (Ebene 4)
		}
		filelist-level-5
		{
			name = Dateiliste (Ebene 5)
		}
	}
}

RTE.config.tx_njtutorials_domain_model_tutorialitem.content {

	############################
	# General settings
	############################
	
	useCSS = 0
	#own defined classes have to be in this file too, otherwise they will not be shown
	#(just list by name, the styles will not have any effect in frontend)
	contentCSS = typo3conf/ext/nj_tutorials/Resources/Public/Css/rte.css
	
	ignoreMainStyleOverride = 0
	
	mainStyleOverride (	
	)
	
	# removes HTML-Comments from source-code (especially useful at copy and paste)
	removeComments = 1
	
	# tries to cleanup pasted content out of word
	enableWordClean = 1
	
	disableColorPicker = 0
	
	keepButtonGroupTogether = 0
	keepToggleBordersInToolbar = 0
	
	showTagFreeClasses = 1
	buttons.textstyle.showTagFreeClasses = 1
	buttons.blockstyle.showTagFreeClasses = 1 
	
	
	#shows status bar at the bottom of the editor
	showStatusBar = 1

	RTEWidthOverride = 90%
	RTEHeightOverride = 500
	rteResize = 1
	
	############################
	# Available buttons
	############################
	
	### Text decoration
	# bgcolor, bold, center, fontsize, fontstyle, indent, italic, justifyfull, left, lefttoright,
	# outdent, right, righttoleft, strikethrough, subscript, superscript, textcolor, underline,

	### Style
	# blockstyle, blockstylelabel, class, formatblock, textstyle, textstylelabel,

	### Table
	# celldelete, cellinsertafter, cellinsertbefore, cellmerge, cellproperties, cellsplit, 
	# columndelete, columninsertafter, columninsertbefore, columnsplit,
	# rowdelete, rowinsertabove, rowinsertunder, rowproperties, rowsplit,
	# table, tableproperties, toggleborders,

	### Elements
	# acronym, code, definitionlist, definitionitem, emoticon, image, insertcharacter, line, link, orderedlist, unorderedlist, user,

	### Functions
	#	about, chMode, copy, cut, editelement, findreplace, inserttag, language, paste, redo, removeformat, showhelp, showlanguagemarks, showmicrodata, spellcheck, textindicator, undo,

	showButtons = * 
	
	hideButtons (
		about,bgcolor,celldelete,cellinsertafter,cellinsertbefore,cellmerge,cellproperties,cellsplit,columndelete,columninsertafter,columninsertbefore,columnsplit,emoticon,fontsize,fontstyle,image,line,lefttoright,righttoleft,rowdelete,rowinsertabove,rowinsertunder,rowproperties,rowsplit,spellcheck,table,tableproperties,textcolor,textindicator,toggleborders,underline,
	)
	
	toolbarOrder (
			bar,
				copy, cut, paste, undo, redo,
			bar,
				bold, italic, strikethrough, subscript, superscript,
			bar,
				left, center, right, justifyfull,
			bar,
				orderedlist, unorderedlist, definitionlist, definitionitem,
			bar,
				indent, outdent,
			bar,
				link, unlink, insertcharacter, acronym, user,
		linebreak,
			bar,
				formatblock, textstylelabel, textstyle, blockstylelabel, blockstyle, class,
		linebreak,
			bar,
				chMode,
			bar,
				inserttag,
			bar,
				code,
			bar,
				editelement,
			bar,
				removeformat,
			bar,
				findreplace,
			bar,
				showhelp
	)
	
	
	buttons.formatblock.removeItems (
		address, 
		article, 
		aside,
		footer,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		header,
		nav,
		pre,
		section,
	)
	

	
	buttons.blockstyle.tags.ul.allowedClasses := addToList(file,folder)
	buttons.blockstyle.tags.li.allowedClasses := addToList(
		file,file-code,file-image,file-pdf,file-text,
		filelist-level-1,filelist-level-2,filelist-level-3,filelist-level-4,filelist-level-5,
		folder,folder-open
	)
	
	proc {
		overrideMode = css_transform
		allowedClasses := addToList(file,folder)
		dontConvBRtoParagraph = 1
		denyTags = font,u
	}
}

RTE.config.tx_njtutorials_domain_model_tutorialitem.content.FE.proc < RTE.config.tx_njtutorials_domain_model_tutorialitem.content.proc

lib.parseFunc_RTE {
  externalBlocks := addToList(li.file-code)
  externalBlocks {
    ul.stripNL = 1
    ul.callRecursive = 1
    ul.callRecursive.tagStdWrap.HTMLparser = 1
    ul.callRecursive.tagStdWrap.HTMLparser.tags.li.file-code {
      fixAttrib.class = file.code
    }
  }
}

RTE {
classes >
}