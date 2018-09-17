<nav>
	<ul>
        <li class="<?php echo ($_SERVER['PHP_SELF'] == '/index.php' ? 'active' : '') ?>"><a href="/">Home</a></li>
		<li class="<?php echo (substr($_SERVER['PHP_SELF'], 0, 8) == '/example' ? 'active' : '') ?>"><a href="/examples/index.php">Examples</a></li>
		<li class="<?php echo ($_SERVER['PHP_SELF'] == '/documentation.php' ? 'active' : '') ?>"><a href="/documentation.php">Documentation</a></li>
		<li><a href="https://github.com/mijke75/phpoop" target="_blank">Download</a></li>
	</ul>
</nav>