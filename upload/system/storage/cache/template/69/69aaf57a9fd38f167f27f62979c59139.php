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

/* cp-akis/view/default/plates/catalog/product_list.twig */
class __TwigTemplate_a17af4f53b81dae63c040b522501be00 extends Template
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
        echo "<form id=\"form-product\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#product\">
  <div class=\"row row-cols-1 row-cols-md-4 row-cols-lg-5 g-2\" id=\"product-list\">
    ";
        // line 3
        if (($context["products"] ?? null)) {
            // line 4
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 5
                echo "        <div class=\"col\">
    
          <div class=\"card shadow\" onclick=\"toggleCheckbox(this)\">
            <h5 class=\"card-header \">    
              <a title=\"";
                // line 9
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 9);
                echo "\" style=\"max-width: 200px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "edit", [], "any", false, false, false, 9);
                echo "\" ";
                if ((($context["sort"] ?? null) == "pd.name")) {
                    echo " class=\"";
                    echo twig_lower_filter($this->env, ($context["order"] ?? null));
                    echo "\"";
                }
                echo " style=\"max-width: 300px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\">
                <i class=\"fas fa-check d-none\"></i>      ";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
                echo "
              </a>
            
          </h5>
            <div class=\"card-body\">
        
              <div style=\"max-width: 50px\" class=\"d-flex justify-content-center align-items-center\">
                ";
                // line 17
                if ((((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 17)) && is_string($__internal_compile_1 = ".avi") && ('' === $__internal_compile_1 || $__internal_compile_1 === substr($__internal_compile_0, -strlen($__internal_compile_1)))) || (is_string($__internal_compile_2 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 17)) && is_string($__internal_compile_3 = ".mp4") && ('' === $__internal_compile_3 || $__internal_compile_3 === substr($__internal_compile_2, -strlen($__internal_compile_3))))) || (is_string($__internal_compile_4 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 17)) && is_string($__internal_compile_5 = ".mkv") && ('' === $__internal_compile_5 || $__internal_compile_5 === substr($__internal_compile_4, -strlen($__internal_compile_5)))))) {
                    // line 18
                    echo "                    <video class=\"img-thumbnail\" style=\"max-width: 100%; display: block;\" >
                        <source src=\"";
                    // line 19
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 19);
                    echo "\" type=\"video/";
                    echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 19), "."));
                    echo "\">
                        Your browser does not support the video tag.
                    </video>
                ";
                } else {
                    // line 23
                    echo "                    <img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 23);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 23);
                    echo "\" class=\"img-thumbnail\" style=\"max-width: 100%; display: block;\">
                ";
                }
                // line 25
                echo "            </div>
                <div class=\"card-text\">
                    <div>
                        ";
                // line 28
                if (twig_get_attribute($this->env, $this->source, $context["product"], "status", [], "any", false, false, false, 28)) {
                    // line 29
                    echo "                            <span class=\"text-success\">";
                    echo ($context["text_enabled"] ?? null);
                    echo "</span>
                        ";
                } else {
                    // line 31
                    echo "                            <span class=\"text-danger\">";
                    echo ($context["text_disabled"] ?? null);
                    echo "</span>
                        ";
                }
                // line 33
                echo "                    </div>
                    <div>";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 34);
                echo "</div>
                    <div class=\"border-bottom  mb-2\">
                        ";
                // line 36
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 36)) {
                    // line 37
                    echo "                            <span style=\"text-decoration: line-through;\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 37);
                    echo "</span>
                            <span class=\"text-danger\">";
                    // line 38
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 38);
                    echo "</span>
                        ";
                } else {
                    // line 40
                    echo "                            ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 40);
                    echo "
                        ";
                }
                // line 42
                echo "                    </div>
                    <div >
                        ";
                // line 44
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 44) <= 0)) {
                    // line 45
                    echo "                            <span class=\"badge bg-warning\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 45);
                    echo "</span>
                        ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 46
$context["product"], "quantity", [], "any", false, false, false, 46) <= 5)) {
                    // line 47
                    echo "                            <span class=\"badge bg-danger\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 47);
                    echo "</span>
                        ";
                } else {
                    // line 49
                    echo "                            <span class=\"badge bg-success\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 49);
                    echo "</span>
                        ";
                }
                // line 51
                echo "                    </div>
                    <div class=\"d-flex justify-content-between align-items-center mt-1\">
                        <div class=\" d-none\">
                            <input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 54
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 54);
                echo "\" class=\"form-check-input\">
                        </div>
                        <div>
                            <a href=\"";
                // line 57
                echo twig_get_attribute($this->env, $this->source, $context["product"], "edit", [], "any", false, false, false, 57);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\">
                                <i class=\"fas fa-pencil-alt\"></i> ";
                // line 58
                echo ($context["button_edit"] ?? null);
                echo "
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "    ";
        } else {
            // line 71
            echo "      <div class=\"col text-center\">";
            echo ($context["text_no_results"] ?? null);
            echo "</div>
    ";
        }
        // line 73
        echo "  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 75
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 76
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>

