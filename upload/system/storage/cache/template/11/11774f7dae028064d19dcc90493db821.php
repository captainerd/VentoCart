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

/* admin/view/template/common/column_left.twig */
class __TwigTemplate_066e8f638dbc975d054618c52ac7f330 extends Template
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
        echo "<nav id=\"column-left\">
\t<div id=\"navigation\"><span class=\"fa-solid fa-bars\"></span> ";
        // line 2
        echo ($context["text_navigation"] ?? null);
        echo "</div>
\t<ul id=\"menu\">
\t\t";
        // line 4
        $context["i"] = 0;
        // line 5
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 6
            echo "\t\t\t<li id=\"";
            echo twig_get_attribute($this->env, $this->source, $context["menu"], "id", [], "any", false, false, false, 6);
            echo "\">
\t\t\t\t";
            // line 7
            if (twig_get_attribute($this->env, $this->source, $context["menu"], "href", [], "any", false, false, false, 7)) {
                // line 8
                echo "\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["menu"], "href", [], "any", false, false, false, 8);
                echo "\"><i class=\"";
                echo twig_get_attribute($this->env, $this->source, $context["menu"], "icon", [], "any", false, false, false, 8);
                echo "\"></i> ";
                echo twig_get_attribute($this->env, $this->source, $context["menu"], "name", [], "any", false, false, false, 8);
                echo "</a>
\t\t\t\t";
            } else {
                // line 10
                echo "\t\t\t\t\t<a href=\"#collapse-";
                echo ($context["i"] ?? null);
                echo "\" data-bs-toggle=\"collapse\" class=\"parent collapsed\"><i class=\"";
                echo twig_get_attribute($this->env, $this->source, $context["menu"], "icon", [], "any", false, false, false, 10);
                echo "\"></i> ";
                echo twig_get_attribute($this->env, $this->source, $context["menu"], "name", [], "any", false, false, false, 10);
                echo "</a>
\t\t\t\t";
            }
            // line 12
            echo "\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 12)) {
                // line 13
                echo "\t\t\t\t\t<ul id=\"collapse-";
                echo ($context["i"] ?? null);
                echo "\" class=\"collapse\">
\t\t\t\t\t\t";
                // line 14
                $context["j"] = 0;
                // line 15
                echo "\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 15));
                foreach ($context['_seq'] as $context["_key"] => $context["children_1"]) {
                    // line 16
                    echo "\t\t\t\t\t\t\t<li>";
                    if (twig_get_attribute($this->env, $this->source, $context["children_1"], "href", [], "any", false, false, false, 16)) {
                        // line 17
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["children_1"], "href", [], "any", false, false, false, 17);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["children_1"], "name", [], "any", false, false, false, 17);
                        echo "</a>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 19
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"#collapse-";
                        echo ($context["i"] ?? null);
                        echo "-";
                        echo ($context["j"] ?? null);
                        echo "\" data-bs-toggle=\"collapse\" class=\"parent collapsed\">";
                        echo twig_get_attribute($this->env, $this->source, $context["children_1"], "name", [], "any", false, false, false, 19);
                        echo "</a>
\t\t\t\t\t\t\t\t";
                    }
                    // line 21
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["children_1"], "children", [], "any", false, false, false, 21)) {
                        // line 22
                        echo "\t\t\t\t\t\t\t\t\t<ul id=\"collapse-";
                        echo ($context["i"] ?? null);
                        echo "-";
                        echo ($context["j"] ?? null);
                        echo "\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 23
                        $context["k"] = 0;
                        // line 24
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["children_1"], "children", [], "any", false, false, false, 24));
                        foreach ($context['_seq'] as $context["_key"] => $context["children_2"]) {
                            // line 25
                            echo "\t\t\t\t\t\t\t\t\t\t\t<li>";
                            if (twig_get_attribute($this->env, $this->source, $context["children_2"], "href", [], "any", false, false, false, 25)) {
                                // line 26
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["children_2"], "href", [], "any", false, false, false, 26);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["children_2"], "name", [], "any", false, false, false, 26);
                                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 28
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#collapse-";
                                echo ($context["i"] ?? null);
                                echo "-";
                                echo ($context["j"] ?? null);
                                echo "-";
                                echo ($context["k"] ?? null);
                                echo "\" data-bs-toggle=\"collapse\" class=\"parent collapsed\">";
                                echo twig_get_attribute($this->env, $this->source, $context["children_2"], "name", [], "any", false, false, false, 28);
                                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 30
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["children_2"], "children", [], "any", false, false, false, 30)) {
                                // line 31
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<ul id=\"collapse-";
                                echo ($context["i"] ?? null);
                                echo "-";
                                echo ($context["j"] ?? null);
                                echo "-";
                                echo ($context["k"] ?? null);
                                echo "\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 32
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["children_2"], "children", [], "any", false, false, false, 32));
                                foreach ($context['_seq'] as $context["_key"] => $context["children_3"]) {
                                    // line 33
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["children_3"], "href", [], "any", false, false, false, 33);
                                    echo "\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["children_3"], "name", [], "any", false, false, false, 33);
                                    echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_3'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 35
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 36
                            echo "</li>
\t\t\t\t\t\t\t\t\t\t\t";
                            // line 37
                            $context["k"] = (($context["k"] ?? null) + 1);
                            // line 38
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_2'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 39
                        echo "\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t";
                    }
                    // line 41
                    echo "\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                    // line 42
                    $context["j"] = (($context["j"] ?? null) + 1);
                    // line 43
                    echo "\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_1'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "\t\t\t\t\t</ul>
