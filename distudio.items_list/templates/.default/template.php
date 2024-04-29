<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<section class="style__group-small" id="style__group-small">
	<h3 class="style__title"></h3>
	<ul class="style__list">

<?  
foreach($arResult["ITEMS"] as $arItem):?>

    <li id="accessory-item-<?=$arItem["ID"]?>">
		<label for="id-essential-accessories-group-<?=$arItem["ID"]?>" class="checkable accessory-item">
			<input type="checkbox" id="id-essential-accessories-group-<?=$arItem["ID"]?>" name="group[]" class="">
			<div class="style__wrapper style__new-combo-wrapper">
				<div class="style__wrapper-inner">
				
					
				
					<div class="style__content___y3zNb">
						<div class="style__care-content-row___udsGq">
							<div class="style__content-left-side___ZGt-K">
								<header>
									<div role="presentation" class="style__product-title-v2___c8PG0"><?=$arItem["NAME"]?></div>
								</header>
							</div>
							<div class="style__money-wrapper___5euFO">
								<div class="style__money___T5bx7" style="font-size: 16px; display: inline-block;">
									<div class="style__block-price___+Ic1D">
										<span class="style__price___D132C style__normal-price___FcKyW"><?=$arItem["PRICE"]?></span>
									</div>
								</div>
							</div>
							<div data-test-locator="counter" class="style__quantity___13HRw style__container___te4ct">
								<button type="button" data-test-locator="btnDecrease" aria-label="minus" disabled="">
									<i class="_6cr8a _3c0Qz" style="font-family: quark;"></i>
								</button>
								<input type="number" data-test-locator="inputCounterValue" step="1" min="1" max="50" readonly="" value="1">
								<button type="button" data-test-locator="btnIncrease" aria-label="plus">
									<i class="_3BSr4 _3c0Qz" style="font-family: quark;"></i>
								</button>
							</div>
							<div class="lCk-C" style="height: 32px;"></div>
							<p class="default-link-style style__extra-info___mgknG style__text-info-no-border___5NNs5"><?=$arItem["DESC"]?></p>
						
							<form action="<?=$arResult['AJAX_URL']?>">
								<button class="buy-button" data-product-id="1" data-quantity="1">Купить</button>
							</form>
							
						</div>
					</div>
				
				</div>
			</div>
		</label>
	</li>

<?endforeach;?>
		
	</ul>
</section>