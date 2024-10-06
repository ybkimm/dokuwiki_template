<?php
/**
 * DokuWiki Starter Template
 *
 * @link     http://dokuwiki.org/template:starter
 * @author   Anika Henke <anika@selfthinker.org>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die();
$showSidebar = page_findnearest($conf['sidebar']);

?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>">

<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<body id="dokuwiki__top">
    <div class="<?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'has-sidebar' : ''; ?>">
        <?php html_msgarea() ?>

        <header>
            <div class="user-header">
                <?php tpl_includeFile('header.html') ?>
            </div>

            <div class="main-header">
                <div class="site-title">
                    <h1><?php tpl_link(wl(), $conf['title']) ?></h1>
                    <?php if ($conf['tagline']): ?>
                        <p class="tagline"><?php echo $conf['tagline'] ?></p>
                    <?php endif ?>
                </div>

                <p class="a11y skip">
                    <a href="#dokuwiki__content"><?php echo $lang['skip_to_content'] ?></a>
                </p>
            </div>
        </header>

        <hr />

        <main>
            <?php tpl_flush() ?>
            <?php tpl_includeFile('pageheader.html') ?>

            <div class="page group">
                <?php tpl_content() ?>
            </div>

            <?php tpl_flush() ?>
            <?php tpl_includeFile('pagefooter.html') ?>
        </main>

        <hr />

        <footer id="dokuwiki__footer">
            <div class="doc"><?php tpl_pageinfo() ?></div>

            <?php tpl_license('button') ?>

            <nav class="tools" aria-label="<?php echo $lang['tools'] ?>">
                <!-- SITE TOOLS -->
                <div id="dokuwiki__sitetools" class="tool-list">
                    <h3><?php echo $lang['site_tools'] ?></h3>
                    <?php tpl_searchform() ?>
                    <?php // echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools']); ?>
                    <ul>
                        <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', false); ?>
                    </ul>
                </div>

                <!-- PAGE TOOLS -->
                <div id="dokuwiki__pagetools" class="tool-list">
                    <h3><?php echo $lang['page_tools'] ?></h3>
                    <ul>
                        <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('action ', false); ?>
                    </ul>
                </div>

                <!-- USER TOOLS -->
                <?php if ($conf['useacl']): ?>
                    <div id="dokuwiki__usertools" class="tool-list">
                        <h3><?php echo $lang['user_tools'] ?></h3>
                        <ul>
                            <?php echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ', false); ?>
                        </ul>
                    </div>
                <?php endif ?>
            </nav>

            <?php tpl_includeFile('footer.html') ?>
        </footer><!-- /footer -->
    </div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
</body>
</html>
