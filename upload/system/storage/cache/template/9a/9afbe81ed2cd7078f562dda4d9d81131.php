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

/* cp-akis/view/default/plates/marketplace/installer_extension.twig */
class __TwigTemplate_49d3febdb13dd7542855a1b2c894de68 extends Template
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
  <table class=\"table table-bordered table-hover\">
    <thead>
      <tr>
        <td class=\"text-start\"><a href=\"";
        // line 5
        echo ($context["sort_name"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "name")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_name"] ?? null);
        echo "</a></td>
        <td class=\"text-start\"><a href=\"";
        // line 6
        echo ($context["sort_version"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "version")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_version"] ?? null);
        echo "</a></td>
        <td class=\"text-start\"><a href=\"";
        // line 7
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
        <td class=\"text-end\" style=\"min-width: 105px;\">";
        // line 8
        echo ($context["column_action"] ?? null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
      ";
        // line 12
        if (($context["extensions"] ?? null)) {
            // line 13
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 14
                echo "          <tr>
            <td class=\"text-start\">
              ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "link", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "                <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "link", [], "any", false, false, false, 17);
                    echo "\" target=\"_blank\">";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 17);
                    echo "</a>
              ";
                } else {
                    // line 19
                    echo "                ";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 19);
                    echo "
              ";
                }
                // line 21
                echo "            </td>
            <td class=\"text-start align-text-top\">";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "version", [], "any", false, false, false, 22);
                echo "</td>
            <td class=\"text-start align-text-top\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "date_added", [], "any", false, false, false, 23);
                echo "</td>
            <td class=\"text-end align-text-top text-nowrap\">
                            <a href=\"";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "download", [], "any", false, false, false, 25);
                echo "\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_extract"] ?? null);
                echo "\" style=\"background-color: #28a745; color: white;  cursor: pointer;\" class=\"btn   \"><i class=\"fa-solid fa-download\"></i></a>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#extension-install-";
                // line 26
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "extension_install_id", [], "any", false, false, false, 26);
                echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
              ";
                // line 27
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "status", [], "any", false, false, false, 27)) {
                    echo "  
                <a href=\"";
                    // line 28
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 28);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_install"] ?? null);
                    echo "\" class=\"btn extmarbuttons btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                <a href=\"";
                    // line 29
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "delete", [], "any", false, false, false, 29);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_delete"] ?? null);
                    echo "\" class=\"btn extmarbuttons btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></a>
              ";
                } else {
                    // line 31
                    echo "                <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 31);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_uninstall"] ?? null);
                    echo "\" class=\"btn extmarbuttons btn-warning\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
                    // line 32
                    echo ($context["button_delete"] ?? null);
                    echo "\" class=\"btn btn-danger\" disabled><i class=\"fa-regular fa-trash-can\"></i></button>
              ";
                }
                // line 34
                echo "            </td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "      ";
        } else {
            // line 38
            echo "        <tr>
          <td class=\"text-center\" colspan=\"4\">";
            // line 39
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
      ";
        }
        // line 42
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">";
        // line 46
        echo ($context["pagination"] ?? null);
        echo "</div>
  <div class=\"col-sm-6 text-end\">";
        // line 47
        echo ($context["results"] ?? null);
        echo "</div>
</div>
";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            // line 50
            echo "  <div id=\"extension-install-";
            echo twig_get_attribute($this->env, $this->source, $context["extension"], "extension_install_id", [], "any", false, false, false, 50);
            echo "\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
            // line 54
            echo ($context["text_info"] ?? null);
            echo "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 59
            echo ($context["entry_name"] ?? null);
            echo "</label> <input type=\"text\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 59);
            echo "\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 62
            echo ($context["entry_description"] ?? null);
            echo "</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>";
            // line 63
            echo twig_get_attribute($this->env, $this->source, $context["extension"], "description", [], "any", false, false, false, 63);
            echo "</textarea>
          </div>
          <div>
            <label class=\"form-label\">";
            // line 66
            echo ($context["entry_code"] ?? null);
            echo "</label> <input type=\"text\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 66);
            echo "\" class=\"form-control\" readonly/>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "
 ";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/marketplace/installer_extension.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 73,  237 => 66,  231 => 63,  227 => 62,  219 => 59,  211 => 54,  203 => 50,  199 => 49,  194 => 47,  190 => 46,  184 => 42,  178 => 39,  175 => 38,  172 => 37,  164 => 34,  159 => 32,  152 => 31,  145 => 29,  139 => 28,  135 => 27,  131 => 26,  125 => 25,  120 => 23,  116 => 22,  113 => 21,  107 => 19,  99 => 17,  97 => 16,  93 => 14,  88 => 13,  86 => 12,  79 => 8,  67 => 7,  55 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
  <table class=\"table table-bordered table-hover\">
    <thead>
      <tr>
        <td class=\"text-start\"><a href=\"{{ sort_name }}\"{% if sort == 'name' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_name }}</a></td>
        <td class=\"text-start\"><a href=\"{{ sort_version }}\"{% if sort == 'version' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_version }}</a></td>
        <td class=\"text-start\"><a href=\"{{ sort_date_added }}\"{% if sort == 'date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
        <td class=\"text-end\" style=\"min-width: 105px;\">{{ column_action }}</td>
      </tr>
    </thead>
    <tbody>
      {% if extensions %}
        {% for extension in extensions %}
          <tr>
            <td class=\"text-start\">
              {% if extension.link %}
                <a href=\"{{ extension.link }}\" target=\"_blank\">{{ extension.name }}</a>
              {% else %}
                {{ extension.name }}
              {% endif %}
            </td>
            <td class=\"text-start align-text-top\">{{ extension.version }}</td>
            <td class=\"text-start align-text-top\">{{ extension.date_added }}</td>
            <td class=\"text-end align-text-top text-nowrap\">
                            <a href=\"{{ extension.download }}\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"{{ button_extract }}\" style=\"background-color: #28a745; color: white;  cursor: pointer;\" class=\"btn   \"><i class=\"fa-solid fa-download\"></i></a>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#extension-install-{{ extension.extension_install_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
              {% if not extension.status %}  
                <a href=\"{{ extension.install }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn extmarbuttons btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                <a href=\"{{ extension.delete }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" class=\"btn extmarbuttons btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></a>
              {% else %}
                <a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn extmarbuttons btn-warning\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" class=\"btn btn-danger\" disabled><i class=\"fa-regular fa-trash-can\"></i></button>
              {% endif %}
            </td>
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
{% for extension in extensions %}
  <div id=\"extension-install-{{ extension.extension_install_id }}\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_name }}</label> <input type=\"text\" value=\"{{ extension.name }}\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_description }}</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>{{ extension.description }}</textarea>
          </div>
          <div>
            <label class=\"form-label\">{{ entry_code }}</label> <input type=\"text\" value=\"{{ extension.code }}\" class=\"form-control\" readonly/>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endfor %}

 ", "cp-akis/view/default/plates/marketplace/installer_extension.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/marketplace/installer_extension.twig");
    }
}
