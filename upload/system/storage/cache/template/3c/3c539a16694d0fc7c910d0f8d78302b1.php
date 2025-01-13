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

/* cp-akis/view/default/plates/extension/theme.twig */
class __TwigTemplate_575607bf4a32b2571c37fb7289a65466 extends Template
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
        echo "<fieldset>
  <legend>";
        // line 2
        echo ($context["heading_title"] ?? null);
        echo "</legend>
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-start\">";
        // line 7
        echo ($context["column_name"] ?? null);
        echo "</td>
          <td class=\"text-start\">";
        // line 8
        echo ($context["column_status"] ?? null);
        echo "</td>
          <td class=\"text-end\">";
        // line 9
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 13
        if (($context["extensions"] ?? null)) {
            // line 14
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 15
                echo "            <tr>
              <td class=\"text-start\" colspan=\"2\">
                <div class=\"card\" style=\"width: 18rem;\">
                  <div class=\"card-body\">
                    <h5 class=\"card-title\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 19);
                echo "</h5>
                  <img src=\"/themes/";
                // line 20
                echo (((twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 20) == "basic")) ? ("default") : (twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 20)));
                echo "/assets/screenshot.png\" 
     class=\"card-img-top\" 
     alt=\"";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 22);
                echo " screenshot\" 
     style=\"width: 200px; height: 200px;\">

                  </div>
                </div>
              </td>
              <td class=\"text-end\">
 
                          ";
                // line 30
                if ((twig_get_attribute($this->env, $this->source, $context["extension"], "default", [], "any", false, false, false, 30) == 0)) {
                    // line 31
                    echo "                      <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "setdefault", [], "any", false, false, false, 31);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_default"] ?? null);
                    echo "\" class=\"btn setdefaulttheme btn-success\"><i class=\"fa-solid fa-fire\"></i></a>
                    ";
                } else {
                    // line 33
                    echo "                      <button disabled data-bs-toggle=\"tooltip\" class=\"btn btn-danger\"><i class=\"fa-solid fa-fire\"></i></button>
                    ";
                }
                // line 34
                echo "  
      <a href=\"";
                // line 35
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "download", [], "any", false, false, false, 35);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_download"] ?? null);
                echo "\" class=\"btn  \" style=\"background-color: #28a745; color: white;  cursor: pointer;\" ><i class=\"fa-solid fa-download\"></i></a>
            ";
                // line 49
                echo "              </td>
            </tr>
            ";
                // line 51
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 51)) {
                    // line 52
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "store", [], "any", false, false, false, 52));
                    foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                        // line 53
                        echo "                <tr>
                  <td class=\"text-start\">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
                        // line 54
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 54);
                        echo "</td>
                  <td class=\"text-start\">";
                        // line 55
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "status", [], "any", false, false, false, 55);
                        echo "</td>
                  <td class=\"text-end text-nowrap\">
                    <a href=\"";
                        // line 57
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "edit", [], "any", false, false, false, 57);
                        echo "\" data-bs-toggle=\"tooltip\" title=\"";
                        echo ($context["button_edit"] ?? null);
                        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  </td>
                </tr>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 61
                    echo "            ";
                }
                // line 62
                echo "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "        ";
        } else {
            // line 64
            echo "          <tr>
            <td class=\"text-center\" colspan=\"3\">";
            // line 65
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 68
        echo "      </tbody>
    </table>
  </div>
</fieldset>
 ";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/extension/theme.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 68,  169 => 65,  166 => 64,  163 => 63,  157 => 62,  154 => 61,  142 => 57,  137 => 55,  133 => 54,  130 => 53,  125 => 52,  123 => 51,  119 => 49,  113 => 35,  110 => 34,  106 => 33,  98 => 31,  96 => 30,  85 => 22,  80 => 20,  76 => 19,  70 => 15,  65 => 14,  63 => 13,  56 => 9,  52 => 8,  48 => 7,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<fieldset>
  <legend>{{ heading_title }}</legend>
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
              <td class=\"text-start\" colspan=\"2\">
                <div class=\"card\" style=\"width: 18rem;\">
                  <div class=\"card-body\">
                    <h5 class=\"card-title\">{{ extension.name }}</h5>
                  <img src=\"/themes/{{ extension.code == 'basic' ? 'default' : extension.code }}/assets/screenshot.png\" 
     class=\"card-img-top\" 
     alt=\"{{ extension.name }} screenshot\" 
     style=\"width: 200px; height: 200px;\">

                  </div>
                </div>
              </td>
              <td class=\"text-end\">
 
                          {% if extension.default == 0 %}
                      <a href=\"{{ extension.setdefault }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_default }}\" class=\"btn setdefaulttheme btn-success\"><i class=\"fa-solid fa-fire\"></i></a>
                    {% else %}
                      <button disabled data-bs-toggle=\"tooltip\" class=\"btn btn-danger\"><i class=\"fa-solid fa-fire\"></i></button>
                    {% endif %}  
      <a href=\"{{ extension.download }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_download }}\" class=\"btn  \" style=\"background-color: #28a745; color: white;  cursor: pointer;\" ><i class=\"fa-solid fa-download\"></i></a>
            {#    
            
            {% if not extension.installed %}
                
                    <button href=\"{{ extension.install }}\"     {% if   extension.dirtheme %}  disabled {% endif %} data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                  {% else %}  
         
                
       
                  <a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                   {% endif %}

                   #}
              </td>
            </tr>
            {% if extension.installed %}
              {% for store in extension.store %}
                <tr>
                  <td class=\"text-start\">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{ store.name }}</td>
                  <td class=\"text-start\">{{ store.status }}</td>
                  <td class=\"text-end text-nowrap\">
                    <a href=\"{{ store.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  </td>
                </tr>
              {% endfor %}
            {% endif %}
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
 ", "cp-akis/view/default/plates/extension/theme.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/extension/theme.twig");
    }
}
