<?php
    class Page extends BaseClass {
        
        public $parameters   = array();

        private $name            = '';
        private $title           = '';
        private $metaDescription = '';
        private $metaKeywords    = '';
        private $theme           = '';

        private $template        = '';
        private $menu            = '';
        private $header          = '';
        private $footer          = '';
        private $sidebar         = '';

        private $stylesheets     = array();
        private $javascripts     = array();
        private $content         = '';

        public function __construct($dbRow = '') {

            $this->myTable = 'pages';
            $this->myID    = 'pageID';

            parent::__construct($dbRow);

            // Save all parameters from this page
            foreach($_REQUEST as $key => $value) {
                $this->parameters[$key] = $value;
            }
        }

        // Set title of page which will be used in the head of the page
        public function setTitle($value) {
            $this->title = $value;
        }

        // Add specific stylesheet(s) to this page
        function addStylesheet($path) {
            $this->stylesheets[] = $path;
        }

        // Add specific javascript(s) to this page
        function addJavascript($path) {
            $this->javascripts[] = $path;
        }

        // Set the template to be used for this page (if not set, default template will be used)
        function setTemplate($name) {
            $path = $name;
            if(substr($name,-13) != '.template.php') {
                $path = '/_templates/' . $name . '.template.php';
            }
            $this->template = $_SERVER['DOCUMENT_ROOT'] . $path;
        }

        // Set the menu to be used for this page (if not set, default menu will be used)
        function setMenu($name) {
            $path = $name;
            if(substr($name,-9) != '.menu.php') {
                $path = '/_includes/menus/' . $name . '.menu.php';
            }
            $this->menu = $_SERVER['DOCUMENT_ROOT'] . $path;
        }

        // Set the header to be used for this page (if not set, default header will be used)
        function setHeader($name) {
            $path = $name;
            if(substr($name,-11) != '.header.php') {
                $path = '/_includes/headers/' . $name . '.header.php';
            }
            $this->header = $_SERVER['DOCUMENT_ROOT'] . $path;
        }

        // Set the footer to be used for this page (if not set, default footer will be used)
        function setFooter($name) {
            $path = $name;
            if(substr($name,-11) != '.footer.php') {
                $path = '/_includes/footers/' . $name . '.footer.php';
            }
            $this->footer = $_SERVER['DOCUMENT_ROOT'] . $path;
        }

        // Set the theme to be used for this page
        function setTheme($name) {
            $this->theme = $name;
        }

        // Set the sidebar to be used for this page
        public function setSidebar($name) {
            $path = $name;
            if(substr($name,-12) != '.sidebar.php') {
                $path = '/_content/sidebars/' . $name . '.sidebar.php';
            }
            $this->sidebar = $_SERVER['DOCUMENT_ROOT'] . $path;
        }


        // Call this function before writing the actual content, it will be buffered
        public function startContent() {
            ob_start();
        }

        // Call this function after writing the actual content, it will flush all content in the property content of this class
        public function endContent() {
            $this->content = ob_get_clean();
        }

        // Render this page with a specific template (if not set, default template will be used)
        public function render($template = '') {
            // If a template is given, set the template within this class
            if($template != '') {
                $this->setTemplate($template);
            }

            ob_start();
            include($this->template);
            return ob_get_clean();
        }


        // Create an Object from all properties of this class
        public function getObj() {
            // First retrieve the Obj as made by the base class
            $obj = parent::getObj();

            // Add additional specific fields for this Object
            $obj['pageName']     = $this->name;
            $obj['pageTitle']    = $this->title;
            $obj['pageTheme']    = $this->theme;
            $obj['pageTemplate'] = $this->template;
            $obj['pageMenu']     = $this->menu;
            $obj['pageHeader']   = $this->header;
            $obj['pageFooter']   = $this->footer;
            $obj['pageSidebar']  = $this->sidebar;

            return $obj;
        }

        // Update all properties of this class from the given Object
        protected function setObj($obj) {
            // First set the Obj by the base class
            parent::setObj($obj);

            // Set additional specific fields for this Object
            $this->name            = (isset($obj['pageName'])        ? $obj['pageName']  : '');
            $this->title           = (isset($obj['pageTitle'])       ? $obj['pageTitle'] : '');
            $this->metaDescription = (isset($obj['metaDescription']) ? $obj['metaDescription'] : '');
            $this->metaKeywords    = (isset($obj['metaKeywords'])    ? $obj['metaKeywords'] : '');
            $this->theme           = (isset($obj['pageTheme'])       ? $obj['pageTheme'] : '');

            (isset($obj['pageTemplate']) ? $this->setTemplate($obj['pageTemplate']) : $this->setTemplate('default'));
            (isset($obj['pageMenu'])     ? $this->setMenu($obj['pageMenu'])         : $this->setMenu('default'));
            (isset($obj['pageHeader'])   ? $this->setHeader($obj['pageHeader'])     : $this->setHeader('default'));
            (isset($obj['pageFooter'])   ? $this->setFooter($obj['pageFooter'])     : $this->setFooter('default'));
            (isset($obj['pageSidebar'])  ? $this->setSidebar($obj['pageSidebar'])   : '');
        }
    }
?>