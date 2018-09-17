<h2>Object Oriented Website with PHP</h2>

<p>This project shows how to make a website using object oriented programming in PHP. It will use a database class and base classes for collections and objects to inherit from.</p>

<p>Headers, footers, menus, themes and page layout templates can be set for each page. They can also override the default ones.</p>

<h3>Getting Started</h3>

<p>These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.</p>

<h4>Prerequisites</h4>

<p>Make sure you use a local web hosting like MAMP to develop on your own machine. Mamp includes PHP and MySql.</p>

<blockquote>
You can download it from: http://mamp.info/
</blockquote>

<h4>Installing</h4>

<p>A step by step series of examples that tell you how to get a development environment running.</p>

<p>Download of fork the project from Github. Make sure you have Mamp refering to your root folder of your project.</p>

<p>Make database and give it your desired name. To be up-and-running quickly import the example database which can be found in: "__dbexports/"</p>

<p>If you open your local website you should see the homepage with the title "Yes! I created my first Object Oriented PHP Website!"</p>

<h3>How to use this site</h3>

<p>This site uses Object Oriented Programming to build the website. Each page will load their own content and by default select a header, footer, menu and a template. These can be overriden in each page.</p>

<h4>Building pages</h4>

<p>Pages can be add to the root of the project or in subfolders. In this website only index.php and documentation.php are pages in the root. All the Example pages are in a subfolder called "examples". This will help your Seach Engine Optimalization.</p>

<p>Pages can be stored in a database or just configured in their PHP files. In this website the index.php and examples/index.php are stored and configured in the database. Other pages are configured in their PHP files.</p>

<p>All content of each page is configured in the "_contents" folder. This seperates the configuration of the page (which header, footer, menu, do we need extra stylesheets or javascript, etc.) and the actual HTML content of the page.</p>

<p>Content files should have the same name and folder structure as the configuration files.</p>

<blockquote>
    Pages are configured in the root or their own folder. The content is made in the _contents folder.<br>
    <br>Each Configuration page contains at least:<br>
    <br>
    require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_start.php');<br>
    $page->startContent();<br>
    include $_SERVER['DOCUMENT_ROOT'] . '/_content' . $_SERVER['PHP_SELF']; // Or any other written content<br>
    $page->endContent();<br>
    echo $page->render();<br>
    require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_end.php');
</blockquote>

<h4>Building templates</h4>

<p>If you have a HTML template for your website, most part of it will be saved in the "_templates" folder. The template needs to get the title, metadescription, metakeywords from the page Object. Since the page will be rendered by the page Object, you can refer to the page Object with $this.</p>

<p>Furthermore the template should contain all the default stylesheets and javascript which needs to be loaded for all pages of the website. Specific stylesheets and javascript need to be loaded in the template as well, but will loop through the stylesheets and javascripts  property of the page Object.</p>

<p>The template can include the header, footer and menu as well. Al last you need to tell the page Object where to render the content.</p>

<p>The default template shows all the required configuration except sidebars. There are two separate templates for that.</p>

<blockquote>
echo $page->render('sidebar.left');
The template can also be configured in the database
</blockquote>

<h4>Selecting headers, footers and menu</h4>

<p>A header, footer and menu will be rendered within the template page. The default header, footer and menu will be selected by default. You can select a custom made header, footer or menu for a specific page. If you want to make your own header, footer or menu for your entire website, just alter the default ones.</p>

<blockquote>
$page->setMenu('custom');
$page->setHeader('custom');
$page->setFooter('custom');
The menu, header and/or footer can also be configured in the database
</blockquote>

<h4>Themes

<p>This website support the use of themes. A theme can be set for each page. It will contain stylesheet configuration which overrides the default stylesheet.</p>

<p>Only use themes if you want to alter the general look-and-feel of your site. Specific styles for components e.g. calendars, shopping carts can be configured in the "_modules" folder. Corresponding javascripts can be stored in "_modules" as well.</p>

<blockquote>
$page->setTheme('dark');
The theme can also be configured in the database
</blockquote>

<h4>Explaination of each folder</h4>
<ul>
    <li>__dbexports: contains an export for the configuration of the Example website</li>
    <li>_classes: contains all classes of your website (baseclass, basecollection and page are mandatory, database, dbsettings are needed if you use a database)</li>
    <li>_content: contains all content of each page, file names should match the configuration files</li>
    <li>_content/css: contains all stylesheet for specific content on pages (e.g. center login forms, while all other forms are full width)</li>
    <li>_content/images: contains images for content sections</li>
    <li>_sidebars: contains all content for sidebars</li>
    <li>_includes: debug_mode will generate errors to the screen, only use while developing, page_start and page_end are included in configuration pages</li>
    <li>_includes/footers: contains content for footers</li>
    <li>_includes/headers: contains content for headers</li>
    <li>_includes/menus: contains content for menus</li>
    <li>_modules: can contain specific stylesheets, javascripts and other files for modules like calendars, shopping carts, etc.</li>
    <li>_templates: contains template(s) for the website</li>
    <li>_themes: contain stylesheets for specific themes</li>
</ul>
<p>All example folders and files in _classes, _content, _modules and the root are example pages which will get their content from the Examples table in the database. They can be removed and replaced with your own classes, modules and pages.</p>

<h3>Deployment</h3>

<p>Make sure you export your local database and create one on your server. Import the data into your server. Make sure you have configured your database settings in the dbsettings class. Move all your files to the server and you are ready to go live!</p>

<h3>Built With</h3>
<ul>
    <li><a href="https://www.jetbrains.com/idea/features/">IntelliJ IDEA</a> - The development environment supporting all languages</li>
    <li><a href="https://mampinfo/">Mamp</a> - Local web development solution</li>
    <li><a href="https://github.com/">GitHub</a> - Version control and publication</li>
</ul>

<h3>Author</h3>
<ul>
<li><b>Mijke Ellen van der Zee<b> - <i>Initial work</i> - <a href="https://github.com/mijke75">Mijke75</a></b>
</ul>

<h3>License</h3>

<p>This project is licensed under the MIT License - see the <a href="https://opensource.org/licenses/MIT">Open Source Initiative</a> website for details.</p>