\t\t\t\t";
            }
            // line 46
            echo "\t\t\t</li>
\t\t\t";
            // line 47
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 48
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "\t</ul>
\t";
        // line 50
        if (($context["statistics_status"] ?? null)) {
            // line 51
            echo "\t\t<div id=\"stats\">
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<div>";
            // line 54
            echo ($context["text_complete_status"] ?? null);
            echo " <span class=\"float-end\">";
            echo ($context["complete_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"";
            // line 56
            echo ($context["complete_status"] ?? null);
            echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
            echo ($context["complete_status"] ?? null);
            echo "%\"><span class=\"sr-only\">";
            echo ($context["complete_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div>";
            // line 60
            echo ($context["text_processing_status"] ?? null);
            echo " <span class=\"float-end\">";
            echo ($context["processing_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"";
            // line 62
            echo ($context["processing_status"] ?? null);
            echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
            echo ($context["processing_status"] ?? null);
            echo "%\"><span class=\"sr-only\">";
            echo ($context["processing_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div>";
            // line 66
            echo ($context["text_other_status"] ?? null);
            echo " <span class=\"float-end\">";
            echo ($context["other_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"";
            // line 68
            echo ($context["other_status"] ?? null);
            echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
            echo ($context["other_status"] ?? null);
            echo "%\"><span class=\"sr-only\">";
            echo ($context["other_status"] ?? null);
            echo "%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t";
        }
        // line 74
        echo "</nav>
";
    }

    public function getTemplateName()
    {
        return "admin/view/template/common/column_left.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 74,  280 => 68,  273 => 66,  262 => 62,  255 => 60,  244 => 56,  237 => 54,  232 => 51,  230 => 50,  227 => 49,  221 => 48,  219 => 47,  216 => 46,  212 => 44,  206 => 43,  204 => 42,  201 => 41,  197 => 39,  191 => 38,  189 => 37,  186 => 36,  182 => 35,  171 => 33,  167 => 32,  158 => 31,  155 => 30,  143 => 28,  135 => 26,  132 => 25,  127 => 24,  125 => 23,  118 => 22,  115 => 21,  105 => 19,  97 => 17,  94 => 16,  89 => 15,  87 => 14,  82 => 13,  79 => 12,  69 => 10,  59 => 8,  57 => 7,  52 => 6,  47 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav id=\"column-left\">
\t<div id=\"navigation\"><span class=\"fa-solid fa-bars\"></span> {{ text_navigation }}</div>
\t<ul id=\"menu\">
\t\t{% set i = 0 %}
\t\t{% for menu in menus %}
\t\t\t<li id=\"{{ menu.id }}\">
\t\t\t\t{% if menu.href %}
\t\t\t\t\t<a href=\"{{ menu.href }}\"><i class=\"{{ menu.icon }}\"></i> {{ menu.name }}</a>
\t\t\t\t{% else %}
\t\t\t\t\t<a href=\"#collapse-{{ i }}\" data-bs-toggle=\"collapse\" class=\"parent collapsed\"><i class=\"{{ menu.icon }}\"></i> {{ menu.name }}</a>
\t\t\t\t{% endif %}
\t\t\t\t{% if menu.children %}
\t\t\t\t\t<ul id=\"collapse-{{ i }}\" class=\"collapse\">
\t\t\t\t\t\t{% set j = 0 %}
\t\t\t\t\t\t{% for children_1 in menu.children %}
\t\t\t\t\t\t\t<li>{% if children_1.href %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ children_1.href }}\">{{ children_1.name }}</a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<a href=\"#collapse-{{ i }}-{{ j }}\" data-bs-toggle=\"collapse\" class=\"parent collapsed\">{{ children_1.name }}</a>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% if children_1.children %}
\t\t\t\t\t\t\t\t\t<ul id=\"collapse-{{ i }}-{{ j }}\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t{% set k = 0 %}
\t\t\t\t\t\t\t\t\t\t{% for children_2 in children_1.children %}
\t\t\t\t\t\t\t\t\t\t\t<li>{% if children_2.href %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ children_2.href }}\">{{ children_2.name }}</a>
\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#collapse-{{ i }}-{{ j }}-{{ k }}\" data-bs-toggle=\"collapse\" class=\"parent collapsed\">{{ children_2.name }}</a>
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t{% if children_2.children %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<ul id=\"collapse-{{ i }}-{{ j }}-{{ k }}\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for children_3 in children_2.children %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ children_3.href }}\">{{ children_3.name }}</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}</li>
\t\t\t\t\t\t\t\t\t\t\t{% set k = k + 1 %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t{% set j = j + 1 %}
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</ul>
\t\t\t\t{% endif %}
\t\t\t</li>
\t\t\t{% set i = i + 1 %}
\t\t{% endfor %}
\t</ul>
\t{% if statistics_status %}
\t\t<div id=\"stats\">
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<div>{{ text_complete_status }} <span class=\"float-end\">{{ complete_status }}%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"{{ complete_status }}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{ complete_status }}%\"><span class=\"sr-only\">{{ complete_status }}%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div>{{ text_processing_status }} <span class=\"float-end\">{{ processing_status }}%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"{{ processing_status }}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{ processing_status }}%\"><span class=\"sr-only\">{{ processing_status }}%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div>{{ text_other_status }} <span class=\"float-end\">{{ other_status }}%</span></div>
\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t<div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"{{ other_status }}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{ other_status }}%\"><span class=\"sr-only\">{{ other_status }}%</span></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t{% endif %}
</nav>
", "admin/view/template/common/column_left.twig", "/var/www/html/admin/view/template/common/column_left.twig");
    }
}
