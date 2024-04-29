<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// класс для всех исключений в системе
use Bitrix\Main\SystemException;
// класс для загрузки необходимых файлов, классов, модулей
use Bitrix\Main\Loader;

// основной класс, является оболочкой компонента унаследованного от CBitrixComponent
class CIblocList extends CBitrixComponent
{
    // выполняет основной код компонента, аналог конструктора (метод подключается автоматически)
    public function executeComponent()
    {
        try {
            // подключаем метод проверки подключения модуля «Информационные блоки»
            $this->checkModules(); 
            // подключаем метод подготовки массива $arResult
            $this->getResult();
			 
        } catch (SystemException $e) {
            ShowError($e->getMessage());
        }
	}
	
    // проверяем установку модуля «Информационные блоки» (метод подключается внутри класса try...catch)
    protected function checkModules()
    {
        // если модуль не подключен
        if (!Loader::includeModule('iblock'))
            // выводим сообщение в catch
            throw new SystemException('iblock не подключен');
    }
	   
    // подготовка массива $arResult (метод подключается внутри класса try...catch)
    protected function getResult()
    { 
        // если нет валидного кеша, получаем данные из БД
        if ($this->startResultCache()) {
			  
			$ajaxFile = __DIR__ . '/ajax.php';
			$this->arResult['AJAX_URL'] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $ajaxFile); 
  
			$this->arResult["ITEMS"] = $this->arParams["ITEMS"];  
			   
            // кэш не затронет весь код ниже, он будут выполняться на каждом хите, здесь работаем с другим $arResult, будут доступны только те ключи массива, которые перечислены в вызове SetResultCacheKeys()
            if (isset($this->arResult)) {
                // ключи $arResult перечисленные при вызове этого метода, будут доступны в component_epilog.php и ниже по коду, обратите внимание там будет другой $arResult
                $this->SetResultCacheKeys(
                    array()
                );
                // подключаем шаблон и сохраняем кеш
                $this->IncludeComponentTemplate();
            } else { // если выяснилось что кешировать данные не требуется, прерываем кеширование 
                $this->AbortResultCache();
                 
            }
        }
    }
	
	// метод добавления в корзину товара
    public function proccessRequest($request) 
	{
         
    }
}