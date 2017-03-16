<?phpnamespace Library;abstract class BackController    extends ApplicationComponent{  protected $action = "";  protected $module = "";  protected $page = null;  protected $view = "";  protected $loadTemplate = true;  protected $contentType = "default";  public function __construct(Application $app, $module, $action, $loadTemplate, $contentType)  {    parent::__construct($app);    $this->page = new Page($app);    $this->setModule($module);    $this->setAction($action);    $this->setView($action);    $this->setLoadTemplate($loadTemplate);    $this->setContentType($contentType);  }  public function setModule($module)  {    if (is_string($module) == false || empty($module) == true)    {      throw new \InvalidArgumentException("The module has to be a valide string");    }    $this->module = $module;  }  public function setAction($action)  {    if (is_string($action) == false || empty($action) == true)    {      throw new \InvalidArgumentException("The action has to be a valid string");    }    $this->action = $action;  }  public function setView($view)  {    if (is_string($view) == false || empty($view) == true)    {      throw new \InvalidArgumentException("The view has to be a valid string");    }    $this->view = $view;    $this->page->setContentFile(__DIR__ . "/../Applications/" . $this->app->name() . "/Modules/" . $this->module . "/Views/" . $this->view . ".php");  }  public function setLoadTemplate($loadTemplate)  {    if (is_bool($loadTemplate) == false)    {      throw new \InvalidArgumentException("The 'loadTemplate' parameter has to be a boolean");    }    $this->loadTemplate = $loadTemplate;  }  public function setContentType($contentType)  {    $this->contentType = $contentType;  }  public function execute()  {    $method = "execute" . ucfirst($this->action);    if (is_callable(array($this, $method)) == false)    {      throw new \RuntimeException("The action \"" . $this->action . "\" is not defined for this module");    }    $this->$method($this->app->httpRequest());  }  public function page()  {    return $this->page;  }  public function loadTemplate()  {    return $this->loadTemplate;  }  public function contentType()  {    return $this->contentType;  }}