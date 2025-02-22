<form action="/index.php" method="get">
	<input type="hidden" name="route" value="product/search">
	<input type="hidden" name="language" value="en-gb">
	<div class="search-container input-group">
		<input type="text" name="search" class="search-input form-control form-control-lg"
			value="<?= $this->e($search) ?>" placeholder="<?= $this->e($text_search) ?>" autocomplete="off">
		<button type="submit" class="btn btn-light btn-sm">
			<i class="fa-solid fa-magnifying-glass"></i>
		</button>
		<ul class="search-suggestions"></ul>
	</div>
</form>