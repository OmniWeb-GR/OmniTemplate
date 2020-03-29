<?php defined('_JEXEC') or die; ?>
<?php
	$cache = 0;
	//***************************************
	$app = JFactory::getApplication();
  	$menu = $app->getMenu()->getActive();
  	$pageclass = "";
  	if (is_object($menu)) $pageclass = $menu->params->get("pageclass_sfx");
	//***************************************
	$input = JFactory::getApplication()->input;
	$view = $input->get('view');
	//***************************************
	$lang = explode("-", $this->language);
	//***************************************
	$class = $pageclass ? htmlspecialchars($pageclass): "default";
	$class .= " " . $view;
	//***************************************
	unset($this->_scripts['/media/jui/js/jquery.js']);
	unset($this->_scripts['/media/jui/js/jquery.min.js']);
	unset($this->_scripts['/media/jui/js/jquery-noconflict.js']);
	unset($this->_scripts['/media/jui/js/jquery-migrate.min.js']);
	unset($this->_scripts['/media/jui/js/bootstrap.js']);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang[0]; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <jdoc:include type="head"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/andreaskournoutas/utilities.css@2020.03.07/utilities.min.css">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css?v=<?php echo $cache; ?>"/>
        <!-- Google font link -->
    </head>
    <body class="<?php echo $class ?>">
    <div class="visible-xl d-none d-xl-block"></div>
		<div class="visible-lg d-none d-lg-block d-xl-none"></div>
		<div class="visible-md d-none d-md-block d-lg-none"></div>
		<div class="visible-sm d-none d-sm-block d-md-none"></div>
		<div class="visible-xs d-block d-sm-none"></div>
        <header class="header">
			<jdoc:include type="modules" name="header" style="xhtml"/>
		</header>
        <jdoc:include type="modules" name="above-main" style="xhtml"/>
        <main class="container-fluid">
            <jdoc:include type="modules" name="above-content" style="xhtml"/>
            <?php if ($this->countModules('left-sidebar')): ?>
				<div class="row">
					<aside class="col-auto">
						<jdoc:include type="modules" name="left-sidebar" style="xhtml"/>
					</aside>
					<div class="col">
						<jdoc:include type="component"/>
					</div>
				</div>
			<?php elseif ($this->countModules('right-sidebar')): ?>
				<div class="row">
					<div class="col">
						<jdoc:include type="component"/>
					</div>
					<aside class="col-auto">
						<jdoc:include type="modules" name="right-sidebar" style="xhtml"/>
					</aside>
				</div>
			<?php elseif (($this->countModules('left-sidebar')) && ($this->countModules('right-sidebar'))): ?>
				<div class="row">
					<aside class="col-auto">
						<jdoc:include type="modules" name="left-sidebar" style="xhtml"/>
					</aside>
					<div class="col">
						<jdoc:include type="component"/>
					</div>
					<aside class="col-auto">
						<jdoc:include type="modules" name="right-sidebar" style="xhtml"/>
					</aside>
				</div>
            <?php else: ?>
                <jdoc:include type="component"/>
            <?php endif; ?>
            <jdoc:include type="modules" name="below-content" style="xhtml"/>
        </main>
        <jdoc:include type="modules" name="below-main" style="xhtml"/>
        <footer class="footer">
			<jdoc:include type="modules" name="footer" style="xhtml"/>
		</footer>
		<div id="off-canvas" class="off-canvas fixed-top h-100vh">
			<jdoc:include type="modules" name="off-canvas" style="xhtml"/>
		</div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js?v=<?php echo $cache; ?>"></script>
    </body>
</html>