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

/* cp-akis/view//plates/catalog/product_tabs/images_tab.twig */
class __TwigTemplate_2b64f0a7baaf7ded2040ef50e3673a7b extends Template
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
        echo "<div id=\"noticeimage\" ";
        if ((($context["product_id"] ?? null) > 0)) {
            echo " style=\"display: none;\" ";
        }
        echo " class=\"alert alert-info show\"
    role=\"alert\">
    ";
        // line 3
        echo ($context["text_notice_image"] ?? null);
        echo "

</div>

<div class=\"text-center mt-2\">
    <button ";
        // line 8
        if ((($context["product_id"] ?? null) == 0)) {
            echo " disabled=\"true\" ";
        }
        echo " id=\"add-new-image-button\" type=\"button\"
        data-bs-toggle=\"tooltip\" title=\"";
        // line 9
        echo ($context["button_image_add"] ?? null);
        echo "\" class=\"btn btn-primary\">
        <i class=\"fa-solid fa-plus-circle\"></i> ";
        // line 10
        echo ($context["button_image_add"] ?? null);
        echo "
    </button>
</div>

<legend>";
        // line 14
        echo ($context["text_image_additional"] ?? null);
        echo "</legend>

<div id=\"tabimage-content\" ";
        // line 16
        if ((($context["product_id"] ?? null) == 0)) {
            echo " style=\"display:none\" ";
        }
        echo ">

    <fieldset>

        <!-- Hidden Template for adding new image -->
        <div id=\"new-image-template\" style=\"width: 10vw; min-width: 130px; cursor: grab\"
            class=\"card d-none m-1 image-sortable\">
            <img data-oc-placeholder=\"";
        // line 23
        echo ($context["placeholder"] ?? null);
        echo "\" id=\"product-image-row_placeholder\" src=\"";
        echo ($context["placeholder"] ?? null);
        echo "\"
                alt=\"\" title=\"\" class=\"card-img-top\" />
            <input id=\"input-product-image-row_placeholder\" type=\"hidden\"
                name=\"xxxxxproduct_image[row_placeholder][image]\" value=\"\" />
            <input type=\"hidden\" name=\"xxxxxproduct_image[row_placeholder][sort_order]\" value=\"\" />

            <div class=\"card-body\">
                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-row_placeholder\"
                    data-oc-thumb=\"#product-image-row_placeholder\"
                    class=\"btn mb-2 btn-block btn-primary btn-sm btn-block\">
                    <i class=\"fa-solid fa-pencil\"></i> ";
        // line 33
        echo ($context["button_edit"] ?? null);
        echo "
                </button>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 35
        echo ($context["button_remove"] ?? null);
        echo "\"
                    class=\"btn mb-2 btn-sm btn-img-delete btn-danger\">
                    <i class=\"fa-solid fa-minus-circle\"></i> ";
        // line 37
        echo ($context["button_delete"] ?? null);
        echo "
                </button>
            </div>
        </div>
        <!-- end template -->

        <div id=\"image-sortable-container\" class=\"d-flex   flex-wrap\">

            ";
        // line 45
        $context["image_row"] = 1;
        // line 46
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_image"]) {
            // line 47
            echo "            <div style=\"width: 10vw; min-width: 130px; cursor: grab\" class=\"card m-1 image-sortable\">
                ";
            // line 48
            if (twig_in_filter(twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 48), ".")), ["mkv", "avi", "mp4"])) {
                // line 49
                echo "                <video id=\"product-image-";
                echo ($context["image_row"] ?? null);
                echo "\" class=\"img-thumbnail thumbnail\"  style=\"max-height: 190px;object-fit: cover;\" >
                    <source class=\"thumbnail\" src=\"";
                // line 50
                echo twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 50);
                echo "\"
                        type=\"video/";
                // line 51
                echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 51), "."));
                echo "\">
                    Your browser does not support the video tag.
                </video>
                ";
            } else {
                // line 55
                echo "                <img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 55);
                echo "\" alt=\"\" title=\"\" id=\"product-image-";
                echo ($context["image_row"] ?? null);
                echo "\"
                    data-oc-placeholder=\"";
                // line 56
                echo ($context["placeholder"] ?? null);
                echo "\" class=\"card-img-top\" />
                ";
            }
            // line 58
            echo "
                <input type=\"hidden\" name=\"product_image[";
            // line 59
            echo ($context["image_row"] ?? null);
            echo "][image]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_image"], "image", [], "any", false, false, false, 59);
            echo "\"
                    id=\"input-product-image-";
            // line 60
            echo ($context["image_row"] ?? null);
            echo "\" />

                <input type=\"hidden\" name=\"product_image[";
            // line 62
            echo ($context["image_row"] ?? null);
            echo "][sort_order]\"
                    value=\"";
            // line 63
            echo twig_get_attribute($this->env, $this->source, $context["product_image"], "sort_order", [], "any", false, false, false, 63);
            echo "\" placeholder=\"";
            echo ($context["entry_sort_order"] ?? null);
            echo "\" />

                <div class=\"card-body\">
                    <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-";
            // line 66
            echo ($context["image_row"] ?? null);
            echo "\"
                        data-oc-thumb=\"#product-image-";
            // line 67
            echo ($context["image_row"] ?? null);
            echo "\"
                        class=\"btn mb-2  btn-block btn-primary btn-sm btn-block\">
                        <i class=\"fa-solid fa-pencil\"></i> ";
            // line 69
            echo ($context["button_edit"] ?? null);
            echo "
                    </button>
                    <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
            // line 71
            echo ($context["button_remove"] ?? null);
            echo "\"
                        class=\"btn mb-2 btn-sm btn-img-delete btn-danger\">
                        <i class=\"fa-solid fa-minus-circle\"></i> ";
            // line 73
            echo ($context["button_delete"] ?? null);
            echo "
                    </button>
                </div>
            </div>
            ";
            // line 77
            $context["image_row"] = (($context["image_row"] ?? null) + 1);
            // line 78
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "        </div>


    </fieldset>
    <div class=\"form-text\">";
        // line 83
        echo ($context["help_drag_n_drop"] ?? null);
        echo "</div>

