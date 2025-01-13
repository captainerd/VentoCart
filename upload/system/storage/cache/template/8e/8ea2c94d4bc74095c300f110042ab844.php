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

/* cp-akis/view//plates/catalog/product_form.twig */
class __TwigTemplate_c5470b66d6773e84ce255564378d511c extends Template
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
  <style>
 
    .move-btns {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 50px;
  }
  .attribute-groups-effect {
    margin-bottom: 10px;border-bottom: 1px dashed #939393;padding-bottom: 10px;
  }
  .move-btns button {
      margin-bottom: 5px;
  }
</style>
  <script  src=\"view/javascript/Sortable.min.js\"></script>
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        ";
        // line 23
        if ((($context["product_id"] ?? null) > 0)) {
            // line 24
            echo "        <a target=\"_blank\" href=\"/index.php?route=product/product&language=en-gb&product_id=";
            echo ($context["product_id"] ?? null);
            echo "\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_view"] ?? null);
            echo "\" class=\"btn btn-secondary\"><i class=\"fa-solid fa-eye\"></i></a>
       ";
        }
        // line 26
        echo "        <button type=\"submit\" form=\"form-product\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 27
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 28
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 31
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 31);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 31);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 39
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-product\" action=\"";
        // line 41
        echo ($context["save"] ?? null);
        echo "\" method=\"post\"  novalidate>

          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\">  <a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\"><span class=\"fa-solid mx-1 fa-cube\"></span>  ";
        // line 44
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-database\"></span> ";
        // line 45
        echo ($context["tab_data"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-pricing\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-tag\"></span> ";
        // line 46
        echo ($context["tab_pricing"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-links\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-chain\"></span> ";
        // line 47
        echo ($context["tab_links"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-image\"></span> ";
        // line 48
        echo ($context["tab_image"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-attribute\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-list-ul\"></span> ";
        // line 49
        echo ($context["tab_attribute"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-cog\"></span> ";
        // line 50
        echo ($context["tab_option"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-variations\" data-bs-toggle=\"tab\"  id=\"tab-variations-link\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-random\"></span> ";
        // line 51
        echo ($context["tab_variations"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-subscription\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-credit-card\"></span> ";
        // line 52
        echo ($context["tab_subscription"] ?? null);
        echo "</a></li>
     
    
       
            <li class=\"nav-item\"><a href=\"#tab-reward\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-trophy\"></span>  ";
        // line 56
        echo ($context["tab_reward"] ?? null);
        echo "</a></li>
  
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-paint-brush\"></span>  ";
        // line 58
        echo ($context["tab_design"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-report\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-chart-bar\"></span> ";
        // line 59
        echo ($context["tab_report"] ?? null);
        echo "</a></li>
          </ul>

     <div class=\"tab-content\">

              <div class=\"tab-pane active\" id=\"tab-general\">
                 ";
        // line 65
        echo ($context["general_tab"] ?? null);
        echo "
              </div>

              <div id=\"tab-data\" class=\"tab-pane\">
                 ";
        // line 69
        echo ($context["data_tab"] ?? null);
        echo "
              </div>
      
              <div id=\"tab-links\" class=\"tab-pane\">
                 ";
        // line 73
        echo ($context["links_tab"] ?? null);
        echo "
              </div>
       
              <div id=\"tab-attribute\" class=\"tab-pane\">
                 ";
        // line 77
        echo ($context["attributes_tab"] ?? null);
        echo "
              </div>
             
              <div id=\"tab-option\" class=\"tab-pane\">
                 <div id=\"option\"><!-- Ajax --></div>
              </div>

              <div id=\"tab-subscription\" class=\"tab-pane\">
                 ";
        // line 85
        echo ($context["subscription_tab"] ?? null);
        echo "
              </div>


              <div id=\"tab-pricing\" class=\"tab-pane\">
                 ";
        // line 90
        echo ($context["pricing_tab"] ?? null);
        echo "
              </div>

              <div id=\"tab-image\" class=\"tab-pane\">
                 ";
        // line 94
        echo ($context["images_tab"] ?? null);
        echo "
              </div>

            <div id=\"tab-reward\" class=\"tab-pane\">

              <fieldset>
                <legend>";
        // line 100
        echo ($context["text_reward"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-points\" class=\"col-sm-2 col-form-label\">";
        // line 102
        echo ($context["entry_points"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"points\" value=\"";
        // line 105
        echo ($context["points"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_points"] ?? null);
        echo "\" id=\"input-points\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">";
        // line 108
        echo ($context["help_points"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 113
        echo ($context["text_points"] ?? null);
        echo "</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-reward\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">";
        // line 118
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
                        <td class=\"text-end\">";
        // line 119
        echo ($context["entry_reward"] ?? null);
        echo "&nbsp;&nbsp;
              
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 125
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 126
            echo "                        <tr>
                          <td class=\"text-start\">";
            // line 127
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 127);
            echo "</td>
                          <td class=\"text-end\"><input type=\"text\" name=\"product_reward[";
            // line 128
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 128);
            echo "][points]\" value=\"";
            echo (((($__internal_compile_0 = ($context["product_reward"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 128)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = ($context["product_reward"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 128)] ?? null) : null), "points", [], "any", false, false, false, 128)) : (""));
            echo "\" class=\"form-control\"/></td>
                        </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                    </tbody>
                  </table>
                </div>
              </fieldset>

            </div>

    
            <div id=\"tab-design\" class=\"tab-pane\">

              <div class=\"table-responsive\">
                <table id=\"product-layout\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 145
        echo ($context["entry_store"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 146
        echo ($context["entry_layout"] ?? null);
        echo "
                   
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 152
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 153
            echo "                      <tr>
                        <td class=\"text-start\">";
            // line 154
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 154);
            echo "</td>
                        <td class=\"text-start\"><select name=\"product_layout[";
            // line 155
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 155);
            echo "]\" class=\"form-select\">
                            <option value=\"\"></option>
                            ";
            // line 157
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
                // line 158
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 158);
                echo "\"";
                if (((($__internal_compile_2 = ($context["product_layout"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 158)] ?? null) : null) && ((($__internal_compile_3 = ($context["product_layout"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 158)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 158)))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 158);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            echo "                          </select></td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        echo "                  </tbody>
                </table>
              </div>

            </div>


            <div id=\"tab-report\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 172
        echo ($context["text_report"] ?? null);
        echo "</legend>
                <div id=\"report\">";
        // line 173
        echo ($context["report"] ?? null);
        echo "</div>
              </fieldset>
            </div>


            <div id=\"tab-variations\" class=\"tab-pane\">
           <!-- Ajax --> 
            </div>

            </div>

          <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 184
        echo ($context["product_id"] ?? null);
        echo "\" id=\"input-product-id\"/>
                 <input type=\"hidden\" id=\"input-directory\" value=\"products/";
        // line 185
        echo ($context["product_id"] ?? null);
        echo "\">
        </form>
      </div>
    </div>
  </div>
</div>
 
<!-- Add New Attribute Modal -->

<div class=\"modal fade\" id=\"newAttributeModal\" tabindex=\"-1\" aria-labelledby=\"newAttributeModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"newAttributeModalLabel\">
          <i class=\"fa-solid fa-pencil\"></i> Add New Attribute
        </h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
    
      <div class=\"modal-body\">
        <form action=\"\" method=\"post\" id=\"newattributeForm\">  
        ";
        // line 206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 207
            echo "          <div class=\"input-group mb-3\">
            <div class=\"input-group-text\">
              <img src=\"";
            // line 209
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 209);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 209);
            echo "\" />
            </div>
            <input type=\"text\" class=\"form-control\" name=\"attribute_description[";
            // line 211
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 211);
            echo "][name]\" placeholder=\"Attribute Name - ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 211);
            echo "\" />
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 214
        echo "          <input type=\"hidden\" name=\"sort_order\" value=\"0\">
          <input type=\"hidden\" name=\"attribute_id\" value=\"0\">
        </form>
      </div>
      
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancel</button>
        <button type=\"button\" class=\"btn btn-primary\" id=\"saveAttributeBtn\">Save</button>
      </div>
    </div>
  </div>
</div>
 
 
  
<script ><!--
 
 
 

\$('#report').on('click', '.pagination a', function (e) {
    e.preventDefault();

    \$('#report').load(this.href);
});

    \$(document).ready(function () {
      initTinyMCE();

   // Seo & Meta Title auto-complete

 var canWriteSeo = false;
 \$('input[name^=\"product_description[\"][name\$=\"[name]\"]').on('input', function() {
 
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;
 
      \$('input[name=\"product_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      \$('input[name\$=\"['+ index + ']\"][name^=\"product_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });
 

   // Intercept Product form submission

    \$('#form-product').submit(function (e) {
        e.preventDefault(); 
 
        \$.ajax({
            type: 'POST',
            url: \$('#form-product').attr('action'),
            data: \$('#form-product').serialize(),  
            success: function (response) {
              if (response.product_id) {
                \$(\"#noticeimage\").hide();
                \$(\"#add-new-image-button\").attr('disabled',false);
                \$(\"#tabimage-content\").show();
                \$(\"#input-product-id\").val(response.product_id);
                \$(\"#input-directory\").val(\"products/\" + response.product_id);
                window.product_id = response.product_id;
              }
                if (response.success) { 
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + response.success + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                } else {
                  if (typeof response.error !== \"undefined\") {
                    console.log( response.error)
                    Object.entries(response.error).map(([key, value]) => {
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + key + ': ' + value + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    });
                  } else {
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(response) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
              }
                setTimeout(() => {
                  \$('.alertsp2').alert('close');
                }, 5500);
 
    var userToken = encodeURIComponent('";
        // line 299
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
 
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
 
            },
            error: function (error) {
                alert(JSON.stringify(error));
         
               
                \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(error) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                
                setTimeout(() => {
                  \$('.alertsp2').alert('close');
                }, 5500);

    var userToken = encodeURIComponent('";
        // line 316
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
    //error occurred, reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
     \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
            }
        });
    });
    var userToken = encodeURIComponent('";
        // line 324
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
   //initial page load, load option tab content
   \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
});

\$(document).ready(function() {
 
\$(document).on('change', '[name^=\"product_special[\"][name\$=\"[apply]\"]', function () {
    // Check if the selected value is \"Total (Options and Variations)\"
    if (\$(this).val() == '1') {
        // Get the corresponding 'type' select element
        var typeSelect = \$(this).closest('tr').find('[name^=\"product_special[\"][name\$=\"[type]\"]');
        
        // Automatically select the \"% Off Percentage\" option in the 'type' select
        typeSelect.val('1');
    }
});

// Event delegation for the 'type' select
\$(document).on('change', '[name^=\"product_special[\"][name\$=\"[type]\"]', function () {
    // Check if the selected value is \"New Price\"
    if (\$(this).val() == '0') {
        // Get the corresponding 'apply' select element
        var applySelect = \$(this).closest('tr').find('[name^=\"product_special[\"][name\$=\"[apply]\"]');
        
        // If \"New Price\" is selected, set the 'apply' select to the default option (\"Product Price\")
        applySelect.val('0');
    }
});

});
//--></script>

 
<script>
 
 //Variations Loader

  \$(document).ready(function () {
      // Get the tab content div
      var \$tabContent = \$('#tab-variations');
      window.product_id = \$(\"#input-product-id\").val();

      window.loadVariations  = function () {

         \$tabContent.html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
         \$tabContent.load('index.php?route=catalog/variations&user_token=";
        // line 372
        echo ($context["user_token"] ?? null);
        echo "&product_id=' +   window.product_id, function () {

            \$(document).ready(function () {

            });
            \$tabContent.find('.fa-spinner').remove();
         });
      }

      \$('#tab-variations-link').on('click', function (e) {

         e.preventDefault();
         window.loadVariations();
      });
   });
 

//******************** Options tab Section ****************************

  \$(document).ready(function() {

// Lock - unlock an Option
\$(document).on('click', '.add-or-edit-btn', function () {
var rowId = \$(\"#\" + \$(this).data('option-value-row'));
var icon = \$(this).find('i');
var tr =  \$(this).closest('table');

opt = tr.find('.option-select :selected:first').text();
 rowId.find('.option-title-accordion').text(opt.trim());

if (icon.hasClass('fa-unlock')) {
  // If it's currently unlocked, change icon to lock and remove .read-only class
  icon.removeClass('fa-unlock').addClass('fa-lock');
  tr.find('input, select').removeClass('read-only');
} else {
  // If it's currently locked, change icon to unlock and add .read-only class
  icon.removeClass('fa-lock').addClass('fa-unlock');
  tr.find('input, select').addClass('read-only');
}
});

// Button Quick Option add

\$(document).on('click', '.add-q-option', function () {
\$(this).hide();
event.preventDefault();
window.addQuickOption();
});
    
  // Add an option value to an Option

  \$(document).on('click', '.add-opt-button', function () {
  let rowId = \$(this).data('option-row');
 
  let valuerow = \$(\"#option-row-\" + rowId + \" .accordion-item\").length  ;
  let template = \$('#option-template-div').html();
  valuerow++;
  valuerow++;
 
  \$('#collapse' + rowId).attr('aria-expanded', 'true');
  \$('#collapse' + rowId).removeClass('collapse');
 

template = template.replace(/xxx/g, '' );
template = template.replace(/option-row-placeholder/g, rowId);
template = template.replace(/option-valuerow-placeholder/g, valuerow );
 
 let copySelect = \$(\"#select-default-row-\" + rowId).clone();
 copySelect.removeClass('d-none');
 copySelect.addClass('read-only');
 let selname = \"product_option[\"  + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\"
 copySelect.attr('name', selname);
 copySelect.addClass('option-select');
 let position = \$(\"#option-row-\"  + rowId + \" .accordion-item\").length -1;
 let selectedOptionValue = copySelect.find('option:eq('+ position + ')').val();
 template = template.replace(/option-name-placeholder/g, copySelect.find('option:eq('+ position + ')').text());
if (position > copySelect.find('option').length - 1) {
  alert('All added');
  return;
}
 template = \$(template);
 template.find('.insertselect').append(copySelect);

let inputName = \"product_option[\" + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\";
 
template.find('[name=\"' + inputName + '\"]').val(selectedOptionValue);


\$(\"#option-row-body-\" + rowId).append(template);
 
   initializeSortables();
});

  });

//******************** END Options tab Section *************************

</script>
";
        // line 470
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  731 => 470,  630 => 372,  579 => 324,  568 => 316,  548 => 299,  461 => 214,  450 => 211,  443 => 209,  439 => 207,  435 => 206,  411 => 185,  407 => 184,  393 => 173,  389 => 172,  378 => 163,  370 => 160,  355 => 158,  351 => 157,  346 => 155,  342 => 154,  339 => 153,  335 => 152,  326 => 146,  322 => 145,  306 => 131,  295 => 128,  291 => 127,  288 => 126,  284 => 125,  275 => 119,  271 => 118,  263 => 113,  255 => 108,  247 => 105,  241 => 102,  236 => 100,  227 => 94,  220 => 90,  212 => 85,  201 => 77,  194 => 73,  187 => 69,  180 => 65,  171 => 59,  167 => 58,  162 => 56,  155 => 52,  151 => 51,  147 => 50,  143 => 49,  139 => 48,  135 => 47,  131 => 46,  127 => 45,  123 => 44,  117 => 41,  112 => 39,  104 => 33,  93 => 31,  89 => 30,  84 => 28,  78 => 27,  73 => 26,  65 => 24,  63 => 23,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
 
<div id=\"content\">
  <style>
 
    .move-btns {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 50px;
  }
  .attribute-groups-effect {
    margin-bottom: 10px;border-bottom: 1px dashed #939393;padding-bottom: 10px;
  }
  .move-btns button {
      margin-bottom: 5px;
  }
</style>
  <script  src=\"view/javascript/Sortable.min.js\"></script>
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        {% if product_id > 0 %}
        <a target=\"_blank\" href=\"/index.php?route=product/product&language=en-gb&product_id={{product_id}}\" data-bs-toggle=\"tooltip\" title=\"{{ button_view }}\" class=\"btn btn-secondary\"><i class=\"fa-solid fa-eye\"></i></a>
       {% endif %}
        <button type=\"submit\" form=\"form-product\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-product\" action=\"{{ save }}\" method=\"post\"  novalidate>

          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\">  <a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\"><span class=\"fa-solid mx-1 fa-cube\"></span>  {{ tab_general }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-database\"></span> {{ tab_data }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-pricing\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-tag\"></span> {{ tab_pricing }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-links\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-chain\"></span> {{ tab_links }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-image\"></span> {{ tab_image }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-attribute\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-list-ul\"></span> {{ tab_attribute }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-cog\"></span> {{ tab_option }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-variations\" data-bs-toggle=\"tab\"  id=\"tab-variations-link\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-random\"></span> {{ tab_variations }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-subscription\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-credit-card\"></span> {{ tab_subscription }}</a></li>
     
    
       
            <li class=\"nav-item\"><a href=\"#tab-reward\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-trophy\"></span>  {{ tab_reward }}</a></li>
  
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-paint-brush\"></span>  {{ tab_design }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-report\" data-bs-toggle=\"tab\" class=\"nav-link\"><span class=\"fa-solid mx-1 fa-chart-bar\"></span> {{ tab_report }}</a></li>
          </ul>

     <div class=\"tab-content\">

              <div class=\"tab-pane active\" id=\"tab-general\">
                 {{ general_tab }}
              </div>

              <div id=\"tab-data\" class=\"tab-pane\">
                 {{ data_tab }}
              </div>
      
              <div id=\"tab-links\" class=\"tab-pane\">
                 {{ links_tab }}
              </div>
       
              <div id=\"tab-attribute\" class=\"tab-pane\">
                 {{ attributes_tab }}
              </div>
             
              <div id=\"tab-option\" class=\"tab-pane\">
                 <div id=\"option\"><!-- Ajax --></div>
              </div>

              <div id=\"tab-subscription\" class=\"tab-pane\">
                 {{subscription_tab}}
              </div>


              <div id=\"tab-pricing\" class=\"tab-pane\">
                 {{pricing_tab}}
              </div>

              <div id=\"tab-image\" class=\"tab-pane\">
                 {{ images_tab }}
              </div>

            <div id=\"tab-reward\" class=\"tab-pane\">

              <fieldset>
                <legend>{{ text_reward }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-points\" class=\"col-sm-2 col-form-label\">{{ entry_points }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"points\" value=\"{{ points }}\" placeholder=\"{{ entry_points }}\" id=\"input-points\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">{{ help_points }}</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_points }}</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-reward\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">{{ entry_customer_group }}</td>
                        <td class=\"text-end\">{{ entry_reward }}&nbsp;&nbsp;
              
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      {% for customer_group in customer_groups %}
                        <tr>
                          <td class=\"text-start\">{{ customer_group.name }}</td>
                          <td class=\"text-end\"><input type=\"text\" name=\"product_reward[{{ customer_group.customer_group_id }}][points]\" value=\"{{ product_reward[customer_group.customer_group_id] ? product_reward[customer_group.customer_group_id].points }}\" class=\"form-control\"/></td>
                        </tr>
                      {% endfor %}
                    </tbody>
                  </table>
                </div>
              </fieldset>

            </div>

    
            <div id=\"tab-design\" class=\"tab-pane\">

              <div class=\"table-responsive\">
                <table id=\"product-layout\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_store }}</td>
                      <td class=\"text-start\">{{ entry_layout }}
                   
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% for store in stores %}
                      <tr>
                        <td class=\"text-start\">{{ store.name }}</td>
                        <td class=\"text-start\"><select name=\"product_layout[{{ store.store_id }}]\" class=\"form-select\">
                            <option value=\"\"></option>
                            {% for layout in layouts %}
                              <option value=\"{{ layout.layout_id }}\"{% if product_layout[store.store_id] and product_layout[store.store_id] == layout.layout_id %} selected{% endif %}>{{ layout.name }}</option>
                            {% endfor %}
                          </select></td>
                      </tr>
                    {% endfor %}
                  </tbody>
                </table>
              </div>

            </div>


            <div id=\"tab-report\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_report }}</legend>
                <div id=\"report\">{{ report }}</div>
              </fieldset>
            </div>


            <div id=\"tab-variations\" class=\"tab-pane\">
           <!-- Ajax --> 
            </div>

            </div>

          <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\" id=\"input-product-id\"/>
                 <input type=\"hidden\" id=\"input-directory\" value=\"products/{{ product_id }}\">
        </form>
      </div>
    </div>
  </div>
</div>
 
<!-- Add New Attribute Modal -->

<div class=\"modal fade\" id=\"newAttributeModal\" tabindex=\"-1\" aria-labelledby=\"newAttributeModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"newAttributeModalLabel\">
          <i class=\"fa-solid fa-pencil\"></i> Add New Attribute
        </h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
    
      <div class=\"modal-body\">
        <form action=\"\" method=\"post\" id=\"newattributeForm\">  
        {% for language in languages %}
          <div class=\"input-group mb-3\">
            <div class=\"input-group-text\">
              <img src=\"{{ language.image }}\" title=\"{{ language.name }}\" />
            </div>
            <input type=\"text\" class=\"form-control\" name=\"attribute_description[{{ language.language_id }}][name]\" placeholder=\"Attribute Name - {{ language.name }}\" />
          </div>
        {% endfor %}
          <input type=\"hidden\" name=\"sort_order\" value=\"0\">
          <input type=\"hidden\" name=\"attribute_id\" value=\"0\">
        </form>
      </div>
      
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancel</button>
        <button type=\"button\" class=\"btn btn-primary\" id=\"saveAttributeBtn\">Save</button>
      </div>
    </div>
  </div>
</div>
 
 
  
<script ><!--
 
 
 

\$('#report').on('click', '.pagination a', function (e) {
    e.preventDefault();

    \$('#report').load(this.href);
});

    \$(document).ready(function () {
      initTinyMCE();

   // Seo & Meta Title auto-complete

 var canWriteSeo = false;
 \$('input[name^=\"product_description[\"][name\$=\"[name]\"]').on('input', function() {
 
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;
 
      \$('input[name=\"product_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      \$('input[name\$=\"['+ index + ']\"][name^=\"product_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });
 

   // Intercept Product form submission

    \$('#form-product').submit(function (e) {
        e.preventDefault(); 
 
        \$.ajax({
            type: 'POST',
            url: \$('#form-product').attr('action'),
            data: \$('#form-product').serialize(),  
            success: function (response) {
              if (response.product_id) {
                \$(\"#noticeimage\").hide();
                \$(\"#add-new-image-button\").attr('disabled',false);
                \$(\"#tabimage-content\").show();
                \$(\"#input-product-id\").val(response.product_id);
                \$(\"#input-directory\").val(\"products/\" + response.product_id);
                window.product_id = response.product_id;
              }
                if (response.success) { 
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + response.success + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                } else {
                  if (typeof response.error !== \"undefined\") {
                    console.log( response.error)
                    Object.entries(response.error).map(([key, value]) => {
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + key + ': ' + value + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    });
                  } else {
                    \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(response) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
              }
                setTimeout(() => {
                  \$('.alertsp2').alert('close');
                }, 5500);
 
    var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
 
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
 
            },
            error: function (error) {
                alert(JSON.stringify(error));
         
               
                \$('#alert').prepend('<div class=\"alert alertsp2 alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(error) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                
                setTimeout(() => {
                  \$('.alertsp2').alert('close');
                }, 5500);

    var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
    //error occurred, reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
     \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
            }
        });
    });
    var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
   //initial page load, load option tab content
   \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
});

\$(document).ready(function() {
 
\$(document).on('change', '[name^=\"product_special[\"][name\$=\"[apply]\"]', function () {
    // Check if the selected value is \"Total (Options and Variations)\"
    if (\$(this).val() == '1') {
        // Get the corresponding 'type' select element
        var typeSelect = \$(this).closest('tr').find('[name^=\"product_special[\"][name\$=\"[type]\"]');
        
        // Automatically select the \"% Off Percentage\" option in the 'type' select
        typeSelect.val('1');
    }
});

// Event delegation for the 'type' select
\$(document).on('change', '[name^=\"product_special[\"][name\$=\"[type]\"]', function () {
    // Check if the selected value is \"New Price\"
    if (\$(this).val() == '0') {
        // Get the corresponding 'apply' select element
        var applySelect = \$(this).closest('tr').find('[name^=\"product_special[\"][name\$=\"[apply]\"]');
        
        // If \"New Price\" is selected, set the 'apply' select to the default option (\"Product Price\")
        applySelect.val('0');
    }
});

});
//--></script>

 
<script>
 
 //Variations Loader

  \$(document).ready(function () {
      // Get the tab content div
      var \$tabContent = \$('#tab-variations');
      window.product_id = \$(\"#input-product-id\").val();

      window.loadVariations  = function () {

         \$tabContent.html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
         \$tabContent.load('index.php?route=catalog/variations&user_token={{ user_token }}&product_id=' +   window.product_id, function () {

            \$(document).ready(function () {

            });
            \$tabContent.find('.fa-spinner').remove();
         });
      }

      \$('#tab-variations-link').on('click', function (e) {

         e.preventDefault();
         window.loadVariations();
      });
   });
 

//******************** Options tab Section ****************************

  \$(document).ready(function() {

// Lock - unlock an Option
\$(document).on('click', '.add-or-edit-btn', function () {
var rowId = \$(\"#\" + \$(this).data('option-value-row'));
var icon = \$(this).find('i');
var tr =  \$(this).closest('table');

opt = tr.find('.option-select :selected:first').text();
 rowId.find('.option-title-accordion').text(opt.trim());

if (icon.hasClass('fa-unlock')) {
  // If it's currently unlocked, change icon to lock and remove .read-only class
  icon.removeClass('fa-unlock').addClass('fa-lock');
  tr.find('input, select').removeClass('read-only');
} else {
  // If it's currently locked, change icon to unlock and add .read-only class
  icon.removeClass('fa-lock').addClass('fa-unlock');
  tr.find('input, select').addClass('read-only');
}
});

// Button Quick Option add

\$(document).on('click', '.add-q-option', function () {
\$(this).hide();
event.preventDefault();
window.addQuickOption();
});
    
  // Add an option value to an Option

  \$(document).on('click', '.add-opt-button', function () {
  let rowId = \$(this).data('option-row');
 
  let valuerow = \$(\"#option-row-\" + rowId + \" .accordion-item\").length  ;
  let template = \$('#option-template-div').html();
  valuerow++;
  valuerow++;
 
  \$('#collapse' + rowId).attr('aria-expanded', 'true');
  \$('#collapse' + rowId).removeClass('collapse');
 

template = template.replace(/xxx/g, '' );
template = template.replace(/option-row-placeholder/g, rowId);
template = template.replace(/option-valuerow-placeholder/g, valuerow );
 
 let copySelect = \$(\"#select-default-row-\" + rowId).clone();
 copySelect.removeClass('d-none');
 copySelect.addClass('read-only');
 let selname = \"product_option[\"  + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\"
 copySelect.attr('name', selname);
 copySelect.addClass('option-select');
 let position = \$(\"#option-row-\"  + rowId + \" .accordion-item\").length -1;
 let selectedOptionValue = copySelect.find('option:eq('+ position + ')').val();
 template = template.replace(/option-name-placeholder/g, copySelect.find('option:eq('+ position + ')').text());
if (position > copySelect.find('option').length - 1) {
  alert('All added');
  return;
}
 template = \$(template);
 template.find('.insertselect').append(copySelect);

let inputName = \"product_option[\" + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\";
 
template.find('[name=\"' + inputName + '\"]').val(selectedOptionValue);


\$(\"#option-row-body-\" + rowId).append(template);
 
   initializeSortables();
});

  });

//******************** END Options tab Section *************************

</script>
{{ footer }}
", "cp-akis/view//plates/catalog/product_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_form.twig");
    }
}
