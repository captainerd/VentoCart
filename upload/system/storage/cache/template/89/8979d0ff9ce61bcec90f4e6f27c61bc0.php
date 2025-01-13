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

/* cp-akis/view//plates/marketplace/event_list.twig */
class __TwigTemplate_9701f43c34f3eb8e3bed726a8a7e8e12 extends Template
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
        echo "<form id=\"form-event\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#event\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\"><a href=\"";
        // line 7
        echo ($context["sort_code"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "code")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_code"] ?? null);
        echo "</a></td>
          <td class=\"text-end d-none d-lg-table-cell\"><a href=\"";
        // line 8
        echo ($context["sort_sort_order"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "sort_order")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_sort_order"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 9
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 13
        if (($context["events"] ?? null)) {
            // line 14
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 15
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 16);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["event"], "code", [], "any", false, false, false, 17);
                echo "</td>
              <td class=\"text-end d-none d-lg-table-cell\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["event"], "sort_order", [], "any", false, false, false, 18);
                echo "</td>
              <td class=\"text-end text-nowrap\">
                ";
                // line 20
                if (twig_get_attribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 20)) {
                    // line 21
                    echo "                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-event-";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 21);
                    echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                } else {
                    // line 23
                    echo "                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                }
                // line 25
                echo "                ";
                if ( !twig_get_attribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 25)) {
                    // line 26
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "enable", [], "any", false, false, false, 26);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_enable"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
                } else {
                    // line 28
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "disable", [], "any", false, false, false, 28);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_disable"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
                }
                // line 29
                echo "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "        ";
        } else {
            // line 33
            echo "          <tr>
            <td class=\"text-center\" colspan=\"4\">";
            // line 34
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 37
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 41
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 42
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>
";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 46
            echo "  <div id=\"modal-event-";
            echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 46);
            echo "\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
            // line 50
            echo ($context["text_info"] ?? null);
            echo "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 55
            echo ($context["entry_description"] ?? null);
            echo "</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>";
            // line 56
            echo twig_get_attribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 56);
            echo "</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 59
            echo ($context["entry_trigger"] ?? null);
            echo "</label>
            <textarea class=\"form-control\" readonly>";
            // line 60
            echo twig_get_attribute($this->env, $this->source, $context["event"], "trigger", [], "any", false, false, false, 60);
            echo "</textarea>
          </div>
          <div>
            <label class=\"form-label\">";
            // line 63
            echo ($context["entry_action"] ?? null);
            echo "</label>
            <textarea class=\"form-control\" readonly>";
            // line 64
            echo twig_get_attribute($this->env, $this->source, $context["event"], "action", [], "any", false, false, false, 64);
            echo "</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/event_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 64,  208 => 63,  202 => 60,  198 => 59,  192 => 56,  188 => 55,  180 => 50,  172 => 46,  168 => 45,  162 => 42,  158 => 41,  152 => 37,  146 => 34,  143 => 33,  140 => 32,  132 => 29,  124 => 28,  116 => 26,  113 => 25,  109 => 23,  103 => 21,  101 => 20,  96 => 18,  92 => 17,  88 => 16,  85 => 15,  80 => 14,  78 => 13,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-event\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#event\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\"><a href=\"{{ sort_code }}\"{% if sort == 'code' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_code }}</a></td>
          <td class=\"text-end d-none d-lg-table-cell\"><a href=\"{{ sort_sort_order }}\"{% if sort == 'sort_order' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_sort_order }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if events %}
          {% for event in events %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ event.event_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">{{ event.code }}</td>
              <td class=\"text-end d-none d-lg-table-cell\">{{ event.sort_order }}</td>
              <td class=\"text-end text-nowrap\">
                {% if event.description %}
                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-event-{{ event.event_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                {% else %}
                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                {% endif %}
                {% if not event.status %}
                  <button type=\"button\" value=\"{{ event.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" value=\"{{ event.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}</td>
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
</form>
{% for event in events %}
  <div id=\"modal-event-{{ event.event_id }}\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_description }}</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>{{ event.description }}</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_trigger }}</label>
            <textarea class=\"form-control\" readonly>{{ event.trigger }}</textarea>
          </div>
          <div>
            <label class=\"form-label\">{{ entry_action }}</label>
            <textarea class=\"form-control\" readonly>{{ event.action }}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endfor %}", "cp-akis/view//plates/marketplace/event_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/event_list.twig");
    }
}
