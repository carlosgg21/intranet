@extends('layouts.app-site')

@section('content')
<div class="row">
        <div class="col-xl-9">
    
    
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
            </div>
    
            @if(!empty($phrase))
            <div class="card">
                <div class="card-body">           
                    <h4 class="card-title mb-4">Frases</h4>
                     <div>
                        <blockquote class="blockquote font-size-16 mb-0">
                            <p>{{ $phrase?->text }}</p>
                            <footer class="blockquote-footer m-0"> <cite title="Source Title">{{ $phrase?->author }}</cite></footer>
                        </blockquote>
                    </div>
            
                </div><!-- end card -->
            </div><!-- end card -->
                
            @endif
          
    
            <div class="card">
                <div class="card-body">
    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">
                                    <i class="ri-calendar-todo-fill me-2"></i>
                                    EVENTOS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">
                                    <i class="ri-slideshow-line me-2"></i>
                                    AL DÍA</span>
    
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">
                                    <i class="ri-newspaper-fill me-2"></i>
                                    NOTICIAS
                                </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                        <span class="d-none d-sm-block">Settings</span>
                                                    </a>
                                                </li> -->
                    </ul>
    
                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane" id="profile1" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus.
                            </p>
                        </div>
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free carles.
                            </p>
                        </div>
                        <div class="tab-pane" id="settings1" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache readymade keffiyeh craft.
                            </p>
                        </div>
                    </div>
    
                </div>
            </div>
    
    
        </div>
        <!-- end col -->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
    
                    <h4 class="card-title mb-4">OTROS SITIOS DE INTERES</h4>
    
                    <ul class="list-unstyled">
                        @foreach ($otherApp as $item)
                            <li> 
                            
                                <a href="{{ $item->url }}" target="_blank" style="color: black" >
                                    
                                   <x-partials.thumbnail src="{{ $item->image ? \Storage::url($item->image) : '' }}" :size="20" />
                                    {{ $item->display_name }}
                                </a>
                            </li>
                        @endforeach
                        
                    </ul>
                    
    
                </div>
            </div><!-- end card -->
    

            <div class="card">
                <div class="card-body">
            
                  <h4 class="card-title mb-4">CUMPLEAÑOS</h4>
                    
                    <ul class="list-group list-group-flush">
                        @foreach ($birthdays as $item)
                        <li class="list-group-item">
                            {{ $item->full_name }}<br>
                            <small>{{ $item->birthday ? birthday_date($item->birthday) : '-'}}</small><br>
                            @if ($item->is_birthday_today)
                            <strong style="color: rgb(231, 78, 103)">¡Feliz cumpleaños!</strong>
                            @endif
                        </li>
                    
                        @endforeach
                    
                    </ul>
            
            
                </div>
            </div><!-- end card -->
          
    
            {{-- <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is
                            shown by default, until the collapse plugin adds the appropriate
                            classes that we use to style each element. These classes control
                            the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or
                            overriding our default variables. It's also worth noting that just
                            about any HTML can go within the <code>.accordion-body</code>,
                            though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is
                            hidden by default, until the collapse plugin adds the appropriate
                            classes that we use to style each element. These classes control
                            the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or
                            overriding our default variables. It's also worth noting that just
                            about any HTML can go within the <code>.accordion-body</code>,
                            though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is
                            hidden by default, until the collapse plugin adds the appropriate
                            classes that we use to style each element. These classes control
                            the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or
                            overriding our default variables. It's also worth noting that just
                            about any HTML can go within the <code>.accordion-body</code>,
                            though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div> --}}
        </div><!-- end col -->
    </div>
@endsection