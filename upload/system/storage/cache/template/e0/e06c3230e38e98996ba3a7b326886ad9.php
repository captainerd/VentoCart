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

/* cp-akis/view//plates/extension/module.twig */
class __TwigTemplate_f5c866afa5ff20c8acf79fee0f5750de extends Template
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
        echo ($context["promotion"] ?? null);
        echo "
<fieldset>
  <legend>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</legend>
  <div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> ";
        // line 4
        echo ($context["text_layout"] ?? null);
        echo "</div>
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-start\">";
        // line 9
        echo ($context["column_name"] ?? null);
        echo "</td>
          <td class=\"text-start\">";
        // line 10
        echo ($context["column_status"] ?? null);
        echo "</td>
          <td class=\"text-end\">";
        // line 11
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 15
        if (($context["extensions"] ?? null)) {
            // line 16
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 17
                echo "            <tr>
              <td><b>";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 18);
                echo "</b></td>
              <td>";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "status", [], "any", false, false, false, 19);
                echo "</td>
              <td class=\"text-end text-nowrap\">
                ";
                // line 21
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 21)) {
                    // line 22
                    echo "                  ";
                    if (twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 22)) {
                        // line 23
                        echo "                    <a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "edit", [], "any", false, false, false, 23);
                        echo "\" data-bs-toggle=\"tooltip\" title=\"";
                        echo ($context["button_add"] ?? null);
                        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                  ";
                    } else {
                        // line 25
                        echo "                    <a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "edit", [], "any", false, false, false, 25);
                        echo "\" data-bs-toggle=\"tooltip\" title=\"";
                        echo ($context["button_edit"] ?? null);
                        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  ";
                    }
                    // line 27
                    echo "                ";
                } else {
                    // line 28
                    echo "                  <button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
                ";
                }
                // line 30
                echo "                ";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 30)) {
                    // line 31
                    echo "                  <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 31);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_install"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                ";
                } else {
                    // line 33
                    echo "                  <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 33);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_uninstall"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                ";
                }
                // line 34
                echo "</td>
            </tr>
            ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 36));
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    // line 37
                    echo "              <tr>
                <td class=\"text-start\">&nbsp;&nbsp;&nbsp;<i class=\"fa-solid fa-folder-open\"></i>&nbsp;&nbsp;&nbsp;";
                    // line 38
                    echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 38);
                    echo "</td>
                <td class=\"text-start\">";
                    // line 39
                    echo twig_get_attribute($this->env, $this->source, $context["module"], "status", [], "any", false, false, false, 39);
                    echo "</td>
                <td class=\"text-end text-nowrap\"><a href=\"";
                    // line 40
                    echo twig_get_attribute($this->env, $this->source, $context["module"], "edit", [], "any", false, false, false, 40);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_edit"] ?? null);
                    echo "\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-pencil\"></i></a> <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["module"], "delete", [], "any", false, false, false, 40);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_delete"] ?? null);
                    echo "\" class=\"btn btn-outline-danger\"><i class=\"fa-regular fa-trash-can\"></i></a></td>
              </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "        ";
        } else {
            // line 45
            echo "          <tr>
            <td class=\"text-center\" colspan=\"3\">";
            // line 46
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 49
        echo "      </tbody>
    </table>
  </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/module.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 49,  181 => 46,  178 => 45,  175 => 44,  169 => 43,  154 => 40,  150 => 39,  146 => 38,  143 => 37,  139 => 36,  135 => 34,  127 => 33,  119 => 31,  116 => 30,  112 => 28,  109 => 27,  101 => 25,  93 => 23,  90 => 22,  88 => 21,  83 => 19,  79 => 18,  76 => 17,  71 => 16,  69 => 15,  62 => 11,  58 => 10,  54 => 9,  46 => 4,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ promotion }}
<fieldset>
  <legend>{{ heading_title }}</legend>
  <div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_layout }}</div>
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-start\">{{ column_name }}</td>
          <td class=\"text-start\">{{ column_status }}</td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if extensions %}
          {% for extension in extensions %}
            <tr>
              <td><b>{{ extension.name }}</b></td>
              <td>{{ extension.status }}</td>
              <td class=\"text-end text-nowrap\">
                {% if extension.installed %}
                  {% if extension.module %}
                    <a href=\"{{ extension.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                  {% else %}
                    <a href=\"{{ extension.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  {% endif %}
                {% else %}
                  <button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
                {% endif %}
                {% if not extension.installed %}
                  <a href=\"{{ extension.install }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                {% else %}
                  <a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                {% endif %}</td>
            </tr>
            {% for module in extension.module %}
              <tr>
                <td class=\"text-start\">&nbsp;&nbsp;&nbsp;<i class=\"fa-solid fa-folder-open\"></i>&nbsp;&nbsp;&nbsp;{{ module.name }}</td>
                <td class=\"text-start\">{{ module.status }}</td>
                <td class=\"text-end text-nowrap\"><a href=\"{{ module.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-pencil\"></i></a> <a href=\"{{ module.delete }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" class=\"btn btn-outline-danger\"><i class=\"fa-regular fa-trash-can\"></i></a></td>
              </tr>
            {% endfor %}
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"3\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
</fieldset>
", "cp-akis/view//plates/extension/module.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/module.twig");
    }
}
