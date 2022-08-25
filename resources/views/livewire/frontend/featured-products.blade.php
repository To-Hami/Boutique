<div>
    <section class="py-5">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
        </header>
        <div class="row">
        @forelse($featured_products as $product)
            <!-- PRODUCT-->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <div class="badge text-white bg-"></div>
                            <a class="d-block" href="{{route('product',$product->slug)}}">
                                <img class="img-fluid w-100"
                                     src="{{asset('assets/products/' . $product->media->first()->file_name )}}"
                                     alt="..."> </a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                                            href="#!"><i
                                                class="far fa-heart"></i></a></li>
                                    <li class="list-inline-item m-0 p-0">
                                        <a class="btn btn-sm btn-dark"
                                           href="#">Add to cart</a>
                                    </li>
                                    <li class="list-inline-item me-0">
                                        <a
                                            wire:click.prevent="$emit('showProductModelAction' , '{{$product->slug}}')"
                                            class="btn btn-sm btn-outline-dark"
                                            data-target="#productView"
                                            data-toggle="modal">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h6><a class="reset-anchor" href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                        </h6>
                        <p class="small text-muted">{{$product->price}}</p>
                    </div>
                </div>
                <!-- PRODUCT-->
            @e
            @endforelse

        </div>

        <livewire:frontend.product-model-share/>

    </section>
</div>

@push('scripts')
    <script>


    </script>

@endpush()
