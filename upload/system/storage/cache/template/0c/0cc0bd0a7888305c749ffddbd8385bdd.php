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

/* cp-akis/view//plates/catalog/product_tabs/links_tab.twig */
class __TwigTemplate_69b126be6bfa297d685d8e8c019a3d59 extends Template
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
        echo " 
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 3
        echo ($context["entry_manufacturer"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"manufacturer\" value=\"";
        // line 6
        echo ($context["manufacturer"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_manufacturer"] ?? null);
        echo "\" id=\"input-manufacturer\" data-oc-target=\"autocomplete-manufacturer\" class=\"form-control\" autocomplete=\"off\"/>
        
        </div>
        <input type=\"hidden\" name=\"manufacturer_id\" value=\"";
        // line 9
        echo ($context["manufacturer_id"] ?? null);
        echo "\" id=\"input-manufacturer-id\"/>
        <ul id=\"autocomplete-manufacturer\" class=\"dropdown-menu\"></ul>
        <div class=\"form-text\">";
        // line 11
        echo ($context["help_manufacturer"] ?? null);
        echo "</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 15
        echo ($context["entry_category"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"category\" value=\"\" placeholder=\"";
        // line 17
        echo ($context["entry_category"] ?? null);
        echo "\" id=\"input-category\" data-oc-target=\"autocomplete-category\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-category\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-category\" class=\"table table-sm m-0\">
              <tbody>
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_category"]) {
            // line 24
            echo "                  <tr id=\"product-category-";
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "category_id", [], "any", false, false, false, 24);
            echo "\">
                    <td>";
            // line 25
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "name", [], "any", false, false, false, 25);
            echo "<input type=\"hidden\" name=\"product_category[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "category_id", [], "any", false, false, false, 25);
            echo "\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "              </tbody>
            </table>
          </div>

        </div>
        <div class=\"form-text\">";
        // line 34
        echo ($context["help_category"] ?? null);
        echo "</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 38
        echo ($context["entry_filter"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"";
        // line 40
        echo ($context["entry_filter"] ?? null);
        echo "\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-filter\" class=\"table table-sm m-0\">
              <tbody>
                ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_filter"]) {
            // line 47
            echo "                  <tr id=\"product-filter-";
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "filter_id", [], "any", false, false, false, 47);
            echo "\">
                    <td>";
            // line 48
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "name", [], "any", false, false, false, 48);
            echo "<input type=\"hidden\" name=\"product_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "filter_id", [], "any", false, false, false, 48);
            echo "\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "              </tbody>
            </table>
          </div>
    
        </div>
        <div class=\"form-text\">";
        // line 57
        echo ($context["help_filter"] ?? null);
        echo "</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 61
        echo ($context["entry_store"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"input-group\">
          <div id=\"product-store\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
            ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 66
            echo "              <div class=\"form-check\">
                <input type=\"checkbox\" name=\"product_store[]\" value=\"";
            // line 67
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 67);
            echo "\" id=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 67);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 67), ($context["product_store"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 67);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 67);
            echo "</label>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "          </div>
  
        </div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 76
        echo ($context["entry_download"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"download\" value=\"\" placeholder=\"";
        // line 78
        echo ($context["entry_download"] ?? null);
        echo "\" id=\"input-download\" data-oc-target=\"autocomplete-download\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-download\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-download\" class=\"table table-sm m-0\">
              <tbody>
                ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_downloads"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_download"]) {
            // line 85
            echo "                  <tr id=\"product-download-";
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "download_id", [], "any", false, false, false, 85);
            echo "\">
                    <td>";
            // line 86
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "name", [], "any", false, false, false, 86);
            echo "<input type=\"hidden\" name=\"product_download[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "download_id", [], "any", false, false, false, 86);
            echo "\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_download'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "              </tbody>
            </table>
          </div>
 
        </div>
        <div class=\"form-text\">";
        // line 95
        echo ($context["help_download"] ?? null);
        echo "</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 99
        echo ($context["entry_related"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"related\" value=\"\" placeholder=\"";
        // line 101
        echo ($context["entry_related"] ?? null);
        echo "\" id=\"input-related\" data-oc-target=\"autocomplete-related\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-related\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-related\" class=\"table table-sm m-0\">
              <tbody>
                ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_relateds"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_related"]) {
            // line 108
            echo "                  <tr id=\"product-related-";
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "product_id", [], "any", false, false, false, 108);
            echo "\">
                    <td>";
            // line 109
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "name", [], "any", false, false, false, 109);
            echo "<input type=\"hidden\" name=\"product_related[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "product_id", [], "any", false, false, false, 109);
            echo "\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_related'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "              </tbody>
            </table>
          </div>
   
        </div>
        <div class=\"form-text\">";
        // line 118
        echo ($context["help_related"] ?? null);
        echo "</div>
      </div>
    </div>
    ";
        // line 121
        $context["attribute_row"] = 0;
        // line 122
        echo " 

<script>
    
// Manufacturer
\$('#input-manufacturer').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&user_token=";
        // line 130
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    manufacturer_id: 0,
                    name: '";
        // line 135
        echo ($context["text_none"] ?? null);
        echo "'
                });

                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['manufacturer_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-manufacturer').val(item['label']);
        \$('#input-manufacturer-id').val(item['value']);
    }
});

