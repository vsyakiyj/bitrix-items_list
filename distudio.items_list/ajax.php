<? 

$refererSiteName = preg_replace('#https?://([^/]*).*#', '$1', $_SERVER['HTTP_REFERER']);
$httpHost = preg_replace('/:[^:]*$/', '', $_SERVER['HTTP_HOST']);

if ($refererSiteName !== $httpHost || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

require_once __DIR__ . '/class.php';

$newOrder = new CIblocList;

