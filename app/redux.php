<?phpinclude_once("bootstrap.php");include_once("helpers.php");include_once("template_tags.php");rx_includeAll(INCPATH . '/controller/base/');rx_includeAll(INCPATH . '/controller/');rx_includeAll(INCPATH . '/model/');rx_includeAll(INCPATH . '/utility/');global $pageData;global $viewData;global $classMap;global $defaultCSS;$defaultCSS = array('960.css', 'search.css', 'style.css');$classMap = array(    'project' => array('Projects', function ($pageData, $viewData) {        $g = "\Controller\Pages\ProjectMain";        $g::main($pageData, $viewData);        $pageData->setView('project');    }),    'documents' => array('Documents', function ($pageData, $viewData) {        \Controller\Pages\DocumentMain::main($pageData, $viewData);        $pageData->setView('documents');    }),   'about' => array('About Us', function ($pageData, $viewData) {       \Controller\Pages\About::main($pageData, $viewData);       $pageData->setView('about');    }),    'alumni' => array('', function ($pageData, $viewData) {        \Controller\Pages\AlumniMain::main($pageData, $viewData);        $pageData->setView('alumni');    }),    'constitution' => array('Constitution/Bylaws', function ($pageData, $viewData) {       $viewData->setType('constitution');       $pageData->setView('constitution');    }),    'mission' => array('Mission', function ($pageData, $viewData) {       $viewData->setType('mission');       $pageData->setView('mission');    }),    // for URLs that don't appear in the navigation    'project-view' => array('', function ($pageData, $viewData) {        \Controller\Pages\ProjectView::main($pageData, $viewData);        $pageData->setView('project_view');    }),        'minutes-view' => array('', function ($pageData, $viewData) {        \Controller\Pages\MinutesView::main($pageData, $viewData);        $pageData->setView('minutes_view');    }),    'index' => array('', function ($pageData, $viewData) {        \Controller\Pages\Index::main($pageData, $viewData);        $pageData->setView('index');    }),       'alumni-view' => array('', function ($pageData, $viewData) {        \Controller\Pages\AlumniView::main($pageData, $viewData);        $pageData->setView('alumni_view');    }),        'page' => array('', function ($pageData, $viewData) {        \Controller\Pages\PageViewer::main($pageData, $viewData);        $pageData->setView('page');    }),    'press' => array('', function ($pageData, $viewData) {        \Controller\Pages\PressPageViewer::main($pageData, $viewData);        $pageData->setView('page');    }),    );$pageData = new \Controller\Page();$viewData = new \Controller\ViewData();$pageData->pushCSS($defaultCSS);