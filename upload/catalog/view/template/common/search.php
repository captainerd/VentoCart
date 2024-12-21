<form action="/index.php" method="get">
	<input type="hidden" name="route" value="product/search">
	<input type="hidden" name="language" value="en-gb">
	<div id="search" class="input-group  ">
		<input type="text" name="search" value="<?= $this->e($search) ?>" placeholder="<?= $this->e($text_search) ?>"
			class="form-control form-control-lg">
		<button type="submit" class="btn btn-light btn-sm">
			<i class="fa-solid fa-magnifying-glass"></i>
		</button>
	</div>
</form>