</div>


<script>

    var targetElement = null;
    function updateImageSortOrder() {
        \$('#image-sortable-container').find('input[name^=\"product_image[\"][name\$=\"][sort_order]\"]').each(function (index) {
            // Update the sort_order input value based on the index

            \$(this).val(index);
        });
    }

    \$(document).ready(function () {
        // Image tab Section

        // Add new image
        \$('#add-new-image-button').on('click', function () {
            var newRow = \$('#new-image-template').clone();
            var newCount = \$('#image-sortable-container').find(\".image-sortable\").length + 1;

            // Update the regex to match any text with row_placeholder
            var newHtml = newRow.html().replace(/row_placeholder/g, newCount);
            newHtml = newHtml.replace(/xxxxx/g, '');

            newRow.html(newHtml);
            newRow.removeClass('d-none');
            \$('#image-sortable-container').append(newRow);
            newRow.find('input[type=\"text\"]').val('0');
            newRow.find('.btn-primary').trigger('click');
            updateImageSortOrder();
        });


        \$(document).on('click', '.btn-img-delete', function () {

            var confirmResult = confirm(\"Are you sure you want to delete this image?\");
            if (confirmResult) {
                // User clicked \"OK\" in the confirmation dialog
                \$(this).closest('.image-sortable').remove();
                updateImageSortOrder();
            }
            if (\$('#image-sortable-container').find(\".image-sortable\").length == 0) {
                \$('#add-new-image-button').trigger('click');
            }
        });

        // Initialize sortables
        Sortable.create(document.getElementById('image-sortable-container'), {
            handle: '.image-sortable',
            placeholder: 'placeholder',
            animation: 150,
            onEnd: function (event) {

                updateImageSortOrder()

            }
        });

        \$(document).on('click', '.btn-primary', function () {
            let ocTarget = \$(this).data('oc-thumb');
          
            if (typeof ocTarget != \"undefined\" && ocTarget != \"\") {
                window.activeEditor = false;
              
                  targetElement = \$(ocTarget);
            }

        });

    });



</script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/images_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 83,  223 => 79,  217 => 78,  215 => 77,  208 => 73,  203 => 71,  198 => 69,  193 => 67,  189 => 66,  181 => 63,  177 => 62,  172 => 60,  166 => 59,  163 => 58,  158 => 56,  151 => 55,  144 => 51,  140 => 50,  135 => 49,  133 => 48,  130 => 47,  125 => 46,  123 => 45,  112 => 37,  107 => 35,  102 => 33,  87 => 23,  75 => 16,  70 => 14,  63 => 10,  59 => 9,  53 => 8,  45 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"noticeimage\" {% if product_id> 0 %} style=\"display: none;\" {% endif %} class=\"alert alert-info show\"
    role=\"alert\">
    {{text_notice_image}}

</div>

<div class=\"text-center mt-2\">
    <button {% if product_id==0 %} disabled=\"true\" {% endif %} id=\"add-new-image-button\" type=\"button\"
        data-bs-toggle=\"tooltip\" title=\"{{ button_image_add }}\" class=\"btn btn-primary\">
        <i class=\"fa-solid fa-plus-circle\"></i> {{ button_image_add }}
    </button>
</div>

<legend>{{ text_image_additional }}</legend>

<div id=\"tabimage-content\" {% if product_id==0 %} style=\"display:none\" {% endif %}>

    <fieldset>

        <!-- Hidden Template for adding new image -->
        <div id=\"new-image-template\" style=\"width: 10vw; min-width: 130px; cursor: grab\"
            class=\"card d-none m-1 image-sortable\">
            <img data-oc-placeholder=\"{{ placeholder }}\" id=\"product-image-row_placeholder\" src=\"{{ placeholder  }}\"
                alt=\"\" title=\"\" class=\"card-img-top\" />
            <input id=\"input-product-image-row_placeholder\" type=\"hidden\"
                name=\"xxxxxproduct_image[row_placeholder][image]\" value=\"\" />
            <input type=\"hidden\" name=\"xxxxxproduct_image[row_placeholder][sort_order]\" value=\"\" />

            <div class=\"card-body\">
                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-row_placeholder\"
                    data-oc-thumb=\"#product-image-row_placeholder\"
                    class=\"btn mb-2 btn-block btn-primary btn-sm btn-block\">
                    <i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}
                </button>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\"
                    class=\"btn mb-2 btn-sm btn-img-delete btn-danger\">
                    <i class=\"fa-solid fa-minus-circle\"></i> {{ button_delete }}
                </button>
            </div>
        </div>
        <!-- end template -->

        <div id=\"image-sortable-container\" class=\"d-flex   flex-wrap\">

            {% set image_row = 1 %}
            {% for product_image in product_images %}
            <div style=\"width: 10vw; min-width: 130px; cursor: grab\" class=\"card m-1 image-sortable\">
                {% if product_image.thumb|split('.')|last in ['mkv', 'avi', 'mp4'] %}
                <video id=\"product-image-{{ image_row }}\" class=\"img-thumbnail thumbnail\"  style=\"max-height: 190px;object-fit: cover;\" >
                    <source class=\"thumbnail\" src=\"{{ product_image.thumb }}\"
                        type=\"video/{{ product_image.thumb|split('.')|last }}\">
                    Your browser does not support the video tag.
                </video>
                {% else %}
                <img src=\"{{ product_image.thumb }}\" alt=\"\" title=\"\" id=\"product-image-{{ image_row }}\"
                    data-oc-placeholder=\"{{ placeholder }}\" class=\"card-img-top\" />
                {% endif %}

                <input type=\"hidden\" name=\"product_image[{{ image_row }}][image]\" value=\"{{ product_image.image }}\"
                    id=\"input-product-image-{{ image_row }}\" />

                <input type=\"hidden\" name=\"product_image[{{ image_row }}][sort_order]\"
                    value=\"{{ product_image.sort_order }}\" placeholder=\"{{ entry_sort_order }}\" />

                <div class=\"card-body\">
                    <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-{{ image_row }}\"
                        data-oc-thumb=\"#product-image-{{ image_row }}\"
                        class=\"btn mb-2  btn-block btn-primary btn-sm btn-block\">
                        <i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}
                    </button>
                    <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\"
                        class=\"btn mb-2 btn-sm btn-img-delete btn-danger\">
                        <i class=\"fa-solid fa-minus-circle\"></i> {{ button_delete }}
                    </button>
                </div>
            </div>
            {% set image_row = image_row + 1 %}
            {% endfor %}
        </div>


    </fieldset>
    <div class=\"form-text\">{{help_drag_n_drop}}</div>

</div>


<script>

    var targetElement = null;
    function updateImageSortOrder() {
        \$('#image-sortable-container').find('input[name^=\"product_image[\"][name\$=\"][sort_order]\"]').each(function (index) {
            // Update the sort_order input value based on the index

            \$(this).val(index);
        });
    }

    \$(document).ready(function () {
        // Image tab Section

        // Add new image
        \$('#add-new-image-button').on('click', function () {
            var newRow = \$('#new-image-template').clone();
            var newCount = \$('#image-sortable-container').find(\".image-sortable\").length + 1;

            // Update the regex to match any text with row_placeholder
            var newHtml = newRow.html().replace(/row_placeholder/g, newCount);
            newHtml = newHtml.replace(/xxxxx/g, '');

            newRow.html(newHtml);
            newRow.removeClass('d-none');
            \$('#image-sortable-container').append(newRow);
            newRow.find('input[type=\"text\"]').val('0');
            newRow.find('.btn-primary').trigger('click');
            updateImageSortOrder();
        });


        \$(document).on('click', '.btn-img-delete', function () {

            var confirmResult = confirm(\"Are you sure you want to delete this image?\");
            if (confirmResult) {
                // User clicked \"OK\" in the confirmation dialog
                \$(this).closest('.image-sortable').remove();
                updateImageSortOrder();
            }
            if (\$('#image-sortable-container').find(\".image-sortable\").length == 0) {
                \$('#add-new-image-button').trigger('click');
            }
        });

        // Initialize sortables
        Sortable.create(document.getElementById('image-sortable-container'), {
            handle: '.image-sortable',
            placeholder: 'placeholder',
            animation: 150,
            onEnd: function (event) {

                updateImageSortOrder()

            }
        });

        \$(document).on('click', '.btn-primary', function () {
            let ocTarget = \$(this).data('oc-thumb');
          
            if (typeof ocTarget != \"undefined\" && ocTarget != \"\") {
                window.activeEditor = false;
              
                  targetElement = \$(ocTarget);
            }

        });

    });



</script>", "cp-akis/view//plates/catalog/product_tabs/images_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/images_tab.twig");
    }
}
