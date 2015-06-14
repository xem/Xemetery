<?php require_once("pphp.php"); ?>
// Head
:meta charset="UTF-8"
:link rel=stylesheet href=https://raw.github.com/necolas/normalize.css/master/normalize.css
:link rel=stylesheet href=doc.css
:title :PPHP : PHP & HTML Postprocessor

// Body
:h1 :PPHP : PHP & HTML Postprocessor
:nav
  &bull; 
  :a href=#features :Features
  &bull;
  :a href=#installation :Installation
  &bull;
  :a href=#demo :Demo
  &bull;
  :a href=#api :API
  &bull;
  :a href=#download
    :b :Download
  :
  &bull;
:
:section #features
  :h2 :Features
  :ul
    :li :The PPHP syntax: an easy way to write perfect HTML5
    :li :The PPHP engine: One file, one-line installation
    :li :No configuration, no dependencies, no incompatibilities
  :
:
:section #installation
  :h2 :Installation
  :ul
    :li :Use a (local) host with PHP 5 or higher
    :li
      :a href=#download : Download PPHP
      and place it into your project
    :
    :li 
      Write
      :b :&lt;?php require_once(pphp.php); ?&gt; 
      on top of your pages
    :
    :li :Write or generate PPHP code, it is instantly converted in HTML5
  :
:
:section #demo
  :h2 :Demo
  :form method=post action=#demo
    :textarea name="input"
      // Let's write some PPHP

      :head
      &#32; :meta charset=utf-8  
      &#32; :title :This is a demo 
      &#58;

      :body #test
      &#32; :h1 :Demo page
      &#32; :div .container
      &#32;   :a href=www.test.com :a link
      &#32;   :img src="t.co/cdORmIa7" alt="thought"
      &#32; &#58;
      &#58;
    :
    :textarea disabled=disabled
      <?php
        if(!empty($_POST))
        {
          echo pphp($_POST["input"]);
        }
      ?>
    :
    :input type=submit value=PPHP-to-HTML
  :
:
:section #api
  :h2 :API
:
:section #download
  :h2 :Download
  :ul
    :li
      Current version: 
      :a href=pphp.0.1.zip :PPHP v.0.1
      (zip, xxx kb)
    :
  :
:
Copyright <?php echo date("Y"); ?> - Maxime Euzière