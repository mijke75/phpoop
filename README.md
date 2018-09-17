# Object Oriented Website with PHP

This project shows how to make a website using object oriented programming in PHP. It will use a database class and base classes for collections and objects to inherit from.

Headers, footers, menus, themes and page layout templates can be set for each page. They can also override the default ones.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Make sure you use a local web hosting like MAMP to develop on your own machine. Mamp includes PHP and MySql.

```
You can download it from: http://mamp.info/
```

### Installing

A step by step series of examples that tell you how to get a development environment running.

Download of fork the project from Github. Make sure you have Mamp refering to your root folder of your project.

Make database and give it your desired name. To be up-and-running quickly import the example database which can be found in: "__dbexports/"

If you open your local website you should see the homepage with the title "Yes! I created my first Object Oriented PHP Website!"

## How to use this site

This site uses Object Oriented Programming to build the website. Each page will load their own content and by default select a header, footer, menu and a template. These can be overriden in each page.

### Building pages

Pages can be add to the root of the project or in subfolders. In this website only index.php and documentation.php are pages in the root. All the Example pages are in a subfolder called "examples". This will help your Seach Engine Optimalization.

Pages can be stored in a database or just configured in their PHP files. In this website the index.php and examples/index.php are stored and configured in the database. Other pages are configured in their PHP files.

All content of each page is configured in the "_contents" folder. This seperates the configuration of the page (which header, footer, menu, do we need extra stylesheets or javascript, etc.) and the actual HTML content of the page.

Content files should have the same name and folder structure as the configuration files.

```
Pages are configured in the root or their own folder. The content is made in the _contents folder.

Each Configuration page contains at least:

require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_start.php');
$page->startContent();
include $_SERVER['DOCUMENT_ROOT'] . '/_content' . $_SERVER['PHP_SELF']; // Or any other written content
$page->endContent();
echo $page->render();
require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_end.php');
```

### Building templates

If you have a HTML template for your website, most part of it will be saved in the "_templates" folder. The template needs to get the title, metadescription, metakeywords from the page Object. Since the page will be rendered by the page Object, you can refer to the page Object with $this. 

Furthermore the template should contain all the default stylesheets and javascript which needs to be loaded for all pages of the website. Specific stylesheets and javascript need to be loaded in the template as well, but will loop through the stylesheets and javascripts  property of the page Object. 

The template can include the header, footer and menu as well. Al last you need to tell the page Object where to render the content. 

The default template shows all the required configuration except sidebars. There are two separate templates for that.

```
echo $page->render('sidebar.left');
The template can also be configured in the database
```

### Selecting headers, footers and menu

A header, footer and menu will be rendered within the template page. The default header, footer and menu will be selected by default. You can select a custom made header, footer or menu for a specific page. If you want to make your own header, footer or menu for your entire website, just alter the default ones.

```
$page->setMenu('custom');
$page->setHeader('custom');
$page->setFooter('custom');
The menu, header and/or footer can also be configured in the database
```

### Themes

This website support the use of themes. A theme can be set for each page. It will contain stylesheet configuration which overrides the default stylesheet. 

Only use themes if you want to alter the general look-and-feel of your site. Specific styles for components e.g. calendars, shopping carts can be configured in the "_modules" folder. Corresponding javascripts can be stored in "_modules" as well.

```
$page->setTheme('dark');
The theme can also be configured in the database
```

### Explaination of each folder

* __dbexports: contains an export for the configuration of the Example website
* _classes: contains all classes of your website (baseclass, basecollection and page are mandatory, database, dbsettings are needed if you use a database)
* _content: contains all content of each page, file names should match the configuration files
* _content/css: contains all stylesheet for specific content on pages (e.g. center login forms, while all other forms are full width)
* _content/images: contains images for content sections
* _sidebars: contains all content for sidebars
* _includes: debug_mode will generate errors to the screen, only use while developing, page_start and page_end are included in configuration pages
* _includes/footers: contains content for footers
* _includes/headers: contains content for headers
* _includes/menus: contains content for menus
* _modules: can contain specific stylesheets, javascripts and other files for modules like calendars, shopping carts, etc.
* _templates: contains template(s) for the website
* _themes: contain stylesheets for specific themes

All example folders and files in _classes, _content, _modules and the root are example pages which will get their content from the Examples table in the database. They can be removed and replaced with your own classes, modules and pages.

## Deployment

Make sure you export your local database and create one on your server. Import the data into your server. Make sure you have configured your database settings in the dbsettings class. Move all your files to the server and you are ready to go live!

## Built With

* [IntelliJ IDEA](https://www.jetbrains.com/idea/features/) - The development environment supporting all languages
* [Mamp](https://mampinfo/) - Local web development solution
* [GitHub](https://github.com/) - Version control and publication

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Mijke Ellen van der Zee** - *Initial work* - [Mijke75](https://github.com/mijke75)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details.
