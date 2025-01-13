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

/* cp-akis/view//plates/sale/order_history.twig */
class __TwigTemplate_9909ccff3e42c4d2f664e8ec0a37412a extends Template
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
        echo ($context["column_date_added"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 6
        echo ($context["column_comment"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 7
        echo ($context["column_status"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 8
        echo ($context["column_notify"] ?? null);
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
                echo twig_get_attribute($this->env, $this->source, $context["history"], "date_added", [], "any", false, false, false, 15);
                echo "</td>
            <td class=\"text-start\">";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["history"], "comment", [], "any", false, false, false, 16);
                echo "</td>
            <td class=\"text-start\">";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["history"], "status", [], "any", false, false, false, 17);
                echo "</td>
            <td class=\"text-start\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["history"], "notify", [], "any", false, false, false, 18);
                echo "</td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['history'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "      ";
        } else {
            // line 22
            echo "        <tr>
          <td class=\"text-center\" colspan=\"4\">";
            // line 23
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
      ";
        }
        // line 26
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">";
        // line 30
        echo ($context["pagination"] ?? null);
        echo "</div>
  <div class=\"col-sm-6 text-end\">";
        // line 31
        echo ($context["results"] ?? null);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/sale/order_history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 31,  111 => 30,  105 => 26,  99 => 23,  96 => 22,  93 => 21,  84 => 18,  80 => 17,  76 => 16,  72 => 15,  69 => 14,  64 => 13,  62 => 12,  55 => 8,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <td class=\"text-start\">{{ column_date_added }}</td>
        <td class=\"text-start\">{{ column_comment }}</td>
        <td class=\"text-start\">{{ column_status }}</td>
        <td class=\"text-start\">{{ column_notify }}</td>
      </tr>
    </thead>
    <tbody>
      {% if histories %}
        {% for history in histories %}
          <tr>
            <td class=\"text-start\">{{ history.date_added }}</td>
            <td class=\"text-start\">{{ history.comment }}</td>
            <td class=\"text-start\">{{ history.status }}</td>
            <td class=\"text-start\">{{ history.notify }}</td>
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
", "cp-akis/view//plates/sale/order_history.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/sale/order_history.twig");
    }
}
