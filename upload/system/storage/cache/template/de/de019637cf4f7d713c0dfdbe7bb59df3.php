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

/* extension/opencart/admin/view/template/dashboard/activity_info.twig */
class __TwigTemplate_0c9ef7fea504cda4b7130a566555cb2f extends Template
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
        echo "<div class=\"card mb-3\">
  <div class=\"card-header\"><i class=\"fa-regular fa-calendar\"></i> ";
        // line 2
        echo ($context["heading_title"] ?? null);
        echo "</div>
  <ul class=\"list-group list-group-flush\">
    ";
        // line 4
        if (($context["activities"] ?? null)) {
            // line 5
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["activities"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["activity"]) {
                // line 6
                echo "        <li class=\"list-group-item\">";
                echo twig_get_attribute($this->env, $this->source, $context["activity"], "comment", [], "any", false, false, false, 6);
                echo "
          <br/>
          <small class=\"text-muted\"><i class=\"fa-solid fa-clock\"></i> ";
                // line 8
                echo twig_get_attribute($this->env, $this->source, $context["activity"], "date_added", [], "any", false, false, false, 8);
                echo "</small>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['activity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    ";
        } else {
            // line 12
            echo "      <li class=\"list-group-item text-center\">";
            echo ($context["text_no_results"] ?? null);
            echo "</li>
    ";
        }
        // line 14
        echo "  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "extension/opencart/admin/view/template/dashboard/activity_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 14,  70 => 12,  67 => 11,  58 => 8,  52 => 6,  47 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card mb-3\">
  <div class=\"card-header\"><i class=\"fa-regular fa-calendar\"></i> {{ heading_title }}</div>
  <ul class=\"list-group list-group-flush\">
    {% if activities %}
      {% for activity in activities %}
        <li class=\"list-group-item\">{{ activity.comment }}
          <br/>
          <small class=\"text-muted\"><i class=\"fa-solid fa-clock\"></i> {{ activity.date_added }}</small>
        </li>
      {% endfor %}
    {% else %}
      <li class=\"list-group-item text-center\">{{ text_no_results }}</li>
    {% endif %}
  </ul>
</div>
", "extension/opencart/admin/view/template/dashboard/activity_info.twig", "/var/www/html/extension/opencart/admin/view/template/dashboard/activity_info.twig");
    }
}
