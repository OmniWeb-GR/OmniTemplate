<?php defined('_JEXEC') or die; ?>
<?php
	$amp = true;
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
	use Joomla\CMS\Uri\Uri;
	if (($amp) && ($view == 'article')) {
		$uri = Uri::getInstance();
		$url = $uri->toString() . '?template=j3amptemplate';
	}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang[0]; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <jdoc:include type="head"/>
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css?v=<?php echo $cache; ?>"/>
		<?php if (($amp) && ($view == 'article')): ?>
			<link rel="amphtml" href="<?php echo $url ?>">
		<?php endif; ?>
    </head>
    <body class="<?php echo $class ?>">
		<div id="visible-xs" class="d-block d-sm-none"></div>
		<div id="visible-sm" class="d-none d-sm-block d-md-none"></div>
		<div id="visible-md" class="d-none d-md-block d-lg-none"></div>
		<div id="visible-lg" class="d-none d-lg-block d-xl-none"></div>
    	<div id="visible-xl" class="d-none d-xl-block"></div>
        <header class="header">
			<jdoc:include type="modules" name="header" style="xhtml"/>
		</header>
		<jdoc:include type="modules" name="above-content" style="xhtml"/>
		<?php if ($this->countModules('left-sidebar')): ?>
			<div class="container-fluid">
				<div class="row">
					<aside class="col-auto">
						<jdoc:include type="modules" name="left-sidebar" style="xhtml"/>
					</aside>
					<div class="col">
						<jdoc:include type="modules" name="above-main" style="xhtml"/>
						<main>
							<?php if ($this->countModules('content')): ?>
								<jdoc:include type="modules" name="content" style="xhtml"/>
							<?php else: ?>
								<jdoc:include type="component"/>
							<?php endif; ?>
						</main>
						<jdoc:include type="modules" name="below-main" style="xhtml"/>
					</div>
				</div>
			</div>
		<?php elseif ($this->countModules('right-sidebar')): ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<jdoc:include type="modules" name="above-main" style="xhtml"/>
						<main>
							<?php if ($this->countModules('content')): ?>
								<jdoc:include type="modules" name="content" style="xhtml"/>
							<?php else: ?>
								<jdoc:include type="component"/>
							<?php endif; ?>
						</main>
						<jdoc:include type="modules" name="below-main" style="xhtml"/>
					</div>
					<aside class="col-auto">
						<jdoc:include type="modules" name="right-sidebar" style="xhtml"/>
					</aside>
				</div>
			</div>
		<?php elseif (($this->countModules('left-sidebar')) && ($this->countModules('right-sidebar'))): ?>
			<div class="container-fluid">
				<div class="row">
					<aside class="col-auto">
						<jdoc:include type="modules" name="left-sidebar" style="xhtml"/>
					</aside>
					<div class="col">
						<jdoc:include type="modules" name="above-main" style="xhtml"/>
						<main>
							<?php if ($this->countModules('content')): ?>
								<jdoc:include type="modules" name="content" style="xhtml"/>
							<?php else: ?>
								<jdoc:include type="component"/>
							<?php endif; ?>
						</main>
						<jdoc:include type="modules" name="below-main" style="xhtml"/>
					</div>
					<aside class="col-auto">
						<jdoc:include type="modules" name="right-sidebar" style="xhtml"/>
					</aside>
				</div>
			</div>
        <?php else: ?>
			<jdoc:include type="modules" name="above-main" style="xhtml"/>
			<div class="container-fluid">
				<main>
					<?php if ($this->countModules('content')): ?>
						<jdoc:include type="modules" name="content" style="xhtml"/>
					<?php else: ?>
						<jdoc:include type="component"/>
					<?php endif; ?>
				</main>
			</div>
			<jdoc:include type="modules" name="below-main" style="xhtml"/>
        <?php endif; ?>
		<jdoc:include type="modules" name="below-content" style="xhtml"/>
        <footer class="footer">
			<jdoc:include type="modules" name="footer" style="xhtml"/>
		</footer>
		<div id="dark-layer" class="dark-layer fixed-top w-100 h-100 invisible"></div>
		<div id="loader" class="dark-layer fixed-top w-100 h-100 invisible d-flex justify-content-center align-items-center">
			<div class="spinner-border text-white" role="status">
				<span class="sr-only"><?php echo JText::_('/* language string */'); ?></span>
			</div>
		</div>
		<?php if ($this->countModules('off-canvas')): ?>
			<aside id="off-canvas" class="off-canvas fixed-top bg-primary shadow h-100 text-white pt-2">
				<jdoc:include type="modules" name="off-canvas" style="xhtml"/>
				<button id="off-canvas-close-button" type="button" class="off-canvas__close-button btn position-absolute" aria-label="<?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>">
					<svg width="2em" height="2em" viewBox="0 0 16 16" class="off-canvas__close-icon text-white bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
					</svg>
				</button>
			</aside>
		<?php endif; ?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js?v=<?php echo $cache; ?>"></script>
    </body>
</html>