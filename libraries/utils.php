<?php


/**
 * Affiche la vue demandée dans $path en injectant les variables contenues dans $variables
 *
 * @param string $path
 * @param array $variables
 *
 * @return void
 */

function render(string $path, array $variables = [])
{
    extract($variables);

    ob_start();
    require('vue/' . $path . '.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}
