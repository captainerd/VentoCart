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

/* admin/view/template/catalog/product.twig */
class __TwigTemplate_7796372e30fbe86084e08e27ccc51a05 extends Template
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
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_filter"] ?? null);
        echo "\" onclick=\"\$('#filter-product').toggleClass('d-none');\" class=\"btn btn-light d-lg-none\"><i class=\"fa-solid fa-filter\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["add"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus\"></i></a>
        <button type=\"submit\" form=\"form-product\" formaction=\"";
        // line 8
        echo ($context["copy"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_copy"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-regular fa-copy\"></i></button>
        <button type=\"submit\" form=\"form-product\"  id=\"delete-product\" data-bs-toggle=\"tooltip\" title=\"";
        // line 9
        echo ($context["button_delete"] ?? null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
      </div>
      <h1>";
        // line 11
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 14
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 14);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 14);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"row\">
      <div id=\"filter-product\" class=\"col-lg-3 col-md-12 order-lg-last d-none d-lg-block mb-3\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-filter\"></i> ";
        // line 23
        echo ($context["text_filter"] ?? null);
        echo "</div>
          <div class=\"card-body\">
            <div class=\"mb-3\">
              <label for=\"input-name\" class=\"form-label\">";
        // line 26
        echo ($context["entry_name"] ?? null);
        echo "</label>
              <input type=\"text\" name=\"filter_name\" value=\"";
        // line 27
        echo ($context["filter_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" data-oc-target=\"autocomplete-name\" class=\"form-control\" autocomplete=\"off\"/>
              <ul id=\"autocomplete-name\" class=\"dropdown-menu\"></ul>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-model\" class=\"form-label\">";
        // line 31
        echo ($context["entry_model"] ?? null);
        echo "</label>
              <input type=\"text\" name=\"filter_model\" value=\"";
        // line 32
        echo ($context["filter_model"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_model"] ?? null);
        echo "\" id=\"input-model\" data-oc-target=\"autocomplete-model\" class=\"form-control\" autocomplete=\"off\"/>
              <ul id=\"autocomplete-model\" class=\"dropdown-menu\"></ul>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-price\" class=\"form-label\">";
        // line 36
        echo ($context["entry_price"] ?? null);
        echo "</label> <input type=\"text\" name=\"filter_price\" value=\"";
        echo ($context["filter_price"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_price"] ?? null);
        echo "\" id=\"input-price\" class=\"form-control\"/>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-quantity\" class=\"form-label\">";
        // line 39
        echo ($context["entry_quantity"] ?? null);
        echo "</label> <input type=\"text\" name=\"filter_quantity\" value=\"";
        echo ($context["filter_quantity"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_quantity"] ?? null);
        echo "\" id=\"input-quantity\" class=\"form-control\"/>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-status\" class=\"form-label\">";
        // line 42
        echo ($context["entry_status"] ?? null);
        echo "</label> <select name=\"filter_status\" id=\"input-status\" class=\"form-select\">
                <option value=\"\"></option>
                <option value=\"1\"";
        // line 44
        if ((($context["filter_status"] ?? null) == "1")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                <option value=\"0\"";
        // line 45
        if ((($context["filter_status"] ?? null) == "0")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_disabled"] ?? null);
        echo "</option>
              </select>
            </div>
            <div class=\"text-end\">
              <button type=\"button\" id=\"button-filter\" class=\"btn btn-light\"><i class=\"fa-solid fa-filter\"></i> ";
        // line 49
        echo ($context["button_filter"] ?? null);
        echo "</button>
            </div>
          </div>
        </div>
      </div>
      <div class=\"col col-lg-9 col-md-12\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> ";
        // line 56
        echo ($context["text_list"] ?? null);
        echo "</div>
          <div id=\"product\" class=\"card-body\">";
        // line 57
        echo ($context["list"] ?? null);
        echo "</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"deleteConfirmationModal\">
  <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
          <div class=\"modal-header\">
              <h5 class=\"modal-title\">Confirm Deletion</h5>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\">
              <p>Are you sure you want to delete the product?</p>
              <div class=\"form-check\">
                  <input class=\"form-check-input\" type=\"checkbox\" id=\"confirmAssociatedCheckbox\">
                  <label class=\"form-check-label\" for=\"confirmAssociatedCheckbox\">
                      Delete associated options and attributes as well
                  </label>
              </div>
              <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" id=\"confirmAssociatedImages\">
                <label class=\"form-check-label\" for=\"confirmAssociatedImages\">
                    Delete associated images as well
                </label>
            </div>
          </div>
          <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancel</button>
              <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDeleteButton\">Delete</button>
          </div>
      </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#product').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#product').load(this.href);
});

\$('#button-filter').on('click', function () {
    var url = '';

    var filter_name = \$('#input-name').val();

    if (filter_name) {
        url += '&filter_name=' + encodeURIComponent(filter_name);
    }

    var filter_model = \$('#input-model').val();

    if (filter_model) {
        url += '&filter_model=' + encodeURIComponent(filter_model);
    }

    var filter_price = \$('#input-price').val();

    if (filter_price) {
        url += '&filter_price=' + encodeURIComponent(filter_price);
    }

    var filter_quantity = \$('#input-quantity').val();

    if (filter_quantity) {
        url += '&filter_quantity=' + filter_quantity;
    }

    var filter_status = \$('#input-status').val();

    if (filter_status !== '') {
        url += '&filter_status=' + filter_status;
    }

    window.history.pushState({}, null, 'index.php?route=catalog/product&user_token=";
        // line 132
        echo ($context["user_token"] ?? null);
        echo "' + url);

    \$('#product').load('index.php?route=catalog/product.list&user_token=";
        // line 134
        echo ($context["user_token"] ?? null);
        echo "' + url);
});

\$('#input-name').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=";
        // line 140
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
        \$('#input-name').val(item['label']);
    }
});

\$('#input-model').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=";
        // line 160
        echo ($context["user_token"] ?? null);
        echo "&filter_model=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['model'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-model').val(item['label']);
    }
});

function handleDelete() {
 
    // Open a Bootstrap modal for confirmation
    \$('#deleteConfirmationModal').modal('show');

    // Listen for the confirmation button click
    \$('#confirmDeleteButton').on('click', function () {
        var confirmAssociated = \$('#confirmAssociatedCheckbox').prop('checked');
        var confirmAssociatedImages =  \$('#confirmAssociatedImages').prop('checked');
        var url = 'index.php?route=catalog/product.delete&user_token=";
        // line 186
        echo ($context["user_token"] ?? null);
        echo "';

        if (confirmAssociated) {
            url += '&all=1';
        }
        if (confirmAssociatedImages) {
            url += '&images=1';
        }
    
        var formData = \$('#form-product').serialize();
        // Run the action URL
        \$.ajax({
            url: url,
            type: 'POST',
            data: formData, // Include form data
            dataType: 'json',
            success: function (json) {
                // Handle success (you can customize this part based on your requirements)
                //x console.log('Product deleted successfully');
                
                // Optionally, you can reload the product list after deletion
                \$('#product').load('index.php?route=catalog/product.list&user_token=";
        // line 207
        echo ($context["user_token"] ?? null);
        echo "');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // Handle error (you can customize this part based on your requirements)
                console.error('Error deleting product');
            }
        });

        // Close the modal
        \$('#deleteConfirmationModal').modal('hide');
    });

    // Remove the click event listener when the modal is closed
    \$('#deleteConfirmationModal').on('hidden.bs.modal', function () {
        \$('#confirmDeleteButton').off('click');
    });
}

// Update the onclick event for the delete button
\$('#delete-product').on('click', function (e) {
  e.preventDefault();
 
    handleDelete();
});


//--></script>
";
        // line 234
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "admin/view/template/catalog/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  384 => 234,  354 => 207,  330 => 186,  301 => 160,  278 => 140,  269 => 134,  264 => 132,  186 => 57,  182 => 56,  172 => 49,  161 => 45,  153 => 44,  148 => 42,  138 => 39,  128 => 36,  119 => 32,  115 => 31,  106 => 27,  102 => 26,  96 => 23,  87 => 16,  76 => 14,  72 => 13,  67 => 11,  62 => 9,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_filter }}\" onclick=\"\$('#filter-product').toggleClass('d-none');\" class=\"btn btn-light d-lg-none\"><i class=\"fa-solid fa-filter\"></i></button>
        <a href=\"{{ add }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus\"></i></a>
        <button type=\"submit\" form=\"form-product\" formaction=\"{{ copy }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_copy }}\" class=\"btn btn-light\"><i class=\"fa-regular fa-copy\"></i></button>
        <button type=\"submit\" form=\"form-product\"  id=\"delete-product\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
      </div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"row\">
      <div id=\"filter-product\" class=\"col-lg-3 col-md-12 order-lg-last d-none d-lg-block mb-3\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-filter\"></i> {{ text_filter }}</div>
          <div class=\"card-body\">
            <div class=\"mb-3\">
              <label for=\"input-name\" class=\"form-label\">{{ entry_name }}</label>
              <input type=\"text\" name=\"filter_name\" value=\"{{ filter_name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" data-oc-target=\"autocomplete-name\" class=\"form-control\" autocomplete=\"off\"/>
              <ul id=\"autocomplete-name\" class=\"dropdown-menu\"></ul>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-model\" class=\"form-label\">{{ entry_model }}</label>
              <input type=\"text\" name=\"filter_model\" value=\"{{ filter_model }}\" placeholder=\"{{ entry_model }}\" id=\"input-model\" data-oc-target=\"autocomplete-model\" class=\"form-control\" autocomplete=\"off\"/>
              <ul id=\"autocomplete-model\" class=\"dropdown-menu\"></ul>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-price\" class=\"form-label\">{{ entry_price }}</label> <input type=\"text\" name=\"filter_price\" value=\"{{ filter_price }}\" placeholder=\"{{ entry_price }}\" id=\"input-price\" class=\"form-control\"/>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-quantity\" class=\"form-label\">{{ entry_quantity }}</label> <input type=\"text\" name=\"filter_quantity\" value=\"{{ filter_quantity }}\" placeholder=\"{{ entry_quantity }}\" id=\"input-quantity\" class=\"form-control\"/>
            </div>
            <div class=\"mb-3\">
              <label for=\"input-status\" class=\"form-label\">{{ entry_status }}</label> <select name=\"filter_status\" id=\"input-status\" class=\"form-select\">
                <option value=\"\"></option>
                <option value=\"1\"{% if filter_status == '1' %} selected{% endif %}>{{ text_enabled }}</option>
                <option value=\"0\"{% if filter_status == '0' %} selected{% endif %}>{{ text_disabled }}</option>
              </select>
            </div>
            <div class=\"text-end\">
              <button type=\"button\" id=\"button-filter\" class=\"btn btn-light\"><i class=\"fa-solid fa-filter\"></i> {{ button_filter }}</button>
            </div>
          </div>
        </div>
      </div>
      <div class=\"col col-lg-9 col-md-12\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> {{ text_list }}</div>
          <div id=\"product\" class=\"card-body\">{{ list }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"deleteConfirmationModal\">
  <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
          <div class=\"modal-header\">
              <h5 class=\"modal-title\">Confirm Deletion</h5>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\">
              <p>Are you sure you want to delete the product?</p>
              <div class=\"form-check\">
                  <input class=\"form-check-input\" type=\"checkbox\" id=\"confirmAssociatedCheckbox\">
                  <label class=\"form-check-label\" for=\"confirmAssociatedCheckbox\">
                      Delete associated options and attributes as well
                  </label>
              </div>
              <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" id=\"confirmAssociatedImages\">
                <label class=\"form-check-label\" for=\"confirmAssociatedImages\">
                    Delete associated images as well
                </label>
            </div>
          </div>
          <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancel</button>
              <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDeleteButton\">Delete</button>
          </div>
      </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#product').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#product').load(this.href);
});

\$('#button-filter').on('click', function () {
    var url = '';

    var filter_name = \$('#input-name').val();

    if (filter_name) {
        url += '&filter_name=' + encodeURIComponent(filter_name);
    }

    var filter_model = \$('#input-model').val();

    if (filter_model) {
        url += '&filter_model=' + encodeURIComponent(filter_model);
    }

    var filter_price = \$('#input-price').val();

    if (filter_price) {
        url += '&filter_price=' + encodeURIComponent(filter_price);
    }

    var filter_quantity = \$('#input-quantity').val();

    if (filter_quantity) {
        url += '&filter_quantity=' + filter_quantity;
    }

    var filter_status = \$('#input-status').val();

    if (filter_status !== '') {
        url += '&filter_status=' + filter_status;
    }

    window.history.pushState({}, null, 'index.php?route=catalog/product&user_token={{ user_token }}' + url);

    \$('#product').load('index.php?route=catalog/product.list&user_token={{ user_token }}' + url);
});

\$('#input-name').autocomplete({
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
        \$('#input-name').val(item['label']);
    }
});

\$('#input-model').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token={{ user_token }}&filter_model=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['model'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-model').val(item['label']);
    }
});

function handleDelete() {
 
    // Open a Bootstrap modal for confirmation
    \$('#deleteConfirmationModal').modal('show');

    // Listen for the confirmation button click
    \$('#confirmDeleteButton').on('click', function () {
        var confirmAssociated = \$('#confirmAssociatedCheckbox').prop('checked');
        var confirmAssociatedImages =  \$('#confirmAssociatedImages').prop('checked');
        var url = 'index.php?route=catalog/product.delete&user_token={{ user_token }}';

        if (confirmAssociated) {
            url += '&all=1';
        }
        if (confirmAssociatedImages) {
            url += '&images=1';
        }
    
        var formData = \$('#form-product').serialize();
        // Run the action URL
        \$.ajax({
            url: url,
            type: 'POST',
            data: formData, // Include form data
            dataType: 'json',
            success: function (json) {
                // Handle success (you can customize this part based on your requirements)
                //x console.log('Product deleted successfully');
                
                // Optionally, you can reload the product list after deletion
                \$('#product').load('index.php?route=catalog/product.list&user_token={{ user_token }}');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // Handle error (you can customize this part based on your requirements)
                console.error('Error deleting product');
            }
        });

        // Close the modal
        \$('#deleteConfirmationModal').modal('hide');
    });

    // Remove the click event listener when the modal is closed
    \$('#deleteConfirmationModal').on('hidden.bs.modal', function () {
        \$('#confirmDeleteButton').off('click');
    });
}

// Update the onclick event for the delete button
\$('#delete-product').on('click', function (e) {
  e.preventDefault();
 
    handleDelete();
});


//--></script>
{{ footer }}
", "admin/view/template/catalog/product.twig", "/var/www/html/admin/view/template/catalog/product.twig");
    }
}
