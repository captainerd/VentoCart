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

/* cp-akis/view//plates/design/theme_history.twig */
class __TwigTemplate_e6e150262bef22398cd05b03b94ab243 extends Template
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
        echo "<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <td class=\"text-start\">";
        // line 5
        echo ($context["column_store"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 6
        echo ($context["column_route"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 7
        echo ($context["column_date_added"] ?? null);
        echo "</td>
        <td class=\"text-end\">";
        // line 8
        echo ($context["column_action"] ?? null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
      ";
        // line 12
        if (($context["histories"] ?? null)) {
            // line 13
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["histories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["history"]) {
                // line 14
                echo "          <tr>
            <td class=\"text-start\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["history"], "store", [], "any", false, false, false, 15);
                echo "
              <input type=\"hidden\" name=\"store_id\" value=\"";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["history"], "store_id", [], "any", false, false, false, 16);
                echo "\"/></td>
            <td class=\"text-start\">";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["history"], "route", [], "any", false, false, false, 17);
                echo "
              <input type=\"hidden\" name=\"path\" value=\"";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["history"], "route", [], "any", false, false, false, 18);
                echo "\"/></td>
            <td class=\"text-start\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["history"], "date_added", [], "any", false, false, false, 19);
                echo "</td>
            <td class=\"text-end text-nowrap\"><a href=\"";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["history"], "edit", [], "any", false, false, false, 20);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["history"], "delete", [], "any", false, false, false, 20);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_delete"] ?? null);
                echo "\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></a></td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['history'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "      ";
        } else {
            // line 24
            echo "        <tr>
          <td class=\"text-center\" colspan=\"4\">";
            // line 25
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
      ";
        }
        // line 28
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">";
        // line 32
        echo ($context["pagination"] ?? null);
        echo "</div>
  <div class=\"col-sm-6 text-end\">";
        // line 33
        echo ($context["results"] ?? null);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/design/theme_history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 33,  125 => 32,  119 => 28,  113 => 25,  110 => 24,  107 => 23,  92 => 20,  88 => 19,  84 => 18,  80 => 17,  76 => 16,  72 => 15,  69 => 14,  64 => 13,  62 => 12,  55 => 8,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <td class=\"text-start\">{{ column_store }}</td>
        <td class=\"text-start\">{{ column_route }}</td>
        <td class=\"text-start\">{{ column_date_added }}</td>
        <td class=\"text-end\">{{ column_action }}</td>
      </tr>
    </thead>
    <tbody>
      {% if histories %}
        {% for history in histories %}
          <tr>
            <td class=\"text-start\">{{ history.store }}
              <input type=\"hidden\" name=\"store_id\" value=\"{{ history.store_id }}\"/></td>
            <td class=\"text-start\">{{ history.route }}
              <input type=\"hidden\" name=\"path\" value=\"{{ history.route }}\"/></td>
            <td class=\"text-start\">{{ history.date_added }}</td>
            <td class=\"text-end text-nowrap\"><a href=\"{{ history.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a> <a href=\"{{ history.delete }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></a></td>
          </tr>
        {% endfor %}
      {% else %}
        <tr>
          <td class=\"text-center\" colspan=\"4\">{{ text_no_results }}</td>
        </tr>
      {% endif %}
    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
  <div class=\"col-sm-6 text-end\">{{ results }}</div>
</div>
", "cp-akis/view//plates/design/theme_history.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/design/theme_history.twig");
    }
}
