<section class="jumbotron text-center p-2">
	<div class="container p-2">
		<h1 class="jumbotron-heading p-2 mb-2">Filtro de entradas</h1>
		<p class="lead text-muted"></p>
		<form>
			<p>
				<div class="row">
					<div class="form-group col-6">
						<input type="text" placeholder="Por Título" class="form-control" id="search" name="search"></input>
					</div>
					<div class="form-group col-6">
						<select name="category" id="category-select" class="form-control">
							<option value="" selected> Por categoría </option>
							@foreach ($categories as $category)
								<option value="{{$category->id}}" >
									{{$category->name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
			</p>
		</form>
	</div>
</section>