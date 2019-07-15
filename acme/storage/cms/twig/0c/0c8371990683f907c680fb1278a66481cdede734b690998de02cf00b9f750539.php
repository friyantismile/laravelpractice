<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* C:\xampp\htdocs\laravel\acme/themes/responsiv-clean/pages/Contact.htm */
class __TwigTemplate_863dfbea44d05ac00c25835ae5cad9d9e976e5f40db333567c40bf6651c4b5ef extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<h1>Contact Us</h1>
<form>
    <div class=\"form-group\">
        <label>Full Name</label>
        <input class=\"form-control\" type=\"text\"/>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\laravel\\acme/themes/responsiv-clean/pages/Contact.htm";
    }

    public function getDebugInfo()
    {
        return array (  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h1>Contact Us</h1>
<form>
    <div class=\"form-group\">
        <label>Full Name</label>
        <input class=\"form-control\" type=\"text\"/>
    </div>
</form>", "C:\\xampp\\htdocs\\laravel\\acme/themes/responsiv-clean/pages/Contact.htm", "");
    }
}
