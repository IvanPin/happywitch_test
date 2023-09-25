<?php
require 'vendor/autoload.php';

use happywitch\CatalogLoader;

$productLoader = CatalogLoader::getInstance();
$products = $productLoader->getAllProducts();
?>
<div class="catalog_section_list">
    <? foreach ($products as $product):
        $actionClass = $product["old_price"] ? "catalog_item__price_action" : "";
        ?>
        <div class="catalog_item">
            <div class="catalog_item__img">
                <img src="<?= $product["src"] ?>"/>
            </div>
            <div class="catalog_item__price <?= $actionClass ?>">
                <?= $product["price"] ?> ₽
                <? if ($product["old_price"]): ?>
                <span class="catalog_item__old_price"><?= $product["old_price"] ?> ₽</span></div>
            <? endif; ?>
            <div class="catalog_item__body">
                <div class="catalog_item__body_line">
                    <div class="catalog_item__title">
                        <?= $product["name"] ?>
                    </div>
                    <div class="catalog_item__like">
                        <img src="../img/like.svg"/>
                    </div>
                </div>
                <div class="catalog_item__preview_text"><?= $product["description"] ?></div>
            </div>
            <button class="btn btn-buy">В корзину</button>
        </div>
    <? endforeach; ?>
</div>