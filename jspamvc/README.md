JSPAMVC
==


A lightweight MVC framework for big Single-Page Applications in JavaScript.

Features:
===

- routing
- templating + i18n
- A static homepage (loads quickly, then preloads the app's assets)
- HTML/JS components that can be used multiple times in the same view and in different views
- views in which the DOM can be updated in many ways:
  - Add a component
  - Remove a component
  - Append a component
  - Empty the DOM of a component
  - Rewrite the DOM of a component
  - Append DOM in a component

Install:
===

Here's an example of folder structure you could use

- index.html <= static homepage
- page1/ <= one of the views (can have any name)
  - controller.js
  - model.js
  - view.js
- page2, page3, ...
- common/ <= common to all views (big structure)
  - controller.js
  - model.js
  - view.js
- components/
  - header/ <= one of the components (can have any name)
    - controller.js
    - model.js
    - view.js
  - footer/ <= another
    - controller.js
    - model.js
    - view.js
  - etc...
- js/
  - jspamvc.0.0.1.js <= this project
  - libs/ <= other projects
  - app.js <= your project, compiled in one file
- css/
  - style.css <= your css, compiled in one file
- images/ 
- fonts/
- .htaccess


Process
===

**What jspamvc does on each "page" of the app:**

- call common.start() (this is done only once, when the browser arrives on a non-static page)
- call currentPage.end() (if currentPage exists)
- read GET attributes to get the page and other params if present
- set page to currentPage
- call currentPage.start([param1, ...])

**What your common controller has to do**

- expose a start() method
- render global structure (for example: header + content + footer)
- instanciate common HTML/JS components (for example: header) and register them. ex: ````app.components.global.header=new Header()"````
- tell jspamvc where the views are rendered (body by default). ex: ````app.commonRenderTarget = "#content"````

**What your controllers cam/must do:**

- expose a start() and an end() method
- start() can:
  - render the current page
  - instanciate common or specific components and register them. Ex: ````app.components.currentPage.bar=new Bar()"````
  - call methods of global components. Ex: ````header.setManuTab("foo");````
  - add event listeners
- end() must: 
  - unregister components registered by start()
  - remove event listeners added by start()

**What your models do:**

- get and set data

**What your views do:**

- update the DOM

**What your DOM does:**

- Send events catched by common controller or current page controller or current component controller (click, scroll, ...)



Example files
===

**index.html**

````
<!doctype html>
<meta charset=utf-8>
<title> 
<link rel=stylesheet href=css/style.css?v=1>
<body id=top>
  Hello world
  <script>
    app = {
      currentPage = null;
      components: {
        common: {},
        currentPage: {}
      },
      commonRenderTarget: "#top"
    }
  </script>
  <script src=js/app.js?v=1></script>
  <script src=js/jspamvc.0.0.1.js></script>
</body>
````
 
**.htaccess**

````
# long cache for CSS, JS, image files
... todo

# short/no cache for HTML files
... todo

# URL rewriting
# /page1            => /index.html?page=page1
# /page1?this=that  => /index.html?page=page1&this=that
... todo
````

**common/controller.js**

````
todo
````

**common/model.js**

````
todo
````

**common/view.js**

````
todo
````

**page1/controller.js**

````
app.page1 = {}

app.page1.components = {}

app.page1.start = function(){
  
  // Show the view
  app.page1.show();
  
  // Handle view's events
  addEventListener(ABC, def);
}

app.page1.end = function(){

  // Stop handling view's events
  removeEventListener(ABC);
}

````

**page1/model.js**

````

app.page1.getXYZ = function(xyz){
  ...
}

app.page1.setZYX = function(zyx, value){
  ...
}

````

**page1/view.js**

````

app.page1.show = function(){
  ...
}

````
