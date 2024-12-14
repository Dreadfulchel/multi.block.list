<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult['ITEMS'])): ?>
    <div>
        <?php foreach ($arResult['ITEMS'] as $iblockId => $iblockData): ?>
            <h3><?= htmlspecialchars($iblockData['NAME']) ?> (ID: <?= $iblockId ?>)</h3>
            <ul>
                <?php foreach ($iblockData['ITEMS'] as $item): ?>
                    <li><?= htmlspecialchars($item['NAME']) ?> (ID: <?= $item['ID'] ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Элементы не найдены.</p>
<?php endif; ?>