// Category
\$('#input-category').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token=";
        // line 157
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['category_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-category').val('');

        \$('#product-category-' + item['value']).remove();

        html = '<tr id=\"product-category-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_category[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-category tbody').append(html);
    }
});

\$('#product-category').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Filter
\$('#input-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/filter.autocomplete&user_token=";
        // line 191
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['filter_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-filter').val('');

        \$('#product-filter-' + item['value']).remove();

        html = '<tr id=\"product-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-filter tbody').append(html);
    }
});

\$('#product-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Downloads
\$('#input-download').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/download.autocomplete&user_token=";
        // line 225
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['download_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-download').val('');

        \$('#product-download-' + item['value']).remove();

        html = '<tr id=\"product-download-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_download[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-download tbody').append(html);
    }
});

\$('#product-download').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Related
\$('#input-related').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=";
        // line 259
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-related').val('');

        \$('#product-related-' + item['value']).remove();

        html = '<tr id=\"product-related-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_related[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-related tbody').append(html);
    }
});

\$('#product-related').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

</script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/links_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  459 => 259,  422 => 225,  385 => 191,  348 => 157,  323 => 135,  315 => 130,  305 => 122,  303 => 121,  297 => 118,  290 => 113,  278 => 109,  273 => 108,  269 => 107,  260 => 101,  255 => 99,  248 => 95,  241 => 90,  229 => 86,  224 => 85,  220 => 84,  211 => 78,  206 => 76,  198 => 70,  179 => 67,  176 => 66,  172 => 65,  165 => 61,  158 => 57,  151 => 52,  139 => 48,  134 => 47,  130 => 46,  121 => 40,  116 => 38,  109 => 34,  102 => 29,  90 => 25,  85 => 24,  81 => 23,  72 => 17,  67 => 15,  60 => 11,  55 => 9,  47 => 6,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source(" 
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_manufacturer }}</label>
      <div class=\"col-sm-10\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"manufacturer\" value=\"{{ manufacturer }}\" placeholder=\"{{ entry_manufacturer }}\" id=\"input-manufacturer\" data-oc-target=\"autocomplete-manufacturer\" class=\"form-control\" autocomplete=\"off\"/>
        
        </div>
        <input type=\"hidden\" name=\"manufacturer_id\" value=\"{{ manufacturer_id }}\" id=\"input-manufacturer-id\"/>
        <ul id=\"autocomplete-manufacturer\" class=\"dropdown-menu\"></ul>
        <div class=\"form-text\">{{ help_manufacturer }}</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_category }}</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"category\" value=\"\" placeholder=\"{{ entry_category }}\" id=\"input-category\" data-oc-target=\"autocomplete-category\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-category\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-category\" class=\"table table-sm m-0\">
              <tbody>
                {% for product_category in product_categories %}
                  <tr id=\"product-category-{{ product_category.category_id }}\">
                    <td>{{ product_category.name }}<input type=\"hidden\" name=\"product_category[]\" value=\"{{ product_category.category_id }}\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>

        </div>
        <div class=\"form-text\">{{ help_category }}</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_filter }}</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"{{ entry_filter }}\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-filter\" class=\"table table-sm m-0\">
              <tbody>
                {% for product_filter in product_filters %}
                  <tr id=\"product-filter-{{ product_filter.filter_id }}\">
                    <td>{{ product_filter.name }}<input type=\"hidden\" name=\"product_filter[]\" value=\"{{ product_filter.filter_id }}\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
    
        </div>
        <div class=\"form-text\">{{ help_filter }}</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_store }}</label>
      <div class=\"col-sm-10\">
        <div class=\"input-group\">
          <div id=\"product-store\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
            {% for store in stores %}
              <div class=\"form-check\">
                <input type=\"checkbox\" name=\"product_store[]\" value=\"{{ store.store_id }}\" id=\"input-store-{{ store.store_id }}\" class=\"form-check-input\"{% if store.store_id in product_store %} checked{% endif %}/> <label for=\"input-store-{{ store.store_id }}\" class=\"form-check-label\">{{ store.name }}</label>
              </div>
            {% endfor %}
          </div>
  
        </div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_download }}</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"download\" value=\"\" placeholder=\"{{ entry_download }}\" id=\"input-download\" data-oc-target=\"autocomplete-download\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-download\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-download\" class=\"table table-sm m-0\">
              <tbody>
                {% for product_download in product_downloads %}
                  <tr id=\"product-download-{{ product_download.download_id }}\">
                    <td>{{ product_download.name }}<input type=\"hidden\" name=\"product_download[]\" value=\"{{ product_download.download_id }}\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
 
        </div>
        <div class=\"form-text\">{{ help_download }}</div>
      </div>
    </div>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">{{ entry_related }}</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" name=\"related\" value=\"\" placeholder=\"{{ entry_related }}\" id=\"input-related\" data-oc-target=\"autocomplete-related\" class=\"form-control\" autocomplete=\"off\"/>
        <ul id=\"autocomplete-related\" class=\"dropdown-menu\"></ul>
        <div class=\"input-group\">
          <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
            <table id=\"product-related\" class=\"table table-sm m-0\">
              <tbody>
                {% for product_related in product_relateds %}
                  <tr id=\"product-related-{{ product_related.product_id }}\">
                    <td>{{ product_related.name }}<input type=\"hidden\" name=\"product_related[]\" value=\"{{ product_related.product_id }}\"/></td>
                    <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
   
        </div>
        <div class=\"form-text\">{{ help_related }}</div>
      </div>
    </div>
    {% set attribute_row = 0 %}
 

<script>
    
// Manufacturer
\$('#input-manufacturer').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    manufacturer_id: 0,
                    name: '{{ text_none }}'
                });

                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['manufacturer_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-manufacturer').val(item['label']);
        \$('#input-manufacturer-id').val(item['value']);
    }
});

// Category
\$('#input-category').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['category_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-category').val('');

        \$('#product-category-' + item['value']).remove();

        html = '<tr id=\"product-category-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_category[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-category tbody').append(html);
    }
});

\$('#product-category').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Filter
\$('#input-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/filter.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['filter_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-filter').val('');

        \$('#product-filter-' + item['value']).remove();

        html = '<tr id=\"product-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-filter tbody').append(html);
    }
});

\$('#product-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Downloads
\$('#input-download').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/download.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['download_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-download').val('');

        \$('#product-download-' + item['value']).remove();

        html = '<tr id=\"product-download-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_download[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-download tbody').append(html);
    }
});

\$('#product-download').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Related
\$('#input-related').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-related').val('');

        \$('#product-related-' + item['value']).remove();

        html = '<tr id=\"product-related-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_related[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-related tbody').append(html);
    }
});

\$('#product-related').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

</script>", "cp-akis/view//plates/catalog/product_tabs/links_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/links_tab.twig");
    }
}
