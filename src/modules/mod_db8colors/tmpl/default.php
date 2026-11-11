<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_db8colors
 *
 * @author      Peter Martin <joomla@db8.nl>
 * @copyright   (C) 2015 - 2026 Peter Martin
 * @link        https://extensions.db8.nl
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

/** @var \Joomla\Registry\Registry $params */
/** @var \stdClass $module */
$colors = (array) $params->get('colors', []);
?>
<table class="table table-striped mb-0">
    <caption class="visually-hidden"><?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?></caption>
    <thead>
        <tr>
            <th scope="col"><?php echo Text::_('MOD_DB8COLORS_COLOR'); ?></th>
            <th scope="col"><?php echo Text::_('MOD_DB8COLORS_HEX_VALUE'); ?></th>
            <?php // The swatch repeats the hex value visually; screen readers skip the column. ?>
            <th scope="col" aria-hidden="true"><?php echo Text::_('MOD_DB8COLORS_SWATCH'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colors as $color) : ?>
            <?php $value = htmlspecialchars((string) ($color->value ?? ''), ENT_COMPAT, 'UTF-8'); ?>
            <tr>
                <td><?php echo htmlspecialchars((string) ($color->name ?? ''), ENT_COMPAT, 'UTF-8'); ?></td>
                <td><?php echo $value; ?></td>
                <td aria-hidden="true">
                    <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg" focusable="false">
                        <rect width="40" height="15" fill="<?php echo $value; ?>" stroke="currentColor" stroke-width="1"/>
                    </svg>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
