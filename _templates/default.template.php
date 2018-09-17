<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta description="<?php echo $this->metaDescription; ?>">
    <meta keywords="<?php echo $this->metaKeywords; ?>">
	<title><?php echo $this->title; ?></title>

    <!-- Add default stylesheets and javascript here -->
    <link href="/_templates/css/default.css" rel="stylesheet" type="text/css" />
    <script src="/_templates/js/default.js" language="javascript" type="text/javascript" defer="defer"></script>


    <!-- After defaults load specific page stylesheets and javascript -->
	<?php
    // First lets load the theme stylesheet
    if($this->theme != '' && file_exists('/_themes/' . $this->theme) . '.theme.css') {
        echo '<link href="/_themes/' . $this->theme . '.theme.css" rel="stylesheet" type="text/css" />' . "\n";
    }


    foreach ($this->stylesheets as $stylesheet) {
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . $stylesheet)){
            echo '<link href="' . $stylesheet . '" rel="stylesheet" type="text/css" />' . "\n";
        }
    }
    foreach ($this->javascripts as $javascript) {
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . $javascript)) {
            echo '<script src="' . $javascript . '" language="javascript" type="text/javascript" defer="defer"></script>' . "\n";
        }
    }
	?>
</head>

<body>

    <?php $this->header != '' && file_exists($this->header) ? include($this->header) : ''; ?>

    <?php $this->menu != '' && file_exists($this->menu) ? include($this->menu) : ''; ?>

    <section id="content">
        <?php echo $this->content; ?>
    </section>

    <?php $this->footer != '' && file_exists($this->footer) ? include($this->footer) : ''; ?>

</body>
</html>