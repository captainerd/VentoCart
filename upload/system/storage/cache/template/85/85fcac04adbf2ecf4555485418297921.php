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

/* cp-akis/view//plates/catalog/product_tabs/attributes_tab.twig */
class __TwigTemplate_5ba79d879450785e1348a5d5bcb8ceba extends Template
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
        echo "    <div class=\"table-responsive\">
    

              <!-- Accordion Template -->

      <div class=\"accordion d-none mb-3\" id=\"attribute-template\">
        <div class=\"accordion-item\">
          <h2 class=\"accordion-header\" id=\"attribute-template-headingOne\">
            <div class=\"d-flex px-3 align-items-center\"> 
              <span class=\"my-handle\" aria-hidden=\"true\">
                   
                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
              </span>
            <button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#attribute-template-collapseOne\" aria-expanded=\"true\" aria-controls=\"attribute-template-collapseOne\">
             
            </button>
            <button type=\"button\"  data-position-n=\"0\" data-group-row=\"0\" data-bs-toggle=\"tooltip\" title=\"";
        // line 17
        echo ($context["button_attribute_add"] ?? null);
        echo "\" class=\"btn  mx-1  btn-primary  add-attribute-group\">
              <i class=\"fa-solid fa-plus-circle\"></i> 
            </button>

            <a href=\"index.php?route=catalog/attribute.form&user_token=";
        // line 21
        echo ($context["user_token"] ?? null);
        echo "&attribute_id=attribute_id_placeholder\" class=\"btn mx-1 btn-primary\">
              <i class=\"fa-solid fa-pencil\"></i>
          </a>
         
            <button type=\"button\"  data-bs-toggle=\"tooltip\" title=\"";
        // line 25
        echo ($context["button_remove"] ?? null);
        echo "\" class=\"btn  mx-1   delete-attribute    btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button> 
          </div>
          </h2>
          <div id=\"attribute-template-collapseOne\" class=\"accordion-collapse collapse show\" aria-labelledby=\"attribute-template-headingOne\">
            <div class=\"accordion-body\">
              <ul   class=\"listWithHandle-attribute attribute-groups\"  style=\"padding: 0; margin: 0\">
                <div class=\"attribute-groups-effect\"> 
                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 33
            echo "                  <div class=\"d-flex attribute-line\" data-input-name=\"text\" data-language=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 33);
            echo "\">
                    <div style=\"width: 64px;height: 32px;\" class=\"btn-group \">
                    ";
            // line 35
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 35) == 1)) {
                // line 36
                echo "                    <span class=\"my-handle\" aria-hidden=\"true\">
                   
                      <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                    </span>
                    ";
            }
            // line 41
            echo "                  </div>
                    <div class=\"input-group mb-12\">
                      <div class=\"input-group-text\"><img src=\"";
            // line 43
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 43);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 43);
            echo "\"/></div>
                      <input  autocomplete=\"off\" type=\"text\" data-oc-target=\"attribute-input-autocomplete\"  name=\"product_attribute[position_row][product_attribute_description][position_n][";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 44);
            echo "][text]\" placeholder=\"";
            echo ($context["entry_text"] ?? null);
            echo "\" class=\"form-control attribute-input\" value=\"text-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 44);
            echo "\">
                      <ul style=\"top: 52px;left: 52px;\" class=\"dropdown-menu attribute-input-autocomplete\"></ul>
                    </div>
                    
                    <div class=\"input-group mb-12\">
                      <div class=\"input-group-text\"><img src=\"";
            // line 49
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 49);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 49);
            echo "\"/></div>
                      <input  autocomplete=\"off\" type=\"text\" data-oc-target=\"attribute-input-autocomplete\" name=\"product_attribute[position_row][product_attribute_description][position_n][";
            // line 50
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 50);
            echo "][value_text]\" placeholder=\"";
            echo ($context["entry_text"] ?? null);
            echo "\" class=\"form-control attribute-input\" value=\"value_text-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 50);
            echo "\">
                      <ul style=\"top: 52px;left: 52px;\" class=\"dropdown-menu attribute-input-autocomplete\"></ul>
                  
                    </div>
                  
                    <div style=\"width: 64px;height: 32px;\" class=\"btn-group \">
                      ";
            // line 56
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 56) == 1)) {
                // line 57
                echo "                      <input value=\"0\"  name=\"product_attribute[position_row][product_attribute_description][position_n][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57);
                echo "][sort_order]\"  type=\"hidden\"   class=\"sort-order-attribute\" value=\"0\">
                     
                          <button type=\"button\" class=\"btn  d-none btn-danger delete-attribute-line btn-sm\" data-bs-toggle=\"tooltip\" title=\"Delete\">
                            <i class=\"fa-solid fa-minus-circle\"></i> 
                          </button>      
                      ";
            }
            // line 63
            echo "                    </div>
                  
                  </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "              </div>
              </ul>
            </div>
            
          </div>
        </div>
      </div>

      <!-- End accordion Template -->
    
      <div class=\"row mb-3\">
        <label for=\"input-attribute-addnew\" class=\"col-sm-2 col-form-label text-end\">";
        // line 78
        echo ($context["button_attribute_add"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#newAttributeModal\">
                       ";
        // line 83
        echo ($context["entry_new_attribute"] ?? null);
        echo "
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row mb-3\">
        <label for=\"input-option\" class=\"col-sm-2 col-form-label\">";
        // line 91
        echo ($context["entry_existing_attribute"] ?? null);
        echo "</label>
        <div class=\"col-md-6\">
            <input type=\"text\" placeholder=\"";
        // line 93
        echo ($context["entry_attribute"] ?? null);
        echo "\" id=\"input-attribute-addnew\" data-oc-target=\"autocomplete-attribute-addnew\" class=\"form-control\" autocomplete=\"new-password\"/>
            <ul id=\"autocomplete-attribute-addnew\" class=\"dropdown-menu\"></ul>
            <div class=\"form-text\">(Autocomplete)</div>
        </div>
    </div>
    
      <ul id=\"attribute-accordions\" class=\"listWithHandle-attribute\"  style=\"padding: 0; margin: 0\">
    </ul>

</div>
 <!-- Addribute Add Modal is retained in product_form -->
 
<script >
    \$(document).ready(function () {
// ************************************ Attributes Section ********************************
var attribute_row = 0;
  
var productAttributesData = ";
        // line 110
        echo json_encode(($context["product_attributes"] ?? null));
        echo ";
 
 
// Delete an accordion/Attribute
\$(document).on('click', '.delete-attribute', function() {
      \$(this).closest('.accordion-item').remove();
      reSortAttributes();
});

// Delete an extra set inside an attribute

\$(document).on('click', '.delete-attribute-line', function() {
    \$(this).closest('li').remove();
    reSortAttributes();
});
            

// Add an extra set in an Attribute

\$(document).on('click', '.add-attribute-group', function () {

 
   
    var groupRow = \$(this).data('group-row');
    
    var positionN = \$(this).data('position-n');
    positionN++;
    \$(this).data('position-n', positionN);

    var attributeGroupContent = \$('#attribute-template .attribute-groups').html();
    attributeGroupContent =   attributeGroupContent;
    attributeGroupContent = attributeGroupContent.replace('d-none', '');

    attributeGroupContent = attributeGroupContent.replace(/position_row/g, groupRow).replace(/position_n/g, positionN);
    console.log(attributeGroupContent);
    attributeGroupContent = '<li style=\"border: 1px solid #beffa1; border-radius:10px;\"  class=\"list-group-item\">' +  attributeGroupContent + '</li>';
    // Convert HTML string to jQuery object
    var \$attributeGroupContent = \$(attributeGroupContent);

    // Clear values of input fields
    \$attributeGroupContent.find('input').val('');

    var parentAccordion = \$(this).closest('.accordion-item');
    
    parentAccordion.find('.attribute-groups').append(\$attributeGroupContent);
    if (parentAccordion.find('.accordion-button').hasClass('collapsed')) {
 
        parentAccordion.find('.accordion-button').trigger('click');
    }
    reSortAttributes();
    initializeSortablesAttributes();
});


 
   
 // Generate existing attributes for the product

function generateAttributeAccordion(index, productAttribute) {
  // Clone the template
  let accordionClone = \$(\"#attribute-template\").clone();
 
  // Update attributes
  let attributeId = productAttribute.attribute_id;
  accordionClone.find(\".accordion-button\").text(productAttribute.name);
  accordionClone.find(\".accordion\").attr(\"id\", \"attribute-\" + index);
  accordionClone.find(\".accordion-button\").attr(\"data-bs-target\", \"#attribute-\" + index + \"-collapseOne\");
  accordionClone.find(\".accordion-collapse\").attr(\"id\", \"attribute-\" + index + \"-collapseOne\");
  accordionClone.find('a').attr('href',accordionClone.find('a').attr('href').replace('attribute_id_placeholder', attributeId));
  // Save the content of .attribute-groups in a variable and empty it
  let attributeGroupsContent = accordionClone.find(\".attribute-groups\").html();
 
  accordionClone.find(\".attribute-groups\").empty();
  var counter=0;
  // Loop through product_attribute_description and update inputs
  \$.each(productAttribute.product_attribute_description, function(positionN, description) {
    let updatedContent = attributeGroupsContent.replace(/position_row/g, index).replace(/position_n/g, positionN);
 
   
    \$.each(description, function(language_id, descriptionv) {
      if (counter > 0) {
        updatedContent = updatedContent.replace(new RegExp('d-none', 'g'), '--');
      }
        updatedContent = updatedContent.replace(new RegExp('value=\"value_text-' + language_id + '\"', 'g'), 'value=\"' + descriptionv.value_text + '\"');
        updatedContent = updatedContent.replace(new RegExp('value=\"text-' + language_id + '\"', 'g'), 'value=\"' + descriptionv.text + '\"');
        updatedContent = updatedContent.replace(new RegExp('value=\"0\"', 'g'), 'value=\"' + descriptionv.sort_order + '\"');
    });
    counter++;
    accordionClone.find(\".attribute-groups\").append('<li class=\"list-group-item\">'  + updatedContent + '</li>');
});
let hiddenInput = \$('<input type=\"hidden\" class=\"attribute_id\" name=\"product_attribute[' + index + '][attribute_id]\" value=\"' + attributeId + '\">');
 
 
accordionClone.append(hiddenInput);
accordionClone.removeClass('d-none');
accordionClone.attr('id', 'accordion-main-it-' + index);

// Append the entire cloned accordion to the list
\$(\"#attribute-accordions\").append('<li class=\"list-group-item\">' + accordionClone.prop('outerHTML') + '</li>');

 \$('#accordion-main-it-' + index).find('.add-attribute-group').attr('data-position-n', counter);
 \$('#accordion-main-it-' + index).find('.add-attribute-group').attr('data-group-row', index);
 
 
\$('#accordion-main-it-' + index).find('.accordion-collapse').removeClass('show');

\$('#accordion-main-it-' + index).find('.accordion-button').addClass('collapsed');
attribute_row++;
reSortAttributes();
}

\$.each(productAttributesData, function(index, productAttribute) {
  generateAttributeAccordion(index, productAttribute);
});
initializeSortablesAttributes();
// Autocomplete/Add New Attribute
\$('#input-attribute-addnew').autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocomplete&product_id=' +   window.product_id    + '&user_token=";
        // line 229
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
            addNewAttribute(item['label'], item['value']);
            reSortAttributes();
        }
    }); 

    var attributeCurID = 0;
    var attributeCurType = '';
    var attributeCurLang = 1;


    \$(document).on('focus', '.attribute-input', function () {
 
    let result = \$(this).attr('name').match(/^(product_attribute\\[\\d+\\])/)[0] + '[attribute_id]';
 
    attributeCurType =  \$(this).attr('name').match(/\\[([^\\]]+)\\]\$/)[1];
    attributeCurID = \$('body').find('[name=\"' + result + '\"]').val();
  
    attributeCurLang = \$(this).attr('name').match(/\\[(\\d+)\\]/g)[2].replace(/\\D/g, '')

 
  
  
});
 

// Initialize Sortables for attributes

function initializeSortablesAttributes() {
  \$('.listWithHandle-attribute').each(function () {
    // Check if Sortable instance already exists
    if (!\$(this).data('sortable')) {
      // Create Sortable instance
      Sortable.create(this, {
        handle: '.my-handle',
        animation: 150,
        onEnd: function (event) {
        reSortAttributes();
        }
      });
      \$(this).data('sortable','true');
    }
  });
}

// Update hidden inputs sort_order values
 function reSortAttributes() {
  \$(\"#attribute-accordions\").find(\".sort-order-attribute\").each(function(index) {
         // Set the value based on the index (position)
         \$(this).val(index);
        });

    //Name autocompleters
    updateAutocompletNames();

 }
function updateAutocompletNames() {
  \$('.attribute-input').each(function (index) {
        // Create a unique ID for the input and ul
        let uniqueId = 'autocomplete-' + index + Math.floor(Math.random() * 10000000) + 1;

        // Set the unique ID to the input
        \$(this).attr('data-oc-target', uniqueId);

        // Set the unique ID to the associated ul
        \$(this).next('.attribute-input-autocomplete').attr('id', uniqueId);

         

 
    \$(this).autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocompleteChild&attribute_lang=' + attributeCurLang + '&attribute_type=' + attributeCurType + '&attribute_id=' + attributeCurID + '&product_id=' +   window.product_id    + '&user_token=";
        // line 315
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
           \$(this).val(item['label']);
        }
    }); 
    });
}
 // Modal Adding new attribute
 function handleSaveAttribute() {
    var formData = \$(\"#newattributeForm\").serialize();
 
    \$.ajax({
        type: \"POST\",
        url: \"index.php?route=catalog/attribute.save&user_token=";
        // line 340
        echo ($context["user_token"] ?? null);
        echo "\",
        data: formData,
        dataType: \"json\",   
        success: function(response) {
          addNewAttribute(\$('input[name=\"attribute_description[1][name]\"]').val(), response.attribute_id);
          
            \$(\"#newAttributeModal\").modal(\"hide\");
        },
        error: function(error) {
           alert('An Error occured saving the attribute');
        }
    });
}
  // Attach the event listener to the modal save button
  \$(\"#saveAttributeBtn\").on(\"click\", handleSaveAttribute);

  // Add new a Attribute

function addNewAttribute(name, attributeId) {
  
  var newAccordion = \$('#attribute-template').clone().removeClass('d-none');
  newAccordion.attr('id','accordion-main-it-' + attribute_row);
  newAccordion.find('a').attr('href',newAccordion.find('a').attr('href').replace('attribute_id_placeholder', attributeId));
  newAccordion.find('[id]').each(function() {
    \$(this).attr('id', 'accordion-' + attribute_row + '-' + \$(this).attr('id'));
  });
  newAccordion.find('[aria-labelledby]').each(function() {
    \$(this).attr('aria-labelledby', 'accordion-' + attribute_row + '-' + \$(this).attr('aria-labelledby'));
  });
  newAccordion.find('[data-bs-target]').each(function() {
    \$(this).attr('data-bs-target', '#accordion-' + attribute_row + '-' + \$(this).attr('data-bs-target').split('#')[1]);
  });
  newAccordion.find('input').each(function() {
    \$(this).attr('value', '');
});
 
  newAccordion.find('.accordion-button').text(name);
  var hiddenInput = \$('<input type=\"hidden\" class=\"attribute_id\" name=\"product_attribute[' + attribute_row + '][attribute_id]\" value=\"' + attributeId + '\">');
 
  newAccordion.find('input').each(function() {
    var currentName = \$(this).attr('name');
    \$(this).val('');
    var updatedName = currentName.replace(/position_n/g, '0').replace(/position_row/g, attribute_row);

   
    \$(this).attr('name', updatedName);
  });
  newAccordion.find('.accordion-body').append(hiddenInput);
  let content =  newAccordion.find(\".attribute-groups\").html();
  newAccordion.find(\".attribute-groups\").html('<li class=\"list-group-item\">' + content + '</li>');

  let listItem = \$('<li class=\"list-group-item\"></li>').append(newAccordion);

 
  listItem.find('.add-attribute-group').attr('data-group-row', attribute_row);
 

// Append the wrapped newAccordion to #attribute-accordions
\$('#attribute-accordions').append(listItem);
  attribute_row++;
  
  reSortAttributes();
}
});
// ********************************* End Attributes section ******************************

</script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/attributes_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  477 => 340,  449 => 315,  360 => 229,  238 => 110,  218 => 93,  213 => 91,  202 => 83,  194 => 78,  181 => 67,  164 => 63,  154 => 57,  152 => 56,  139 => 50,  133 => 49,  121 => 44,  115 => 43,  111 => 41,  104 => 36,  102 => 35,  96 => 33,  79 => 32,  69 => 25,  62 => 21,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("    <div class=\"table-responsive\">
    

              <!-- Accordion Template -->

      <div class=\"accordion d-none mb-3\" id=\"attribute-template\">
        <div class=\"accordion-item\">
          <h2 class=\"accordion-header\" id=\"attribute-template-headingOne\">
            <div class=\"d-flex px-3 align-items-center\"> 
              <span class=\"my-handle\" aria-hidden=\"true\">
                   
                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
              </span>
            <button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#attribute-template-collapseOne\" aria-expanded=\"true\" aria-controls=\"attribute-template-collapseOne\">
             
            </button>
            <button type=\"button\"  data-position-n=\"0\" data-group-row=\"0\" data-bs-toggle=\"tooltip\" title=\"{{ button_attribute_add }}\" class=\"btn  mx-1  btn-primary  add-attribute-group\">
              <i class=\"fa-solid fa-plus-circle\"></i> 
            </button>

            <a href=\"index.php?route=catalog/attribute.form&user_token={{ user_token }}&attribute_id=attribute_id_placeholder\" class=\"btn mx-1 btn-primary\">
              <i class=\"fa-solid fa-pencil\"></i>
          </a>
         
            <button type=\"button\"  data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn  mx-1   delete-attribute    btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button> 
          </div>
          </h2>
          <div id=\"attribute-template-collapseOne\" class=\"accordion-collapse collapse show\" aria-labelledby=\"attribute-template-headingOne\">
            <div class=\"accordion-body\">
              <ul   class=\"listWithHandle-attribute attribute-groups\"  style=\"padding: 0; margin: 0\">
                <div class=\"attribute-groups-effect\"> 
                {% for language in languages %}
                  <div class=\"d-flex attribute-line\" data-input-name=\"text\" data-language=\"{{ language.language_id }}\">
                    <div style=\"width: 64px;height: 32px;\" class=\"btn-group \">
                    {% if loop.index == 1 %}
                    <span class=\"my-handle\" aria-hidden=\"true\">
                   
                      <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                    </span>
                    {% endif %}
                  </div>
                    <div class=\"input-group mb-12\">
                      <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></div>
                      <input  autocomplete=\"off\" type=\"text\" data-oc-target=\"attribute-input-autocomplete\"  name=\"product_attribute[position_row][product_attribute_description][position_n][{{ language.language_id }}][text]\" placeholder=\"{{ entry_text }}\" class=\"form-control attribute-input\" value=\"text-{{ language.language_id }}\">
                      <ul style=\"top: 52px;left: 52px;\" class=\"dropdown-menu attribute-input-autocomplete\"></ul>
                    </div>
                    
                    <div class=\"input-group mb-12\">
                      <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></div>
                      <input  autocomplete=\"off\" type=\"text\" data-oc-target=\"attribute-input-autocomplete\" name=\"product_attribute[position_row][product_attribute_description][position_n][{{ language.language_id }}][value_text]\" placeholder=\"{{ entry_text }}\" class=\"form-control attribute-input\" value=\"value_text-{{ language.language_id }}\">
                      <ul style=\"top: 52px;left: 52px;\" class=\"dropdown-menu attribute-input-autocomplete\"></ul>
                  
                    </div>
                  
                    <div style=\"width: 64px;height: 32px;\" class=\"btn-group \">
                      {% if loop.index == 1 %}
                      <input value=\"0\"  name=\"product_attribute[position_row][product_attribute_description][position_n][{{ language.language_id }}][sort_order]\"  type=\"hidden\"   class=\"sort-order-attribute\" value=\"0\">
                     
                          <button type=\"button\" class=\"btn  d-none btn-danger delete-attribute-line btn-sm\" data-bs-toggle=\"tooltip\" title=\"Delete\">
                            <i class=\"fa-solid fa-minus-circle\"></i> 
                          </button>      
                      {% endif %}
                    </div>
                  
                  </div>
                {% endfor %}
              </div>
              </ul>
            </div>
            
          </div>
        </div>
      </div>

      <!-- End accordion Template -->
    
      <div class=\"row mb-3\">
        <label for=\"input-attribute-addnew\" class=\"col-sm-2 col-form-label text-end\">{{ button_attribute_add }}</label>
        <div class=\"col-sm-10\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#newAttributeModal\">
                       {{entry_new_attribute}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row mb-3\">
        <label for=\"input-option\" class=\"col-sm-2 col-form-label\">{{entry_existing_attribute}}</label>
        <div class=\"col-md-6\">
            <input type=\"text\" placeholder=\"{{ entry_attribute }}\" id=\"input-attribute-addnew\" data-oc-target=\"autocomplete-attribute-addnew\" class=\"form-control\" autocomplete=\"new-password\"/>
            <ul id=\"autocomplete-attribute-addnew\" class=\"dropdown-menu\"></ul>
            <div class=\"form-text\">(Autocomplete)</div>
        </div>
    </div>
    
      <ul id=\"attribute-accordions\" class=\"listWithHandle-attribute\"  style=\"padding: 0; margin: 0\">
    </ul>

</div>
 <!-- Addribute Add Modal is retained in product_form -->
 
<script >
    \$(document).ready(function () {
// ************************************ Attributes Section ********************************
var attribute_row = 0;
  
var productAttributesData = {{ product_attributes|json_encode|raw }};
 
 
// Delete an accordion/Attribute
\$(document).on('click', '.delete-attribute', function() {
      \$(this).closest('.accordion-item').remove();
      reSortAttributes();
});

// Delete an extra set inside an attribute

\$(document).on('click', '.delete-attribute-line', function() {
    \$(this).closest('li').remove();
    reSortAttributes();
});
            

// Add an extra set in an Attribute

\$(document).on('click', '.add-attribute-group', function () {

 
   
    var groupRow = \$(this).data('group-row');
    
    var positionN = \$(this).data('position-n');
    positionN++;
    \$(this).data('position-n', positionN);

    var attributeGroupContent = \$('#attribute-template .attribute-groups').html();
    attributeGroupContent =   attributeGroupContent;
    attributeGroupContent = attributeGroupContent.replace('d-none', '');

    attributeGroupContent = attributeGroupContent.replace(/position_row/g, groupRow).replace(/position_n/g, positionN);
    console.log(attributeGroupContent);
    attributeGroupContent = '<li style=\"border: 1px solid #beffa1; border-radius:10px;\"  class=\"list-group-item\">' +  attributeGroupContent + '</li>';
    // Convert HTML string to jQuery object
    var \$attributeGroupContent = \$(attributeGroupContent);

    // Clear values of input fields
    \$attributeGroupContent.find('input').val('');

    var parentAccordion = \$(this).closest('.accordion-item');
    
    parentAccordion.find('.attribute-groups').append(\$attributeGroupContent);
    if (parentAccordion.find('.accordion-button').hasClass('collapsed')) {
 
        parentAccordion.find('.accordion-button').trigger('click');
    }
    reSortAttributes();
    initializeSortablesAttributes();
});


 
   
 // Generate existing attributes for the product

function generateAttributeAccordion(index, productAttribute) {
  // Clone the template
  let accordionClone = \$(\"#attribute-template\").clone();
 
  // Update attributes
  let attributeId = productAttribute.attribute_id;
  accordionClone.find(\".accordion-button\").text(productAttribute.name);
  accordionClone.find(\".accordion\").attr(\"id\", \"attribute-\" + index);
  accordionClone.find(\".accordion-button\").attr(\"data-bs-target\", \"#attribute-\" + index + \"-collapseOne\");
  accordionClone.find(\".accordion-collapse\").attr(\"id\", \"attribute-\" + index + \"-collapseOne\");
  accordionClone.find('a').attr('href',accordionClone.find('a').attr('href').replace('attribute_id_placeholder', attributeId));
  // Save the content of .attribute-groups in a variable and empty it
  let attributeGroupsContent = accordionClone.find(\".attribute-groups\").html();
 
  accordionClone.find(\".attribute-groups\").empty();
  var counter=0;
  // Loop through product_attribute_description and update inputs
  \$.each(productAttribute.product_attribute_description, function(positionN, description) {
    let updatedContent = attributeGroupsContent.replace(/position_row/g, index).replace(/position_n/g, positionN);
 
   
    \$.each(description, function(language_id, descriptionv) {
      if (counter > 0) {
        updatedContent = updatedContent.replace(new RegExp('d-none', 'g'), '--');
      }
        updatedContent = updatedContent.replace(new RegExp('value=\"value_text-' + language_id + '\"', 'g'), 'value=\"' + descriptionv.value_text + '\"');
        updatedContent = updatedContent.replace(new RegExp('value=\"text-' + language_id + '\"', 'g'), 'value=\"' + descriptionv.text + '\"');
        updatedContent = updatedContent.replace(new RegExp('value=\"0\"', 'g'), 'value=\"' + descriptionv.sort_order + '\"');
    });
    counter++;
    accordionClone.find(\".attribute-groups\").append('<li class=\"list-group-item\">'  + updatedContent + '</li>');
});
let hiddenInput = \$('<input type=\"hidden\" class=\"attribute_id\" name=\"product_attribute[' + index + '][attribute_id]\" value=\"' + attributeId + '\">');
 
 
accordionClone.append(hiddenInput);
accordionClone.removeClass('d-none');
accordionClone.attr('id', 'accordion-main-it-' + index);

// Append the entire cloned accordion to the list
\$(\"#attribute-accordions\").append('<li class=\"list-group-item\">' + accordionClone.prop('outerHTML') + '</li>');

 \$('#accordion-main-it-' + index).find('.add-attribute-group').attr('data-position-n', counter);
 \$('#accordion-main-it-' + index).find('.add-attribute-group').attr('data-group-row', index);
 
 
\$('#accordion-main-it-' + index).find('.accordion-collapse').removeClass('show');

\$('#accordion-main-it-' + index).find('.accordion-button').addClass('collapsed');
attribute_row++;
reSortAttributes();
}

\$.each(productAttributesData, function(index, productAttribute) {
  generateAttributeAccordion(index, productAttribute);
});
initializeSortablesAttributes();
// Autocomplete/Add New Attribute
\$('#input-attribute-addnew').autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocomplete&product_id=' +   window.product_id    + '&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
            addNewAttribute(item['label'], item['value']);
            reSortAttributes();
        }
    }); 

    var attributeCurID = 0;
    var attributeCurType = '';
    var attributeCurLang = 1;


    \$(document).on('focus', '.attribute-input', function () {
 
    let result = \$(this).attr('name').match(/^(product_attribute\\[\\d+\\])/)[0] + '[attribute_id]';
 
    attributeCurType =  \$(this).attr('name').match(/\\[([^\\]]+)\\]\$/)[1];
    attributeCurID = \$('body').find('[name=\"' + result + '\"]').val();
  
    attributeCurLang = \$(this).attr('name').match(/\\[(\\d+)\\]/g)[2].replace(/\\D/g, '')

 
  
  
});
 

// Initialize Sortables for attributes

function initializeSortablesAttributes() {
  \$('.listWithHandle-attribute').each(function () {
    // Check if Sortable instance already exists
    if (!\$(this).data('sortable')) {
      // Create Sortable instance
      Sortable.create(this, {
        handle: '.my-handle',
        animation: 150,
        onEnd: function (event) {
        reSortAttributes();
        }
      });
      \$(this).data('sortable','true');
    }
  });
}

// Update hidden inputs sort_order values
 function reSortAttributes() {
  \$(\"#attribute-accordions\").find(\".sort-order-attribute\").each(function(index) {
         // Set the value based on the index (position)
         \$(this).val(index);
        });

    //Name autocompleters
    updateAutocompletNames();

 }
function updateAutocompletNames() {
  \$('.attribute-input').each(function (index) {
        // Create a unique ID for the input and ul
        let uniqueId = 'autocomplete-' + index + Math.floor(Math.random() * 10000000) + 1;

        // Set the unique ID to the input
        \$(this).attr('data-oc-target', uniqueId);

        // Set the unique ID to the associated ul
        \$(this).next('.attribute-input-autocomplete').attr('id', uniqueId);

         

 
    \$(this).autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocompleteChild&attribute_lang=' + attributeCurLang + '&attribute_type=' + attributeCurType + '&attribute_id=' + attributeCurID + '&product_id=' +   window.product_id    + '&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
           \$(this).val(item['label']);
        }
    }); 
    });
}
 // Modal Adding new attribute
 function handleSaveAttribute() {
    var formData = \$(\"#newattributeForm\").serialize();
 
    \$.ajax({
        type: \"POST\",
        url: \"index.php?route=catalog/attribute.save&user_token={{ user_token }}\",
        data: formData,
        dataType: \"json\",   
        success: function(response) {
          addNewAttribute(\$('input[name=\"attribute_description[1][name]\"]').val(), response.attribute_id);
          
            \$(\"#newAttributeModal\").modal(\"hide\");
        },
        error: function(error) {
           alert('An Error occured saving the attribute');
        }
    });
}
  // Attach the event listener to the modal save button
  \$(\"#saveAttributeBtn\").on(\"click\", handleSaveAttribute);

  // Add new a Attribute

function addNewAttribute(name, attributeId) {
  
  var newAccordion = \$('#attribute-template').clone().removeClass('d-none');
  newAccordion.attr('id','accordion-main-it-' + attribute_row);
  newAccordion.find('a').attr('href',newAccordion.find('a').attr('href').replace('attribute_id_placeholder', attributeId));
  newAccordion.find('[id]').each(function() {
    \$(this).attr('id', 'accordion-' + attribute_row + '-' + \$(this).attr('id'));
  });
  newAccordion.find('[aria-labelledby]').each(function() {
    \$(this).attr('aria-labelledby', 'accordion-' + attribute_row + '-' + \$(this).attr('aria-labelledby'));
  });
  newAccordion.find('[data-bs-target]').each(function() {
    \$(this).attr('data-bs-target', '#accordion-' + attribute_row + '-' + \$(this).attr('data-bs-target').split('#')[1]);
  });
  newAccordion.find('input').each(function() {
    \$(this).attr('value', '');
});
 
  newAccordion.find('.accordion-button').text(name);
  var hiddenInput = \$('<input type=\"hidden\" class=\"attribute_id\" name=\"product_attribute[' + attribute_row + '][attribute_id]\" value=\"' + attributeId + '\">');
 
  newAccordion.find('input').each(function() {
    var currentName = \$(this).attr('name');
    \$(this).val('');
    var updatedName = currentName.replace(/position_n/g, '0').replace(/position_row/g, attribute_row);

   
    \$(this).attr('name', updatedName);
  });
  newAccordion.find('.accordion-body').append(hiddenInput);
  let content =  newAccordion.find(\".attribute-groups\").html();
  newAccordion.find(\".attribute-groups\").html('<li class=\"list-group-item\">' + content + '</li>');

  let listItem = \$('<li class=\"list-group-item\"></li>').append(newAccordion);

 
  listItem.find('.add-attribute-group').attr('data-group-row', attribute_row);
 

// Append the wrapped newAccordion to #attribute-accordions
\$('#attribute-accordions').append(listItem);
  attribute_row++;
  
  reSortAttributes();
}
});
// ********************************* End Attributes section ******************************

</script>", "cp-akis/view//plates/catalog/product_tabs/attributes_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/attributes_tab.twig");
    }
}
