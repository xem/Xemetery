var isCompatible=function(){if(navigator.appVersion.indexOf('MSIE')!==-1&&parseFloat(navigator.appVersion.split('MSIE')[1])<6){return false;}return true;};var startUp=function(){mediaWiki.loader.register([["site","1322827439",[],"site"],["startup","20130207212521",[],"startup"],["user","1322827439",[],"user"],["user.options","1322827439",[],"private"],["skins.vector","1322827439",[]],["skins.monobook","1322827439",[]],["skins.simple","1322827439",[]],["skins.chick","1322827439",[]],["skins.modern","1322827439",[]],["skins.cologneblue","1322827439",[]],["skins.nostalgia","1322827439",[]],["skins.standard","1322827439",[]],["jquery","1322827439",[]],["jquery.async","1322827439",[]],["jquery.autoEllipsis","1322827439",["jquery.highlightText"]],["jquery.checkboxShiftClick","1322827439",[]],["jquery.client","1322827439",[]],["jquery.collapsibleTabs","1322827439",[]],["jquery.color","1322827439",[]],["jquery.cookie","1322827439",[]],["jquery.delayedBind","1322827439",[]],[
"jquery.expandableField","1322827439",[]],["jquery.highlightText","1322827439",[]],["jquery.placeholder","1322827439",[]],["jquery.localize","1322827439",[]],["jquery.suggestions","1322827439",["jquery.autoEllipsis"]],["jquery.tabIndex","1322827439",[]],["jquery.textSelection","1322827439",[]],["jquery.tipsy","1322827439",[]],["jquery.ui.core","1322827439",["jquery"]],["jquery.ui.widget","1322827439",[]],["jquery.ui.mouse","1322827439",["jquery.ui.widget"]],["jquery.ui.position","1322827439",[]],["jquery.ui.draggable","1322827439",["jquery.ui.core","jquery.ui.mouse","jquery.ui.widget"]],["jquery.ui.droppable","1322827439",["jquery.ui.core","jquery.ui.mouse","jquery.ui.widget","jquery.ui.draggable"]],["jquery.ui.resizable","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.mouse"]],["jquery.ui.selectable","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.mouse"]],["jquery.ui.sortable","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.mouse"]],[
"jquery.ui.accordion","1322827439",["jquery.ui.core","jquery.ui.widget"]],["jquery.ui.autocomplete","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.position"]],["jquery.ui.button","1322827439",["jquery.ui.core","jquery.ui.widget"]],["jquery.ui.datepicker","1322827439",["jquery.ui.core"]],["jquery.ui.dialog","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.button","jquery.ui.draggable","jquery.ui.mouse","jquery.ui.position","jquery.ui.resizable"]],["jquery.ui.progressbar","1322827439",["jquery.ui.core","jquery.ui.widget"]],["jquery.ui.slider","1322827439",["jquery.ui.core","jquery.ui.widget","jquery.ui.mouse"]],["jquery.ui.tabs","1322827439",["jquery.ui.core","jquery.ui.widget"]],["jquery.effects.core","1322827439",["jquery"]],["jquery.effects.blind","1322827439",["jquery.effects.core"]],["jquery.effects.bounce","1322827439",["jquery.effects.core"]],["jquery.effects.clip","1322827439",["jquery.effects.core"]],["jquery.effects.drop","1322827439",[
"jquery.effects.core"]],["jquery.effects.explode","1322827439",["jquery.effects.core"]],["jquery.effects.fold","1322827439",["jquery.effects.core"]],["jquery.effects.highlight","1322827439",["jquery.effects.core"]],["jquery.effects.pulsate","1322827439",["jquery.effects.core"]],["jquery.effects.scale","1322827439",["jquery.effects.core"]],["jquery.effects.shake","1322827439",["jquery.effects.core"]],["jquery.effects.slide","1322827439",["jquery.effects.core"]],["jquery.effects.transfer","1322827439",["jquery.effects.core"]],["mediawiki","1322827439",[]],["mediawiki.util","1322827439",["jquery.checkboxShiftClick","jquery.client","jquery.placeholder"]],["mediawiki.action.history","1322827439",["mediawiki.legacy.history"]],["mediawiki.action.edit","1322827439",[]],["mediawiki.action.view.rightClickEdit","1322827439",[]],["mediawiki.special.preferences","1322827439",[]],["mediawiki.special.search","1322827439",[]],["mediawiki.language","1322827439",[]],["mediawiki.legacy.ajax",
"20121128082154",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.ajaxwatch","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.block","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.commonPrint","1322827439",[]],["mediawiki.legacy.config","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.diff","1322827439",["mediawiki.legacy.wikibits"],"mediawiki.action.history"],["mediawiki.legacy.edit","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.enhancedchanges","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.history","1322827439",["mediawiki.legacy.wikibits"],"mediawiki.action.history"],["mediawiki.legacy.htmlform","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.IEFixes","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.metadata","20130207212521",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.mwsuggest","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.prefs","1322827439",[
"mediawiki.legacy.wikibits","mediawiki.legacy.htmlform"]],["mediawiki.legacy.preview","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.protect","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.search","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.shared","1322827439",[]],["mediawiki.legacy.oldshared","1322827439",[]],["mediawiki.legacy.upload","1322827439",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.wikibits","20121128082154",["mediawiki.language"]],["mediawiki.legacy.wikiprintable","1322827439",[]]]);mediaWiki.config.set({"wgLoadScript":"/load.php","debug":false,"skin":"vector","stylepath":"/skins","wgUrlProtocols":"http\\:\\/\\/|https\\:\\/\\/|ftp\\:\\/\\/|irc\\:\\/\\/|gopher\\:\\/\\/|telnet\\:\\/\\/|nntp\\:\\/\\/|worldwind\\:\\/\\/|mailto\\:|news\\:|svn\\:\\/\\/|git\\:\\/\\/|mms\\:\\/\\/","wgArticlePath":"/$1","wgScriptPath":"","wgScriptExtension":".php","wgScript":"/index.php","wgVariantArticlePath":false,"wgActionPaths":[],
"wgServer":"http://devwiki.crossknowledge.com","wgUserLanguage":"fr","wgContentLanguage":"fr","wgVersion":"1.17.0","wgEnableAPI":true,"wgEnableWriteAPI":true,"wgSeparatorTransformTable":[",	."," 	,"],"wgDigitTransformTable":["",""],"wgMainPageTitle":"Accueil","wgFormattedNamespaces":{"-2":"Média","-1":"Spécial","0":"","1":"Discussion","2":"Utilisateur","3":"Discussion utilisateur","4":"CrossKnowledge Dev Wiki","5":"Discussion CrossKnowledge Dev Wiki","6":"Fichier","7":"Discussion fichier","8":"MediaWiki","9":"Discussion MediaWiki","10":"Modèle","11":"Discussion modèle","12":"Aide","13":"Discussion aide","14":"Catégorie","15":"Discussion catégorie"},"wgNamespaceIds":{"média":-2,"spécial":-1,"":0,"discussion":1,"utilisateur":2,"discussion_utilisateur":3,"crossknowledge_dev_wiki":4,"discussion_crossknowledge_dev_wiki":5,"fichier":6,"discussion_fichier":7,"mediawiki":8,"discussion_mediawiki":9,"modèle":10,"discussion_modèle":11,"aide":12,"discussion_aide":13,"catégorie":14,
"discussion_catégorie":15,"discuter":1,"discussion_image":7,"image":6,"image_talk":7},"wgSiteName":"CrossKnowledge Dev Wiki","wgFileExtensions":["png","gif","jpg","jpeg","doc","xls","mpp","pdf","xml","zip","xlsx","pptx","docx"],"wgDBname":"wiki_prod","wgExtensionAssetsPath":"/extensions","wgResourceLoaderMaxQueryLength":-1});};if(isCompatible()){document.write("\x3cscript src=\"/load.php?debug=false\x26amp;lang=fr\x26amp;modules=jquery%7Cmediawiki\x26amp;only=scripts\x26amp;skin=vector\x26amp;version=20110729T102140Z\"\x3e\x3c/script\x3e");}delete isCompatible;;