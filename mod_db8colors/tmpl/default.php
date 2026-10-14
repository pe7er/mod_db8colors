<?php
/**
 * @package     mod_db8colors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2026 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

/** @var \Joomla\Registry\Registry $params */
$colors = (array) $params->get('colors', []);
?>
<table class="table table-striped mb-0">
    <thead>
        <tr>
            <th scope="col"><?php echo Text::_('MOD_DB8COLORS_COLOR'); ?></th>
            <th scope="col"><?php echo Text::_('MOD_DB8COLORS_HEX_VALUE'); ?></th>
            <th scope="col"><?php echo Text::_('MOD_DB8COLORS_SVG'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colors as $color) : ?>
            <?php $value = htmlspecialchars((string) ($color->value ?? ''), ENT_COMPAT, 'UTF-8'); ?>
            <tr>
                <td><?php echo htmlspecialchars((string) ($color->name ?? ''), ENT_COMPAT, 'UTF-8'); ?></td>
                <td><?php echo $value; ?></td>
                <td>
                    <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect width="40" height="15" fill="<?php echo $value; ?>" stroke="currentColor" stroke-width="1"/>
                    </svg>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
