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

/* cp-akis/view//plates/marketplace/cron_list.twig */
class __TwigTemplate_2ccce74652dac3214895cb63fbc0eba7 extends Template
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
        echo "<form id=\"form-cron\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#cron\">
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
          <td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_cycle"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "cycle")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_cycle"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 9
        echo ($context["sort_action"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "action")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_action"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 10
        echo ($context["sort_date_added"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "date_added")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_added"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 11
        echo ($context["sort_date_modified"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "date_modified")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_modified"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 12
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 16
        if (($context["crons"] ?? null)) {
            // line 17
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["crons"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cron"]) {
                // line 18
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 19);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "code", [], "any", false, false, false, 20);
                echo "</td>
              <td class=\"text-start\">";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "cycle", [], "any", false, false, false, 21);
                echo "</td>
              <td class=\"text-start\">";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "action", [], "any", false, false, false, 22);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "date_added", [], "any", false, false, false, 23);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "date_modified", [], "any", false, false, false, 24);
                echo "</td>
              <td class=\"text-end text-nowrap\">
                ";
                // line 26
                if (twig_get_attribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 26)) {
                    // line 27
                    echo "                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cron-";
                    echo twig_get_attribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 27);
                    echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                } else {
                    // line 29
                    echo "                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                }
                // line 31
                echo "                <button type=\"button\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "run", [], "any", false, false, false, 31);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_run"] ?? null);
                echo "\" class=\"btn btn-warning\"><i class=\"fa-solid fa-play\"></i></button>
                ";
                // line 32
                if ( !twig_get_attribute($this->env, $this->source, $context["cron"], "status", [], "any", false, false, false, 32)) {
                    // line 33
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["cron"], "enable", [], "any", false, false, false, 33);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_enable"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
                } else {
                    // line 35
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["cron"], "disable", [], "any", false, false, false, 35);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_disable"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
                }
                // line 36
                echo "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cron'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        ";
        } else {
            // line 40
            echo "          <tr>
            <td class=\"text-center\" colspan=\"7\">";
            // line 41
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 44
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 48
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 49
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>
";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["crons"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cron"]) {
            // line 53
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 53)) {
                // line 54
                echo "    <div id=\"modal-cron-";
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 54);
                echo "\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
                // line 58
                echo ($context["text_info"] ?? null);
                echo "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>";
                // line 61
                echo twig_get_attribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 61);
                echo "</textarea></div>
        </div>
      </div>
    </div>
  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cron'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/cron_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 61,  237 => 58,  229 => 54,  226 => 53,  222 => 52,  216 => 49,  212 => 48,  206 => 44,  200 => 41,  197 => 40,  194 => 39,  186 => 36,  178 => 35,  170 => 33,  168 => 32,  161 => 31,  157 => 29,  151 => 27,  149 => 26,  144 => 24,  140 => 23,  136 => 22,  132 => 21,  128 => 20,  124 => 19,  121 => 18,  116 => 17,  114 => 16,  107 => 12,  95 => 11,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-cron\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#cron\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\"><a href=\"{{ sort_code }}\"{% if sort == 'code' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_code }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_cycle }}\"{% if sort == 'cycle' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_cycle }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_action }}\"{% if sort == 'action' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_action }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 'date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_modified }}\"{% if sort == 'date_modified' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_modified }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if crons %}
          {% for cron in crons %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ cron.cron_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">{{ cron.code }}</td>
              <td class=\"text-start\">{{ cron.cycle }}</td>
              <td class=\"text-start\">{{ cron.action }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ cron.date_added }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ cron.date_modified }}</td>
              <td class=\"text-end text-nowrap\">
                {% if cron.description %}
                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cron-{{ cron.cron_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                {% else %}
                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                {% endif %}
                <button type=\"button\" value=\"{{ cron.run }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_run }}\" class=\"btn btn-warning\"><i class=\"fa-solid fa-play\"></i></button>
                {% if not cron.status %}
                  <button type=\"button\" value=\"{{ cron.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" value=\"{{ cron.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}</td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"7\">{{ text_no_results }}</td>
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
{% for cron in crons %}
  {% if cron.description %}
    <div id=\"modal-cron-{{ cron.cron_id }}\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>{{ cron.description }}</textarea></div>
        </div>
      </div>
    </div>
  {% endif %}
{% endfor %}", "cp-akis/view//plates/marketplace/cron_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/cron_list.twig");
    }
}