<script>
  function toggleCheckbox(card) {
    var checkbox = card.querySelector('input[type=\"checkbox\"]');
    checkbox.checked = !checkbox.checked;
    \$(card).find('.fa-check').toggleClass('d-none');
    if (checkbox.checked) {
    
      card.classList.add('selected');
    } else {
      card.classList.remove('selected');
    }
  }
</script>

 
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/catalog/product_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 76,  218 => 75,  214 => 73,  208 => 71,  205 => 70,  187 => 58,  181 => 57,  175 => 54,  170 => 51,  164 => 49,  158 => 47,  156 => 46,  151 => 45,  149 => 44,  145 => 42,  139 => 40,  134 => 38,  129 => 37,  127 => 36,  122 => 34,  119 => 33,  113 => 31,  107 => 29,  105 => 28,  100 => 25,  92 => 23,  83 => 19,  80 => 18,  78 => 17,  68 => 10,  56 => 9,  50 => 5,  45 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-product\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#product\">
  <div class=\"row row-cols-1 row-cols-md-4 row-cols-lg-5 g-2\" id=\"product-list\">
    {% if products %}
      {% for product in products %}
        <div class=\"col\">
    
          <div class=\"card shadow\" onclick=\"toggleCheckbox(this)\">
            <h5 class=\"card-header \">    
              <a title=\"{{ product.name }}\" style=\"max-width: 200px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\" href=\"{{ product.edit }}\" {% if sort == 'pd.name' %} class=\"{{ order|lower }}\"{% endif %} style=\"max-width: 300px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\">
                <i class=\"fas fa-check d-none\"></i>      {{ product.name }}
              </a>
            
          </h5>
            <div class=\"card-body\">
        
              <div style=\"max-width: 50px\" class=\"d-flex justify-content-center align-items-center\">
                {% if product.image ends with '.avi' or product.image ends with '.mp4' or product.image ends with '.mkv' %}
                    <video class=\"img-thumbnail\" style=\"max-width: 100%; display: block;\" >
                        <source src=\"{{ product.image }}\" type=\"video/{{ product.image|split('.')|last }}\">
                        Your browser does not support the video tag.
                    </video>
                {% else %}
                    <img src=\"{{ product.image }}\" alt=\"{{ product.name }}\" class=\"img-thumbnail\" style=\"max-width: 100%; display: block;\">
                {% endif %}
            </div>
                <div class=\"card-text\">
                    <div>
                        {% if product.status %}
                            <span class=\"text-success\">{{ text_enabled }}</span>
                        {% else %}
                            <span class=\"text-danger\">{{ text_disabled }}</span>
                        {% endif %}
                    </div>
                    <div>{{ product.model }}</div>
                    <div class=\"border-bottom  mb-2\">
                        {% if product.special %}
                            <span style=\"text-decoration: line-through;\">{{ product.price }}</span>
                            <span class=\"text-danger\">{{ product.special }}</span>
                        {% else %}
                            {{ product.price }}
                        {% endif %}
                    </div>
                    <div >
                        {% if product.quantity <= 0 %}
                            <span class=\"badge bg-warning\">{{ product.quantity }}</span>
                        {% elseif product.quantity <= 5 %}
                            <span class=\"badge bg-danger\">{{ product.quantity }}</span>
                        {% else %}
                            <span class=\"badge bg-success\">{{ product.quantity }}</span>
                        {% endif %}
                    </div>
                    <div class=\"d-flex justify-content-between align-items-center mt-1\">
                        <div class=\" d-none\">
                            <input type=\"checkbox\" name=\"selected[]\" value=\"{{ product.product_id }}\" class=\"form-check-input\">
                        </div>
                        <div>
                            <a href=\"{{ product.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\">
                                <i class=\"fas fa-pencil-alt\"></i> {{ button_edit }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        </div>
      {% endfor %}
    {% else %}
      <div class=\"col text-center\">{{ text_no_results }}</div>
    {% endif %}
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>

<script>
  function toggleCheckbox(card) {
    var checkbox = card.querySelector('input[type=\"checkbox\"]');
    checkbox.checked = !checkbox.checked;
    \$(card).find('.fa-check').toggleClass('d-none');
    if (checkbox.checked) {
    
      card.classList.add('selected');
    } else {
      card.classList.remove('selected');
    }
  }
</script>

 
", "cp-akis/view/default/plates/catalog/product_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/catalog/product_list.twig");
    }
}
