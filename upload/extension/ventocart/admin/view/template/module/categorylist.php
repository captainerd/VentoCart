<?= $header ?><?= $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="submit" form="form-module" data-bs-toggle="tooltip" title="<?= $button_save ?>"
                    class="btn btn-primary">
                    <i class="fa-solid fa-save"></i>
                </button>
                <a href="<?= $back ?>" data-bs-toggle="tooltip" title="<?= $button_back ?>" class="btn btn-light">
                    <i class="fa-solid fa-reply"></i>
                </a>
            </div>
            <h1><?= $heading_title ?></h1>
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                    <li class="breadcrumb-item">
                        <a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-pencil"></i> <?= $text_edit ?>
            </div>
            <div class="card-body">
                <form id="form-module" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
                    <div class="row mb-3">
                        <label for="input-parent" class="col-sm-2 col-form-label"><?= $entry_select_category ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="path" placeholder="<?= $entry_select_category ?>" id="input-parent"
                                data-oc-target="autocomplete-parent" class="form-control" autocomplete="off" />
                            <ul id="autocomplete-parent" class="dropdown-menu"></ul>
                            <div id="error-parent" class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Selected Categories Section -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><?= $entry_selected_categories ?></label>
                        <div class="col-sm-10">
                            <div id="selected-categories" class="border rounded p-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <tbody>
                                            <?php foreach ($module_categorylist_categories as $category_id => $category_name): ?>
                                                <tr id="selected-category-<?= $category_id ?>">
                                                    <td>
                                                        <input type="hidden"
                                                            name="module_categorylist_categories[<?= $category_id ?>]"
                                                            value="<?= $category_name ?>" />
                                                        <?= $category_name ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-danger btn-sm remove-category"
                                                            data-id="<?= $category_id ?>">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <!-- Selected categories will be appended here dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><?= $entry_autoplay ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="module_categorylist_autoplay" value="0" />
                                <input type="checkbox" name="module_categorylist_autoplay" value="1" id="input-autoplay"
                                    class="form-check-input" <?php if ($module_categorylist_autoplay): ?> checked<?php endif; ?> />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-interval" class="col-sm-2 col-form-label"><?= $entry_interval ?></label>
                        <div class="col-sm-10">
                            <input type="number" name="module_categorylist_interval"
                                value="<?= isset($module_categorylist_interval) ? $module_categorylist_interval : '' ?>"
                                id="input-interval" class="form-control" placeholder="<?= $entry_interval ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><?= $entry_status ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="module_categorylist_status" value="0" />
                                <input type="checkbox" name="module_categorylist_status" value="1" id="input-status"
                                    class="form-check-input" <?php if ($module_categorylist_status): ?> checked<?php endif; ?> />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>


<script>
    $('#input-parent').autocomplete({
        'source': function (request, response) {
            $.ajax({
                url: 'index.php?route=catalog/category.autocomplete&user_token=<?= $user_token ?>&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response($.map(json, function (item) {
                        return {
                            value: item['category_id'],
                            label: item['name']
                        };
                    }));
                }
            });
        },
        'select': function (item) {
            // Add the selected item to the table
            const categoryId = item.value;
            const categoryName = item.label;

            // Check if already added
            if ($('#selected-category-' + categoryId).length > 0) {
                alert('Category already added.');
                return;
            }

            // Append to the table
            $('#selected-categories tbody').append(`
                <tr id="selected-category-${categoryId}">
                    <td>
                        <input type="hidden" name="module_categorylist_categories[${categoryId}]" value="${categoryName}" />
                        ${categoryName}
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-danger btn-sm remove-category" data-id="${categoryId}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
        }
    });

    // Remove category on trash icon click
    $('#selected-categories').on('click', '.remove-category', function () {
        const categoryId = $(this).data('id');
        $('#selected-category-' + categoryId).remove();
    });
</script>

<?= $footer ?>