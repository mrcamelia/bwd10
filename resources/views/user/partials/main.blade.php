@extends('layout')

@section('content')
<div class="content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<!-- Daftar Resep -->
				<div class="col-lg-9">
                <h3 class ="text-info" style="margin-top:15px;">Resep Terbaru</h3>
					<div class="product-wrapper res-xl">
						<div class="bar-area">
							<div class="bar pb-60">
							</div>
							<div class="product-content tab-content">
								<div id="grid-sidebar3" class="tab-pane fade active show">
                                <div class="row">
                                    @forelse ($recipes as $recipe)
                                    <div class="col-6 col-md-4">
                                    <div class="product-wrapper mb-30">
                                        <div class="product-img text-center"style="margin: auto;">
                                            <a href="{{ url('home/'. $recipe->slug) }}">
                                                    <img src="{{ asset('storage/foto_resep/'.$recipe->image) }}" alt="{{ $recipe->name }}" style="height:200px;width:280px;margin: auto;">
                                            </a>
                                        </div>
                                        <br>
                                        <div class="product-content text-left">
                                            <h4><a href="{{ url('home/'. $recipe->slug) }}" class="text-info">{{ $recipe->name }}</a></h4>
                                            <span>{{ ($recipe->description) }}</span>
                                        </div>
                                        <div class="detail text-center" style="margin-top: 20px;margin-bottom: 10px;margin-right: 8px;">
                                        <a href="{{ url('home/'. $recipe->slug) }}" class="text-sm text-dark w-100 p-2 rounded" style="display: block;width:280px;background-color:#C2C9CD">Suka</a>
                                        <br><br>
                                        </div>
                                    </div>
                                </div>
                                    @empty
                                    <h5 style="margin-left:50px;">No product found!</h5>
                                    @endforelse
                                </div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-50 text-center">
						{{ $recipes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection