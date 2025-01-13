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

/* cp-akis/view/default/plates/extension/ventocart/dashboard/customer_info.twig */
class __TwigTemplate_082684c9264e15ddd9b64ef7b489b316 extends Template
{
    private $source;
    private $macros = [];

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
        $macros = $this->macros;
        // line 1
        echo "<div class=\"tile tile-primary\">
  <div class=\"tile-heading\">";
        // line 2
        echo ($context["heading_title"] ?? null);
        echo " <span class=\"float-end\">
    ";
        // line 3
        if ((($context["percentage"] ?? null) > 0)) {
            // line 4
            echo "      <i class=\"fa-solid fa-caret-up\"></i>
    ";
        } elseif ((        // line 5
($context["percentage"] ?? null) < 0)) {
            // line 6
            echo "      <i class=\"fa-solid fa-caret-down\"></i>
    ";
        }
        // line 8
        echo "      ";
        echo ($context["percentage"] ?? null);
        echo "%</span></div>
  <div class=\"tile-body\"><i class=\"fa-solid fa-user\"></i>
    <h2 class=\"float-end\">";
        // line 10
        echo ($context["total"] ?? null);
        echo "</h2>
  </div>
  <div class=\"tile-footer\"><a href=\"";
        // line 12
        echo ($context["customer"] ?? null);
        echo "\">";
        echo ($context["text_view"] ?? null);
        echo "</a></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/extension/ventocart/dashboard/customer_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 12,  61 => 10,  55 => 8,  51 => 6,  49 => 5,  46 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"tile tile-primary\">
  <div class=\"tile-heading\">{{ heading_title }} <span class=\"float-end\">
    {% if percentage > 0 %}
      <i class=\"fa-solid fa-caret-up\"></i>
    {% elseif percentage < 0 %}
      <i class=\"fa-solid fa-caret-down\"></i>
    {% endif %}
      {{ percentage }}%</span></div>
  <div class=\"tile-body\"><i class=\"fa-solid fa-user\"></i>
    <h2 class=\"float-end\">{{ total }}</h2>
  </div>
  <div class=\"tile-footer\"><a href=\"{{ customer }}\">{{ text_view }}</a></div>
</div>
", "cp-akis/view/default/plates/extension/ventocart/dashboard/customer_info.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/extension/ventocart/dashboard/customer_info.twig");
    }
}
