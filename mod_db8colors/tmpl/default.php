<?php
/**
 * @package     mod_db8colors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2024 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

$colors = $params->get('colors', []);
?>

<style>
    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: var(--template-quickicon-bg, #f2f2f2);
    }
</style>

<table>
    <tr>
        <th><?php echo Text::_('MOD_DB8COLORS_COLOR');?></th>
        <th><?php echo Text::_('MOD_DB8COLORS_HEX_VALUE');?></th>
        <th><?php echo Text::_('MOD_DB8COLORS_SVG');?></th>
    </tr>
    <?php
    foreach ($colors as $color) : ?>
        <tr>
            <td><?php echo htmlspecialchars($color->name, ENT_COMPAT, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($color->value, ENT_COMPAT, 'UTF-8'); ?></td>
            <td>
                <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="15" fill="<?php echo htmlspecialchars($color->value, ENT_COMPAT, 'UTF-8'); ?>" stroke="black" stroke-width="1"/>
                </svg>
            </td>
        </tr>
    <?php
    endforeach; ?>
</table>
